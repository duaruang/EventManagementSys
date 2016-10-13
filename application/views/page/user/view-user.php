<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('users'); ?>">User Administration</a></li>
            <li class="active">View User</li>
        </ol>
    </div>
</div>

<div class="container"> 
<?php $data = $load_user->result_array(); ?>
<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">View User</h4>
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
                                <label class="col-sm-3">Nama Lengkap </label>
                                <div class="col-sm-9">
                                    <input type="hidden" id="idsdm" name="idsdm" value="<?php echo $data[0]['idsdm']; ?>">
                                    <input type="text" name="nama_lengkap" readonly="" id="nama_lengkap" class="form-control" value="<?php echo $data[0]['fullname']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nik" id="nik" readonly="" value="<?php echo $data[0]['nik']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" id="username" readonly="" value="<?php echo $data[0]['username']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Email </label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email" readonly="" value="<?php echo $data[0]['email']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Nama Organisasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_organisasi" id="nama_organisasi" readonly="" value="<?php echo $data[0]['organisasi_name']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Deskripsi Organisasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="deskripsi_organisasi" id="deskripsi_organisasi" readonly="" value="<?php echo $data[0]['organisasi_desc']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Hak Akses</label>
                                <div class="col-sm-9">
                                     <?php $style_d= array('class'=>'form-control select2', 'Required'=>'','id'=>'hak_akses','disabled'=>'') ?>
                                    <?php echo form_dropdown('hak_akses', $load_user_group, $data[0]['id_user_group'],$style_d); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Status Aktif</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" id="status_user" name="status_user" required disabled="">
                                     <option <?php if($data[0]['is_active'] == 'active'){ ?> selected <?php } ?> value="active">Aktif</option>
                                    <option <?php if($data[0]['is_active'] == 'disabled'){ ?> selected <?php } ?> value="disabled">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    
                                    <a href="<?php echo site_url('users'); ?>" class="btn btn-secondary waves-effect m-l-5">
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

