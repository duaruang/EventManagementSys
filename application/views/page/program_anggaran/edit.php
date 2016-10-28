<?php $d = $load_data->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('matriks-program-anggaran'); ?>">Matriks Program dan Anggaran Administration</a></li>
            <li class="active">Edit Matriks Program dan Anggaran</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit Matriks Program dan Anggaran</h4>
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
							$attrib = array('class' => 'form-horizontal','id' => 'form-edit-program-anggaran');
							echo form_open('',$attrib); ?>
								<input type="hidden" id="hidden-type" name="hidden-type" value="<?php echo $type;?>" >
								<input type="hidden" name="hidden-id" value="<?php echo $id;?>" >
								<?php 
									if($type==2 or $type==3)
									{ 
								?>
								<div class="form-group row">
									<label class="col-sm-2">Bisnis Unit (lv1) <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select id="root" class="form-control select2" required name="id_root">
										<?php
											foreach($load_level1->result() as $l1)
											{
										?>
										<option value="<?php echo $l1->id;?>" <?php echo ($l1->id==$bisnis_unit_id?'selected':''); ?>><?php echo $l1->deskripsi;?></option>
										<?php
											}
										?>
										</select>
									</div>
								</div>
								<?php 
									} 
								?>
								<?php 
									if($type==3)
									{ 
								?>
								<div class="form-group row">
									<label class="col-sm-2">Kategori Program (lv2) <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<div id="content-lv2">
										<select class="form-control select2" id="parent" required name="id_parent">
										<?php
											foreach($load_level2->result() as $l2)
											{
										?>
										<option value="<?php echo $l2->id;?>" <?php echo ($l2->id==$kategori_program_id?'selected':''); ?>><?php echo $l2->deskripsi;?></option>
										<?php
											}
										?>
										</select>
										</div>
									</div>
								</div>
								<?php 
									} 
								?>
								<div class="form-group row">
									<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo $d[0]['deskripsi']?>" name="deskripsi" required />
									</div>
								</div>
								<?php
									if($type!=3)
									{
								?>
								<div class="form-group row">
									<label class="col-sm-2">Budget</label>
									<div class="col-sm-4">
										<input type="text" id="budget" class="form-control autonumber" data-a-sign="Rp. " value="<?php echo $d[0]['budget']?>" name="budget" />
									</div>
								</div>
								<?php
									}
								?>
								<div class="form-group row">
									<label class="col-sm-2">Status <span class="text-danger">*</span></label>
									<div class="col-sm-2">
										<select class="form-control select2" name="status" required>
											<option value="active" <?php echo ($d[0]['is_active']=='active' ? "selected" : "");?>>Aktif</option>
											<option value="disabled" <?php echo ($d[0]['is_active']=='disabled' ? "selected" : "");?>>Tidak Aktif</option>
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