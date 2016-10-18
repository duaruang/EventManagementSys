<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('kategori-tempat'); ?>">Kategori Tempat Administration</a></li>
            <li class="active">Edit Kategori Tempat</li>
        </ol>
    </div>
</div>

<div class="container"> 
<?php $data = $load_kategori_tempat->result_array(); ?>
<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">View Kategori Tempat</h4>
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
                    
                    <div class="p-20">
                       
                            <div class="form-group row">
                                <label class="col-sm-3">Kategori Tempat </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="kategori_tempat" id="kategori_tempat" value="<?php echo $data[0]['kategori_tempat']; ?>" disabled/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" name="status_divisi" id="status_divisi" disabled="">
                                    <option <?php if($data[0]['is_active'] == 'active'){ ?> selected <?php } ?> value="active">Aktif</option>
                                    <option <?php if($data[0]['is_active'] == 'disabled'){ ?> selected <?php } ?> value="disabled">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    <a href="<?php echo site_url('kategori-tempat'); ?>" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>