<div class="row">
	<div class="col-md-12">
		<div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-list"></i> Lists Approval</h3>
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
								<td><a href="#"><?= $row->id_ticket ?></a></td>
								<td><?= $row->pelapor ?></td>
								<td><?= $row->nama_modul ?></td>
								<td><?= $row->defact_category ?></td>
								<td><?= $row->prioriti ?></td>
								<td><?= $row->problem_summary ?></td>
								<td><?= $row->problem_detail ?></td>
								<td><?= status($row->status) ?></td>
								<td style="text-align: center">
									<a href="<?= site_url('ticket/aprove_ticket/'.$row->id_ticket) ?>" class="btn btn-info btn-sm" title="Aprove">Aprove</a>
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

