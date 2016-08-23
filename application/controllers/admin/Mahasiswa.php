<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/22/16
 * Time: 9:12 PM
 */

class Mahasiswa extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

    public function index()
    {
        $this->data['page_title'] = 'Mahasiswa';
        $this->data['mahasiswa'] = $this->mahasiswa_model->with_user('fields:name, gender')->get_all();
        $this->render('admin/mahasiswa/list_mahasiswa_view');
    }

    public function create()
    {
        $this->data['page_title'] = 'Tambah Mahasiswa';

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->mahasiswa_model->rules['insert']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form');
            $this->render('admin/mahasiswa/create_mahasiswa_view');
        }
        else
        {
            $nim = $this->input->post('nim');
            $name = $this->input->post('name');
            $gender = $this->input->post('gender');
            $group = [3]; // Mahasiswa

            $additional_data = [
                'name' => $name,
                'gender' => $gender
            ];

            $id = $this->ion_auth->register($nim, $nim, $nim.'@email.com', $additional_data, $group);

            if(!$id)
            {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('admin/mahasiswa', 'refresh');
            }
            else
            {
                $insert_data = [
                    'id' => $id,
                    'nim' => $nim,
                    'created_by' => $this->ion_auth->get_user_id()
                ];

                $this->mahasiswa_model->insert($insert_data);
                $this->session->set_flashdata('message', 'Berhasil tambah mahasiswa');
                redirect('admin/mahasiswa', 'refresh');
            }
        }
    }

    public function edit($id = NULL)
    {
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        $this->data['page_title'] = 'Edit Mahasiswa';

        $mahasiswa = $this->mahasiswa_model->with_user('fields:name, gender, username, email')->get($id);
        if(!$mahasiswa)
        {
            $this->session->set_flashdata('message', 'Mahasiswa tidak ditemukan');
            redirect('admin/mahasiswa', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->mahasiswa_model->rules['update']);
        if($this->form_validation->run() === FALSE)
        {
            $this->data['mahasiswa'] = $mahasiswa;
            $this->render('admin/mahasiswa/edit_mahasiswa_view');
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

            $update_data_mahasiswa = [
                'nim' => $this->input->post('nim'),
                'updated_by' => $this->ion_auth->get_user_id()
            ];

            $this->mahasiswa_model->update($update_data_mahasiswa, $id);
            $this->session->set_flashdata('message', 'Berhasil edit mahasiswa');
            redirect('admin/mahasiswa', 'refresh');
        }
    }
    
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */