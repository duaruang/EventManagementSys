<?php $t = $load_trainer->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('trainer-eksternal'); ?>">Trainer Eksternal Administration</a></li>
            <li class="active">View Trainer Eksternal</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">View Trainer Eksternal</h4>
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
                                <label class="col-sm-2">Nama Pemateri</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $t[0]['nama_pemateri']?>" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Perusahaan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $t[0]['nama_perusahaan']?>" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Status</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="<?php echo ($t[0]['is_active']=='active' ? 'Aktif' : 'Tidak Aktif' ); ?>" disabled />
                                </div>
                            </div>
							<div class="form-group row">
								<?php
									//Load files which status is active
									if($load_files->num_rows() > 0)
									{
										$i = 0;
										foreach($load_files->result() as $f)
										{
											if($i==0) echo "<label class='col-sm-2'>Dokumen</label>";
											else echo "<label class='col-sm-2'>&nbsp;</label>";
								?>
								<div class="col-sm-10">
									<div class="col-doc">
										<a href="<?php echo base_url().'assets/attachments/'.$f->nama_file;?>" target="_blank" class="btn waves-effect waves-light btn-primary embed-preview"><i class="fa fa-eye"></i></a>
										<a href="<?php echo base_url().'assets/attachments/'.$f->nama_file;?>" class="btn waves-effect waves-light btn-primary" download><i class="fa fa-download"></i></a>
										&nbsp;<?php echo $f->nama_file;?>
									</div>
								</div>
								<?php
											$i++;
										}
									}
									else
									{
								?>
								<label class="col-sm-2">Dokumen</label>
								<div class="col-sm-6">Tidak ada dokumen tersimpan.</div>
								<?php
									}
								?>
							</div>
							
                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    <a href="<?php echo site_url('trainer-eksternal'); ?>" class="btn btn-secondary waves-effect m-l-5">
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