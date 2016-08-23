<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/23/16
 * Time: 8:01 PM
 */

class Mengajar extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model(['dosen_model', 'mata_kuliah_model', 'mengajar_model']);
    }
    
    public function index()
    {
        $this->data['page_title'] = 'List Mengajar';
        $this->data['mengajar'] = $this->mengajar_model->with_user_dosen('fields:name')->with_dosen('fields:nip')->with_mata_kuliah('fields:nama_mata_kuliah')->get_all();
        $this->render('admin/mengajar/list_mengajar_view');
    }
    
    public function create()
    {
        $this->data['page_title'] = 'Tambah Jadwal Mengajar';
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->mengajar_model->rules['insert']);
        if($this->form_validation->run() ===  FALSE)
        {
            $this->load->helper('form_helper');
            $this->data['dosen'] = $this->dosen_model->with_user('fields:name')->get_all();
            $this->data['mata_kuliah'] = $this->mata_kuliah_model->as_dropdown('nama_mata_kuliah')->get_all();
            $this->render('admin/mengajar/create_mengajar_view');
        }
        else
        {
            $id_dosen = $this->input->post('dosen');
            $id_mata_kuliah = $this->input->post('mata_kuliah');
            $check_duplication = $this->mengajar_model->where(['id_dosen'=>$id_dosen,'id_mata_kuliah'=>$id_mata_kuliah])->get();

            if($check_duplication === FALSE)
            {
                $insert_data = [
                    'id_dosen' => $id_dosen,
                    'id_mata_kuliah' => $id_mata_kuliah,
                    'created_by' => $this->ion_auth->get_user_id()
                ];

                $this->mengajar_model->insert($insert_data);
                $this->session->set_flashdata('message', 'Berhasil tambah data mengajar');
                redirect('admin/mengajar', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('message', 'Data mengajar sudah ada');
                redirect('admin/mengajar/create', 'refresh');
            }
        }
    }
    
    public function edit($id = NULL)
    {
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
    }
    
    public function delete()
    {
    
    }
    
}

/* End of file Mengajar.php */
/* Location: ./application/controllers/Mengajar.php */