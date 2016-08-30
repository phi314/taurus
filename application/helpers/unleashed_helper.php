<?php
/**
 * Created by PhpStorm.
 * User: Unleashed
 * Date: 3/15/14
 * Time: 10:04 PM
 * UNEALSHED FUNCTION PLUG-IN
 */

function lorem_ipsum()
{
    echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum";
}

/**
 * @param $link
 * @return bool
 */
function image_link_exist($link)
{
    $file_headers = @get_headers($link);
    // cek apakah link ada
    if(!$file_headers)
        return FALSE;
    else
    {
        // ambil informasi gambar
        $image = getimagesize($link);
        // jika bukan gambar
        if(!$image)
            return FALSE;
        else
            return TRUE;
    }
}

/**
 * @param $currency
 * @return string
 */
function format_rupiah($currency)
{
    return 'Rp. '.number_format($currency, 0, ',', '.');
}

/**
 * @param $dump
 */
function dump($dump)
{
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
}

/**
 * @return bool|string
 */
function now()
{
    return date('Y-m-d H:i:s');
}

/**
 * @return bool|string
 * tanggal besok
 */
function tommorow()
{
    $now = strtotime(date('Y-m-d').' +1 day');
    $tomorrow = date('Y-m-d', $now);

    return $tomorrow;
}

/**
 * @param $text
 * @return string
 */
function cameltext($text)
{
    return ucwords(strtolower($text));
}

/**
 * @param $jam
 * @return bool|string
 */
function to_hours($jam)
{
    return date('H:i', strtotime($jam));
}

/**
 * @param $tgl
 * @param bool $waktu
 * @param bool $bln_only
 * @return string
 */
function format_tanggal_indonesia($tgl, $waktu = FALSE, $bln_only = FALSE){
    $tanggal  =  substr($tgl,8,2);
    $bulan  =  nama_bulan(substr($tgl,5,2));
    $tahun  =  substr($tgl,0,4);
    $jam = substr($tgl, 11,2);
    $menit = substr($tgl, 14,2);
    $detik = substr($tgl, 17,2);
    $separator = empty($jam) ? '' : ':';
    $r_wkt = $waktu == FALSE ? '' : $jam.$separator.$menit.$separator.$detik;

    $tanggal_formatted = $tanggal.' '.$bulan.' '.$tahun.' '.$r_wkt;

    if($bln_only)
    {
        $tanggal_formatted = $bulan.' '.$tahun;
    }

    return $tanggal_formatted;
}

/**
 * @param $bulan
 * @return string
 */
function nama_bulan($bulan){
    switch  ($bulan){
        case  1:
            $bulan = "Januari";
            break;
        case  2:
            $bulan = "Februari";
            break;
        case  3:
            $bulan = "Maret";
            break;
        case  4:
            $bulan = "April";
            break;
        case  5:
            $bulan = "Mei";
            break;
        case  6:
            $bulan = "Juni";
            break;
        case  7:
            $bulan = "Juli";
            break;
        case  8:
            $bulan = "Agustus";
            break;
        case  9:
            $bulan = "September";
            break;
        case  10:
            $bulan = "Oktober";
            break;
        case  11:
            $bulan = "November";
            break;
        case  12:
            $bulan = "Desember";
            break;
    }

    return $bulan;
}

/**
 * @param $hari
 * @return string
 */
function nama_hari($hari)
{
    switch  ($hari){
        case  '7':
            $hari = "Minggu";
            break;
        case  '1':
            $hari = "Senin";
            break;
        case  '2':
            $hari = "Selasa";
            break;
        case  '3':
            $hari = "Rabu";
            break;
        case  '4':
            $hari = "Kami";
            break;
        case  '5':
            $hari = "Jumat";
            break;
        case  '6':
            $hari = "Sabtu";
            break;
    }

    return $hari;
}


/**
 * @param $val
 * @param bool $html
 * @return string
 *
 * membersihkan inputan dari setan yang terkutuk
 */
function escape($val, $html = TRUE)
{
    if($html == FALSE)
        $string = trim(mysql_real_escape_string($val));
    else
        $string = trim(htmlentities(mysql_real_escape_string($val)));
    return $string;
}

/**
 * @param $key
 * @param $value
 */
function set_select_value($key, $value)
{
    echo $key == $value ? ' selected="selected"' : '';
}

/**
 * @param $key
 * @param $value
 */
function set_checkbox_value($key, $value)
{
    echo $key == $value ? '  checked="checked"' : '';
}

/**
 * @param $key
 * @param $value
 */
function set_active_class($key, $value)
{
    echo $key == $value ? '  active' : '';
}