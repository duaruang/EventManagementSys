<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('menu'); ?>">Menu Administration</a></li>
            <li class="active">Tambah Menu</li>
        </ol>
    </div>
</div>
<?php $data = $load_menu->result_array(); ?>
<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah Menu</h4>
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
                        $attrib = array('class' => 'form-horizontal','id'=>'form-edit-menu');
                        echo form_open('',$attrib); ?>
                        <?php echo form_hidden('id',$data[0]['id']); ?>
                            <div class="form-group row">
                                <label class="col-sm-3">Parent Menu <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" required name="parent_menu" id="parent_menu">
                                        <option <?php if($data[0]['menu_parent'] == 'privilage'){ ?> selected <?php } ?> value="privilage">Privilage</option>
                                        <option <?php if($data[0]['menu_parent'] == 'master Data'){ ?> selected <?php } ?> value="master Data">Master Data</option>
                                        <option <?php if($data[0]['menu_parent'] == 'event'){ ?> selected <?php } ?> value="event">Event</option>
                                        <option <?php if($data[0]['menu_parent'] == 'realisasi'){ ?> selected <?php } ?> value="realisasi">Realisasi</option>
                                        <option <?php if($data[0]['menu_parent'] == 'feedback'){ ?> selected <?php } ?> value="feedback">Feedback</option>
                                        <option <?php if($data[0]['menu_parent'] == 'registrasi event'){ ?> selected <?php } ?> value="registrasi event">Registrasi Event</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Nama Menu <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" required name="nama_menu" id="nama_menu" value="<?php echo $data[0]['nama_menu']; ?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Nama Modul <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo $data[0]['nama_modul']; ?>" required name="nama_modul" id="nama_modul"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Status <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" required name="status_menu" id="status_menu">
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
                                    <a href="<?php echo site_url('menu'); ?>" class="btn btn-secondary waves-effect m-l-5">
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