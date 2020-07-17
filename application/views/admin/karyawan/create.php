<div class="row">
	<div class="col-md-12">
		<div class="card card-outline card-info">
			<div class="card-header">
				<h3 class="card-title">Form Create</h3>
				<div class="card-tools">
					<a href="<?= site_url('admin/karyawan') ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<form action="<?= site_url('admin/karyawan/store') ?>" method="post">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" name="nama" class="form-control form-control-sm" required>
					</div>
					<div class="form-group">
						<label for="">Jenis Kelamin <span class="text-danger">*</span></label>
						<select name="jk" class="form-control form-control-sm">
							<option value="" selected disabled>Pilih</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Alamat <span class="text-danger">*</span></label>
						<textarea name="alamat" class="form-control form-control-sm" cols="30" rows="4"></textarea>
					</div>
					<div class="form-group">
						<label for="">Departemen <span class="text-danger">*</span></label>
						<select name="id_dept" class="form-control form-control-sm" required>
							<option value="" selected disabled>Pilih</option>
							<?php foreach ($departemen as $row) : ?>
								<option value="<?= $row->id_dept ?>"><?= $row->nama_dept ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Kategori <span class="text-danger">*</span></label>
						<select name="id_posisi" class="form-control form-control-sm" required>
							<option value="" selected disabled>Pilih</option>
							<?php foreach ($posisi as $row) : ?>
								<option value="<?= $row->id_posisi ?>"><?= $row->nama_posisi ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
