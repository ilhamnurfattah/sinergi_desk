<div class="row">
	<div class="col-md-12">
		<div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-list"></i> Lists Posisi</h3>
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
							<th style="text-align: center">NAMA POISI</th>
							<th style="text-align: center">AKSI</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($posisi as $key => $row) : ?>
							<tr>
								<td><?= $key+1 ?>.</td>
								<td><?= $row->nama_posisi ?></td>
								<td style="text-align: center">
									<div class="btn-group btn-group-sm">
										<a href="#" onclick="edit('<?= $row->id_posisi ?>')" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="#" onclick="hapus('<?= $row->id_posisi ?>')" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
		var url = "<?= site_url('admin/posisi/delete') ?>/"+id;
		var conf = confirm('Anda yakin mneghapus data ini?');
		if (conf){
		    window.location.href = url;
		}
    }

    function add() {
		var url = "<?= site_url('admin/posisi/create') ?>";
		$.ajax({
			url : url,
			success : function (res) {
				$("#landing-modal").html(res);
				$("#modal-form").modal('show');
            }
		})
    }

    function edit(id) {
        var url = "<?= site_url('admin/posisi/edit') ?>/"+id;
        $.ajax({
            url : url,
            success : function (res) {
                $("#landing-modal").html(res);
                $("#modal-form").modal('show');
            }
        })
    }
</script>
