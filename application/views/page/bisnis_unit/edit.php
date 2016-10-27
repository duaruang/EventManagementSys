<?php $data = $load_data->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('bisnis-unit-jabatan'); ?>">Bisnis Unit dan Jabatan Administration</a></li>
            <li class="active">Edit Bisnis Unit dan Jabatan</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit Bisnis Unit dan Jabatan</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
			<div class="form-group" id="loader" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: rgba(255,255,255,0.9);z-index: 1000;">
				<img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif">
            </div>
            <div class="card-box">
                <div class="row m-t-10">
					<div class="col-sm-12">
						<div class="p-20">
							<?php 
							$attrib = array('class' => 'form-horizontal','id'=>'form-edit-bisnis-jabatan');
							echo form_open('',$attrib); ?>
								<input type="hidden" id="hidden-id" name="hidden-id" value="<?php echo $id;?>" />
								<input type="hidden" id="hidden-type" name="hidden-type" value="<?php echo $type;?>" />
								<?php 
									$data = $load_data->result_array();
									
									if($type==1) //Bisnis Unit View
									{ 
								?>
								<div class="form-group row">
									<label class="col-sm-2">Deskripsi</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="deskripsi" value="<?php echo $data[0]['deskripsi']?>" />
									</div>
								</div>
								<?php 
									} 
									else //Jabatan View
									{
								?>
								<div class="form-group row">
									<label class="col-sm-2">Bisnis Unit</label>
									<div class="col-sm-4">
										<select class="form-control select2" required name="bisnis_unit">
										<option value="">--pilih bisnis unit--</option>
										<?php
											if($load_bisnis->num_rows() > 0)
											{
												foreach($load_bisnis->result() as $b)
												{
										?>
										<option value="<?php echo $b->id;?>" <?php if($data[0]['id_bisnis_unit']==$b->id) echo 'selected'; ?>><?php echo $b->deskripsi;?></option>
										<?php
												}
											}
										?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Nama Jabatan</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="nama_jabatan" value="<?php echo $data[0]['nama_jabatan']?>" />
									</div>
								</div>
								<?php
									}
								?>
								<div class="form-group row">
									<label class="col-sm-2">Status</label>
									<div class="col-sm-2">
										<select class="form-control select2" required name="status">
										<option value="active" <?php if($data[0]['is_active']=='active') echo 'selected';?>>Aktif</option>
										<option value="disabled" <?php if($data[0]['is_active']=='disabled') echo 'selected';?>>Tidak Aktif</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<div style="margin-top: 40px;">
										<hr>
										<button type="submit" class="btn btn-primary waves-effect waves-light">
											Save
										</button>
										<a href="<?php echo site_url('bisnis-unit-jabatan'); ?>" class="btn btn-secondary waves-effect m-l-5">
											Cancel
										</a>
									</div>
								</div>
							<?php echo form_close(); ?>
						</div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>