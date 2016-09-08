<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 9/7/16
 * Time: 5:17 PM
 */

class Mypdf {

    public function __construct()
    {
        require_once APPPATH.'third_party/dompdf/autoload.inc.php';

        $pdf = new \Dompdf\Dompdf();

        $CI =& get_instance();

        $CI->dompdf = $pdf;
    }
}