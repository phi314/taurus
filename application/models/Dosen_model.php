<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/23/16
 * Time: 12:24 AM
 */

class Dosen_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'dosen';
        $this->primary_key = 'id';
        $this->has_one['user'] = ['user_model', 'id', 'id'];
        parent::__construct();
    }

    public $rules = [
        'insert' => [
            'nip' => ['field'=>'nip', 'label'=>'Nip', 'rules'=>'trim|required|numeric'],
            'name' => ['field'=>'name', 'label'=>'Nama', 'rules'=>'trim|required'],
            'gender' => ['field'=>'gender', 'label'=>'Jenis Kelamin', 'rules'=>'required']
        ],
        'update' => [
            'nip' => ['field'=>'nip', 'label'=>'Nip', 'rules'=>'trim|required|numeric'],
            'name' => ['field'=>'name', 'label'=>'Nama', 'rules'=>'trim|required'],
            'gender' => ['field'=>'gender', 'label'=>'Jenis Kelamin', 'rules'=>'required'],
            'username' => ['field'=>'username', 'label'=>'Username', 'rules'=>'trim'],
            'email' => ['field'=>'email', 'label'=>'Email', 'rules'=>'trim|valid_email'],
            'password' => ['field'=>'password', 'label'=>'Password', 'rules'=>'min_length[8]'],
            'password_confirm' => ['field'=>'password_confirm', 'label'=>'Password Confirmation', 'rules'=>'matches[password]'],
            'id' => ['field'=>'id', 'label'=>'ID Mahasiswa', 'rules'=>'trim|integer|required']
        ]
    ];

}

/* End of file Dosen_model.php */
/* Location: ./application/model/Dosen_model.php */