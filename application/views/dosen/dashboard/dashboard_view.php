<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/10/16
 * Time: 8:54 PM
 */
?>

<!-- The Breadcrumb -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Dashboard</li>
</ul>

<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-success">
            <strong>Selamat Datang, <?php echo $user->name; ?></strong>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <a class="tile tile-default" href="<?php echo site_url("dosen/absensi/detail/{$last_absensi->id}"); ?>">
            <i class="fa fa-calendar"></i>
            <p></p>
            <div class="informer informer-primary"><?= format_date($last_absensi->waktu_mulai); ?></div>
            <div class="informer informer-success dir-bl"><?= $last_absensi->mengajar->mata_kuliah->nama_mata_kuliah; ?></div>
        </a>
    </div>
    <div class="col-md-3">
        <a class="tile tile-success tile-valign" href="#"><?= $jumlah_mengajar; ?>
            <div class="informer informer-default dir-tr"><span class="fa fa-cloud"></span></div>
            <div class="informer informer-default dir-bl">Jumlah Mata Kuliah</div>
        </a>
    </div>
    <div class="col-md-3">
        <a class="tile tile-info tile-valign" href="#">
            <?= $jumlah_mahasiswa; ?>
            <div class="informer informer-default">Jumlah Mahasiswa</div>
            <div class="informer informer-default dir-br"><span class="fa fa-users"></span></div>
        </a>
    </div>
    <div class="col-md-3">
        <div class="tile tile-primary">
            <div class="plugin-clock"></div>
            <p class="plugin-date"></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <div class="panel-title-box">
                    <h3>Kelas</h3>
                    <span>Aktivitas Kelas</span>
                </div>
            </div>
            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="50%">Mata Kuliah</th>
                            <th width="10%">Status</th>
                            <th width="20%">Jumlah <i class="fa fa-users"></i></th>
                            <th width="30%">Waktu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($absensi as $data_absensi): ?>
                        <tr>
                            <td>
                                <strong><?= anchor("dosen/absensi/detail/{$data_absensi->id}", $data_absensi->mengajar->mata_kuliah->nama_mata_kuliah); ?></strong>
                                <br>
                                Laboratorium <?= $data_absensi->laboratorium->nama_laboratorium; ?>
                            </td>
                            <td><?= absensi_status($data_absensi->waktu_mulai, $data_absensi->durasi, TRUE); ?></td>
                            <td><?= !is_null($data_absensi->absensi_mahasiswa) ? $data_absensi->absensi_mahasiswa[0]->counted_rows : 0; ?></td>
                            <td><?= format_date($data_absensi->waktu_mulai); ?><br><em><?= "({$data_absensi->durasi} Menit)"; ?></em></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Mengajar</h3>
            </div>
            <div class="panel-body list-group">
                <?php foreach($mengajar as $data_mengajar): ?>
                    <div class="list-group-item"><?= $data_mengajar->mata_kuliah->nama_mata_kuliah; ?></div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>

