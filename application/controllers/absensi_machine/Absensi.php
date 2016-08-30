<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends Absensi_machine_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('laboratorium_model');
    }

	public function index()
	{
        $this->data['absensi'] = $this->absensi_model
            ->fields('id, tanggal, waktu, durasi, waktu_selesai')
            ->order_by('tanggal', 'DESC')
            ->order_by('waktu', 'DESC')
            ->with_mengajar('fields:id', [
                'with'=>[
                    ['relation'=>'dosen', 'fields'=>'nip', 'with'=>['relation'=>'user', 'fields'=>'name']],
                    ['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']
                ]
            ])
            ->get_all(['laboratorium_id'=>$this->data['laboratorium']->id]);
        $this->render('absensi_machine/list_absensi_view');
	}

    public function detail($absensi_id = NULL)
    {
        if(is_null($absensi_id))
        {
            $this->session->set_flashdata('message', 'Tidak ada mata kuliah yang aktif');
            redirect('absensi_machine', 'refresh');
        }

        $absensi = $this->absensi_model->with_mengajar('fields:id', [
            'with'=>[
                ['relation'=>'dosen', 'fields'=>'nip', 'with'=>['relation'=>'user', 'fields'=>'name']],
                ['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']
            ]
        ])->get($absensi_id);
        if(absensi_status($absensi->tanggal, $absensi->waktu, $absensi->durasi) != 'active')
        {
            $this->session->set_flashdata('message', 'Mesin Absensi sedang tidak aktif');
            redirect('absensi_machine', 'refresh');
        }

        $this->data['page_title'] = "Detail Absensi";
        $this->data['before_body'] = "
            <script src='".site_url(JS.'_controller/absensi_machine/absensi/detail_absensi.js')."'></script>
        ";
        $this->data['absensi'] = $absensi;
        $this->render('absensi_machine/list_detail_absensi_view');
    }

    public function error_no_registered_ip()
    {
        $this->data['ip_address'] = $this->session->userdata('ip_address');
        $this->render('errors/html/error_no_registered_ip', 'page_master');
    }

    public function debug()
    {
        $data = [

        ];
        $this->data['google_analytics'] = TRUE;

        $this->render('debug_view');
    }
}
