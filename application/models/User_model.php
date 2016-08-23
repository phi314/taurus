<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/22/16
 * Time: 10:52 PM
 */

class User_model extends US_Model {

    public function __construct() 
    {
        $this->table = 'users';
        $this->primary_key = 'id';
        $this->has_one['mahasiswa'] = 'Mahasiswa_model';
        $this->has_one['dosen'] = 'dosen_model';
        parent::__construct();
    }
    
}

/* End of file Users_model.php */
/* Location: ./application/controllers/Users_model.php */