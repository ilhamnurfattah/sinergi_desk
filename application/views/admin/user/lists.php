<div class="row">
	<div class="col-md-12">
		<div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-list"></i> Lists User</h3>
				<div class="card-tools">
					<a href="#" onclick="add()" class="btn btn-info btn-sm" title="Add"><i class="fa fa-plus-circle"></i> Add</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped datatable">
						<thead>
						<tr>
							<th style="text-align: center">NO.</th>
							<th style="text-align: center">NAMA USER</th>
							<th style="text-align: center">USERNAME</th>
							<th style="text-align: center">LEVEL</th>
							<th style="text-align: center">AKSI</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($user as $key => $row) : ?>
							<tr>
								<td><?= $key+1 ?>.</td>
								<td><?= $row->nama ?></td>
								<td><?= $row->username ?></td>
								<td><?= strtoupper($row->level) ?></td>
								<td style="text-align: center">
									<div class="btn-group btn-group-sm">
										<a href="#" onclick="edit('<?= $row->id_user ?>')" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="#" onclick="hapus('<?= $row->id_user ?>')" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
										<a href="#" onclick="edit_pass('<?= $row->id_user ?>')" class="btn btn-warning" title="Reset"><i class="fa fa-key"></i></a>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--modal-->
<div class="modal fade" id="modal-form">
	<div class="modal-dialog">
		<div class="modal-content" id="landing-modal">

		</div>
	</div>
</div>
<script>
	function hapus(id) {
		var url = "<?= site_url('admin/user/delete') ?>/"+id;
		var conf = confirm('Anda yakin mneghapus data ini?');
		if (conf){
		    window.location.href = url;
		}
    }

    function add() {
		var url = "<?= site_url('admin/user/create') ?>";
		$.ajax({
			url : url,
			success : function (res) {
				$("#landing-modal").html(res);
				$("#modal-form").modal('show');
            }
		})
    }

    function edit(id) {
        var url = "<?= site_url('admin/user/edit') ?>/"+id;
        $.ajax({
            url : url,
            success : function (res) {
                $("#landing-modal").html(res);
                $("#modal-form").modal('show');
            }
        })
    }

    function edit_pass(id) {
        var url = "<?= site_url('admin/user/edit_password') ?>/"+id;
        $.ajax({
            url : url,
            success : function (res) {
                $("#landing-modal").html(res);
                $("#modal-form").modal('show');
            }
        })
    }
</script>
