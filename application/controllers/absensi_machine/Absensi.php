<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends Absensi_machine_Controller {

    public $late_minute = 15; //

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session']);
    }

	public function index()
	{
        $this->data['absensi'] = $this->absensi_model
            ->fields('id, waktu_mulai, durasi, waktu_selesai')
            ->order_by('waktu_mulai', 'DESC')
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

        $absensi = $this->absensi_model
            ->with_mengajar('fields:id', [
                'with'=>[
                    ['relation'=>'dosen', 'fields'=>'nip', 'with'=>['relation'=>'user', 'fields'=>'name']],
                    ['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']
                ]
            ])
            ->with_absensi_mahasiswa('fields:id, waktu_masuk, waktu_keluar', [
                'with'=>[
                    ['relation'=>'mahasiswa', 'fields'=>'nim', 'with'=>['realation'=>'user', 'fields'=>'name'], 'order_by'=>'waktu_masuk desc, waktu_keluar desc']
                ]
            ])
            ->get($absensi_id);

        if($absensi === FALSE)
        {
            $this->session->set_flashdata('message', 'Tidak dapat menemukan data absensi');
            redirect('absensi_machine', 'refresh');
        }

        // if absensi is active
        if(absensi_status($absensi->waktu_mulai, $absensi->durasi) != 'active')
        {
            $this->session->set_flashdata('message', 'Mesin Absensi sedang tidak aktif');
            redirect('absensi_machine', 'refresh');
        }

        $this->data['page_title'] = "Detail Absensi";
        $this->data['before_body'] = "
            <script src='".site_url(JS.'noty/jquery.noty.js')."'></script>
            <script src='".site_url(JS.'noty/layouts/topRight.js')."'></script>
            <script src='".site_url(JS.'noty/themes/default.js')."'></script>
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

    public function create()
    {
        $this->data['status'] = FALSE;
        $this->data['message'] = FALSE;
        $this->data['keluar'] = FALSE;
        $this->data['type'] = 'error'; // error, success, warning
        $this->data['time'] = format_tanggal_indonesia(date('Y-m-d h:i:s'), TRUE);
        $status_absensi = NULL;

        if($this->input->post())
        {
            $kode_rfid = $this->input->post('kode_rfid');
            $absensi_id = $this->input->post('absensi_id');

            $this->load->model(['mahasiswa_model']);
            $mahasiswa = $this->mahasiswa_model->with_user('fields:name')->get(['kode_rfid'=>$kode_rfid]);
            $absensi = $this->absensi_model->get($absensi_id);

            if(!$mahasiswa)
            {
                $this->data['message'] = 'Data mahasiswa tidak ditemukan';
            }

            if(!$absensi)
            {
                $this->data['message'] = 'Data absensi tidak ditemukan';
            }

            $status_absensi = absensi_status($absensi->waktu_mulai, $absensi->durasi);

            if($status_absensi == 'active')
            {
                if($mahasiswa && $absensi)
                {
                    $absensi_mahasiswa = $this->absensi_mahasiswa_model->get(['absensi_id'=>$absensi_id, 'mahasiswa_id'=>$mahasiswa->id]);
                    // if not found then ready to go...
                    if($absensi_mahasiswa === FALSE)
                    {
                        // waktu is less than 15 minutes
                        if(strtotime(now()) < strtotime($absensi->waktu_mulai." +{$this->late_minute} minutes"))
                        {
                            $insert_data = [
                                'mahasiswa_id' => $mahasiswa->id,
                                'absensi_id' => $absensi->id,
                                'waktu_masuk' => now()
                            ];

                            $insert = $this->absensi_mahasiswa_model->insert($insert_data);
                            $this->data['status'] = TRUE;
                            $this->data['type'] = 'success';
                            $this->data['message'] = 'Berhasil absen masuk '.$mahasiswa->user->name;
                            $this->data['absensi_mahasiswa_id'] = $insert;
                        }
                        else
                        {
                            $this->data['message'] = 'Anda terlambat, tidak dapat mengikuti pelajaran';
                        }
                    }
                    // if found
                    elseif($absensi_mahasiswa)
                    {
                        $this->data['absensi_mahasiswa_id'] = $absensi_mahasiswa->id;
                        // if waktu mulai is more than 15 minutes
                        if(strtotime(now()) > strtotime($absensi->waktu_mulai." +{$this->late_minute} minutes"))
                        {
                            if(is_null($absensi_mahasiswa->waktu_keluar))
                            {
                                $update_data = [
                                    'waktu_keluar' => now()
                                ];

                                $this->absensi_mahasiswa_model->update($update_data, ['mahasiswa_id' => $mahasiswa->id, 'absensi_id' => $absensi->id]);
                                $this->data['status'] = TRUE;
                                $this->data['type'] = 'success';
                                $this->data['keluar'] = TRUE;
                                $this->data['waktu_keluar'] = format_tanggal_indonesia(now(), TRUE);
                                $this->data['message'] = 'Berhasil absen keluar '.$mahasiswa->user->name;
                            }
                            else
                            {
                                $this->data['type'] = 'warning';
                                $this->data['message'] = $mahasiswa->user->name.' sudah melakukan absen keluar';
                            }
                        }
                        elseif(strtotime(now()) < strtotime($absensi->waktu_mulai." +{$this->late_minute} minutes"))
                        {
                            $this->data['type'] = 'warning';
                            $this->data['message'] = 'Belum waktu keluar';
                        }
                        else
                        {
                            $this->data['type'] = 'warning';
                            $this->data['message'] = $mahasiswa->user->name.' sudah melakukan absen masuk';
                        }
                    }

                }
                else
                {
                    $this->data['message'] = 'Data tidak lengkap';
                }
            }
            else
            {
                $this->data['status'] = FALSE;
                $this->data['message'] = 'Status mesin absensi '.$status_absensi;
            }

            $this->data['mahasiswa'] = $mahasiswa;
            $this->data['absensi'] = $absensi;
        }

        $this->render('', 'json');
    }

    public function absensi_mahasiswa($absensi_id, $mahasiswa_id)
    {
        $absensi_mahasiswa = $this->absensi_mahasiswa_model->get(['absensi_id'=>$absensi_id, 'mahasiswa_id'=>$mahasiswa_id]);
        if($absensi_mahasiswa === FALSE)
        {
            return FALSE;
        }
        else
        {
            return $absensi_mahasiswa;
        }
    }

    public function debug()
    {
        $data = [

        ];
        $this->data['google_analytics'] = TRUE;

        $this->render('debug_view');
    }
}
