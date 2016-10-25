<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('users'); ?>">User Administration</a></li>
            <li class="active">Tambah User</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah User</h4>
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
                    <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Pilih User</button>
                    <div class="p-20">
                        <?php 
                        $attrib = array('class' => 'form-horizontal','id'=>'form-add-user');
                        echo form_open('',$attrib); ?>

                            <div class="form-group row">

                                <label class="col-sm-3">Nama Lengkap </label>
                                <div class="col-sm-9">
                                    <input type="hidden" id="idsdm" name="idsdm">
                                    <input type="text" name="nama_lengkap" readonly="" id="nama_lengkap" class="form-control" required="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nik" id="nik" readonly="" required=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" id="username" readonly="" required=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Email </label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email" readonly="" required=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Nama Organisasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_organisasi" id="nama_organisasi" readonly=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Deskripsi Organisasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="deskripsi_organisasi" id="deskripsi_organisasi" readonly=""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Hak Akses <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" id="hak_akses" name="hak_akses" required>
                                    <option value="">--pilih hak akses--</option>
                                    <?php if($load_user_group->num_rows() > 0){ ?>
                                    <?php foreach($load_user_group->result() as $data){ ?>
                                    <option value="<?php echo $data->id; ?>"><?php echo $data->definisi; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Status Aktif <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" id="status_user" name="status_user" required>
                                    <option value="">--pilih status--</option>
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

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tabel Karyawan yang sudah didaftarkan untuk aplikasi event pada sso</h4>
            </div>
            <div class="modal-body">
             <div class="p-20">
                     <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th hidden="">IDSDM</th>
                            <th>Nama Pengguna</th>
                            <th>NIK</th>
                            <th>Nama karyawan</th>
                            <th>Email</th>
                            <th hidden="">Organisasi Desc</th>
                            <th hidden="">Organisasi Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($load_all_karyawan->profile[0]->data as $data){ ?>
                        <tr>
                            <td scope="row" hidden=""><?php echo $data->profile_id_sdm; ?></td>
                            <td><?php echo $data->profile_username; ?></td>
                            <td><?php echo $data->profile_nip; ?></td>
                            <td><?php echo $data->profile_nama ?></td>
                            <td><?php echo $data->profile_email; ?></td>
                            <td hidden=""><?php echo $data->profile_organisasi_desc; ?></td>
                            <td hidden=""><?php echo $data->profile_organisasi_name; ?></td>
                            <td><button type="button" class="select_karyawan" data-dismiss="modal">pilih</button></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->