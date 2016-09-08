<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 9/7/16
 * Time: 10:21 PM
 */

?>
<!-- The Breadcrumb -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Laporan</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <?= form_open('', ['class'=>'form-horizontal']); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-search"></i> Laporan Absensi</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Mata Kuliah</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                <select name="mengajar" class="form-control">
                                    <option value="">Silahkan pilih mata kuliah</option>
                                    <?php if(!empty($mengajar)): ?>
                                        <?php foreach($mengajar as $data_mengajar): ?>
                                            <option value="<?= $data_mengajar->id; ?>" <?= set_select('mengajar', $data_mengajar->id); ?>><?= $data_mengajar->mata_kuliah->nama_mata_kuliah; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <span class="help-block"><?php echo form_error('mengajar'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Dari</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <?php echo form_input('dari', set_value('dari', date('Y-m-d')), ['class'=>'form-control datepicker']); ?>
                            </div>
                            <span class="help-block"><?php echo form_error('dari'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Sampai</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <?php echo form_input('sampai', set_value('sampai', date('Y-m-d')), ['class'=>'form-control datepicker']); ?>
                            </div>
                            <span class="help-block"><?php echo form_error('sampai'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Simpan PDF</label>
                        <div class="col-md-6 col-xs-12">
                            <label class="check"><input type="checkbox" name="to_pdf"></label>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary pull-right">Cari</button>
                </div>
            </div>
        <?= form_close(); ?>
    </div>

    <?php if($this->input->post()): ?>
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-info-circle"></i> Hasil pencarian</h3>
            </div>
            <div class="panel-body">
                <?php if(!empty($absensi)): ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">NIM</th>
                        <th rowspan="2">Nama</th>
                        <?php foreach($array_tanggal as $tanggal): ?>
                            <th width="20px"><?= date('d/m/Y', strtotime($tanggal['waktu_mulai'])); ?></th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=1;foreach($array_mahasiswa as $mahasiswa): ?>
                        <tr>
                            <th><?= $no++; ?>.</th>
                            <th><?= $mahasiswa['nim']; ?></th>
                            <th><?= $mahasiswa['name']; ?></th>
                            <?php
                                foreach($array_tanggal as $tanggal):
                                    $detail_absensi = $this->absensi_mahasiswa_model->get(['absensi_id'=>$tanggal['id'], 'mahasiswa_id'=>$mahasiswa['id']]);
                                    $waktu_masuk = 'X';
                                    $waktu_keluar = 'x';
                                    if($detail_absensi !== FALSE)
                                    {
                                        $waktu_masuk = format_date($detail_absensi->waktu_masuk, 'time-no-sec');
                                        $waktu_keluar = is_null($detail_absensi->waktu_keluar) ? '' : format_date($detail_absensi->waktu_keluar, 'time-no-sec');
                                    }
                            ?>
                                    <th><?= $waktu_masuk; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <div class="alert alert-danger">Data tidak ditemukan</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>