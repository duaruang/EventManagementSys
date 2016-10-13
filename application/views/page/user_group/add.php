<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('user-group'); ?>">User Group Administration</a></li>
            <li class="active">Tambah User Group</li>
        </ol>
    </div>
</div>

<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tambah User Group</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
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
                        $attrib = array('class' => 'form-horizontal');
                        echo form_open('',$attrib); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Group <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Status Aktif <span class="text-danger">*</span></label>
                                <div class="col-sm-2">
                                    <select class="form-control select2" required>
                                    <option value="">--pilih status--</option>
                                    <option value="active">Aktif</option>
                                    <option value="disabled">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Privilages <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <table class="table table-bordered table-striped privilage">
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" width="50%" style="vertical-align: middle;text-align: center;">Module</th>
                                                    <th colspan="4" style="text-align: center;">Privilage</th>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: center;">Create</th>
                                                    <th style="text-align: center;">Read</th>
                                                    <th style="text-align: center;">Update</th>
                                                    <th style="text-align: center;">Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Privilages</th>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="create_privilage" type="checkbox" name="create_privilage">
                                                            <label for="create_privilage">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="read_privilage" type="checkbox" name="read_privilage">
                                                            <label for="read_privilage">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="update_privilage" type="checkbox" name="update_privilage">
                                                            <label for="update_privilage">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="delete_privilage" type="checkbox" name="delete_privilage">
                                                            <label for="delete_privilage">
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 30px;">User</td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="create_user" type="checkbox" name="create_user">
                                                            <label for="create_user">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="read_user" type="checkbox" name="read_user">
                                                            <label for="read_user">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="update_user" type="checkbox" name="update_user">
                                                            <label for="update_user">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="delete_user" type="checkbox" name="delete_user">
                                                            <label for="delete_user">
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 30px;">User Group</td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="create_ug" type="checkbox" name="create_ug">
                                                            <label for="create_ug">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="read_ug" type="checkbox" name="read_ug">
                                                            <label for="read_ug">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="update_ug" type="checkbox" name="update_ug">
                                                            <label for="update_ug">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="delete_ug" type="checkbox" name="delete_ug">
                                                            <label for="delete_ug">
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Master Data</th>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="create_master" type="checkbox" name="create_master">
                                                            <label for="create_master">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="read_master" type="checkbox" name="read_master">
                                                            <label for="read_master">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="update_master" type="checkbox" name="update_master">
                                                            <label for="update_master">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="delete_master" type="checkbox" name="delete_master">
                                                            <label for="delete_master">
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 30px;">Matriks Program Anggaran dan RKAP</td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="create_anggarab" type="checkbox" name="create_anggarab">
                                                            <label for="create_anggarab">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="read_anggaran" type="checkbox" name="read_anggaran">
                                                            <label for="read_anggaran">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="update_anggaran" type="checkbox" name="update_anggaran">
                                                            <label for="update_anggaran">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="delete_anggaran" type="checkbox" name="delete_anggaran">
                                                            <label for="delete_anggaran">
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 30px;">Trainer</td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="create_trainer" type="checkbox" name="create_trainer">
                                                            <label for="create_trainer">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="read_trainer" type="checkbox" name="read_trainer">
                                                            <label for="read_trainer">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="update_trainer" type="checkbox" name="update_trainer">
                                                            <label for="update_trainer">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="delete_trainer" type="checkbox" name="delete_trainer">
                                                            <label for="delete_trainer">
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 30px;">Materi</td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="create_materi" type="checkbox" name="create_materi">
                                                            <label for="create_materi">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="read_materi" type="checkbox" name="read_materi">
                                                            <label for="read_materi">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="update_materi" type="checkbox" name="update_materi">
                                                            <label for="update_materi">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="delete_materi" type="checkbox" name="delete_materi">
                                                            <label for="delete_materi">
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                </tbody>
                                            </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <hr>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Save
                                    </button>
                                    <a href="<?php echo site_url('user-group'); ?>" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>