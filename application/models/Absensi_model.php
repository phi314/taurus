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
        ]
    ];
}

/* End of file Absensi_model.php */
/* Location: ./application/model/Absensi_model.php */