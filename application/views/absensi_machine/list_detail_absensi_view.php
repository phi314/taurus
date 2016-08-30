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
            <p><?php echo format_tanggal_indonesia($absensi->tanggal.' '.$absensi->waktu, TRUE); ?></p>
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
                <div class="item">
                    <div class="text">
                        <div class="heading">
                            <a href="#">John Doe</a>
                            <span class="date">08:33</span>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculis.
                    </div>
                </div>
                <div class="item">
                    <div class="text">
                        <div class="heading">
                            <a href="#">Dmitry Ivaniuk</a>
                            <span class="date">08:39</span>
                        </div>
                        Integer et ipsum vitae urna mattis dictum. Sed eu sollicitudin nibh, in luctus velit.
                    </div>
                </div>
                <div class="item">
                    <div class="text">
                        <div class="heading">
                            <a href="#">Dmitry Ivaniuk</a>
                            <span class="date">08:42</span>
                        </div>
                        In dapibus ex ut nisl laoreet aliquam. Donec in mollis leo. Aenean nec suscipit neque, non iaculis justo. Quisque eget odio efficitur, porta risus vitae, sagittis neque.
                    </div>
                </div>
                <div class="item">
                    <div class="text">
                        <div class="heading">
                            <a href="#">John Doe</a>
                            <span class="date">08:58</span>
                        </div>
                        Curabitur et euismod urna?
                    </div>
                </div>
                <div class="item">
                    <div class="text">
                        <div class="heading">
                            <a href="#">Dmitry Ivaniuk</a>
                            <span class="date">09:11</span>
                        </div>
                        Fusce ultricies erat quis massa interdum, eu elementum urna iaculis
                    </div>
                </div>
                <div class="item">
                    <div class="text">
                        <div class="heading">
                            <a href="#">John Doe</a>
                            <span class="date">09:22</span>
                        </div>
                        Vestibulum cursus ipsum ut dolor vulputate dapibus. Donec elementum est vel vulputate malesuada?
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT FRAME BODY -->
</div>
<!-- END PAGE CONTENT FRAME -->