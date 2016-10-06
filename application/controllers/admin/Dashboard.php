<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/10/16
 * Time: 8:20 PM
 */

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model(['absensi_model', 'mahasiswa_model']);
        $this->load->helper(['absensi']);
        $this->data['user'] = $this->ion_auth->user()->row();
        $this->data['last_absensi'] = $this->absensi_model
            ->with_mengajar('fields:id', ['with'=>['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']])
            ->with_laboratorium('fields:nama_laboratorium')
            ->get();
        $this->data['absensi'] = $this->absensi_model
            ->fields(['id', 'waktu_mulai', 'durasi'])
            ->with_mengajar('fields:id', ['with'
                =>[
                    ['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah'],
                    ['relation'=>'dosen', 'fields'=>'nip', 'with'=>['relation'=>'user', 'fields'=>'name']]
                ]
            ])
            ->with_laboratorium('fields:nama_laboratorium')
            ->with_absensi_mahasiswa('fields:*count*')
            ->order_by('waktu_mulai', 'DESC')
            ->get_all();
        $mata_kuliah = $this->mengajar_model->with_mata_kuliah('fields:nama_mata_kuliah')->get_all();
        $this->data['mata_kuliah'] = $mata_kuliah;
        // jumlah mahasiswa
        $this->data['jumlah_mahasiswa'] = $this->mahasiswa_model->count_rows();
        $this->data['jumlah_mata_kuliah'] = count($mata_kuliah);
        $this->render('admin/dashboard/dashboard_view');
    }
    
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */