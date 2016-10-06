<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/29/16
 * Time: 6:10 PM
 */

class Dashboard extends Dosen_Controller {

    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->model(['mengajar_model', 'absensi_model', 'mahasiswa_model']);
        $this->load->helper(['absensi']);
        $this->data['page_title'] = 'Dashboard Dosen';
        $this->data['user'] = $this->ion_auth->user()->row();
        $mengajar = $this->mengajar_model->with_mata_kuliah('fields:nama_mata_kuliah')->get_all(['dosen_id'=>$this->ion_auth->get_user_id()]);
        $this->data['mengajar'] = $mengajar;
        $this->data['last_absensi'] = $this->absensi_model
            ->with_mengajar('fields:id', ['with'=>['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']])
            ->with_laboratorium('fields:nama_laboratorium')
            ->get(['created_by'=>$this->ion_auth->get_user_id()]);
        $this->data['absensi'] = $this->absensi_model
            ->fields(['id', 'waktu_mulai', 'durasi'])
            ->with_mengajar('fields:id', ['with'=>['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']])
            ->with_laboratorium('fields:nama_laboratorium')
            ->with_absensi_mahasiswa('fields:*count*')
            ->order_by('waktu_mulai', 'DESC')
            ->get_all(['created_by'=>$this->ion_auth->get_user_id()]);
        // jumlah mahasiswa
        $this->data['jumlah_mahasiswa'] = $this->mahasiswa_model->count_rows();
        // jumlah mengajar
        $this->data['jumlah_mengajar'] = count($mengajar);
        $this->render('dosen/dashboard/dashboard_view');
    }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */