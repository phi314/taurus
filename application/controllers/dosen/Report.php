<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 9/7/16
 * Time: 2:02 PM
 */

class Report extends Dosen_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model(['absensi_model']);
    }
    
    public function index()
    {
        $this->load->library(['form_validation']);
        $this->data['page_title'] = 'Laporan';
        $this->data['before_body'] = "
            <script src='".site_url(JS.'bootstrap/bootstrap-datepicker.js')."'></script>
        ";
        $this->load->model(['mengajar_model']);
        $this->data['mengajar'] = $this->mengajar_model
            ->with_mata_kuliah('fields:nama_mata_kuliah')
            ->with_dosen('fields:nip', ['with'=>['relation'=>'user', 'fields'=>'name']])
            ->get_all(['dosen_id'=>$this->ion_auth->get_user_id()]);
        $this->form_validation->set_rules($this->absensi_model->rules['report-tanggal']);
        if($this->form_validation->run() === FALSE)
        {
            $this->render('dosen/report/find_report_view');
        }
        else
        {
            $mengajar_id = $this->input->post('mengajar');
            $from = $this->input->post('dari');
            $to = $this->input->post('sampai');
            $to_pdf = $this->input->post('to_pdf') ? TRUE : FALSE;
            $this->data['date_from'] = $from;
            $this->data['date_to'] = $to;
            $absensi = $this->absensi_model
                ->with_absensi_mahasiswa('fields:id, waktu_masuk, waktu_keluar')
                ->where(['DATE(waktu_mulai) >='=> $from, 'DATE(waktu_mulai) <='=>$to])
                ->get_all(['dosen_mata_kuliah_id'=>$mengajar_id]);

            $array_tanggal = [];
            $array_mahasiswa = $this->absensi_model->mahasiswa_by_absensi_mengajar($mengajar_id);

            if(!empty($absensi))
            {
                foreach($absensi as $data_absensi)
                {
                    $array_tanggal[] = [
                        'id' => $data_absensi->id,
                        'waktu_mulai' => $data_absensi->waktu_mulai
                  ];
                }
            }

            $this->data['mengajar'] = $this->mengajar_model
                ->with_mata_kuliah('fields:nama_mata_kuliah')
                ->with_dosen('fields:nip', ['with'=>['relation'=>'user', 'fields'=>'name']])
                ->get(['id'=>$mengajar_id]);
            $this->data['absensi'] = $absensi;
            $this->data['array_mahasiswa'] = $array_mahasiswa;
            $this->data['array_tanggal'] = $array_tanggal;
            if($to_pdf === FALSE)
                $this->render('dosen/report/find_report_view');
            else
            {
                $html_view = $this->load->view('dosen/report/pdf_find_report_view', $this->data, TRUE);
                $this->load->library(['mypdf']);
                $this->dompdf->load_html($html_view);
                $this->dompdf->set_paper('A4', 'portait');
                $this->dompdf->render();
                $this->dompdf->stream(strtotime(now())."_".format_date($absensi->waktu_mulai, 'no-time').'_'.$mengajar_id, array('Attachment'=>0));
            }
        }


    }
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */