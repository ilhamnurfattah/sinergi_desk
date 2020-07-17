<div class="row">
	<div class="col-md-5 col-xs-12">
		<!-- Widget: user widget style 1 -->
		<div class="card card-widget widget-user">
			<!-- Add the bg color to the header using any of the bg-* classes -->
			<div class="widget-user-header bg-info">
				<h3 class="widget-user-username"><?= $this->session->userdata('nama') ?></h3>
				<h5 class="widget-user-desc">LEVEL : <?= strtoupper($this->session->userdata('level')) ?></h5>
			</div>
			<div class="widget-user-image">
				<img class="img-circle elevation-2" src="<?= base_url() ?>assets/dist/img/avatar5.png" alt="User Avatar">
			</div>
			<div class="card-footer">
				<div class="row">
					<form action="<?= site_url('user/profile/update') ?>" method="post" style="width: 100%">
						<div class="form-group">
							<label for="">Nama <span class="text-danger">*</span></label>
							<input type="text" class="form-control"name="nama" value="<?= $dev->nama ?>" required>
						</div>
						<div class="form-group">
							<label for="">Jenis Kelamni <span class="text-danger">*</span></label>
							<select name="jk" class="form-control" required>
								<option <?= $dev->jk == 'L' ? 'selected' : '' ?> value="L">Laki-laki</option>
								<option <?= $dev->jk == 'P' ? 'selected' : '' ?> value="P">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Alamat <span class="text-danger">*</span></label>
							<textarea name="alamat" class="form-control" cols="30" rows="4" required><?= $dev->alamat ?></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Update</button>
						</div>
					</form>
				</div>
				<!-- /.row -->
			</div>
		</div>
		<!-- /.widget-user -->
	</div>
	<div class="col-md-4 col-xs-12">
		<div class="card card-danger">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-refresh"></i> Reset Password</h3>
			</div>
			<div class="card-body">
				<form action="<?= site_url('user/profile/reset') ?>" method="post">
					<div class="form-group">
						<label for="">Username <span class="text-danger">*</span></label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
							<input type="text" disabled value="<?= $user->username ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
							<input type="password" name="password" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-refresh"></i> Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

