<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/23/16
 * Time: 7:33 PM
 */

class Laboratorium_model extends US_Model {

    public function __construct()
    {
        $this->table = 'laboratorium';
        $this->primary_key = 'id';
        parent::__construct();
    }

    public $rules = [
        'insert' => [
            'nama_laboratorium' => ['field'=>'nama_laboratorium', 'label'=>'Nama Laboratorium', 'rules'=>'trim|required|is_unique[laboratorium.nama_laboratorium]'],
            'ip_address' => ['field'=>'ip_address', 'label'=>'IP Address', 'rules'=>'trim|required|is_unique[laboratorium.ip_address]|valid_ip']
        ],
        'update' => [
            'nama_laboratorium' => ['field'=>'nama_laboratorium', 'label'=>'Nama Laboratorium', 'rules'=>'trim|required|is_unique[laboratorium.nama_laboratorium]'],
            'ip_address' => ['field'=>'ip_address', 'label'=>'IP Address', 'rules'=>'trim|required|is_unique[laboratorium.ip_address]|valid_ip']
        ]
    ];
}

/* End of file Laboratorium_model.php */
/* Location: ./application/model/Laboratorium_model.php */