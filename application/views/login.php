<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Helpdesk | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="
  /*height: 100%;*/

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url('<?= base_url('assets/dist/img/background.jpg') ?>')">
<div class="row" style="background-color: #b3b3b3cc; padding: 10px; border-radius: 30px">
	<div class="col-md-12">
		<div class="login-box">
			<div class="login-logo">
				<img src="<?= base_url('assets/dist/img/logo_help.png') ?>" style="width: 160px; height: 160px;" alt="">
				<br>
				<!-- <a href="#" style="color: white"><b>Log</b>In</a> -->
			</div>
			<!-- /.login-logo -->
			<div class="card" style="border-radius: 30px">
				<div class="card-body login-card-body" style="border-radius: 30px">
					<!-- <p class="login-box-msg">Sign in to start your session</p> -->

					<form action="<?= site_url('login/cek') ?>" method="post">
						<div class="input-group mb-3">
							<input type="text" name="username" autocomplete="off" autofocus class="form-control" placeholder="Username">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" name="password" class="form-control" placeholder="Password">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-8">
								<div class="icheck-primary">
									<input type="checkbox" id="remember">
									<label for="remember">
										Remember Me
									</label>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-4">
								<button type="submit" class="btn btn-primary btn-block">Sign In</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
				</div>
				<!-- /.login-card-body -->
			</div>
		</div>
	</div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script>
	<?= $this->session->flashdata('info') ? $this->session->flashdata('info') : ''  ?>
</script>
</body>
</html>
