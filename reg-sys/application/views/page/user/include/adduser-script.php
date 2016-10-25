<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>

<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();
		$('#datatable').DataTable();

	    $('.select_karyawan').on('click', function () {
	        var $row = $(this).closest("tr");    // Find the row
	        var idsdm	 				= $row.find("td:nth-child(1)");
	        var usernamekary 			= $row.find("td:nth-child(2)");
	        var nikkaryawan				= $row.find("td:nth-child(3)");
	        var namakaryawan			= $row.find("td:nth-child(4)");
	        var email	 				= $row.find("td:nth-child(5)");
	        var deskripsi_organisasi 	= $row.find("td:nth-child(6)");
	        var nama_organisasi			= $row.find("td:nth-child(7)");

	       document.getElementById("idsdm").value 			= idsdm.text(); 
		   document.getElementById("nama_lengkap").value 	= namakaryawan.text();
		   document.getElementById("username").value 		= usernamekary.text();
		   document.getElementById("email").value 			= email.text();
		   document.getElementById("nik").value 			= nikkaryawan.text();
		   document.getElementById("deskripsi_organisasi").value = deskripsi_organisasi.text();
		   document.getElementById("nama_organisasi").value = nama_organisasi.text();


	    });

	});

	jQuery(function($) {
		//Script: Tambah User
		$("#form-add-user").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('users/process_add'); ?>";
			var formDatas = new FormData(this);
			$("#loader").show();
			var xhr = $.ajax({
				url: formURL,
				type: 'POST',
				data: formDatas,
				processData: false,
				contentType: false
			});
			xhr.done(function(data) {
				var obj = $.parseJSON(data);
				
				if(obj.result == 'OK')
				{
					window.location.href = '<?php echo site_url('users'); ?>';
				}
				if(obj.result == 'NG')
				{
					$("#loader").hide();
					$("#m-ap-cab").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> '+obj.msg+'</div>');
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader").hide();
				var failMsg = "Something error happened! as";
				alert(failMsg);
			});	
		});

		//Script: Edit User
		$("#form-edit-user").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('users/process_edit'); ?>";
			var formDatas = new FormData(this);
			$("#loader").show();
			var xhr = $.ajax({
				url: formURL,
				type: 'POST',
				data: formDatas,
				processData: false,
				contentType: false
			});
			xhr.done(function(data) {
				var obj = $.parseJSON(data);
				
				if(obj.result == 'OK')
				{
					location.reload();
				}
				if(obj.result == 'NG')
				{
					$("#loader").hide();
					$("#m-ap-cab").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> '+obj.msg+'</div>');
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader").hide();
				var failMsg = "Something error happened! as";
				alert(failMsg);
			});	
		});
	});
	
</script>