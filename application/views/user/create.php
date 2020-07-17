<div class="row">
	<div class="col-md-12">
		<div class="card card-outline card-info">
			<div class="card-header">
				<h3 class="card-title">Form Create</h3>
				<div class="card-tools">
					<a href="<?= site_url('user/ticket') ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<form action="<?= site_url('user/ticket/store') ?>" method="post">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Nama <span class="text-danger">*</span></label>
								<input type="text" name="problem_summary" class="form-control form-control-sm" required>
							</div>
							<div class="form-group">
								<label for="">Project <span class="text-danger">*</span></label>
								<select name="project_id" class="form-control form-control-sm" required>
									<option value="" selected disabled>Pilih</option>
									<?php foreach ($project as $row) : ?>
										<option value="<?= $row->id_project ?>"><?= $row->nama_project ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Modul <span class="text-danger">*</span></label>
								<select name="modul_id" class="form-control form-control-sm" required>
									<option value="" selected disabled>Pilih</option>
									<?php foreach ($modul as $row) : ?>
										<option value="<?= $row->id_modul ?>"><?= $row->nama_modul ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Defact Category <span class="text-danger">*</span></label>
								<select name="defact_category" class="form-control form-control-sm" required>
									<option value="" selected disabled>Pilih</option>
									<option value="minor" >Minor</option>
									<option value="major" >Major</option>
									<option value="critical" >Critical</option>
									<option value="cosmetics" >Cosmetics</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Prioriti <span class="text-danger">*</span></label>
								<select name="prioriti" class="form-control form-control-sm" required>
									<option value="" selected disabled>Pilih</option>
									<option value="hight" >Hight</option>
									<option value="medium" >Medium</option>
									<option value="low" >Low</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Description <span class="text-danger">*</span></label>
								<textarea name="problem_detail" class="form-control form-control-sm" cols="30" rows="4" required></textarea>
							</div>
						</div>
					</div>

					<div class="form-group pull-right">
						<button type="submit" class="btn btn-info btn-sm pull-right"><i class="fa fa-save"></i> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
