<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/29/16
 * Time: 6:28 PM
 */

class Absensi_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'absensi';
        $this->primary_key = 'id';
        $this->has_one['laboratorium'] = ['laboratorium_model', 'id', 'laboratorium_id'];
        $this->has_one['mengajar'] = ['mengajar_model', 'id', 'dosen_mata_kuliah_id'];
        $this->has_many['absensi_mahasiswa'] = ['absensi_mahasiswa_model', 'absensi_id', 'id'];
        parent::__construct();
    }

    public $rules = [
        'insert' => [
            'tanggal' => ['field'=>'tanggal', 'label'=>'Tanggal', 'rules'=>'trim|required|callback_is_future'],
            'waktu' => ['field'=>'waktu', 'label'=>'Waktu', 'rules'=>'trim|required|callback_is_future'],
            'durasi' => ['field'=>'durasi', 'label'=>'Durasi', 'rules'=>'trim|required|numeric|greater_than[15]'],
            'laboratorium' => ['field'=>'laboratorium', 'label'=>'Laboratorium', 'rules'=>'trim|required|integer|callback_check_available_laboratorium'],
            'mata_kuliah' => ['field'=>'mata_kuliah', 'label'=>'Mata Kuliah', 'rules'=>'trim|required|integer']
        ],
        'update' => [
            'durasi' => ['field'=>'durasi', 'label'=>'Durasi', 'rules'=>'trim|required|numeric|greater_than[15]'],
            'laboratorium' => ['field'=>'laboratorium', 'label'=>'Laboratorium', 'rules'=>'trim|required|integer'],
            'mata_kuliah' => ['field'=>'mata_kuliah', 'label'=>'Mata Kuliah', 'rules'=>'trim|required|integer'],
            'absensi_id' => ['field'=>'absensi_id', 'label'=>'ID Absensi', 'rules'=>'trim|required|integer'],
        ],
        'report-tanggal' => [
            'mengajar' => ['field'=>'mengajar', 'label'=>'Mata Kuliah', 'rules'=>'trim|required|integer'],
            'dari' => ['field'=>'dari', 'label'=>'Tanggal dari', 'rules'=>'trim|required'],
            'sampai' => ['field'=>'sampai', 'label'=>'Tanggal sampai', 'rules'=>'trim|required'],
        ]
    ];

    public function last_absensi_by_dosen($dosen_id)
    {
        $q = $this->db->select('absensi.id as absensi_id, nama_laboratorium, nama_mata_kuliah, waktu_mulai')
            ->join('dosen_mata_kuliah', "dosen_id={$dosen_id}")
            ->join('laboratorium', "laboratorium.id=absensi.laboratorium_id")
            ->join('mata_kuliah', "mata_kuliah.id=dosen_mata_kuliah.mata_kuliah_id")
            ->order_by('waktu_mulai', 'DESC')
            ->limit(1)
            ->get('absensi');

        return $q->row();
    }

    public function mahasiswa_by_absensi_mengajar($dosen_mata_kuliah_id)
    {
        $q = $this->db->distinct()->select("absensi_mahasiswa.mahasiswa_id, mahasiswa.nim, users.name")
            ->join("absensi", "dosen_mata_kuliah_id=$dosen_mata_kuliah_id")
            ->join("mahasiswa", "mahasiswa.id=absensi_mahasiswa.mahasiswa_id")
            ->join("users", "users.id=absensi_mahasiswa.mahasiswa_id")
            ->get("absensi_mahasiswa");

        $array_mahasiswa = [];

        if($q->num_rows() > 0)
        {

            foreach($q->result() as $mahasiswa)
            {
                $array_mahasiswa[] = [
                    'id'=>$mahasiswa->mahasiswa_id,
                    'nim'=>$mahasiswa->nim,
                    'name'=>$mahasiswa->name
                ];
            }
        }

        return $array_mahasiswa;
    }
}

/* End of file Absensi_model.php */
/* Location: ./application/model/Absensi_model.php */