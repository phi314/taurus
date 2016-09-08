<div class="login-title"><strong>Selamat Datang</strong>, Silahkan login</div>

<?php echo $this->session->flashdata('message'); ?>

<?php echo form_open('', ['class'=>'form-horizontal']); ?>
    <div class="form-group">
        <div class="col-md-12">
            <?php echo form_input('identity', '', 'class="form-control" placeholder="Username"'); ?>
            <?php echo form_error('identity', '<div class="text-danger help-block">', '</div>'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?php echo form_password('password', '', 'class="form-control" placeholder="Password"'); ?>
            <?php echo form_error('password', '<div class="text-danger help-block">', '</div>'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?php echo form_checkbox('remember', '1', FALSE); ?> Remember Me
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <?php echo form_submit('submit', 'Log In Dosen', 'class="btn btn-info btn-block"'); ?>
        </div>
    </div>
<?php echo form_close(); ?>