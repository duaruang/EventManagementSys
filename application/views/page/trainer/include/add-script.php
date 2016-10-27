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
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>
<script>
    $(document).ready(function() {
        $('form').parsley();
    });
    

	jQuery(function($) {
		//Script: Tambah trainer
		$("#form-add-trainer").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('trainer/process_add'); ?>";
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
					window.location.href = '<?php echo site_url('trainer'); ?>';
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

		//Script: Edit trainer
		$("#form-edit-trainer").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('trainer/process_edit'); ?>";
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

		$('#get_trainer').on('click', function (e) {
			e.preventDefault();
			var table  = $('#datatable-a').DataTable({
				"bRetrieve" : "true",
				 ajax: {
			        url: '<?php echo site_url('Trainer_controller/get_all_karyawan'); ?>',
			        type: 'POST',
			    	dataSrc: 'data'
			    },
			    'columnDefs': [{
			         'targets': 4,
			         'searchable':true,
			         'orderable':true,
			         'className': 'dt-body-center',
			         'render': function (data, type, full, meta){
			             return '<button type="button" class="select_karyawan" data-dismiss="modal">pilih</button>';
			         }
			      }],
				columns: [
					{ data: "karyawan_nip" },
					{ data: "karyawan_nama"},
					{ data: "karyawan_posisi"},
					{ data: "karyawan_unit_kerja"}
				]
			});

			$('#datatable-a tbody').on('click', 'tr', function () {
		        var $row = $(this).closest("tr");    // Find the row
		        var nikkaryawan	 			= $row.find("td:nth-child(1)");
		        var namakaryawan 			= $row.find("td:nth-child(2)");
		        var posisikaryawan			= $row.find("td:nth-child(3)");
		        var uniitkerja				= $row.find("td:nth-child(4)");

			   $("#nama_trainer").val(namakaryawan.text());
			   $("#nip").val(nikkaryawan.text());
			   $("#posisi").val(posisikaryawan.text());
			   $("#unit_kerja").val(uniitkerja.text());
	   		});
		});
	});
</script>