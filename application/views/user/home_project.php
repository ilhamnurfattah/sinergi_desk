<div class="row">
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-info">
			<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Open</span>
				<span class="info-box-number"><?= count($open) ?></span>
			</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-success">
			<span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Fixed</span>
				<span class="info-box-number"><?= count($fixed) ?></span>
			</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-warning">
			<span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Re-Open</span>
				<span class="info-box-number"><?= count($re_open) ?></span>
			</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-danger">
			<span class="info-box-icon"><i class="fas fa-times"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Closed</span>
				<span class="info-box-number"><?= count($closed) ?></span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<p><h5>Category</h5></p>
		<div class="card">
			<div class="card-body">
				<div class="chart">
					<canvas id="cart-category" style="min-height: 250px; height: 250px; max-height: 100%px; max-width: 100%;"></canvas>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<p><h5>Progress</h5></p>
		<div class="card">
			<div class="card-body">
				<div class="chart">
					<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 100%px; max-width: 100%;"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p><h5>All Modul Summary</h5></p>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped datatable" style="font-size: 10pt">
						<thead>
						<tr>
							<th>NO.</th>
							<th>Modul</th>
							<th>Minor</th>
							<th>Major</th>
							<th>Citical</th>
							<th>Cosmetics</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($modul as $key => $row) : ?>
						<tr>
							<td><?= $key + 1 ?>.</td>
							<td><?= $row->nama_modul ?></td>
							<td><?= $row->minor ?></td>
							<td><?= $row->major ?></td>
							<td><?= $row->critical ?></td>
							<td><?= $row->cosmetics ?></td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p><h5>Category Summary</h5></p>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped datatable" style="font-size: 10pt">
						<thead>
						<tr>
							<th>NO.</th>
							<th>Modul</th>
							<th>Need Confirmation</th>
							<th>Open</th>
							<th>Fixed</th>
							<th>Re-Open</th>
							<th>Closed</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($status_modul as $key => $row) : ?>
							<tr>
								<td><?= $key + 1 ?>.</td>
								<td><?= $row->nama_modul ?></td>
								<td><?= $row->need_confirmation ?></td>
								<td><?= $row->open ?></td>
								<td><?= $row->fixed ?></td>
								<td><?= $row->re_open ?></td>
								<td><?= $row->closed ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<a href="<?= site_url('user/home') ?>" class="btn btn-danger btn-sm" style="margin-bottom: 5px"><i class="fa fa-arrow-circle-left"></i> Back</a>
	</div>
</div>
<!--cart-->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<script>
    var ctx = document.getElementById('barChart');
    var category = document.getElementById('cart-category');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            // labels: {!! json_encode($hasil2['suplier']) !!},
            labels: ['Open','Fixed','Re-Open','Closed'],
            datasets: [{
                label: '# of Votes',
                // data: {{ json_encode($hasil2['data']) }},
                data: [<?= count($open) ?>,<?= count($fixed) ?>,<?= count($re_open) ?>,<?= count($closed) ?>],
                label               : 'Progress',
                backgroundColor     : 'rgba(54, 162, 235, 0.2)',
                borderColor         : 'rgba(54, 162, 235, 1)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var myCategory = new Chart(category, {
        type: 'bar',
        data: {
            labels: ['Minor','Major','Critical','Cosmetics'],
            datasets: [{
                label: '# of Votes',
                data: [<?= count($minor) ?>,<?= count($major) ?>,<?= count($critical) ?>,<?= count($cosmetics) ?>],
                label               : 'Category',
                backgroundColor     : 'rgba(54, 162, 235, 0.2)',
                borderColor         : 'rgba(54, 162, 235, 1)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
