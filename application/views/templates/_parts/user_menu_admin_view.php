<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/11/16
 * Time: 1:28 PM
 */
?>
<li class="xn-openable">
    <a href="#" title="Users"><span class="fa fa-user-md"></span> <span class="xn-text">Users</span></a>
    <ul>
        <li>
            <a href="<?php echo site_url('admin/groups'); ?>" title="Groups"><span class="fa fa-users"></span> Groups</a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/users'); ?>" title="Users"><span class="fa fa-user"></span> Users</a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/rfid'); ?>" title="RFID"><span class="fa fa-barcode"></span> RFID</a>
        </li>
    </ul>
</li>
<li>
    <a href="<?php echo site_url('admin/dosen'); ?>" title="Dosen"><span class="fa fa-user-secret"></span><span class="xn-text">Dosen</span></a>
</li>
<li>
    <a href="<?php echo site_url('admin/mahasiswa'); ?>" title="Mahasiswa"><span class="fa fa-users"></span> <span class="xn-text">Mahasiswa</span></a>
</li>
<li>
    <a href="<?php echo site_url('admin/mata_kuliah'); ?>" title="Mata Kuliah"><span class="fa fa-book"></span> <span class="xn-text">Mata Kuliah</span></a>
</li>
<li>
    <a href="<?php echo site_url('admin/laboratorium'); ?>" title="Laboratorium"><span class="fa fa-building"></span> <span class="xn-text">Laboratorium</span></a>
</li>
<li>
    <a href="<?php echo site_url('admin/mengajar'); ?>" title="Mengajar"><span class="fa fa-list"></span> <span class="xn-text">mengajar</span></a>
</li>
