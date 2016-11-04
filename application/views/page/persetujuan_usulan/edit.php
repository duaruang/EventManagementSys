<?php $data = $load_data->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('list-persetujuan'); ?>">List Persetujuan Administration</a></li>
            <li class="active">Edit List Persetujuan</li>
        </ol>
    </div>
</div>

<div class="container"> 

	<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit List Persetujuan</h4>
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
							$attrib = array('class' => 'form-horizontal','id'=>'form-edit-persetujuan');
							echo form_open('',$attrib); ?>	
								<input type="hidden" name="id_persetujuan" value="<?php echo $id; ?>" />
								<div class="form-group row">
									<label class="col-sm-2">NIP </label>
									<div class="col-sm-2">
										<input type="text" class="form-control" value="<?php echo $data[0]['nip']; ?>" name="nip" id="nip" readonly />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Nama Lengkap</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo $data[0]['nama_lengkap']; ?>" name="nama" id="nama" readonly />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Posisi</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" value="<?php echo $data[0]['posisi']; ?>" name="posisi" id="posisi" readonly />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Unit Kerja</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" value="<?php echo $data[0]['unit_kerja']; ?>" id="unit_kerja" name="unit_kerja" readonly />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Biaya Minimum </label>
									<div class="col-sm-3">
										<input placeholder="" data-a-sign="Rp. " value="<?php echo ($data[0]['biaya_minimum']==NULL?'':'Rp. '.number_format($data[0]['biaya_minimum'])); ?>" type="text" class="form-control autonumber" id="min" name="min"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Biaya Maksimum </label>
									<div class="col-sm-3">
										<input placeholder="" data-a-sign="Rp. " value="<?php echo ($data[0]['biaya_maksimum']==NULL?'':'Rp. '.number_format($data[0]['biaya_maksimum'])); ?>" type="text" class="form-control autonumber" id="max" name="max"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Status <span class="text-danger">*</span></label>
									<div class="col-sm-2">
										<select class="form-control select2" name="status" required>
											<option value="active" <?php echo ($data[0]['is_active']=='active' ? "selected" : "");?>>Aktif</option>
											<option value="disabled" <?php echo ($data[0]['is_active']=='disabled' ? "selected" : "");?>>Tidak Aktif</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div style="margin-top: 40px;">
										<hr>
										<button type="submit" class="btn btn-primary waves-effect waves-light">
											Save
										</button>
										<a href="<?php echo site_url('list-persetujuan'); ?>" class="btn btn-secondary waves-effect m-l-5">
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

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tabel Karyawan</h4>
            </div>
            <div class="modal-body">
             <div class="p-20">
                     <table id="datatable-a" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>IDSDM</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Posisi</th>
                            <th>Unit Kerja</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->