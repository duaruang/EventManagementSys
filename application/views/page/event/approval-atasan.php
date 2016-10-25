<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('event'); ?>">Event</a></li>
            <li class="active">Persetujuan Event</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Persetujuan Event</h4>
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
                        $attrib = array('class' => 'form-horizontal','id'=>'form-approval-atasan');
                        echo form_open('',$attrib); ?>
                        <?php echo form_hidden('idevent',$this->uri->segment(3)); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Draft Memo </label>
                                <div class="col-sm-8">
                                    <iframe style="width: 100%;height: 550px;"  src="<?php echo base_url(); ?>pengajuan-event/memo_view/<?php echo $this->uri->segment(3); ?>" title="PDF in an i-Frame" frameborder="1" scrolling="auto"></iframe>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">List Peserta </label>
                                <div class="col-sm-6">
									<table id="get_list_peserta_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th width="20">No.</th>                                            
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($load_list_peserta->num_rows() > 0){ ?>
                                        <?php 
                                        $no =1;
                                        foreach($load_list_peserta->result() as $data){ ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data->nik; ?></td>
                                                <td><?php echo $data->nama; ?></td>
                                                <td><?php echo $data->posisi; ?></td>
                                            </tr> 
                                        <?php $no++; } ?>
                                        <?php }else{ ?>
                                             <tr>
                                                <td colspan="5">tidak ada data peserta / semua karyawan</td>
                                            </tr> 
                                        <?php } ?>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Persetujuan <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="radio radio-success">
                                                <input name="persetujuan" class="persetujuan" required="" id="radio1" value="agree" type="radio">
                                                <label for="radio1">
                                                    Pengajuan Disetujui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="radio radio-success">
                                                <input name="persetujuan" class="persetujuan" id="radio2" value="disagree" type="radio">
                                                <label for="radio2">
                                                    Pengajuan tidak disetujui
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Catatan <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                <textarea class="ckeditor form-control" id="catatan" name="catatan" cols="10" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Simpan
                                    </button>
                                    <a href="<?php echo site_url('pengajuan-event/list-approval'); ?>" class="btn btn-secondary waves-effect m-l-5">
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