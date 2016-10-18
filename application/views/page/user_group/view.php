<?php $ug = $load_usergroup->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('user-group'); ?>">User Group Administration</a></li>
            <li class="active">View User Group</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">View User Group</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card-box">
                <div class="row m-t-10">
                    <div class="col-sm-12">
                    <div class="p-20">
                        <?php 
                        $attrib = array('class' => 'form-horizontal');
                        echo form_open('',$attrib); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Group</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" disabled value="<?php echo $ug[0]['definisi']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Status Aktif</label>
                                <!--<div class="col-sm-2">
                                    <select class="form-control select2" name="status" disabled>
										<option><?php echo $ug[0]['is_active']; ?></option>
                                    </select>
                                </div>-->
								<div class="col-sm-4">
                                    <input type="text" class="form-control" disabled value="<?php echo ($ug[0]['is_active']=='active' ? 'Aktif' : 'Tidak Aktif' ); ?>"/>
                                </div>
                            </div>
							
							<!--Start Foreach: Privilege' System-->
							<!--Conditional Logic: if login_only==1, there's only one menu existing-->
							<?php
								$i = 0;
								foreach($load_system->result() as $sy)
								{
							?>
                            <div class="form-group row">
                                <label class="col-sm-2">
									<?php
										if($i==0)
										{
									?>
									Privileges <!--<span class="text-danger">*</span>-->
									<?php
										}
										else echo "&nbsp;";
									?>
								</label>
                                <div class="col-sm-10">
                                    <table class="table table-bordered table-striped privilage">
										<thead>
										<tr>
											<th rowspan="2" width="50%" style="vertical-align: middle;text-align: center;">Module</th>
											<th colspan="4" style="text-align: center;"><?php echo $sy->definisi;?></th>
										</tr>
										<tr>
											<?php
												if($sy->login_only==1)//No CRUD, only access login_only
												{
											?>
											<th colspan="4" style="text-align: center;">Akses Login</th>
											<?php
												}
												else//CRUD exists
												{
											?>
											<th style="text-align: center;">Create</th>
											<th style="text-align: center;">Read</th>
											<th style="text-align: center;">Update</th>
											<th style="text-align: center;">Delete</th>
											<?php
												}
											?>
										</tr>
										</thead>
										<tbody>
										<?php
											$load_privilege_parent = $this->user_group_model->select_privilege_parent($sy->id);
											foreach($load_privilege_parent->result() as $pp)
											{
												//Check sub-menu existing
												$child_exists = '';
												$load_privilege_child	= '';
												if($pp->id_parent==NULL and $pp->nama_modul==NULL) //If no id_parent and no nama_modul -> check whether sub-menu is existing or not
												{
													$load_privilege_child = $this->user_group_model->select_privilege_child($sy->id,$pp->id);
													if($load_privilege_child->num_rows() > 0) //Sub-menu exists
													{
														$child_exists = 1;
													}
												}
										?>
											<tr>
												<th scope="row"><?php echo $pp->nama_menu;?></th>
												
												<!--Start: Load checkbox-->
												<?php
													if($child_exists=='') //if there's no sub-menu then load checkbox on parent's privilege
													{
														//Set data default
														$create	= 0;
														$read	= 0;
														$update	= 0;
														$delete	= 0;
														$login	= 0; 
														$load_matrix = '';
														
														//Check CRUD-Login value
														$load_matrix = $this->user_group_model->select_privilege_group($id_usergroup,$pp->id);
														if($load_matrix->num_rows() > 0)
														{
															$m = $load_matrix->row();
															if($m->action_create==1) $create = 1;
															if($m->action_read==1) $read = 1;
															if($m->action_update==1) $update = 1;
															if($m->action_delete==1) $delete = 1;
															if($m->action_login==1) $login = 1;
														}
														
														if($sy->login_only==1)//No CRUD, only access login_only
														{
												?>
												<td colspan="4">
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pp->id.'[]';?>" <?php echo ($login==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<?php
														}
														else //CRUD exists
														{
												?>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pp->id.'[]';?>" <?php echo ($create==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pp->id.'[]';?>" <?php echo ($read==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pp->id.'[]';?>" <?php echo ($update==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pp->id.'[]';?>" <?php echo ($delete==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<?php
														}
													}
													else //if sub-menu exists, don't load checkbox on parent's privilege
													{
												?>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<?php
													}
												?>
												<!--End: Load checkbox-->
											</tr>
											
											<!--Conditional Logic: login_only==1(no CRUD) then no sub-menu-->
											<!--If: Privilege's child exists-->
											<?php
												if($child_exists==1 and $sy->login_only==0) 
												{
													foreach($load_privilege_child->result() as $pc)
													{
														//Set data default
														$create_c	= 0;
														$read_c		= 0;
														$update_c	= 0;
														$delete_c	= 0;
														$login_c	= 0; 
														$load_matrix_c = '';
														
														//Check CRUD-Login value
														$load_matrix_c = $this->user_group_model->select_privilege_group($id_usergroup,$pc->id);
														if($load_matrix_c->num_rows() > 0)
														{
															$mc = $load_matrix_c->row();
															if($mc->action_create==1) $create_c = 1;
															if($mc->action_read==1) $read_c = 1;
															if($mc->action_update==1) $update_c = 1;
															if($mc->action_delete==1) $delete_c = 1;
															if($mc->action_login==1) $login_c = 1;
														}
											?>
											<tr>
												<td style="padding-left: 30px;"><?php echo $pc->nama_menu; ?></td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pc->id.'[]';?>" <?php echo ($create_c==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pc->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pc->id.'[]';?>" <?php echo ($read_c==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pc->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pc->id.'[]';?>" <?php echo ($update_c==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pc->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" name="checkbox_menu<?php echo $pc->id.'[]';?>" <?php echo ($delete_c==1)?"checked":"";?> disabled>
														<label for="checkbox_menu<?php echo $pc->id.'[]';?>">
														</label>
													</div>
												</td>
											</tr>
											<?php
													}
												}
											?>
											<!--EndIf: Privilege's child exists-->
										<?php
											}
										?>
										</tbody>
									</table>
                                </div>
                            </div>
							<?php
									$i++;
								}
							?>
							<!--End Foreach: Privilege' System-->
							
                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    <a href="<?php echo site_url('user-group'); ?>" class="btn btn-secondary waves-effect m-l-5">
										Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>