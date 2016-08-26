<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/25/16
 * Time: 10:08 PM
 */

class Rfid extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('rfid_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->data['page_title'] = "List RFID Card";
        $this->data['rfid'] = $this->rfid_model->with('mahasiswa')->get_all();
        $this->render('admin/rfid/list_rfid_view');
    }
    
    public function create()
    {
        $this->data['page_title'] = "Tambah  RFID Card";
        $this->data['before_body'] = "
            <script src='".site_url(JS.'admin/rfid/create_rfid.js')."'></script>
        ";
        $this->form_validation->set_rules($this->rfid_model->rules['insert']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form');
            $this->render('admin/rfid/create_rfid_view');
        }
        else
        {
            $insert_data = [
                'kode_rfid' => $this->input->post('kode_rfid'),
                'created_by' => $this->ion_auth->get_user_id()
            ];
            $this->rfid_model->insert($insert_data);
            $this->session->set_flashdata('message', 'Berhasil tambah RFID');
            redirect('admin/rfid', 'refresh');
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

/* End of file Rfid.php */
/* Location: ./application/controllers/Rfid.php */