<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 9/8/16
 * Time: 11:31 PM
 */

class Error_page extends Public_Controller {

    public function __construct() 
    {
        parent::__construct();
    }
    
    public function error_404()
    {
        $this->render('errors/html/error_404', 'page_master');
    }

    public function error_no_registered_ip()
    {
        $ip_address = $this->input->ip_address();
        $this->data['ip_address'] = $ip_address;
        $this->load->model(['laboratorium_model']);
        $laboratorium = $this->laboratorium_model->get(['ip_address'=>$ip_address]);
        if($laboratorium === FALSE)
        {
            $this->render('errors/html/error_no_registered_ip', 'page_master');
        }
        else
        {
            redirect('absensi-machine');
        }

    }
    

}

/* End of file error_page.php */
/* Location: ./application/controllers/error_page.php */