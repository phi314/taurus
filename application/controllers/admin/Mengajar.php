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
        $this->data['mengajar'] = $this->mengajar_model->with_dosen(['fields:nip'],['with'=>['relation'=>'user', 'fields'=>'name']])->with_mata_kuliah('fields:nama_mata_kuliah')->get_all();
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
            $dosen_id = $this->input->post('dosen');
            $mata_kuliah_id = $this->input->post('mata_kuliah');

            $insert_data = [
                'dosen_id' => $dosen_id,
                'mata_kuliah_id' => $mata_kuliah_id,
                'created_by' => $this->ion_auth->get_user_id()
            ];

            $this->mengajar_model->insert($insert_data);
            $this->session->set_flashdata('message', 'Berhasil tambah data mengajar');
            redirect('admin/mengajar', 'refresh');
        }
    }
    
    public function edit($id = NULL)
    {
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
    }

    public function delete($mengajar_id = NULL)
    {
        if(is_null($mengajar_id))
        {
            $this->session->set_flashdata('message', 'Silahkan pilih Data mengajar yang akan dihapus');
        }
        else
        {
            $this->mengajar_model->delete($mengajar_id);
            $this->session->set_flashdata('message', 'Berhasil hapus Data mengajar');
        }
        redirect('admin/mengajar', 'refresh');
    }

    public function mengajar_duplicate($mata_kuliah)
    {
        $dosen_id = $this->input->post('dosen');
        $id = $this->mengajar_model->get([
                                        'dosen_id' => $dosen_id,
                                        'mata_kuliah_id' => $mata_kuliah
                                    ]);

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

/* End of file Mengajar.php */
/* Location: ./application/controllers/Mengajar.php */