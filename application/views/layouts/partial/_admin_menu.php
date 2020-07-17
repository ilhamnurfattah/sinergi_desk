<li class="nav-item">
	<a href="<?= site_url('home') ?>" class="nav-link">
		<i class="nav-icon fas fa-tachometer-alt"></i>
		<p>
			Dashboard
		</p>
	</a>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fa fa-ticket-alt"></i>
		<p>
			Ticket
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?= site_url('ticket/create') ?>" class="nav-link">
				<i class="fa fa-plus nav-icon"></i>
				<p>Add Ticket</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('ticket') ?>" class="nav-link">
				<i class="fa fa-list nav-icon"></i>
				<p>List Ticket</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('user/ticket') ?>" class="nav-link">
				<i class="fa fa-list nav-icon"></i>
				<p>My Ticket</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('ticket/aproval') ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>
					Ticket Approval
					<?= bagde_aproval() ?>
				</p>
			</a>
		</li>
	</ul>
</li>
<li class="nav-item">
	<a href="<?= site_url('assignements') ?>" class="nav-link">
		<i class="nav-icon fas fa-archive"></i>
		<p>
			Assignements
			<?= badge_assignemen() ?>
		</p>
	</a>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fa fa-cog"></i>
		<p>
			Preference
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?= site_url('project') ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Project</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('modul') ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Modul</p>
			</a>
		</li>
	</ul>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fa fa-user-secret"></i>
		<p>
			Administrator
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?= site_url('admin/user') ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>User Management</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('admin/karyawan') ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Employee</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('admin/departemen') ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Departemen</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('admin/posisi') ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Posisi</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('admin/developer') ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Developer</p>
			</a>
		</li>
	</ul>
</li>
