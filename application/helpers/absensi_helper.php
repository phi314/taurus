<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/29/16
 * Time: 10:15 PM
 */

/**
 * @param $tanggal
 * @param $waktu
 * @param $durasi
 * @return string
 */
function absensi_status($tanggal, $waktu, $durasi)
{
    $start_time = strtotime($tanggal.' '.$waktu);
    $end_time = strtotime($tanggal.' '.$waktu.' +'.$durasi.' minutes');
    $now = strtotime(date('Y-m-d H:i'));
    $status = NULL;

    if($end_time < $now)
    {
        $status = 'inactive';
    }
    elseif($start_time > $now)
    {
        $status = 'not yet';
    }
    elseif($start_time <= $now && $now <= $end_time)
    {
        $status = 'active';
    }

    return $status;
}

/**
 * @param $tanggal
 * @param $waktu
 * @param $durasi
 * @return int
 */
function absensi_end_time($tanggal, $waktu, $durasi)
{
    $end_time = strtotime($tanggal.' '.$waktu.' +'.$durasi.' minutes');

    return $end_time;
}