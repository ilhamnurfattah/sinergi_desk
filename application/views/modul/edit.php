<form action="<?= site_url('modul/update/'.$id) ?>" method="post">
	<div class="modal-header">
		<h4 class="modal-title">Form Edit</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label for="">Nama Modul</label>
			<input type="text" class="form-control" value="<?= $modul->nama_modul ?>" name="nama_modul" required placeholder="Nama modul..">
		</div>
	</div>
	<div class="modal-footer justify-content-between">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
	</div>
</form>
