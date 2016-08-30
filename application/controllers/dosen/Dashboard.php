<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/29/16
 * Time: 6:10 PM
 */

class Dashboard extends Dosen_Controller {

    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->data['page_title'] = 'Dashboard Dosen';
        $this->data['user'] = $this->ion_auth->user()->row();
        $this->render('dosen/dashboard/dashboard_view');
    }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */