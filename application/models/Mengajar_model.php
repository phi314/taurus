<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/23/16
 * Time: 8:03 PM
 */

class Mengajar_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'dosen_mata_kuliah';
        $this->primary_key = 'id';
        $this->has_one['user_dosen'] = ['user_model', 'id', 'id_dosen'];
        $this->has_one['dosen'] = ['dosen_model', 'id', 'id_dosen'];
        $this->has_one['mata_kuliah'] = ['mata_kuliah_model', 'id', 'id_mata_kuliah'];
        parent::__construct();
    }

    public $rules = [
            'insert' => [
                'dosen' => ['field'=>'dosen', 'label'=>'Dosen', 'rules'=>'trim|required'],
                'mata_kuliah' => ['field'=>'dosen', 'label'=>'Mata Kuliah', 'rules'=>'trim|required']
            ],
            'update' => [
                'dosen' => ['field'=>'dosen', 'label'=>'Dosen', 'rules'=>'trim|required'],
                'mata_kuliah' => ['field'=>'dosen', 'label'=>'Mata Kuliah', 'rules'=>'trim|required']
            ]
    ];
}

/* End of file Mengajar.php */
/* Location: ./application/model/Mengajar.php */