<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/23/16
 * Time: 12:43 AM
 */

class Mata_kuliah extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('mata_kuliah_model');
    }

    public function index()
    {
        $this->data['page_title'] = 'List mata kuliah';
        $this->data['mata_kuliah'] = $this->mata_kuliah_model->get_all();
        $this->render('admin/mata_kuliah/list_mata_kuliah_view');
    }

    public function create()
    {
        $this->data['page_title'] = 'Tambah Mata Kuliah';
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->mata_kuliah_model->rules['insert']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form_helper');
            $this->render('admin/mata_kuliah/create_mata_kuliah_view');
        }
        else
        {
            $nama_mata_kuliah = $this->input->post('nama_mata_kuliah');
            $insert_data = [
                'nama_mata_kuliah' => $nama_mata_kuliah
            ];
            $this->mata_kuliah_model->insert($insert_data);
            $this->session->set_flashdata('message', 'Berhasil tambah mata kuliah');
            redirect('admin/mata_kuliah', 'refresh');
        }
    }

    public function edit($id = NULL)
    {
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        $this->data['page_title'] = 'Edit mata kuliah';
        $mata_kuliah = $this->mata_kuliah_model->get($id);
        if(!$mata_kuliah)
        {
            $this->session->set_flashdata('message', 'Mata Kuliah tidak ditemukan');
            redirect('admin/mata_kuliah', 'refresh');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->mata_kuliah_model->rules['update']);
        if($this->form_validation->run() === FALSE)
        {
            $this->data['mata_kuliah'] = $mata_kuliah;
            $this->load->helper('form_helper');
            $this->render('admin/mata_kuliah/edit_mata_kuliah_view');
        }
        else
        {
            $update_data = [
                'nama_mata_kuliah' => $this->input->post('nama_mata_kuliah')
            ];
            $this->mata_kuliah_model->update($update_data, $id);
            $this->session->set_flashdata('message', 'Berhasil edit Mata Kuliah');
            redirect('admin/mata_kuliah', 'refresh');
        }

    }

    public function delete()
    {

    }
    
}

/* End of file Laboratorium.php */
/* Location: ./application/controllers/Mata_kuliah.php */