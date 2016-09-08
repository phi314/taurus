<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/11/16
 * Time: 11:52 AM
 */

class User extends US_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('ion_auth');
    }

    public function index()
    {

    }

    public function login()
    {
        $this->data['page_title'] = 'Login';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('remember', 'Remember', 'integer');

        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form');
            $this->render('admin/user/login_view', 'auth_master');
        }
        else
        {
            $remember = (bool) $this->input->post('remember');
            if($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                redirect('admin', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('admin/user/login', 'refresh');
            }
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('admin/user/login', 'refresh');
    }

    public function profile()
    {
        $this->data['page_title'] = "User Profile";
        $user = $this->ion_auth->user()->row();
        $this->data['user'] = $user;
        $this->data['current_user_menu'] = '';
        if($this->ion_auth->in_group('admin'))
        {
            $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view', NULL, TRUE);
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim');
        $this->form_validation->set_rules('company', 'Company', 'trim');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() === FALSE)
        {
            $this->render('admin/user/profile_view', 'admin_master');
        }
        else
        {
            $new_data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone')
            ];

            // if password is posted
            if(strlen($this->input->post('password')) >= 6)
            {
                $new_data['password'] = $this->input->post('password');
            }

            $this->ion_auth->update($user->id, $new_data);

            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('admin/user/profile', 'refresh');
        }
    }
    
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */