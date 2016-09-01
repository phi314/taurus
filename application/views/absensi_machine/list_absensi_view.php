<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/30/16
 * Time: 10:19 PM
 */
?>

<!-- START CONTENT FRAME -->
<div class="content-frame">
    <!-- START CONTENT FRAME TOP -->
    <div class="content-frame-top">
        <div class="page-title">
            <h2><span class="fa fa-building"></span> Selamat datang di Laboratorium <?= $laboratorium->nama_laboratorium; ?></h2>
        </div>
    </div>
    <!-- END CONTENT FRAME TOP -->

    <!-- START CONTENT FRAME BODY -->
    <div class="row">
        <div class="col-md-12">
            <?php if(!empty($absensi)): ?>
            <div class="messages">
                <?php foreach($absensi as $data_absensi): ?>
                <div class="item">
                    <div class="text">
                        <div class="heading">
                            <a href="<?php echo site_url('absensi_machine/absensi/detail/'.$data_absensi->id); ?>"><?= $data_absensi->mengajar->mata_kuliah->nama_mata_kuliah; ?></a>
                            <span class="date"><?= format_tanggal_indonesia($data_absensi->waktu_mulai, TRUE); ?> (<?= $data_absensi->durasi; ?>) Menit</span>
                        </div>
                        <?= "({$data_absensi->mengajar->dosen->nip}) {$data_absensi->mengajar->dosen->user->name}"; ?>
                        <span class="pull-right">
                            <?php echo absensi_status($data_absensi->waktu_mulai, $data_absensi->durasi, TRUE); ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <div class="alert alert-danger">Tidak ada Kelas</div>
            <?php endif; ?>
        </div>
    </div>
    <!-- END CONTENT FRAME BODY -->
</div>
<!-- END PAGE CONTENT FRAME -->