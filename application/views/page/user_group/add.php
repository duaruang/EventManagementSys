<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('user-group'); ?>">User Group Administration</a></li>
            <li class="active">Tambah User Group</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah User Group</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card-box">
                <div class="row m-t-10">
                    <div class="col-sm-12">
                    <?php
                    $s_message = '';
                    $s_message = $this->session->flashdata('message_success');
                    if($s_message)
                    {
                    ?>
                   <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Well done!</strong> <?php echo $s_message;?>
                    </div>
                    <?php
                        }
                        
                        $e_message = '';
                        $e_message = $this->session->flashdata('message_error');
                        if($e_message)
                        {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Well done!</strong> <?php echo $s_message;?>
                    </div>
                    <?php
                        }
                    ?>
                    <div id="m-ap-cab"></div>
                    <div class="p-20">
                        <?php 
                        $attrib = array('class' => 'form-horizontal','id' => 'form-add-usergroup');
                        echo form_open('',$attrib); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Group <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="group_name" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Status Aktif <span class="text-danger">*</span></label>
                                <div class="col-sm-2">
                                    <select class="form-control select2" name="status" required>
										<option value="">--pilih status--</option>
										<option value="active">Aktif</option>
										<option value="disabled">Tidak Aktif</option>
                                    </select>
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
										<!--Start: Global Privilege (login_only==0, CRUD exists)-->
										<?php
											if($sy->login_only==0)
											{
										?>
											<tr>
												<th scope="row">Global Privileges</th>
												<td colspan="4">
													<div class="checkbox checkbox-primary">
														<input class="global-checkbox" data-idsystemglobal="<?php echo $sy->id;?>" type="checkbox" name="global-checkbox">
														<label class="l_global" for="global-checkbox"><span class="s_global">Check All</span>
														</label>
													</div>
												</td>
											</tr>
										<?php
											}
										?>
										<!--End: Global Privilege-->
										
										<?php
											$load_privilege_parent = $this->user_group_model->select_privilege_parent($sy->id);
											foreach($load_privilege_parent->result() as $pp)
											{
												//Set default data
												$id_menuactive = '';
												
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
														//Set id menu from parent if there's no sub-menu
														$id_menuactive = $pp->id;
														
														if($sy->login_only==1)//No CRUD, only access login_only
														{
												?>
												<td colspan="4">
													<div class="checkbox checkbox-primary">
														<input type="checkbox" data-idsystem="<?php echo $sy->id;?>" value="5" name="checkbox_menu<?php echo $pp->id.'[]';?>">
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
														<input data-idsystem="<?php echo $sy->id;?>" type="checkbox" value="1" name="checkbox_menu<?php echo $pp->id.'[]';?>">
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" data-idsystem="<?php echo $sy->id;?>" value="2" name="checkbox_menu<?php echo $pp->id.'[]';?>">
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" data-idsystem="<?php echo $sy->id;?>" value="3" name="checkbox_menu<?php echo $pp->id.'[]';?>">
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" data-idsystem="<?php echo $sy->id;?>" value="4" name="checkbox_menu<?php echo $pp->id.'[]';?>">
														<label for="checkbox_menu<?php echo $pp->id.'[]';?>">
														</label>
													</div>
												</td>
												<?php
														}
												?>
												<!--Hidden Fields-->
												<input type="hidden" name="id_menuactive[]" value=<?php echo $id_menuactive;?>>
												<?php
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
														//Set id menu from sub-menu (sub-menu exists)
														$id_menuactive = $pc->id;
											?>
											<tr>
												<td style="padding-left: 30px;"><?php echo $pc->nama_menu; ?></td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" data-idsystem="<?php echo $sy->id;?>" value="1" name="checkbox_menu<?php echo $pc->id.'[]';?>">
														<label for="checkbox_menu<?php echo $pc->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" data-idsystem="<?php echo $sy->id;?>" value="2" name="checkbox_menu<?php echo $pc->id.'[]';?>">
														<label for="checkbox_menu<?php echo $pc->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" data-idsystem="<?php echo $sy->id;?>" value="3" name="checkbox_menu<?php echo $pc->id.'[]';?>">
														<label for="checkbox_menu<?php echo $pc->id.'[]';?>">
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-primary">
														<input type="checkbox" data-idsystem="<?php echo $sy->id;?>" value="4" name="checkbox_menu<?php echo $pc->id.'[]';?>">
														<label for="checkbox_menu<?php echo $pc->id.'[]';?>">
														</label>
													</div>
												</td>
											</tr>
											
											<!--Hidden Fields-->
											<input type="hidden" name="id_menuactive[]" value=<?php echo $id_menuactive;?>>
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
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Save
                                    </button>
                                    <a href="<?php echo site_url('user-group'); ?>" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
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