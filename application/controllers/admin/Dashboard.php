<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/10/16
 * Time: 8:20 PM
 */

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['user'] = $this->ion_auth->user()->row();
        $this->render('admin/dashboard/dashboard_view');
    }
    
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */