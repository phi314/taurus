<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/29/16
 * Time: 10:15 PM
 */

/**
 * @param $waktu_mulai
 * @param $durasi
 * @param bool $to_label
 * @return null|string
 */
function absensi_status($waktu_mulai, $durasi, $to_label = FALSE)
{
    $start_time = strtotime($waktu_mulai);
    $end_time = strtotime($waktu_mulai.' +'.$durasi.' minutes');
    $now = strtotime(date('Y-m-d H:i'));
    $status = NULL;

    if($end_time < $now)
    {
        $status = 'finish';
    }
    elseif($start_time > $now)
    {
        $status = 'inactive';
    }
    elseif($start_time <= $now && $now <= $end_time)
    {
        $status = 'active';
    }

    if($to_label === TRUE)
    {
        $status = absensi_status_label($status);
    }

    return $status;
}

function absensi_status_label($status)
{
    switch($status)
    {
        case "active":
            $status = "<span class='label label-info'>Active</span>";
            break;
        case "inactive":
            $status = "<span class='label label-danger'>Inactive</span>";
            break;
        case "finish":
            $status = "<span class='label label-success'>Finish</span>";
            break;
        default:
            $status = NULL;
    }

    return $status;
}

/**
 * @param $waktu_mulai
 * @param $durasi
 * @return int
 */
function absensi_end_time($waktu_mulai, $durasi)
{
    $end_time = strtotime($waktu_mulai.' +'.$durasi.' minutes');

    return $end_time;
}