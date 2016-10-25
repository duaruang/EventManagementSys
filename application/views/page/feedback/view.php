<?php $f = $load_feedback->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('list-feedback'); ?>">List Feedback Administration</a></li>
            <li class="active">View List Feedback</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">View List Feedback</h4>
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
                                <label class="col-sm-2">Nama Event</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?php echo $f[0]['nama_event']?>" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">URL Feedback</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?php echo $f[0]['url_feedback']?>" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tanggal dibuat</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="<?php echo tgl_indo_datetime($f[0]['created_date']);?>" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Status</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="<?php echo ($f[0]['is_active']=='active' ? 'Aktif' : 'Tidak Aktif' ); ?>" disabled />
                                </div>
                            </div>
							<div class="form-group row">
								<label class="col-sm-2">List Peserta Terdaftar</label>
								<div class="col-sm-10">
									 <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Nama Lengkap</th>
												<th>Email</th>
												<th>Waktu Pengiriman</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach($load_feedback->result() as $lf)
												{
											?>
											<tr>
												<td><?php echo $lf->nama;?></td>
												<td><?php echo $lf->email;?></td>
												<td><?php echo tgl_indo_datetime($lf->sent_datetime);?></td>
												<td><?php echo ($lf->status=='success'?'Terkirim':'Gagal');?></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
							
                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    <a href="<?php echo site_url('list-feedback'); ?>" class="btn btn-secondary waves-effect m-l-5">
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