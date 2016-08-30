<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/29/16
 * Time: 6:26 PM
 */

class Absensi extends Dosen_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('absensi_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->load->helper('absensi_helper');
        $this->data['page_title'] = 'List Absensi';
        $this->data['absensi'] = $this->absensi_model->order_by('tanggal, waktu', 'DESC')->with_laboratorium('fields:nama_laboratorium')->with_mengajar('fields:id', ['with'=>['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']])->get_all(['created_by'=>$this->ion_auth->get_user_id()]);
        $this->render('dosen/absensi/list_absensi_view');
    
    }
    
    public function create()
    {
        $this->data['page_title'] = 'Tambah Absensi';
        $this->data['before_body'] = "
            <script src='".site_url(JS.'bootstrap/bootstrap-datepicker.js')."'></script>
            <script src='".site_url(JS.'bootstrap/bootstrap-timepicker.min.js')."'></script>
        ";
        $this->form_validation->set_rules($this->absensi_model->rules['insert']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form');
            $this->load->model(['laboratorium_model', 'mengajar_model']);
            $this->data['laboratorium_dropdown'] = $this->laboratorium_model->as_dropdown('nama_laboratorium')->get_all();
            $this->data['mata_kuliah'] = $this->mengajar_model->with_mata_kuliah('fields:nama_mata_kuliah')->get_all(['dosen_id'=>$this->ion_auth->get_user_id()]);
            $this->render('dosen/absensi/create_absensi_view');
        }
        else
        {
            $insert_data = [
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'durasi' => $this->input->post('durasi'),
                'waktu_selesai' => $this->input->post('tanggal').' '.$this->input->post('waktu').' + INTERVAL '.$this->input->post('durasi').' MINUTES',
                'laboratorium_id' => $this->input->post('laboratorium'),
                'dosen_mata_kuliah_id' => $this->input->post('mata_kuliah'),
                'created_by' => $this->ion_auth->get_user_id()
            ];

            $this->absensi_model->insert($insert_data);
            $this->session->set_flashdata('message', 'Berhasil tambah absensi');
            redirect('dosen/absensi', 'refresh');
        }
    }
    
    public function edit($absensi_id = NULL)
    {
        $absensi_id = $this->input->post('absensi_id') ? $this->input->post('absensi_id') : $absensi_id;
        $absensi = $this->absensi_model->get($absensi_id);
        if(!$absensi)
        {
            $this->session->set_flashdata('message', 'Absensi tidak ditemukan');
            redirect('admin/absensi', 'refresh');
        }

        $this->data['page_title'] = 'Edit Absensi';
        $this->data['before_body'] = "
            <script src='".site_url(JS.'bootstrap/bootstrap-datepicker.js')."'></script>
            <script src='".site_url(JS.'bootstrap/bootstrap-timepicker.min.js')."'></script>
        ";
        $this->form_validation->set_rules($this->absensi_model->rules['update']);
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form');
            $this->load->model(['laboratorium_model', 'mengajar_model']);
            $this->data['laboratorium_dropdown'] = $this->laboratorium_model->as_dropdown('nama_laboratorium')->get_all();
            $this->data['mata_kuliah'] = $this->mengajar_model->with_mata_kuliah('fields:nama_mata_kuliah')->get_all(['dosen_id'=>$this->ion_auth->get_user_id()]);
            $this->data['absensi'] = $absensi;
            $this->render('dosen/absensi/edit_absensi_view');
        }
        else
        {
            $update_data = [
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'durasi' => $this->input->post('durasi'),
                'waktu_selesai' => $this->input->post('tanggal').' '.$this->input->post('waktu').' + INTERVAL '.$this->input->post('durasi').' MINUTES',
                'laboratorium_id' => $this->input->post('laboratorium'),
                'dosen_mata_kuliah_id' => $this->input->post('mata_kuliah'),
                'updated_by' => $this->ion_auth->get_user_id()
            ];

            $this->absensi_model->update($update_data, $absensi_id);
            $this->session->set_flashdata('message', 'Berhasil edit Absensi');
            redirect('dosen/absensi');
        }
    }
    
    public function delete()
    {
    
    }

    public function is_future()
    {
        $tanggal = $this->input->post('tanggal');
        $waktu = $this->input->post('waktu');

        if(strtotime($tanggal.' '.$waktu) > strtotime(date('Y-m-d H:i')))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function check_available_laboratorium()
    {
        $tanggal = $this->input->post('tanggal');
        $waktu = $this->input->post('waktu');
        $durasi = $this->input->post('durasi');
        // check absensi by tanggal
        $absensi = $this->absensi_model->where(['tanggal' => $tanggal, 'HOUR(waktu)'=>substr($waktu, 0, 2)])->get();

        if($absensi === FALSE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }
    
}

/* End of file Absensi.php */
/* Location: ./application/controllers/Absensi.php */