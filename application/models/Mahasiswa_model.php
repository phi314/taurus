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
        $this->has_one['user'] = 'user_model';
        $this->has_many_pivot['rfid'] = [
            'foreign_model'=>'rfid_model',
            'pivot_table'=>'mahasiswa_rfid',
            'local_key'=>'id',
            'pivot_local_key'=>'mahasiswa_id',
            'pivot_foreign_key'=>'rfid_id',
            'foreign_key'=>'id'
        ];
        $this->has_many['mahasiswa_rfid'] = ['Mahasiswa_rfid_model', 'mahasiswa_id', 'id'];
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
                'id' => ['field'=>'id', 'label'=>'ID Mahasiswa', 'rules'=>'trim|integer|required']
            ],
            'add_rfid' => [
                'mahasiswa_id' => ['field'=>'mahasiswa_id', 'label'=>'ID mahasiswa', 'rules'=>'trim|required|integer'],
                'kode_rfid' => ['field'=>'kode_rfid', 'label'=>'Kode RFID', 'rules'=>'trim|required|exact_length[10]|callback_rfid_check|callback_rfid_duplicate'],
                'mata_kuliah' => ['field'=>'mata_kuliah', 'label'=>'Mata Kuliah', 'rules'=>'trim|required|integer|callback_rfid_only_one_mata_kuliah']
            ]
    ];
}

/* End of file Mahasiswa_model.php */
/* Location: ./application/model/Mahasiswa_model.php */