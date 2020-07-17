<li class="nav-item">
	<a href="<?= site_url('dev/home') ?>" class="nav-link">
		<i class="nav-icon fas fa-tachometer-alt"></i>
		<p>
			Dashboard
		</p>
	</a>
</li>
<li class="nav-item">
	<a href="<?= site_url('dev/assignements') ?>" class="nav-link">
		<i class="nav-icon fas fa-archive"></i>
		<p>
			Assignements
			<?= badge_assignemen($this->session->userdata('id')) ?>
		</p>
	</a>
</li>
