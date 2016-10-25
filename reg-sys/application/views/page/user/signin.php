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
                        <a href="index.html" class="logo">
                            <i class="zmdi zmdi-group-work icon-c-logo"></i>
                            <span>Event Management System</span>
                        </a>
                    </div>
                    <div class="m-t-30 m-b-20">
                        <form method="GET" action="<?php echo ?>" role="form" class="text-xs-center m-t-20">
                            <div class="user-thumb">
                                <img src="assets/images/users/avatar-1.jpg" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
                            </div>
                            <div class="form-group">
                                <p class="text-muted m-t-10">
                                    Enter your password to access the admin.
                                </p>
                                <div class="form-group m-t-30">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" required="" placeholder="Enter password">
                                    </div>
                                </div>

                                <div class="form-group text-center m-t-20 m-b-0">
                                    <div class="col-xs-12">
                                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Enter Now</button>
                                    </div>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
            <!-- end card-box-->

            <div class="m-t-20">
                <div class="text-xs-center">
                    <p class="text-white">Not you?<a href="pages-login.html" class="text-white m-l-5"><b>Sign In</b></a></p>
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