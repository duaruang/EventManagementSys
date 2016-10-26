<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('users'); ?>">User Administration</a></li>
            <li class="active">Edit User</li>
        </ol>
    </div>
</div>

<div class="container"> 
<?php $data = $load_user->result_array(); ?>
<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit User</h4>
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
                        $attrib = array('class' => 'form-horizontal','id'=>'form-edit-user');
                        echo form_open('',$attrib); ?>

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
                                <label class="col-sm-3">Hak Akses <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                     <?php $style_d= array('class'=>'form-control select2', 'Required'=>'','id'=>'hak_akses') ?>
                                    <?php echo form_dropdown('hak_akses', $load_user_group, $data[0]['id_user_group'],$style_d); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Status Aktif <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" id="status_user" name="status_user" required>
                                     <option <?php if($data[0]['is_active'] == 'active'){ ?> selected <?php } ?> value="active">Aktif</option>
                                    <option <?php if($data[0]['is_active'] == 'disabled'){ ?> selected <?php } ?> value="disabled">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Save
                                    </button>
                                    <a href="<?php echo site_url('users'); ?>" class="btn btn-secondary waves-effect m-l-5">
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

