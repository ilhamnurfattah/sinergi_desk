<div class="row">
	<div class="col-md-12">
		<div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-ticket-alt"></i> View Ticket <b><i><?= $id ?></i></b></h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="table-responsive">
							<table class="table table-striped">
								<tr>
									<th>Pelapor </th>
									<td>: <?= $ticket->pelapor ?></td>
								</tr>
								<tr>
									<th>Project </th>
									<td>: <?= $ticket->nama_project ?></td>
								</tr>
								<tr>
									<th>Modul </th>
									<td>: <?= $ticket->nama_modul ?></td>
								</tr>
								<tr>
									<th>Defact Category </th>
									<td>: <?= ucfirst($ticket->defact_category ) ?></td>
								</tr>
								<tr>
									<th>Prioriti </th>
									<td>: <?= ucfirst($ticket->prioriti) ?></td>
								</tr>
								<tr>
									<th>Title </th>
									<td>: <?= $ticket->problem_summary ?></td>
								</tr>
								<tr>
									<th>Deskripsi </th>
									<td>: <?= $ticket->problem_detail ?></td>
								</tr>
								<tr>
									<th>Developer </th>
									<td>: <?= $ticket->developer ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<form action="<?= site_url('dev/assignements/tracking_store/'.$id) ?>" method="post">
							<div class="form-group">
								<label for="">Status <span class="text-danger">*</span></label>
								<select name="status" class="form-control form-control-sm" required>
									<option value="" selected disabled>Pilih</option>
									<option <?= $ticket->status == 'Open' ? 'selected' : '' ?> value="Open">Open</option>
									<option <?= $ticket->status == 'Re-Open' ? 'selected' : '' ?> value="Re-Open">Re-Open</option>
									<option <?= $ticket->status == 'Fixed' ? 'selected' : '' ?> value="Fixed">Fixed</option>
									<option <?= $ticket->status == 'Close' ? 'selected' : '' ?> value="Close">Close</option>
									<option <?= $ticket->status == 'Need Confirmation' ? 'selected' : '' ?> value="Need Confirmation">Need Confirmation</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Progress(%) <span class="text-danger">*</span></label>
								<div class="input-group input-group-sm">
									<input type="number" min="0" max="100" value="<?= $ticket->progress ?>" class="form-control form-control-sm" name="progress">
									<div class="input-group-prepend"><span class="input-group-text">%</span></div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Action <span class="text-danger">*</span></label>
								<textarea name="deskripsi" class="form-control form-control-sm" cols="30" rows="4" required></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-sm"><i class="fas fa-check"></i> Submit</button>
							</div>
						</form>
					</div>
				</div>
				<hr>
				<p><h5><b>Progress(<?= $ticket->progress ?>%)</b></h5></p>
				<div class="progress">
					<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="<?= $ticket->progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $ticket->progress ?>%">
						<span class="sr-only">40% Complete (success)</span>
					</div>
				</div>
				<hr>
				<p><h5><span class="text-green"><i class="fa fa-history"></i></span> <b>Tracking</b></h5></p>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped table-bordered datatable" style="font-size: 10pt">
								<thead>
								<tr>
									<th>NO.</th>
									<th>Tanggal</th>
									<th>User</th>
									<th>Action</th>
									<th>Status</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($tracking as $key => $row) : ?>
								<tr>
									<td><?= $key + 1 ?>.</td>
									<td><?= date('d M Y h:i:s', strtotime($row->tanggal)) ?></td>
									<td><?= $row->nama ?></td>
									<td><?= $row->deskripsi ?></td>
									<td><?= status($row->status) ?></td>
								</tr>
								<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
