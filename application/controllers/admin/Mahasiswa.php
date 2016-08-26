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
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->data['page_title'] = 'Mahasiswa';
        $this->data['mahasiswa'] = $this->mahasiswa_model->with_user('fields:name, gender')->set_cache('mahasiswa')->get_all();
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

    public function rfid($mahasiswa_id = NULL)
    {
        $mahasiswa_id = $this->input->post('id') ? $this->input->post('id') : $mahasiswa_id;
        $mahasiswa = $this->mahasiswa_model->with_user('fields:name')->with_mahasiswa_rfid([
                                                                            'with'=> [
                                                                                ['relation' => 'mata_kuliah', 'fields' => 'nama_mata_kuliah'],
                                                                                ['relation' => 'rfid', 'fields' => 'kode_rfid'],
                                                                            ]
                                                                        ])->get($mahasiswa_id);

        // check id
        if(!$mahasiswa)
        {
            $this->session->set_flashdata('message', 'Data Mahasiswa tidak ditemukan');
            redirect('admin/mahasiswa', 'refresh');
        }

        $this->load->model('mata_kuliah_model');
        $this->data['page_title'] = "List RFID {$mahasiswa->user->name}";
        $this->data['mahasiswa'] = $mahasiswa;

        $this->render('admin/mahasiswa/rfid/list_mahasiswa_rfid_view');
    }

    public function add_rfid($mahasiswa_id = NULL)
    {
        $mahasiswa_id = $this->input->post('id') ? $this->input->post('id') : $mahasiswa_id;
        $mahasiswa = $this->mahasiswa_model->with_user('fields:name')->with_rfid('fields:kode_rfid')->get($mahasiswa_id);
        if(!$mahasiswa)
        {
            $this->session->set_flashdata('message', 'Data Mahasiswa tidak ditemukan');
            redirect('admin/mahasiswa', 'refresh');
        }
        $this->data['page_title'] = "Daftar RFID ({$mahasiswa->nim}) {$mahasiswa->user->name}";
        $this->data['before_body'] = "
            <script src='".site_url(JS.'admin/mahasiswa/add_rfid.js')."'></script>
        ";

        $this->form_validation->set_rules($this->mahasiswa_model->rules['add_rfid']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form');
            $this->data['mahasiswa'] = $mahasiswa;
            $this->load->model('mata_kuliah_model');
            $this->data['mata_kuliah_dropdown'] = $this->mata_kuliah_model->as_dropdown('nama_mata_kuliah')->get_all();;
            $this->render('admin/mahasiswa/rfid/add_mahasiswa_rfid_view');
        }
        else
        {
            $this->load->model('rfid_model');
            $kode_rfid = $this->input->post('kode_rfid');
            $rfid = $this->rfid_model->get(['kode_rfid'=>$kode_rfid]);
            $insert_data = [
                'mahasiswa_id' => $mahasiswa_id,
                'rfid_id' => $rfid->id,
                'mata_kuliah_id' => $this->input->post('mata_kuliah_id'),
                'created_by' => $this->ion_auth->get_user_id()
            ];
            $this->load->model('mahasiswa_rfid_model');
            $this->mahasiswa_rfid_model->insert($insert_data);
            $this->session->set_flashdata('message', 'Berhasil daftar RFID');
            redirect('admin/mahasiswa/rfid/'.$mahasiswa_id);

        }
    }

    public function rfid_check($kode_rfid)
    {
        $rfid = $this->rfid_model->get(['kode_rfid'=>$kode_rfid]);
        if($rfid === FALSE)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function rfid_duplicate($kode_rfid)
    {
        $rfid = $this->rfid_model->get(['kode_rfid'=>$kode_rfid]);

        $mahasiswa_id = $this->input->post('mahasiswa_id');
        $mata_kuliah_id = $this->input->post('mata_kuliah');
        $this->load->model('mahasiswa_rfid_model');
        $id = $this->mahasiswa_rfid_model->where([
                                        'mahasiswa_id'=>$mahasiswa_id,
                                        'rfid_id'=>$rfid->id,
                                        'mata_kuliah_id'=>$mata_kuliah_id
                                        ])->get();

        // False if for empty and ready to go...
        if($id === FALSE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function rfid_only_one_mata_kuliah($mata_kuliah_id)
    {
        $mahasiswa_id = $this->input->post('mahasiswa_id');
        $this->load->model('mahasiswa_rfid_model');
        $id = $this->mahasiswa_rfid_model->where([
            'mahasiswa_id' => $mahasiswa_id,
            'mata_kuliah_id' => $mata_kuliah_id
        ])->get();

        // False if for empty and ready to go...
        if($id === FALSE)
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