<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Event Management System - PT Permodalan Nasional Madani (persero)">
	<meta name="author" content="duaruang">

	<!-- App Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/pnm-favicon.png">

	<!-- App title -->
	<title><?php echo $title; ?></title>



	<!-- Switchery css -->
	<link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
	<!---------------------------------------- VENDOR ------------------------------------------>
	<?php echo $css; ?>
	<!-- App CSS -->
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<!-- Modernizr js -->
	<script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>        
</head>

<body>	
	<!-- Navigation Bar-->
	<header id="topnav">
		<?php $this->load->view('include/header-registration-page'); ?>
	</header>
	<!-- End Navigation Bar-->
	
	
	<div class="wrapper" style="padding-top:90px">
		<div class="container"> 

		<!-- Page-Title -->
			<!--
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Registrasi Event</h4>
				</div>
			</div>
			-->
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group" id="loader" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: rgba(255,255,255,0.9);z-index: 1000;">
						<img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif">
					</div>
					<div class="card-box" style="padding-left:100px;padding-right:0">
						<div class="row">
							<div id="current-time" class="col-xs-12" align="right" style="padding-right:35px">
								<span id="clock-large"></span> | <span id="date-large"></span>
							</div>
						</div>
						<div class="row m-t-10">
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
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<?php echo $e_message;?>
							</div>
							<?php
								}
							?>
							<div id="err-load-data"></div>
							<div class="p-20">
								<?php 
								$attrib = array('class' => 'form-horizontal','id'=>'form-create-registration');
								echo form_open('',$attrib); ?>
									<div class="form-group row">
										<div class="col-sm-3 user-pic" align="center">
											<img alt="User Pic" src="https://organicthemes.com/demo/profile/files/2012/12/profile_img.png" class="img-circle img-responsive">
      									</div>
										<div class="col-sm-offset-1 col-sm-7" style="margin-top: 20px">
											<div class="form-group row">
												<label class="col-sm-3">Nama Lengkap</label>
												<div class="col-sm-7">
													<input type="text" class="form-control" id="nama" value="" disabled />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3">NIK</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="nik" value="" disabled />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3">Email</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="email" value="" disabled />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3">Mewakili? <span class="text-danger">*</span></label>
												<div class="col-sm-6">
													<label class="c-input c-radio">
														<input id="radio11" name="radio" type="radio" value="1" required>
														<span class="c-indicator"></span>
														Ya
													</label>
													<label class="c-input c-radio">
														<input id="radio21" name="radio" type="radio" value="0" required>
														<span class="c-indicator"></span>
														Tidak
													</label>
                                                </div>
											</div>
											<div id="box-user-other" style="margin-top:30px;" class="hidden visuallyhidden">
												<h4 class="page-title">Data User yang diwakili</h4>
												<button style="margin-top:-10px;margin-bottom:10px" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Pilih User</button>
												<div class="form-group row">
													<label class="col-sm-3">Nama Lengkap</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="nama" value="" disabled />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">NIK</label>
													<div class="col-sm-6">
														<input type="text" class="form-control" id="nik" value="" disabled />
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Email</label>
													<div class="col-sm-6">
														<input type="text" class="form-control" id="email" value="" disabled />
													</div>
												</div>
											</div>
											

											<div class="form-group">
												<div style="margin-top: 40px;" align="center"><hr>
													<button type="reset" class="btn btn-default waves-effect waves-light" style="margin-right:10px">
														Reset
													</button>
													<button type="submit" class="btn btn-primary waves-effect waves-light">
														Submit
													</button>
												</div>
											</div>
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
		
		<!-- Footer -->
		<footer class="footer text-right">
			<?php $this->load->view('include/footer'); ?>
		</footer>
		<!-- End Footer -->
	</div>
	
	<script>
		var resizefunc = [];
	</script>

	<!-- jQuery  -->
	<?php $this->load->view('include/script'); ?>

	<?php echo $script; ?>
</body>

</html>