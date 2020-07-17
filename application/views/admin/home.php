<div class="row">
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-danger">
			<span class="info-box-icon"><i class="fa fa-wrench"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Open</span>
				<span class="info-box-number"><?= count($open) ?></span>
			</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-warning">
			<span class="info-box-icon"><i class="fas fa-check"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Fixed</span>
				<span class="info-box-number"><?= count($fixed) ?></span>
			</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-info">
			<span class="info-box-icon"><i class="fas fa-thumbs-down"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Re-Open</span>
				<span class="info-box-number"><?= count($re_open) ?></span>
			</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-success">
			<span class="info-box-icon"><i class="fas fa-thumbs-up"></i></span>
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
		<p><h5>Project Summary</h5></p>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped datatable" style="font-size: 10pt">
						<thead>
						<tr>
							<th>NO.</th>
							<th>Projcet</th>
							<th>Minor</th>
							<th>Major</th>
							<th>Critical</th>
							<th>Cosmetics</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($project as $key => $row) : ?>
						<tr>
							<td><?= $key + 1 ?>.</td>
							<td><?= $row->nama_project ?></td>
							<td><?= $row->minor ?></td>
							<td><?= $row->major ?></td>
							<td><?= $row->critical ?></td>
							<td><?= $row->cosmetics ?></td>
							<td>
								<a href="<?= site_url('home/project/'.$row->project_id) ?>" class="btn btn-xs btn-info"><i class="fa fa-check"></i> Pilih</a>
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
