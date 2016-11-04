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
				<li <?php echo ($submenu_exists==1?"class='has-submenu'":"");?>>
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
								$sub_submenu_exists = '';
								$load_sub_submenu	= '';
								$load_sub_submenu = $this->menu_model->select_menubar_submenu($sm->id);
								if($load_sub_submenu->num_rows() > 0) //Sub Sub-menu exists
								{
									$sub_submenu_exists = 1;
								}
					?>
					<li <?php echo ($sub_submenu_exists==1?"class='has-submenu'":"");?>>
						<?php if($sub_submenu_exists==''){?><a href="<?php echo ($sm->nama_modul=='' or $sm->nama_modul==NULL)? "" : site_url($sm->nama_modul); ?>"><?php echo $sm->nama_menu;?></a>
						<?php } else { ?><a><?php echo $sm->nama_menu;?></a><?php } ?>
						<?php if($sub_submenu_exists==1){ ?>
						<ul class="submenu">
							<?php foreach($load_sub_submenu->result() as $ssm){?>
							<li><a href="<?php echo ($ssm->nama_modul=='' or $ssm->nama_modul==NULL)? "" : site_url($ssm->nama_modul); ?>"><?php echo $ssm->nama_menu;?></a></li>
							<?php } ?>
						</ul>
						<?php } ?>
					</li>
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
			</ul>
			<!-- End navigation menu  -->
		</div>
	</div>
</div>
<style>
	#topnav .navigation-menu > li .submenu > li.has-submenu > a:after {top:12px;}
</style>