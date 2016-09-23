<!DOCTYPE html>
<html>
    <head>
       <?php $this->load->view('include/head'); ?>
    </head>


    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

        	<div class="account-bg">
                <div class="card-box m-b-0">
                    <div class="text-xs-center m-t-20">
                        <a href="<?php echo base_url(); ?>" class="logo">
                            <i class="zmdi zmdi-group-work icon-c-logo"></i>
                            <span>Event Management System</span>
                        </a>
                    </div>
                    <div class="m-t-30 m-b-20">
                        <div class="col-xs-12 text-xs-center">
                            <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h6>
                        </div>
                        <?php 
                        $attribute = array('class'=>'form-horizontal m-t-20');
                        echo form_open('',$attribute); ?>

                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <div class="checkbox checkbox-custom">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup">
                                            Remember me
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group text-center m-t-30">
                                <div class="col-xs-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-30 m-b-0">
                                <div class="col-sm-12">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                </div>
                            </div>
ss

                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>
        <!-- end wrapper page -->


        <script>
            var resizefunc = [];
        </script>

        <?php $this->load->view('include/script'); ?>

    </body>
</html>