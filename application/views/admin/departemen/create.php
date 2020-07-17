<form action="<?= site_url('admin/departemen/store') ?>" method="post">
	<div class="modal-header">
		<h4 class="modal-title">Form Create</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label for="">Nama Departemen</label>
			<input type="text" class="form-control" name="nama_dept" required placeholder="Nama departemen..">
		</div>
	</div>
	<div class="modal-footer justify-content-between">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
	</div>
</form>
