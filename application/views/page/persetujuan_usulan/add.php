<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('list-persetujuan'); ?>">List Persetujuan Administration</a></li>
            <li class="active">Tambah List Persetujuan</li>
        </ol>
    </div>
</div>

<div class="container"> 

	<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah List Persetujuan</h4>
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
						<button class="btn btn-primary waves-effect waves-light" id="get_user" data-toggle="modal" data-target=".bs-example-modal-lg">Pilih User</button>
						<div class="p-20">
							<?php 
							$attrib = array('class' => 'form-horizontal','id'=>'form-add-persetujuan');
							echo form_open('',$attrib); ?>	
								<input type="hidden" name="idsdm" id="idsdm" />
								<div class="form-group row">
									<label class="col-sm-2">NIP <span class="text-danger">*</span></label>
									<div class="col-sm-2">
										<input type="text" class="form-control" required name="nip" id="nip" readonly />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Nama Lengkap <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" required name="nama" id="nama" readonly />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Posisi <span class="text-danger">*</span></label>
									<div class="col-sm-5">
										<input type="text" class="form-control" required name="posisi" id="posisi" readonly />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Unit Kerja <span class="text-danger">*</span></label>
									<div class="col-sm-5">
										<input type="text" class="form-control" required id="unit_kerja" name="unit_kerja" readonly />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Biaya Minimum </label>
									<div class="col-sm-3">
										<input placeholder="" data-a-sign="Rp. " type="text" class="form-control autonumber" id="min" name="min"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Biaya Maksimum </label>
									<div class="col-sm-3">
										<input placeholder="" data-a-sign="Rp. " type="text" class="form-control autonumber" id="max" name="max"/>
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