<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/31/16
 * Time: 11:12 AM
 */

class Absensi_mahasiswa_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'absensi_mahasiswa';
        $this->primary_key = 'id';
        $this->has_one['absensi'] = ['absensi_model', 'id', 'absensi_id'];
        $this->has_one['mahasiswa'] = ['mahasiswa_model', 'id', 'mahasiswa_id'];
        parent::__construct();
    }
}

/* End of file Absensi _mahasiswa.php */
/* Location: ./application/model/Absensi _mahasiswa.php */