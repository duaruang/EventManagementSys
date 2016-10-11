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
                            <span>Event Management System</span>
                        </a>
                    </div>
                    <div class="m-t-30 m-b-20">
                        <div class="col-xs-12 text-xs-center">
                            <h6 class="text-muted text-uppercase m-b-0 m-t-0">Reset Password</h6>
                            <p class="text-muted m-b-0 font-13 m-t-20">Enter your email address and we'll send you an email with instructions to reset your password.  </p>
                        </div>
                        <form class="form-horizontal m-t-30" action="index.html">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="email" required="" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="form-group text-center m-t-20 m-b-0">
                                <div class="col-xs-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Send Email</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- end card-box-->

            <div class="m-t-20">
                <div class="text-xs-center">
                    <p class="">Return to<a href="<?php echo site_url('signin'); ?>" class="m-l-5"><b>Sign In</b></a></p>
                </div>
            </div>

        </div>
        <!-- end wrapper page -->


        <script>
            var resizefunc = [];
        </script>

        <?php $this->load->view('include/script'); ?>

    </body>
</html>