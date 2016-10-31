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
                                        <th width="100">Action</th>
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
                                        <?php if($data->status_event == 'draft'){ $s ='draft';?>
                                        <span class="label label-default">
                                        <?php } ?>
                                        <?php if($data->status_event == 'submitted'){ $s ='submitted';?>
                                        <span class="label label-primary">
                                        <?php } ?>
                                        <?php if($data->status_event == 'approved_atasan'){ $s ='approved oleh atasan';?>
                                        <span class="label label-info">
                                        <?php } ?>
                                        <?php if($data->status_event == 'aprroved_pusat'){ $s ='approved oleh pusat';?>
                                        <span class="label label-success">
                                        <?php } ?>
                                        <?php if($data->status_event == 'rejected_atasan'){ $s ='rejected oleh atasan'; ?>
                                        <span class="label label-danger">
                                        <?php } ?>
										<?php if($data->status_event == 'rejected_pusat'){ $s ='rejected oleh pusat'; ?>
										<span class="label label-danger">
                                        <?php } ?>
                                        <?php if($data->status_event == 'cancelled by user'){ ?>
                                        <span class="label label-warning">
                                        <?php } ?>
                                        <?php echo $s; ?></span>

                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('pengajuan-event/approval-atasan/'.$data->id_event); ?>" class="btn action btn-warning  waves-effect waves-light"><span class="btn-label"><i class="fa fa-check"></i></span>Approval Atasan</a>
                                            <!--<a href="<?php echo site_url('pengajuan-event/approval-pusat/'.$data->id_event); ?>" class="btn action btn-success  waves-effect waves-light"><span class="btn-label"><i class="fa fa-check"></i></span>Approval Pusat</a>&nbsp;&nbsp;-->
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->

               
</div>
