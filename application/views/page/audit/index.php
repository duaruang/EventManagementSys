<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active">Audit Trail</li>
        </ol>
    </div>
</div>

<div class="container">                      
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Audit Trail</h4>
                    </div>
                </div>


                <!-- Page-data -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">
                                
                            </p>
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>date</th>
                                        <th>Ip Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($load_audit->num_rows() > 0){ ?>
                                <?php foreach($load_audit->result() as $data){ ?>
                                    <tr>
                                        <td><?php echo $data->username; ?></td>
                                        <td><?php echo $data->fullname; ?></td>
                                        <td><?php echo $data->description; ?> 
                                        <?php if($data->item_id == NULL){}else{ ?>
                                        "<?php echo $data->item_id; ?>" <?php } ?></td>
                                        <td><?php echo tgl_indo($data->date); ?></td>
                                        <td><?php echo $data->ip_address; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->
</div>
