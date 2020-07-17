<form action="<?= site_url('admin/user/update/'.$id) ?>" method="post">
	<div class="modal-header">
		<h4 class="modal-title">Form Edit</h4>
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
					<option <?= $user->username == $row->nik ? 'selected' : '' ?> value="<?= $row->nik ?>"><?= $row->nama ?>-(<?= $row->nama_posisi ?>)</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Level</label>
			<select name="level" class="form-control" required>
				<option <?= $user->level == 'admin' ? 'selected' : '' ?> value="admin">ADMIN</option>
				<option <?= $user->level == 'pm' ? 'selected' : '' ?> value="pm">PM</option>
				<option <?= $user->level == 'qa' ? 'selected' : '' ?> value="qa">QA</option>
				<option <?= $user->level == 'ba' ? 'selected' : '' ?> value="ba">BA</option>
				<option <?= $user->level == 'dev' ? 'selected' : '' ?> value="dev">DEV</option>
				<option <?= $user->level == 'user' ? 'selected' : '' ?> value="user">USER</option>
			</select>
		</div>
	</div>
	<div class="modal-footer justify-content-between">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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
