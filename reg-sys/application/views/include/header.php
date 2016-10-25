<div class="topbar-main">
	<div class="container">

		<!-- LOGO -->
		<div class="topbar-left">
			<a href="<?php echo base_url(); ?>" class="logo">
				<img class="logo-head" src="<?php echo base_url(); ?>assets/images/logo-pnm.png">
				<span>Registration Event</span>
			</a>
		</div>
		<!-- End Logo container-->

		
		<div class="menu-extras">

			<ul class="nav navbar-nav pull-right">
				
				<li class="nav-item">
					<!-- Mobile menu toggle-->
					<a class="navbar-toggle">
						<div class="lines">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</a>
					<!-- End mobile menu toggle-->
				</li>

				<!--
				<li class="nav-item dropdown notification-list">
					<a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
					   aria-haspopup="false" aria-expanded="false">
						<i class="zmdi zmdi-notifications-none noti-icon"></i>
						<span class="noti-icon-badge"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
						<div class="dropdown-item noti-title">
							<h5><small><span class="label label-danger pull-xs-right">7</span>Notification</small></h5>
						</div>
						<a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
							View All
						</a>

					</div>
				</li>

				<li class="nav-item dropdown notification-list">
					<a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);">
						<i class="zmdi zmdi-format-subject noti-icon"></i>
					</a>
				</li>
				-->
				
				<li class="nav-item dropdown notification-list">
					<a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
					   aria-haspopup="false" aria-expanded="false">
						<?php if($this->session->userdata('sess_user_foto') == NULL){ ?>
							<img src="<?php echo base_url(); ?>assets/images/UserImage.png" alt="user" class="img-circle">
						<?php }else{ ?>
							<img src="<?php echo $this->session->userdata('sess_user_foto'); ?>" alt="photo" class="img-circle">
						<?php } ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
						<!-- item-->
						<div class="dropdown-item noti-title">
							<h5 class="text-overflow"><small><?php echo $this->session->userdata('sess_user_nama'); ?></small> </h5>
						</div>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
						</a>

						<!-- 
						<a href="<?php echo site_url('setting'); ?>" class="dropdown-item notify-item">
							<i class="zmdi zmdi-settings"></i> <span>Settings</span>
						</a>
						-->
						
						<!-- item-->
						<a href="<?php echo site_url('signout'); ?>" class="dropdown-item notify-item">
							<i class="zmdi zmdi-power"></i> <span>Logout</span>
						</a>

					</div>
				</li>

			</ul>

		</div> <!-- end menu-extras -->
		<div class="clearfix"></div>

	</div> <!-- end container -->
</div>
<!-- end topbar-main -->