<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('cabang'); ?>">Cabang Administration</a></li>
            <li class="active">Edit Cabang</li>
        </ol>
    </div>
</div>

<div class="container"> 
<?php $data = $load_cabang->result_array(); ?>
<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit Cabang</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
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
                                    <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" required value="<?php echo $data[0]['nama_cabang']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Alamat Cabang <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" required rows='5' name="alamat_cabang" id="alamat_cabang"/><?php echo $data[0]['alamat_cabang']; ?></textarea> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">No.telp <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="notelp_cabang" id="notelp_cabang" required value="<?php echo $data[0]['no_telp']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Wilayah <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" required name="wilayah_cabang" id="wilayah_cabang">
                                    <option <?php if($data[0]['wilayah'] == 'kantor pusat'){ ?> selected <?php } ?> value="kantor pusat">Kantor Pusat</option>
                                    <option <?php if($data[0]['wilayah'] == 'wilayah barat'){ ?> selected <?php } ?> value="wilayah barat">Wilayah Barat</option>
                                    <option <?php if($data[0]['wilayah'] == 'wilayah timur'){ ?> selected <?php } ?> value="wilayah timur">Wilayah Timur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Status <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" required name="status_cabang" id="status_cabang">
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