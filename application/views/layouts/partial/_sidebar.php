<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="<?= base_url('assets/dist/img/logo_small.jpg') ?>" alt="Logo"
			 class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">PT.SINERGI</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>assets/dist/img/avatar5.png" class="img-circle elevation-2"
					 alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->session->userdata('nama') ? $this->session->userdata('nama') : '-'  ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<?php if ($this->session->userdata('level') == 'admin') : ?>
					<?php include '_admin_menu.php'; ?>
				<?php elseif (($this->session->userdata('level') == 'user')) : ?>
					<?php include '_user_menu.php'; ?>
				<?php elseif (($this->session->userdata('level') == 'dev')) : ?>
					<?php include '_dev_menu.php'; ?>
				<?php else : ?>
					<?php include '_pm_menu.php'; ?>
				<?php endif; ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
