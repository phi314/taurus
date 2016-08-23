<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/23/16
 * Time: 12:46 AM
 */

class Mata_kuliah_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'mata_kuliah';
        $this->primary_key = 'id';
        parent::__construct();
    }

    public $rules = [
            'insert' => [
                'nama_mata_kuliah' => ['field'=>'nama_mata_kuliah', 'label'=>'Nama Mata Kuliah', 'rules'=>'trim|required|is_unique[mata_kuliah.nama_mata_kuliah]']
            ],
            'update' => [
                'nama_mata_kuliah' => ['field'=>'nama_mata_kuliah', 'label'=>'Nama Mata Kuliah', 'rules'=>'trim|required|is_unique[mata_kuliah.nama_mata_kuliah]']
            ]
    ];
}

/* End of file Mata_kuliah_model.php */
/* Location: ./application/model/Mata_kuliah_model.php */