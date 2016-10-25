 <div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Setting</li>
        </ol>
    </div>
</div>

<div class="container"> 

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Setting</h4>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-12">
                        <div class="card-box table-responsive">
                <div class="col-md-6 col-xs-12 m-t-20">
                                    <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                                        <li class="nav-item active">
                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home"
                                               role="tab" aria-controls="home" aria-expanded="true">Login Setting</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                               role="tab" aria-controls="profile">Parameter RKAP</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home"
                                             aria-labelledby="home-tab">
                                            <div class="p-20">
                                                <?php 
                                                $attrib = array('class' => 'form-horizontal');
                                                echo form_open('',$attrib); ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">URL CALLBACK <span class="text-danger">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="url" class="form-control" required/>
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
                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                            <div class="p-20">
                                                <?php 
                                                $attrib = array('class' => 'form-horizontal');
                                                echo form_open('',$attrib); ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Materi Training <span class="text-danger">*</span></label>
                                                    <div class="col-sm-5">
                                                        <select class="select2 form-control">
                                                            <option value="">--pilih materi--</option>

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