<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/23/16
 * Time: 12:43 AM
 */

class Laboratorium extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('laboratorium_model');
    }

    public function index()
    {
        $this->data['page_title'] = 'List Laboratorium';
        $this->data['laboratorium'] = $this->laboratorium_model->get_all();
        $this->render('admin/laboratorium/list_laboratorium_view');
    }

    public function create()
    {
        $this->data['page_title'] = 'Tambah Laboratorium';
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->laboratorium_model->rules['insert']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form_helper');
            $this->render('admin/laboratorium/create_laboratorium_view');
        }
        else
        {
            $nama_laboratorium = $this->input->post('nama_laboratorium');
            $insert_data = [
                'nama_laboratorium' => $nama_laboratorium
            ];
            $this->laboratorium_model->insert($insert_data);
            $this->session->set_flashdata('message', 'Berhasil tambah laboratorium');
            redirect('admin/laboratorium', 'refresh');
        }
    }

    public function edit($id = NULL)
    {
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        $this->data['page_title'] = 'Edit laboratorium';
        $laboratorium = $this->laboratorium_model->get($id);
        if(!$laboratorium)
        {
            $this->session->set_flashdata('message', 'laboratorium tidak ditemukan');
            redirect('admin/laboratorium', 'refresh');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->laboratorium_model->rules['update']);
        if($this->form_validation->run() === FALSE)
        {
            $this->data['laboratorium'] = $laboratorium;
            $this->load->helper('form_helper');
            $this->render('admin/laboratorium/edit_laboratorium_view');
        }
        else
        {
            $update_data = [
                'nama_laboratorium' => $this->input->post('nama_laboratorium')
            ];
            $this->laboratorium_model->update($update_data, $id);
            $this->session->set_flashdata('message', 'Berhasil edit laboratorium_model');
            redirect('admin/laboratorium', 'refresh');
        }

    }

    public function delete($id = NULL)
    {
        if(is_null($id))
        {
            $this->session->set_flashdata('message', 'Tidak ada laboratorium untuk di hapus');
        }
        else
        {
            $this->laboratorium_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil hapus laboratorium');
        }
        redirect('admin/laboratorium', 'refresh');
    }
    
}

/* End of file Mata_kuliah.php */
/* Location: ./application/controllers/Mata_kuliah.php */