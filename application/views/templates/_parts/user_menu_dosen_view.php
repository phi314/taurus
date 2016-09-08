<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/11/16
 * Time: 1:28 PM
 */
?>
<li>
    <a href="<?php echo site_url('dosen/dashboard'); ?>" title="Dashboard"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
</li>
<li>
    <a href="<?php echo site_url('dosen/absensi'); ?>" title="Absensi"><span class="fa fa-check-square"></span><span class="xn-text">Absensi</span></a>
</li>
<li class="xn-openable">
    <a href="#" title="Laporan"><span class="fa fa-book"></span> <span class="xn-text">Laporan</span></a>
    <ul>
        <li>
            <a href="<?php echo site_url('dosen/report'); ?>" title="Laporan/tanggal"><span class="fa fa-calendar-check-o"></span> Laporan/tanggal</a>
        </li>
    </ul>
</li>