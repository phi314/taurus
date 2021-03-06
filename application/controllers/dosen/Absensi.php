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
        $this->data['before_body'] = "
            <script src='".site_url(JS.'_controller/dosen/absensi/list_absensi.js')."'></script>
        ";
        $this->data['absensi'] = $this->absensi_model->order_by('waktu_mulai', 'DESC')->with_laboratorium('fields:nama_laboratorium')->with_mengajar('fields:id', ['with'=>['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']])->get_all(['created_by'=>$this->ion_auth->get_user_id()]);
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
            $this->load->model(['laboratorium_model', 'mengajar_model']);
            $this->data['laboratorium_dropdown'] = $this->laboratorium_model->as_dropdown('nama_laboratorium')->get_all();
            $this->data['mata_kuliah'] = $this->mengajar_model->with_mata_kuliah('fields:nama_mata_kuliah')->get_all(['dosen_id'=>$this->ion_auth->get_user_id()]);
            $this->render('dosen/absensi/create_absensi_view');
        }
        else
        {
            $waktu_selesai = strtotime($this->input->post('waktu_mulai').' +'.$this->input->post('durasi').' minutes');
            $insert_data = [
                'waktu_mulai' => $this->input->post('tanggal').' '.$this->input->post('waktu'),
                'durasi' => $this->input->post('durasi'),
                'waktu_selesai' => date('Y-m-d H:i', $waktu_selesai),
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
            $waktu_selesai = strtotime($this->input->post('waktu_mulai').' +'.$this->input->post('durasi').' minutes');
            $update_data = [
                'durasi' => $this->input->post('durasi'),
                'waktu_selesai' => date('Y-m-d H:i', $waktu_selesai),
                'laboratorium_id' => $this->input->post('laboratorium'),
                'dosen_mata_kuliah_id' => $this->input->post('mata_kuliah'),
                'updated_by' => $this->ion_auth->get_user_id()
            ];

            $this->absensi_model->update($update_data, $absensi_id);
            $this->session->set_flashdata('message', 'Berhasil edit Absensi');
            redirect('dosen/absensi');
        }
    }
    
    public function delete($absensi_id = NULL)
    {
        if(is_null($absensi_id))
        {
            $this->session->set_flashdata('message', 'Tidak ada data absensi yang akan dihapus');
        }
        else
        {
            $message = "Berhasil hapus data absensi";
            $delete = $this->absensi_model->delete($absensi_id);
            if($delete === FALSE)
            {
                $message = "Gagal hapus data absensi";
            }
        }
        $this->session->set_flashdata('message', $message);
        redirect('dosen/absensi', 'refresh');
    }

    public function detail($absensi_id = NULL, $render_format = FALSE)
    {
        if(is_null($absensi_id))
        {
            redirect('dosen/absensi');
        }

        $absensi = $this->absensi_model
            ->with_mengajar('fields:id', ['with'=>
                [
                    ['relation'=>'dosen', 'fields'=>'nip', 'with'=>['relation'=>'user', 'fields'=>'name']],
                    ['relation'=>'mata_kuliah', 'fields'=>'nama_mata_kuliah']
                ]
            ])
            ->with_laboratorium('fields:nama_laboratorium')
            ->with_absensi_mahasiswa('fields:id, waktu_masuk, waktu_keluar',
                ['with'=>
                    ['relation'=>'mahasiswa', 'fields'=>'nim', 'with'=>['relation'=>'user', 'fields'=>'name'], 'order_by'=>'nim, asc']
            ])
            ->get($absensi_id);
        $this->data['absensi'] = $absensi;
        $this->data['page_title'] = $absensi->mengajar->mata_kuliah->nama_mata_kuliah.' - '.$absensi->mengajar->dosen->user->name;

        if($render_format === FALSE)
            $this->render('dosen/absensi/detail_absensi_view');
        else
        {
            $html_view = $this->load->view('dosen/absensi/pdf_detail_absensi_view', $this->data, TRUE);
            $this->load->library(['mypdf']);
            $this->dompdf->load_html($html_view);
            $this->dompdf->set_paper('A4', 'portait');
            $this->dompdf->render();
            $this->dompdf->stream(strtotime(now())."_".format_date($absensi->waktu_mulai, 'no-time')."_{$absensi->mengajar->mata_kuliah->nama_mata_kuliah}", array('Attachment'=>0));
        }
    }

    public function report()
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
        $absensi = $this->absensi_model->where(['DATE(waktu_mulai)' => $tanggal, 'HOUR(waktu_mulai)'=>substr($waktu, 0, 2)])->get();

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