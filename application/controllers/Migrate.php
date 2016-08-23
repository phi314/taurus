<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/10/16
 * Time: 12:41 AM
 */

class Migrate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('migration');

        if($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }
}

/* End of file Migrate.php */
/* Location: ./application/controllers/Migrate.php */