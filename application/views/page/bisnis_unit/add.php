<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('bisnis-unit-jabatan'); ?>">Bisnis Unit dan Jabatan Administration</a></li>
            <li class="active">Tambah Bisnis Unit dan Jabatan</li>
        </ol>
    </div>
</div>

<div class="container"> 

	<!-- Page-Title -->
	<!-- Form: Tambah Bisnis Unit(Parent)-->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Bisnis Unit</h4>
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
							$attrib = array('class' => 'form-horizontal','id'=>'form-add-bisnis-unit');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="deskripsi"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Status <span class="text-danger">*</span></label>
									<div class="col-sm-2">
										<select class="form-control select2" required name="status">
										<option value="">--pilih status--</option>
										<option value="active">Aktif</option>
										<option value="disabled">Tidak Aktif</option>
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
	
	
	<!-- Page-Title -->
	<!-- Form: Tambah Child Jabatan-->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Jabatan</h4>
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
							$attrib = array('class' => 'form-horizontal','id'=>'form-add-jabatan');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">Bisnis Unit <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class="form-control select2" required name="bisnis_unit">
										<option value="">--pilih bisnis unit--</option>
										<?php
											if($load_bisnis->num_rows() > 0)
											{
												foreach($load_bisnis->result() as $b)
												{
										?>
										<option value="<?php echo $b->id;?>"><?php echo $b->deskripsi;?></option>
										<?php
												}
											}
										?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Nama Jabatan <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="nama_jabatan"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Status <span class="text-danger">*</span></label>
									<div class="col-sm-2">
										<select class="form-control select2" required name="status">
										<option value="">--pilih status--</option>
										<option value="active">Aktif</option>
										<option value="disabled">Tidak Aktif</option>
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