<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('matriks-program-anggaran'); ?>">Matriks Program & Anggaran Administration</a></li>
            <li class="active">Tambah Matriks Program & Anggaran</li>
        </ol>
    </div>
</div>

<div class="container"> 

	<!-- Page-Title -->
	<!-- Form: Tambah Matriks Program & Anggaran Level 1-->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Bisnis Unit (Level 1)</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group" id="loader1" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: rgba(255,255,255,0.9);z-index: 1000;">
			<img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif">
            </div>
            <div class="card-box">
                <div class="row m-t-10">
                    <div class="col-sm-12">
						<div class="p-20">
							<?php 
							$attrib = array('class' => 'form-horizontal','id'=>'form-add-level1');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="deskripsi"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Budget</label>
									<div class="col-sm-4">
										<input type="text" placeholder="" data-a-sign="Rp. " id="budget1" name="budget" class="form-control autonumber">
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
										<a href="<?php echo site_url('matriks-program-anggaran'); ?>" class="btn btn-secondary waves-effect m-l-5">
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
	
	
	<!-- Form: Tambah Matriks Program & Anggaran Level 2-->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Kategori Program (Level 2)</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group" id="loader2" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: rgba(255,255,255,0.9);z-index: 1000;">
			<img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif">
            </div>
            <div class="card-box">
                <div class="row m-t-10">
                    <div class="col-sm-12">
						<div class="p-20">
							<?php 
							$attrib = array('class' => 'form-horizontal','id'=>'form-add-level2');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">Bisnis Unit (lv1)  <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select id="level1" class="form-control select2" required name="id_parent">
										<option value="">--pilih bisnis unit--</option>
										<?php
											foreach($load_level1->result() as $l1)
											{
										?>
										<option value="<?php echo $l1->id;?>"><?php echo $l1->deskripsi;?></option>
										<?php
											}
										?>
										</select>
									</div>
								</div>
								<div id="detail-lv1"></div>
								<div class="form-group row">
									<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="deskripsi"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Budget</label>
									<div class="col-sm-4">
										<input type="text" placeholder="" data-a-sign="Rp. " id="budget2" name="budget" class="form-control autonumber">
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
										<a href="<?php echo site_url('matriks-program-anggaran'); ?>" class="btn btn-secondary waves-effect m-l-5">
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
	
	
	<!-- Form: Tambah Matriks Program & Anggaran Level 3-->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Program (Level 3)</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group" id="loader3" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: rgba(255,255,255,0.9);z-index: 1000;">
			<img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif">
            </div>
            <div class="card-box">
                <div class="row m-t-10">
                    <div class="col-sm-12">
						<div class="p-20">
							<?php 
							$attrib = array('class' => 'form-horizontal','id'=>'form-add-level3');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">Kategori Program (lv2)  <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select id="level2" class="form-control select2" required name="id_parent">
										<option value="">--pilih kategori program--</option>
										<?php
											foreach($load_level2->result() as $l2)
											{
										?>
										<option value="<?php echo $l2->id;?>"><?php echo $l2->deskripsi;?></option>
										<?php
											}
										?>
										</select>
									</div>
									<div id="detail-lv2" class="col-sm-6"></div>
								</div>
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
										<a href="<?php echo site_url('matriks-program-anggaran'); ?>" class="btn btn-secondary waves-effect m-l-5">
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