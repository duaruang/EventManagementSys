<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active">Event Administration</li>
        </ol>
    </div>
</div>

<div class="container">                      
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Event Administration</h4>
                    </div>
                </div>


                <!-- Page-data -->
                <div class="row">
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
                        <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">
                                 <a href="<?php echo site_url('pengajuan-event'); ?>" class="btn btn-primary waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-plus"></i></span>Pengajuan Event
                                 </a>
                            </p>
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th hidden="">date</th>
                                        <th>Nomor Memo</th>
                                        <th>Nama Event</th>
                                        <th>Topik Event</th>
                                        <th>Kategori Event</th>
                                        <th>Jumlah Peserta</th>
                                        <th>Status</th>
                                        <th width="250">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($load_event->num_rows() > 0){ ?>
                                <?php foreach($load_event->result() as $data){ ?>
                                    <tr>
                                        <td hidden=""><?php echo $data->crdate_event; ?></td>
                                        <td><?php echo $data->nomor_memo; ?></td>
                                        <td><?php echo $data->nama_event; ?></td>
                                        <td><?php echo $data->topik_event; ?></td>
                                        <td><?php echo $data->kategori_event; ?></td>
                                        <td><?php echo $data->jumlah_peserta; ?></td>
                                        <td>
                                        <?php if($data->status_event == 'draft'){ ?>
                                        <span class="label label-default">
                                        <?php } ?>
                                        <?php if($data->status_event == 'submitted'){ ?>
                                        <span class="label label-primary">
                                        <?php } ?>
                                        <?php if($data->status_event == 'approved by atasan'){ ?>
                                        <span class="label label-info">
                                        <?php } ?>
                                        <?php if($data->status_event == 'aprroved by pusat'){ ?>
                                        <span class="label label-success">
                                        <?php } ?>
                                        <?php if($data->status_event == 'rejected by atasan' || $data->status_event == 'rejected by pusat'){ ?>
                                        <span class="label label-warning">
                                        <?php } ?>
                                        <?php if($data->status_event == 'cancelled by user' || $data->status_event == 'cancelled by atasan' || $data->status_event == 'cancelled by pusat'){ ?>
                                        <span class="label label-danger">
                                        <?php } ?>
                                        <?php echo $data->status_event; ?></span>

                                        </td>
                                        <td>
                                        <?php if($data->status_event == 'draft'){ ?>
                                            <a href="<?php echo site_url('pengajuan-event/view/'.$data->id_event); ?>" class="btn action btn-primary  waves-effect waves-light m-b-10"><span class="btn-label"><i class="fa fa-eye"></i></span>View</a>&nbsp;&nbsp;
                                            <a href="<?php echo site_url('pengajuan-event/edit/'.$data->id_event); ?>" class="btn action btn-warning  waves-effect waves-light m-b-10"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>&nbsp;&nbsp;
                                            <a href="#custom-modal" class="btn action btn-danger waves-effect waves-light delete-event m-b-10" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" data-idtipe_exam="<?php echo $data->id_event ?>" data-namatipe_exam="<?php echo $data->nama_event; ?>"><span class="btn-label"><i class="fa fa-times"></i></span>Delete</a>
                                        <?php }else{ ?>
                                            <a href="<?php echo site_url('pengajuan-event/view/'.$data->id_event); ?>" class="btn action btn-primary  waves-effect waves-light m-b-10"><span class="btn-label"><i class="fa fa-eye"></i></span>View</a>&nbsp;&nbsp;
                                            <a href="<?php echo site_url('pengajuan-event/edit-tanggal/'.$data->id_event); ?>" class="btn action btn-warning  waves-effect waves-light m-b-10"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit Tanngal</a>&nbsp;&nbsp;
                                            <?php } ?>
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
                    <?php echo form_open('pengajuan-event/delete'); ?>
                    <h4 class="custom-modal-title" style="background-color: #E9311B;">Delete</h4>
                    <div class="custom-modal-text">
                        Apakah anda yakin ingin menghapus <strong>"<span class="ss text-danger"></span>"</strong>?
                    </div>
                    <input type="hidden" class="f-id-tipeexam" name="f-id-tipeexam" value=""/>
                    <input type="hidden" class="f-nama-tipeexam" name="f-nama-tipeexam" value=""/>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-default" onclick="Custombox.close();">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
</div>
