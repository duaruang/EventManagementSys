<!--<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Registrasi Event</li>
        </ol>
    </div>
</div>-->

<div class="container"> 

<!-- Page-Title -->
	
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Registrasi Event</h4>
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
						<?php
						$s_message = '';
						$s_message = $this->session->flashdata('message_success');
						if($s_message)
						{
						?>
					   <div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Well done!</strong> <?php echo $s_message;?>
						</div>
						<?php
							}
							
							$e_message = '';
							$e_message = $this->session->flashdata('message_error');
							if($e_message)
							{
						?>
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<?php echo $e_message;?>
						</div>
						<?php
							}
						?>
						<div id="err-load-data"></div>
						<div class="p-20">
							<?php 
							$attrib = array('class' => 'form-horizontal','id'=>'form-create-registration');
							echo form_open('',$attrib); ?>
								<div class="form-group row">
									<label class="col-sm-2">Nama Event <span class="text-danger">*</span></label>
									<div class="col-sm-5">
										<select class="form-control select2" required id="event" name="event">
										<option value="">--pilih event--</option>
										<?php foreach($load_event->result() as $e){ ?>
										<option value="<?php echo $e->id_event;?>"><?php echo $e->nama_event;?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Topik Event</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="topik_event" value="" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Nomor Memo</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="no_memo" value="" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Tanggal Pelaksanaan</label>
									<div class="col-sm-4">
										<div class="input-group">
											<input type="text" class="form-control" id="tanggal_start" disabled />
											<span class="input-group-addon bg-custom b-0">s/d</span>
											<input type="text" class="form-control" id="tanggal_end" disabled />
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Tempat Pelaksanaan</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="kategori_tempat" value="" disabled />
									</div>
									<div class="col-sm-3" style="margin-top:-4px;margin-bottom:-4px">
										<span id="poin_tempat" class="font-13 text-muted"></span>
									</div>
								</div>
								<div class="form-group row">
								   <div class="col-sm-offset-2 col-sm-5">
										<textarea type="text" class="form-control" id="nama_tempat" value="" rows="3" disabled></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Target / Sasaran Peserta</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="target" value="" disabled />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2">Kategori Event</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="kategori_event" value="" disabled />
									</div>
								</div>

								<div class="form-group">
									<div style="margin-top: 40px;">
										<hr>
										<button type="submit" class="btn btn-primary waves-effect waves-light">
											Tampilkan Halaman Registrasi
										</button>
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