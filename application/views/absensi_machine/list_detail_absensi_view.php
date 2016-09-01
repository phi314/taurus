<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/30/16
 * Time: 8:28 PM
 */
?>

<!-- START CONTENT FRAME -->
<div class="content-frame">
    <!-- START CONTENT FRAME TOP -->
    <div class="content-frame-top">
        <!-- The Breadcrumb -->
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('absensi_machine'); ?>">Home</a></li>
            <li><a href="<?php echo site_url('absensi_machine/absensi'); ?>">Absensi</a></li>
            <li class="active">Detail</li>
        </ul>
        <div class="page-title">
            <h2><span class="fa fa-check-square"></span> <?= $absensi->mengajar->mata_kuliah->nama_mata_kuliah; ?> (<?= $absensi->mengajar->dosen->user->name; ?>)</h2>
            <p><?php echo format_tanggal_indonesia($absensi->waktu_mulai, TRUE); ?> - <?php echo format_tanggal_indonesia($absensi->waktu_selesai, TRUE); ?></p>
            <p>Durasi: <b><?= $absensi->durasi; ?></b> menit</p>
        </div>
    </div>
    <!-- END CONTENT FRAME TOP -->

    <!-- START CONTENT FRAME BODY -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default push-up-10">
                <form action="" class="panel-body panel-body-search" id="kode-rfid-form">
                    <input type="text" name="kode_rfid_input" id="kode-rfid-input" class="form-control" placeholder="Tap your ID Card..."/>
                </form>
            </div>

            <div class="messages">
                <?php
                    if(!empty($absensi->absensi_mahasiswa))
                    {
                        foreach($absensi->absensi_mahasiswa as $item):
                ?>
                            <div class="item item-absensi-<?= $item->id; ?>">
                                <div class="text">
                                    <div class="heading">
                                        <a href="#"><?= "({$item->mahasiswa->nim}) {$item->mahasiswa->user->name}"; ?></a>
                                        <span class="date">Masuk: <?= format_tanggal_indonesia($item->waktu_masuk, TRUE); ?> - Keluar: <?= format_tanggal_indonesia($item->waktu_keluar, TRUE); ?></span>
                                    </div>
                                </div>
                            </div>
                <?php
                        endforeach;
                    }
                ?>
                <?php  ?>
            </div>
        </div>
    </div>
    <input type="hidden" name="ip_address" value="<?= $ip_address; ?>" id="ip-address">
    <input type="hidden" name="absensi_id" value="<?= $absensi->id; ?>" id="absensi-id">
    <!-- END CONTENT FRAME BODY -->
</div>
<!-- END PAGE CONTENT FRAME -->