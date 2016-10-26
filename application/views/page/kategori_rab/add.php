<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('kategori-rab'); ?>">Kategori RAB Administration</a></li>
            <li class="active">Tambah Kategori RAB</li>
        </ol>
    </div>
</div>

<div class="container"> 

	<!-- Page-Title -->
	<!-- Form: Tambah Judul(Parent) Kategori RAB-->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Kategori RAB</h4>
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
							$attrib = array('class' => 'form-horizontal','id'=>'form-add-rab-parent');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="deskripsi"/>
									</div>
								</div>
								<!--
								<div class="form-group row">
									<label class="col-sm-2">unit <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="jumlah_unit" placeholder="unit/pcs/item/pax" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">frekwensi <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="frekwensi" placeholder="kali/hari"/>
									</div>
								</div>
								-->
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
										<a href="<?php echo site_url('kategori-rab'); ?>" class="btn btn-secondary waves-effect m-l-5">
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
	<!-- Form: Tambah Child Kategori RAB-->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Sub-Kategori RAB</h4>
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
							$attrib = array('class' => 'form-horizontal','id'=>'form-add-rab-child');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">Kategori Utama <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class="form-control select2" required name="parent">
										<option value="">--pilih kategori--</option>
										<?php
											if($load_parent->num_rows() > 0)
											{
												foreach($load_parent->result() as $p)
												{
										?>
										<option value="<?php echo $p->id;?>"><?php echo $p->deskripsi;?></option>
										<?php
												}
											}
										?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="deskripsi"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">unit <span class="text-danger">*</span></label>
									<div class="col-sm-2">
										<input type="text" class="form-control" required name="jumlah_unit" placeholder="contoh : unit/pax/pcs" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">frekwensi <span class="text-danger">*</span></label>
									<div class="col-sm-2">
										<input type="text" class="form-control" required name="frekwensi" placeholder="contoh : hari/kali" />
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
										<a href="<?php echo site_url('kategori-rab'); ?>" class="btn btn-secondary waves-effect m-l-5">
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