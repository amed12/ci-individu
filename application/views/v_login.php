<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Sistem Catat Tugas Kuliah</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/AdminLTE.min.css')?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets/css/iCheck/square/blue.css')?>">

    		
	<link href="<?=base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet">
</head>
<body class="hold-transition login-page">
	
	
	<?	if (isset($gagal))
		{	echo ("	<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span> 
					<strong>".$gagal."</strong>			 
					</div>
				");	
			unset($gagal);
		}  	 
	?>
	<br><br>
	<div class="login-box">
     
      <div class="login-logo">
        <a href="index.php"><b>Sistem</b>Pencatat</a>
        <h1><strong>Tugas</strong</h1>
        <h4>Kuliah Online</h4>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan masukkan user dan password untuk masuk kedalam sistem</p>
            
          <?=form_open('login/cek_login','class="form-inline style="margin-left: 20px"')?> 
  
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="User ID" name="userid" rel="tooltip" data-placement="top" title="Masukkan User ID Anda">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" rel="tooltip" data-placement="top" title="Masukkan Password Anda">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row" style="margin-top: 20px">
        <div class="col-xs-4">
          <button type="reset" class="btn btn-danger btn-block btn-flat">Reset</button>
        </div>
        <div class="col-xs-4 col-xs-offset-4">
          <button ttype="submit" class="btn btn-primary btn-block btn-flat" value="Login" name="login"><i class="fa fa-sign-in"></i> Masuk</button>
        </div>
        <!-- /.col -->
      </div>
        </form>

      
      
      </div><!-- /.login-box-body -->
    </div>
	
  

<script src="<?=base_url('assets/js/tooltip.js')?>"></script>


<script src="<?=base_url('assets/js/jQuery-2.1.4.min.js')?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/css/iCheck/icheck.min.js')?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>