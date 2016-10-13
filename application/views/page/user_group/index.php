<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active">User Group Administration</li>
        </ol>
    </div>
</div>

<div class="container"> 

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">User Group Administration</h4>
                    </div>
                </div>


                <!-- Page-data -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">
                                 <a href="<?php echo site_url('user-group/add'); ?>" class="btn btn-primary waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-plus"></i></span>Tambah User Group
                                 </a>
                            </p>
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Group</th>
                                        <th>Status</th>
                                        <th width="200">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($load_usergroup->num_rows() > 0){ ?>
                                <?php foreach($load_usergroup->result() as $data){ ?>
                                    <tr>
                                        <td><?php echo $data->definisi; ?></td>
                                        <td><?php echo $data->is_active; ?></td>
                                        <td>
                                            <a href="#" class="btn action btn-warning  waves-effect waves-light"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>&nbsp;&nbsp;
                                            <a href="#custom-modal" class="btn action btn-danger waves-effect waves-light delete-user" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" data-iduser=""><span class="btn-label"><i class="fa fa-times"></i></span>Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->

                <!-- Modal -->
                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="custom-modal-title" style="background-color: #E9311B;">Delete</h4>
                    <div class="custom-modal-text">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <input type="hidden" class="f-hidden-id-user" name="f-hidden-id-user" value=""/>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-default" onclick="Custombox.close();">Batal</button>
                        <button type="submit" class="btn btn-default">Hapus</a>
                    </div>
                </div>
</div>
