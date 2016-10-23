<?php $t = $load_trainer->result_array(); ?>
<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('trainer-eksternal'); ?>">Trainer Eksternal Administration</a></li>
            <li class="active">Edit Trainer Eksternal</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit Trainer Eksternal</h4>
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
                        $attrib = array('class' => 'form-horizontal','id'=>'form-edit-trainereksternal','enctype'=>'multipart/form-data');
                        echo form_open('',$attrib); ?>
							<input type="hidden" name="hidden-idtrainer" value="<?php echo $id_trainer;?>">
							<input type="hidden" id="hidden-idfile-delete" name="hidden-idfile-delete" value="">
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Pemateri</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nama_pemateri" value="<?php echo $t[0]['nama_pemateri']?>" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Perusahaan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $t[0]['nama_perusahaan']?>" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Status <span class="text-danger">*</span></label>
                                <div class="col-sm-2">
									<select class="form-control select2" name="status" required>
										<option value="active" <?php echo ($t[0]['is_active']=='active' ? "selected" : "");?>>Aktif</option>
										<option value="disabled" <?php echo ($t[0]['is_active']=='disabled' ? "selected" : "");?>>Tidak Aktif</option>
									</select>
                                </div>
                            </div>
							<div class="form-group row">
								<label class="col-sm-2">Upload Dokumen</label>
								<div class="col-sm-6">
									<input type="file" name="files[]" id="filer_input2" multiple="multiple">
								</div>
							</div>
							<?php
								//Load files which status is active
								if($load_files->num_rows() > 0)
								{
									foreach($load_files->result() as $f)
									{
							?>
							<div id="file_delete<?php echo $f->id;?>" class="form-group row" style="margin-bottom:-4px">
								<label class='col-sm-2'>&nbsp;</label>
								<div class="col-sm-10">
									<div class="col-doc" >
										<a class="btn waves-effect waves-light btn-danger delete-file" data-idfile="<?php echo $f->id; ?>"><i class="fa fa-trash"></i></a>
										<a href="<?php echo base_url().'assets/attachments/'.$f->nama_file;?>" target="_blank" class="btn waves-effect waves-light btn-primary embed-preview"><i class="fa fa-eye"></i></a>
										<a href="<?php echo base_url().'assets/attachments/'.$f->nama_file;?>" class="btn waves-effect waves-light btn-primary" download><i class="fa fa-download"></i></a>
										&nbsp;<?php echo $f->nama_file;?>
									</div>
								</div>
							</div>
							<?php
									}
								}
							?>

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