<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('cabang'); ?>">Cabang Administration</a></li>
            <li class="active">Tambah Cabang</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Cabang</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
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
                    <div class="alert alert-success fade in">
                        <a class="text-white" href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <?php echo $s_message;?>
                    </div>
                    <?php
                        }
                        
                        $e_message = '';
                        $e_message = $this->session->flashdata('message_error');
                        if($e_message)
                        {
                    ?>
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <?php echo $e_message;?>
                    </div>
                    <?php
                        }
                    ?>
                    <div id="m-ap-cab"></div>
                    <div class="p-20">
                        <?php 
                        $attrib = array('class' => 'form-horizontal','id'=>'form-add-cabang');
                        echo form_open('',$attrib); ?>
                            <div class="form-group row">
                                <label class="col-sm-3">Nama Cabang <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Alamat Cabang <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" required rows='5' name="alamat_cabang" id="alamat_cabang"/></textarea> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">No.telp <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="notelp_cabang" id="notelp_cabang" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Wilayah <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" required name="wilayah_cabang" id="wilayah_cabang">
                                    <option value="">--pilih wilayah--</option>
                                    <option value="kantor pusat">Kantor Pusat</option>
                                    <option value="wilayah barat">Wilayah Barat</option>
                                    <option value="wilayah timur">Wilayah Timur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Status <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" required name="status_cabang" id="status_cabang">
                                    <option value="">--pilih cabang--</option>
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
                                    <a href="<?php echo site_url('cabang'); ?>" class="btn btn-secondary waves-effect m-l-5">
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