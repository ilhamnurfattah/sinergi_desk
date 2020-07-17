<form action="<?= site_url('admin/user/update_password/'.$id) ?>" method="post">
	<div class="modal-header">
		<h4 class="modal-title">Update Password</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body">
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
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
	</div>
</form>

