<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/25/16
 * Time: 10:10 PM
 */

class Rfid_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'rfid';
        $this->primary_key = 'id';
        $this->has_many_pivot['mahasiswa'] = [
            'foreign_model'=>'mahasiswa_model',
            'pivot_table'=>'mahasiswa_rfid',
            'local_key'=>'id',
            'pivot_local_key'=>'rfid_id',
            'pivot_foreign_key'=>'mahasiswa_id',
            'foreign_key'=>'id'
        ];
        parent::__construct();
    }

    public $rules = [
            'insert' => [
                'kode_rfid' => ['field'=>'kode_rfid', 'label'=>'Kode RFID', 'rules'=>'trim|required|is_unique[rfid.kode_rfid]|exact_length[10]'],
            ]
    ];
}

/* End of file Rfid_model.php */
/* Location: ./application/model/Rfid_model.php */