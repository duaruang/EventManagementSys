<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('trainer-eksternal'); ?>">Trainer Administration</a></li>
            <li class="active">Tambah Trainer Eksternal</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Trainer Eksternal</h4>
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
                        <strong>Well done!</strong> <?php echo $s_message;?>
                    </div>
                    <?php
                        }
                    ?>
                    <div id="m-ap-cab"></div>
                    <div class="p-20">
                        <?php 
                        $attrib = array('class' => 'form-horizontal','id'=>'form-add-trainereksternal','enctype'=>'multipart/form-data');
                        echo form_open('',$attrib); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Pemateri <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" required name="nama_pemateri"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Perusahaan <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" required name="nama_perusahaan"/>
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
							<div class="form-group row">
								<label class="col-sm-2">Upload Dokumen</label>
								<div class="col-sm-6">
									<input type="file" name="files[]" id="filer_input2" multiple="multiple">
								</div>
							</div>

                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Save
                                    </button>
                                    <a href="<?php echo site_url('trainer-eksternal'); ?>" class="btn btn-secondary waves-effect m-l-5">
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