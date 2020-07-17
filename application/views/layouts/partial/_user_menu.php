<li class="nav-item">
	<a href="<?= site_url('user/home') ?>" class="nav-link">
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
			<a href="<?= site_url('user/ticket/create') ?>" class="nav-link">
				<i class="fa fa-plus nav-icon"></i>
				<p>Add Ticket</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= site_url('user/ticket') ?>" class="nav-link">
				<i class="fa fa-list nav-icon"></i>
				<p>List Ticket</p>
			</a>
		</li>
		<!-- <li class="nav-item">
			<a href="<?= site_url('user/assignements') ?>" class="nav-link">
				<i class="nav-icon fas fa-archive"></i>
				<p>
					Assignements
					<?= badge_assignemen($this->session->userdata('id')) ?>
				</p>
			</a>
		</li> -->
	</ul>
</li>
