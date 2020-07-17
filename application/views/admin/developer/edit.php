<form action="<?= site_url('admin/developer/update/'.$id) ?>" method="post">
	<div class="modal-header">
		<h4 class="modal-title">Form Create</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label for="">Develover</label>
			<select name="nik" class="form-control select2" required>
				<option value="" selected disabled>Pilih</option>
				<?php foreach ($karyawan as $row) : ?>
					<option <?= $developer->nik == $row->nik ? 'selected' : '' ?> value="<?= $row->nik ?>"><?= $row->nama ?>-(<?= $row->nama_posisi ?>)</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Kategori</label>
			<select name="id_kategori" class="form-control select2" required>
				<option value="" selected disabled>Pilih</option>
				<?php foreach ($kategori as $row) : ?>
					<option <?= $developer->id_kategori == $row->id_kategori ? 'selected' : '' ?> value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
				<?php endforeach; ?>
			</select>
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
