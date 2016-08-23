<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/9/16
 * Time: 11:07 PM
 */

class US_Controller extends CI_Controller {

    protected $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Unleashed Studios';
        $this->data['page_description'] = 'Unleashed Framework';
        $this->data['page_author'] = 'Arief Wibowo';
        $this->data['before_head'] = '';
        $this->data['before_body'] = '';
        $this->data['google_analytics'] = FALSE;
    }

    protected function render($the_view = NULL, $template = 'master')
    {
        if($template == 'json' OR $this->input->is_ajax_request())
        {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        }
        else
        {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->load->view('templates/'.$template.'_view', $this->data);
        }
    }

}

class Admin_Controller extends US_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        if(!$this->ion_auth->logged_in())
        {
            redirect('admin/user/login',  'refresh');
        }
        $this->data['current_user'] = $this->ion_auth->user()->row();
        $this->data['current_user_menu'] = '';
        if($this->ion_auth->in_group('admin'))
        {
            $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view', NULL, TRUE);
        }
        $this->data['page_title'] = 'Unleashed Framework Admin Page';
    }

    protected function render($the_view = NULL, $template = 'admin_master')
    {
        parent::render($the_view, $template);
    }
}

class Public_Controller extends US_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Unleashed Studios';
    }

    protected function render($the_view = NULL, $template = 'public_master')
    {
        parent::render($the_view, $template);
    }
}

/* End of file US_Controller.php */
/* Location: ./application/core/US_Controller.php */