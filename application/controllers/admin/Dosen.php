<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/23/16
 * Time: 12:20 AM
 */

class Dosen extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('dosen_model');
    }

    public function index()
    {
        $this->data['page_title'] = "List Dosen";
        $this->data['dosen'] = $this->dosen_model->with_user('fields:name, gender')->get_all();
        $this->render('admin/dosen/list_dosen_view');
    }

    public function create()
    {
        $this->data['page_title'] = "Tambah Dosen";
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->dosen_model->rules['insert']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form_helper');
            $this->render('admin/dosen/create_dosen_view');
        }
        else
        {
            $nip = $this->input->post('nip');
            $name = $this->input->post('name');
            $gender = $this->input->post('gender');
            $group = [2]; // Dosen

            $additional_data = [
                'name' => $name,
                'gender' => $gender
            ];

            $id = $this->ion_auth->register($nip, $nip, $nip.'@email.com', $additional_data, $group);

            if(!$id)
            {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('admin/mahasiswa', 'refresh');
            }
            else
            {
                $insert_data = [
                    'id' => $id,
                    'nip' => $nip,
                    'created_by' => $this->ion_auth->get_user_id()
                ];

                $this->dosen_model->insert($insert_data);
                $this->session->set_flashdata('message', 'Berhasil tambah dosen');
                redirect('admin/dosen', 'refresh');
            }
        }
    }

    public function edit($id = NULL)
    {
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        $this->data['page_title'] = 'Edit Dosen';
        $dosen = $this->dosen_model->with_user('fields:name, gender, username, email')->get($id);
        if(!$dosen)
        {
            $this->session->set_flashdata('message', 'Dosen tidak ditemukan');
            redirect('admin/dosen', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->dosen_model->rules['update']);
        if($this->form_validation->run() === FALSE)
        {
            $this->data['dosen'] = $dosen;
            $this->render('admin/dosen/edit_dosen_view');
        }
        else
        {
            $update_data_user = [
                'name' => $this->input->post('name'),
                'gender' => $this->input->post('gender'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email')
            ];

            $this->ion_auth->update($id, $update_data_user);

            $update_data_dosen = [
                'nip' => $this->input->post('nip'),
                'updated_by' => $this->ion_auth->get_user_id()
            ];

            $this->dosen_model->update($update_data_dosen, $id);
            $this->session->set_flashdata('message', 'Berhasil edit dosen');
            redirect('admin/dosen', 'refresh');
        }
    }
    
}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */