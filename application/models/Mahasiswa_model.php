<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/22/16
 * Time: 9:18 PM
 */

class Mahasiswa_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'mahasiswa';
        $this->primary_key = 'id';
        $this->has_one['user'] = ['user_model', 'id', 'id'];
        parent::__construct();
    }

    public $rules = [
            'insert' => [
                'nim' => ['field'=>'nim', 'label'=>'Nim', 'rules'=>'trim|required|numeric'],
                'name' => ['field'=>'name', 'label'=>'Nama', 'rules'=>'trim|required'],
                'gender' => ['field'=>'gender', 'label'=>'Jenis Kelamin', 'rules'=>'required']
            ],
            'update' => [
                'nim' => ['field'=>'nim', 'label'=>'Nim', 'rules'=>'trim|required|numeric'],
                'name' => ['field'=>'name', 'label'=>'Nama', 'rules'=>'trim|required'],
                'gender' => ['field'=>'gender', 'label'=>'Jenis Kelamin', 'rules'=>'required'],
                'username' => ['field'=>'username', 'label'=>'Username', 'rules'=>'trim'],
                'email' => ['field'=>'email', 'label'=>'Email', 'rules'=>'trim|valid_email'],
                'password' => ['field'=>'password', 'label'=>'Password', 'rules'=>'min_length[8]'],
                'password_confirm' => ['field'=>'password_confirm', 'label'=>'Password Confirmation', 'rules'=>'matches[password]'],
                'mahasiswa_id' => ['field'=>'mahasiswa_id', 'label'=>'ID Mahasiswa', 'rules'=>'trim|integer|required']
            ],
            'update_rfid' => [
                'mahasiswa_id' => ['field'=>'mahasiswa_id', 'label'=>'ID Mahasiswa', 'rules'=>'trim|integer|required'],
                'kode_rfid' => ['field'=>'kode_rfid', 'label'=>'Kode RFID', 'rules'=>'trim|required|exact_length[10]|callback_rfid_is_used']
            ]
    ];
}

/* End of file Mahasiswa_model.php */
/* Location: ./application/model/Mahasiswa_model.php */