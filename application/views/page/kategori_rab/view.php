<?php $r = $load_rab->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('kategori-rab'); ?>">Kategori RAB Administration</a></li>
            <li class="active">View Kategori RAB</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">View Kategori RAB</h4>
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
								<?php 
									if($r[0]['id_parent']!=NULL or $r[0]['id_parent']!='')
									{ 
										$load_kategori = $this->kategori_rab_model->select_category_id($r[0]['id_parent']);
										
										if($load_kategori->num_rows() > 0)
										{
											$k = $load_kategori->result_array();
								?>
								<div class="form-group row">
									<label class="col-sm-2">Kategori Utama</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo $k[0]['deskripsi']?>" disabled />
									</div>
								</div>
								<?php 
										}
									} 
								?>
								<div class="form-group row">
									<label class="col-sm-2">Deskripsi</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo $r[0]['deskripsi']?>" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">unit</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="jumlah_unit" value="<?php echo $r[0]['jumlah_unit']?>" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">frekwensi </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="frekwensi" value="<?php echo $r[0]['frekwensi']?>" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Status</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" value="<?php echo ($r[0]['is_active']=='active' ? 'Aktif' : 'Tidak Aktif' ); ?>" disabled />
									</div>
								</div>
								
								<div class="form-group">
									<div style="margin-top: 40px;">
										<hr>
										<a href="<?php echo site_url('kategori-rab'); ?>" class="btn btn-secondary waves-effect m-l-5">
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