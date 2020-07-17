<div class="row">
	<div class="col-md-12">
		<div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-list"></i> Lists Karyawan</h3>
				<div class="card-tools">
					<a href="<?= site_url('admin/karyawan/create') ?>" class="btn btn-info btn-sm" title="Add"><i class="fa fa-plus-circle"></i> Add</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped datatable">
						<thead>
						<tr>
							<th style="text-align: center">NO.</th>
							<th style="text-align: center">NIK</th>
							<th style="text-align: center">NAMA</th>
							<th style="text-align: center">DEPARTEMEN</th>
							<th style="text-align: center">POSISI</th>
							<th style="text-align: center">AKSI</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($karyawan as $key => $row) : ?>
							<tr>
								<td><?= $key+1 ?>.</td>
								<td><?= $row->nik ?></td>
								<td><?= $row->nama ?></td>
								<td><?= $row->nama_dept ?></td>
								<td><?= $row->nama_posisi ?></td>
								<td style="text-align: center">
									<div class="btn-group btn-group-sm">
										<a href="<?= site_url('admin/karyawan/edit/'.$row->nik) ?>" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="#" onclick="hapus('<?= $row->nik ?>')" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
<script>
	function hapus(id) {
		var url = "<?= site_url('admin/karyawan/delete') ?>/"+id;
		var conf = confirm('Anda yakin mneghapups data ini?');
		if (conf){
		    window.location.href = url;
		}
    }
</script>
