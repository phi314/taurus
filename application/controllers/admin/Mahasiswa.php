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
        $this->load->model(['mahasiswa_model']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->data['page_title'] = 'Mahasiswa';
        $this->data['before_body'] = "
            <script src='".site_url(JS.'_controller/admin/mahasiswa/list_mahasiswa.js')."'></script>
        ";
        $this->data['mahasiswa'] = $this->mahasiswa_model->with_user('fields:name, gender')->get_all();
        $this->render('admin/mahasiswa/list_mahasiswa_view');
    }

    public function create()
    {
        $this->data['page_title'] = 'Tambah Mahasiswa';
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

    public function edit($mahasiswa_id = NULL)
    {
        $mahasiswa_id = $this->input->post('id') ? $this->input->post('id') : $mahasiswa_id;
        $mahasiswa = $this->mahasiswa_model->with_user('fields:name, gender, username, email')->get($mahasiswa_id);
        if(!$mahasiswa)
        {
            $this->session->set_flashdata('message', 'Mahasiswa tidak ditemukan');
            redirect('admin/mahasiswa', 'refresh');
        }
        $this->data['page_title'] = 'Edit Mahasiswa';
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

            $this->ion_auth->update($mahasiswa_id, $update_data_user);

            $update_data_mahasiswa = [
                'nim' => $this->input->post('nim'),
                'updated_by' => $this->ion_auth->get_user_id()
            ];

            $this->mahasiswa_model->update($update_data_mahasiswa, $mahasiswa_id);
            $this->session->set_flashdata('message', 'Berhasil edit mahasiswa');
            redirect('admin/mahasiswa#'.$mahasiswa_id, 'refresh');
        }
    }

    public function delete($user_id)
    {
        if(is_null($user_id))
        {
            $this->session->set_flashdata('message', 'Silahkan pilih mahasiswa yang akan dihapus');
        }
        else
        {
            $this->ion_auth->delete_user($user_id);
            $this->session->set_flashdata('message', $this->ion_auth->messages());
        }
        redirect('admin/mahasiswa', 'refresh');
    }

    public function rfid($mahasiswa_id)
    {
        $mahasiswa = $this->mahasiswa_model->with_user('fields:name')->get($mahasiswa_id);
        // check id
        if(!$mahasiswa)
        {
            $this->session->set_flashdata('message', 'Data Mahasiswa tidak ditemukan');
            redirect('admin/mahasiswa', 'refresh');
        }
        $this->data['page_title'] = "RFID {$mahasiswa->user->name}";
        $this->data['mahasiswa'] = $mahasiswa;
        $this->render('admin/mahasiswa/rfid_mahasiswa_view');
    }

    public function set_rfid($mahasiswa_id)
    {
        $mahasiswa_id = $this->input->post('id') ? $this->input->post('id') : $mahasiswa_id;
        $mahasiswa = $this->mahasiswa_model->where(['id'=>$mahasiswa_id])->with_user('fields:name')->get($mahasiswa_id);
        if(!$mahasiswa)
        {
            $this->session->set_flashdata('message', 'Data Mahasiswa tidak ditemukan');
            redirect('admin/mahasiswa', 'refresh');
        }
        $this->data['page_title'] = "Daftar RFID ({$mahasiswa->nim}) {$mahasiswa->user->name}";
        $this->data['before_body'] = "
            <script src='".site_url(JS.'_controller/admin/mahasiswa/set_rfid_mahasiswa.js')."'></script>
        ";
        $this->form_validation->set_rules($this->mahasiswa_model->rules['update_rfid']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form');
            $this->data['mahasiswa'] = $mahasiswa;
            $this->render('admin/mahasiswa/set_rfid_mahasiswa_view');
        }
        else
        {
            $kode_rfid = $this->input->post('kode_rfid');
            $update_data = [
                'kode_rfid' => $kode_rfid,
            ];
            $this->mahasiswa_model->update($update_data, $mahasiswa_id);
            $this->session->set_flashdata('message', 'Berhasil daftar RFID');
            redirect('admin/mahasiswa/rfid/'.$mahasiswa_id);
        }
    }

    public function rfid_is_used($kode_rfid)
    {
        $mahasiswa = $this->mahasiswa_model->get(['kode_rfid'=>$kode_rfid]);

        // if false/empty ready to go ...
        if($mahasiswa === FALSE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */