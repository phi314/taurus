<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/25/16
 * Time: 10:10 PM
 */

class Mahasiswa_rfid_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'mahasiswa_rfid';
        $this->primary_key = 'id';
        $this->has_one['mahasiswa'] = ['mahasiswa_model', 'id', 'mahasiswa_id'];
        $this->has_one['rfid'] = ['rfid_model', 'id', 'rfid_id'];
        $this->has_one['mata_kuliah'] = ['mata_kuliah_model', 'id', 'mata_kuliah_id'];
        parent::__construct();
    }

    public $rules = [
            'insert' => [
                'id_mahasiswa' => ['field'=>'id', 'label'=>'ID mahasiswa', 'rules'=>'trim|required|integer'],
                'kode_rfid' => ['field'=>'kode_rfid', 'label'=>'Kode RFID', 'rules'=>'trim|required|exact_length[10]'],
                'mata_kuliah' => ['field'=>'mata_kuliah', 'label'=>'Mata Kuliah', 'rules'=>'trim|required|integer']
            ]
    ];

}

/* End of file Rfid_model.php */
/* Location: ./application/model/Rfid_model.php */