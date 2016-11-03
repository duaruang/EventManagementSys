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
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Memo LPJ</th>
                                        <th>Memo Pengajuan</th>
                                        <th>Cabang/Divisi</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Pelaksanaan</th>
                                        <th>Peserta</th>
                                        <th>Realisasi Biaya</th>
                                        <th>Status</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($load_event->num_rows() > 0){ ?>
                                <?php foreach($load_event->result() as $data){ ?>
                                    <tr>
                                        <td><?php echo $data->memo_pertanggungjawaban; ?></td>
                                        <td><?php echo $data->nomor_memo_pengajuan; ?></td>
                                        <td><?php echo $data->lokasi_kerja; ?></td>
                                        <td><?php echo $data->nama_event; ?></td>
                                        <td><?php echo $data->mulai_tanggal_pelaksanaan; ?> - <?php echo $data->selesai_tanggal_pelaksanaan; ?></td>
                                        <td><?php echo $data->jumlah_peserta; ?></td>
                                        <td><?php echo $data->total_rab; ?></td>
                                        <td>
                                        <?php if($data->status_event == 'draft'){ $s ='draft';?>
                                        <span class="label label-default">
                                        <?php } ?>
                                        <?php if($data->status_event == 'submitted'){ $s ='submitted';?>
                                        <span class="label label-primary">
                                        <?php } ?>
                                        <?php if($data->status_event == 'approved_atasan'){ $s ='approved oleh atasan';?>
                                        <span class="label label-info">
                                        <?php } ?>
                                        <?php if($data->status_event == 'approved_pusat'){ $s ='approved oleh pusat';?>
                                        <span class="label label-success">
                                        <?php } ?>
                                        <?php if($data->status_event == 'rejected_atasan'){ $s ='rejected oleh atasan'; ?>
                                        <span class="label label-danger">
                                        <?php } ?>
										<?php if($data->status_event == 'rejected_pusat'){ $s ='rejected oleh pusat'; ?>
										<span class="label label-danger">
                                        <?php } ?>
                                        <?php if($data->status_event == 'cancelled by user'){ $s=$data->status_event; ?>
                                        <span class="label label-warning">
                                        <?php } ?>
                                        <?php echo $s; ?></span>

                                        </td>
                                        <td>
                                            <?php if($data->status_event == 'draft'){ ?>
                                            <a href="<?php echo site_url('pengajuan-event/view/'.$data->id_event); ?>" class="btn action btn-primary  waves-effect waves-light m-b-10"><span class="btn-label"><i class="fa fa-eye"></i></span>View</a>
                                            <?php }else{ ?>
                                            <a href="<?php echo site_url('pengajuan-event/view/'.$data->id_event); ?>" class="btn action btn-primary  waves-effect waves-light m-b-10"><span class="btn-label"><i class="fa fa-file-pdf-o"></i></span></a>&nbsp;&nbsp;
                                            <?php } ?>
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
                    <input type="hidden" class="f-id-event" name="f-id-event" value=""/>
                    <input type="hidden" class="f-nama-event" name="f-nama-event" value=""/>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-default" onclick="Custombox.close();">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
</div>
