<!DOCTYPE html>
<html>
    <head>
       <?php $this->load->view('include/head'); ?>
    </head>


    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <?php $this->load->view('include/header'); ?>
            <?php $this->load->view('include/nav'); ?>
        </header>
        <!-- End Navigation Bar-->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
          

                <?php echo $contents; ?>

                <!-- Footer -->
                <footer class="footer text-right">
                    <?php $this->load->view('include/footer'); ?>
                </footer>
                <!-- End Footer -->

            
        </div> <!-- End wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <?php $this->load->view('include/script'); ?>

        <?php echo $script; ?>

    </body>
</html>