<form action="<?= site_url('admin/user/store') ?>" method="post">
	<div class="modal-header">
		<h4 class="modal-title">Form Create</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label for="">User</label>
			<select name="username" class="form-control select2" required>
				<option value="" selected disabled>Pilih</option>
				<?php foreach ($karyawan as $row) : ?>
					<option value="<?= $row->nik ?>"><?= $row->nama ?>-(<?= $row->nama_posisi ?>)</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Level</label>
			<select name="level" class="form-control" required>
				<option value="" selected disabled>Pilih</option>
				<option value="admin">ADMIN</option>
				<option value="pm">PM</option>
				<option value="qa">QA</option>
				<option value="ba">BA</option>
				<option value="dev">DEV</option>
				<option value="user">USER</option>
			</select>
		</div>
		<hr>
		<div class="form-group">
			<label for="">Password</label>
			<div class="input-group">
				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
		</div>
	</div>
	<div class="modal-footer justify-content-between">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
	</div>
</form>


<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
        // $(".select2").select2();
        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })
</script>
