<div class="navbar-custom">
	<div class="container">
		<div id="navigation">
			<!-- Navigation Menu-->
			<ul class="navigation-menu">
				<?php
				foreach($load_menubar->result() as $mn) //Foreach menubar
				{
					//Check sub-menu existing
					$submenu_exists = '';
					$load_submenu	= '';
					if($mn->id_parent==NULL and $mn->nama_modul==NULL) //If no id_parent and no nama_modul -> check whether sub-menu is existing or not
					{
						$load_submenu = $this->menu_model->select_menubar_submenu($mn->id);
						if($load_submenu->num_rows() > 0) //Sub-menu exists
						{
							$submenu_exists = 1;
						}
					}
				?>
				<li <?php echo ($submenu_exists==1)?"class='has-submenu'":"";?>>
					<?php
					if($mn->modul_homepage==1) //link redirect to homepage
					{
					?>
					<a href="<?php echo base_url(); ?>">
					<?php
					}
					else //link not redirect to homepage
					{
						if($mn->nama_modul!=NULL) //link exists attached to current menu
						{
					?>
					<a href="<?php echo site_url($mn->nama_modul); ?>">
					<?php
						}
						else echo "<a style='cursor:pointer'>"; //no link exists attached to current menu
					}
					?>
						<i class="<?php echo $mn->icon_menu;?>"></i> <span> <?php echo $mn->nama_menu;?> </span> 
					</a>
					
					
					<!-- If: sub-menu exists -->
					<?php
						if($submenu_exists==1)
						{
					?>
					<ul class="submenu">
					<?php
							foreach($load_submenu->result() as $sm)
							{
					?>
					<li><a href="<?php echo ($sm->nama_modul=='' or $sm->nama_modul==NULL)? "" : site_url($sm->nama_modul); ?>"><?php echo $sm->nama_menu;?></a></li>
					<?php
							}
					?>
					</ul>
					<?php
						}
					?>
					<!-- EndIf: sub-menu exists -->
					
				</li>
					
				<?php
				} //End foreach menubar
				?>
				
				
				<!--
				<li>
					<a href="<?php echo base_url(); ?>"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
				</li>
				<li class="has-submenu">
					<a href="<?php echo site_url(); ?>"><i class="zmdi zmdi-collection-text"></i><span> Privilage </span> </a>
					<ul class="submenu">
						<li><a href="<?php echo site_url('users'); ?>">User</a></li>
						<li><a href="<?php echo site_url('user-group'); ?>">User Group</a></li>
						<li><a href="<?php echo site_url('menu'); ?>">Menu</a></li>  
					</ul>
				</li>

				<li class="has-submenu">
					<a href="<?php echo site_url(); ?>"><i class="zmdi zmdi-collection-text"></i><span> Master Data </span> </a>
					<ul class="submenu">
						<li><a href="<?php echo site_url(); ?>">Matriks Program &amp; Anggaran</a></li>
						<li><a href="<?php echo site_url('trainer'); ?>">Trainer</a></li>
						<li><a href="<?php echo site_url('klasifikasi-materi'); ?>">Klasifikasi Materi</a></li>
						<li><a href="<?php echo site_url('materi'); ?>">Materi</a></li>
						<li><a href="<?php echo site_url('kategori-event'); ?>">Kategori Event</a></li>
						<li><a href="<?php echo site_url('tipe-pelatihan'); ?>">Tipe Pelatihan</a></li>
						<li><a href="<?php echo site_url('cabang'); ?>">Cabang</a></li>
						<li><a href="<?php echo site_url('divisi'); ?>">Divisi</a></li>
					</ul>
				</li>

				<li class="has-submenu">
					<a href="<?php echo site_url(); ?>"><i class="zmdi zmdi-collection-text"></i><span> Event </span> </a>
					<ul class="submenu">
						<li><a href="<?php echo site_url('propose'); ?>">Pengajuan Event</a></li>
						<li><a href="<?php echo site_url(); ?>">Persetujuan Memo Event</a></li>
						<li><a href="<?php echo site_url(); ?>">Data Validasi &amp; Persetujuan Event</a></li>
					</ul>
				</li>

				<li class="has-submenu">
					<a href="<?php echo site_url(); ?>"><i class="zmdi zmdi-format-list-bulleted"></i> <span> Realisasi </span> </a>
					<ul class="submenu">
						<li><a href="<?php echo site_url(); ?>">Realisasi Event</a></li>
						<li><a href="<?php echo site_url(); ?>">Persetujuan Pertanggung Jawaban</a></li>
						<li><a href="<?php echo site_url(); ?>">Verifikasi Pertanggung Jawaban</a></li>
					</ul>
				</li>

				<li class="has-submenu">
					<a href="<?php echo site_url(); ?>"><i class="zmdi zmdi-chart"></i><span> Feedback </span> </a>
					<ul class="submenu">
						<li><a href="<?php echo site_url(); ?>">Kegiatan</a></li>
						<li><a href="<?php echo site_url(); ?>">Materi</a></li>
						<li><a href="<?php echo site_url(); ?>">Realisasi Event &amp; RKAP</a></li>
						<li><a href="<?php echo site_url(); ?>">Feedback</a></li>
					</ul>
				</li>

				<li>
					<a href="<?php echo site_url(); ?>"><i class="zmdi zmdi-collection-item"></i><span> Registrasi Event </span> </a>
				</li>

				<li>
					<a href="<?php echo site_url('audit-trail'); ?>"><i class="zmdi zmdi-collection-item"></i><span> Audit Trail </span> </a>
				</li>
				-->
			</ul>
			<!-- End navigation menu  -->
		</div>
	</div>
</div>