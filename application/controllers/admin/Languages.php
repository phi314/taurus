<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/18/16
 * Time: 7:52 PM
 */

class Languages extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('language_model');
    }

    public function index()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}

/* End of file Languages.php */
/* Location: ./application/controllers/Languages.php */