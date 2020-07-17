<div class="row">
	<div class="col-md-12">
		<div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-list"></i> Lists Ticket</h3>
				<div class="card-tools">
					<a href="<?= site_url('user/ticket/create') ?>" class="btn btn-info btn-sm" title="Add"><i class="fa fa-plus-circle"></i> Add</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped datatable" style="font-size: 10pt; padding: 5px">
						<thead>
						<tr>
							<th style="text-align: center">NO.</th>
							<th style="text-align: center">TICKET</th>
							<th style="text-align: center">USER</th>
							<th style="text-align: center">MODUL</th>
							<th style="text-align: center">CATEGORY</th>
							<th style="text-align: center">PRIORITY</th>
							<th style="text-align: center">TITLE</th>
							<th style="text-align: center">DESCRIPTION</th>
							<th style="text-align: center">STATUS</th>
							<th style="text-align: center">AKSI</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($ticket as $key => $row) : ?>
							<tr>
								<td><?= $key+1 ?>.</td>
								<td><a href="<?= site_url('user/ticket/view/'.$row->id_ticket) ?>"><?= $row->id_ticket ?></a></td>
								<td><?= $row->pelapor ?></td>
								<td><?= $row->nama_modul ?></td>
								<td><?= $row->defact_category ?></td>
								<td><?= $row->prioriti ?></td>
								<td><?= $row->problem_summary ?></td>
								<td><?= $row->problem_detail ?></td>
								<td><?= status($row->status) ?></td>
								<td style="text-align: center">
									<div class="btn-group btn-group-sm">
										<a href="<?= site_url('user/ticket/edit/'.$row->id_ticket) ?>" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="#" onclick="hapus('<?= $row->id_ticket ?>')" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
		var url = "<?= site_url('user/ticket/delete') ?>/"+id;
		var conf = confirm('Anda yakin mneghapups data ini?');
		if (conf){
		    window.location.href = url;
		}
    }
</script>
