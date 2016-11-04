<?php $data = $load_data->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('list-persetujuan'); ?>">List Persetujuan Administration</a></li>
            <li class="active">View List Persetujuan</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">View List Persetujuan</h4>
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
							$attrib = array('class' => 'form-horizontal');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">NIP</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" value="<?php echo $data[0]['nip']; ?>" name="nip" id="nip" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Nama Lengkap</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo $data[0]['nama_lengkap']; ?>" name="nama" id="nama" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Posisi</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" value="<?php echo $data[0]['posisi']; ?>" name="posisi" id="posisi" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Unit Kerja </label>
									<div class="col-sm-5">
										<input type="text" class="form-control" value="<?php echo $data[0]['unit_kerja']; ?>" id="unit_kerja" name="unit_kerja" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Biaya Minimum </label>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="<?php echo ($data[0]['biaya_minimum']==NULL?'':'Rp. '.number_format($data[0]['biaya_minimum'])); ?>" id="min" name="min" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Biaya Maksimum </label>
									<div class="col-sm-3">
										<input type="text" class="form-control" value="<?php echo ($data[0]['biaya_maksimum']==NULL?'':'Rp. '.number_format($data[0]['biaya_maksimum'])); ?>" id="max" name="max" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Status</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" value="<?php echo ($data[0]['is_active']=='active' ? 'Aktif' : 'Tidak Aktif' ); ?>" disabled />
									</div>
								</div>
								
								<div class="form-group">
									<div style="margin-top: 40px;">
										<hr>
										<a href="<?php echo site_url('list-persetujuan'); ?>" class="btn btn-secondary waves-effect m-l-5">
											Kembali
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