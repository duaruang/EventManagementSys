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
<!-- Auto Numeric -->
<script src="<?php echo base_url(); ?>assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>

<!-- Script: Auto Numeric -->
<script type="text/javascript">
	$(document).ready(function() {
		jQuery(function ($) {
			$('.autonumber').autoNumeric('init');
		});
	});
</script>

<!-- Script: Get User from SSO -->
<script>
	jQuery(function($) {
		$('#get_user').on('click', function (e) {
			e.preventDefault();
			var table  = $('#datatable-a').DataTable({
				"bRetrieve" : "true",
				 ajax: {
			        url: '<?php echo site_url('PersetujuanUsulan_controller/get_all_karyawan'); ?>',
			        type: 'POST',
			    	dataSrc: 'data'
			    },
			    'columnDefs': [{
			         'targets': 0,
			         'searchable':false,
					 'visible':false,
			         'className': 'dt-body-center'
			      },
				  {
			         'targets': 1,
			         'searchable':false,
					 'visible':false,
			         'className': 'dt-body-center'
			      },
				  {
			         'targets': 5,
			         'searchable':true,
			         'orderable':true,
			         'className': 'dt-body-center',
			         'render': function (data, type, full, meta){
			             return '<button type="button" class="select_karyawan" data-dismiss="modal">pilih</button>';
			         }
			      }],
				columns: [
					{ data: "karyawan_id" },
					{ data: "karyawan_nip"},
					{ data: "karyawan_nama" },
					{ data: "karyawan_posisi"},
					{ data: "karyawan_unit_kerja"}
				]
			});

			$('#datatable-a tbody').on('click', 'tr', function () {
		        var $row = $(this).closest("tr");    // Find the row
		        var idkaryawan	 		= table.row(this).data().karyawan_id;
		        var nipkaryawan			= table.row(this).data().karyawan_nip;
		        var namakaryawan 		= $row.find("td:nth-child(1)");
		        var posisikaryawan		= $row.find("td:nth-child(2)");
		        var unitkerja			= $row.find("td:nth-child(3)");
				
				$("#idsdm").val(idkaryawan);
				$("#nip").val(nipkaryawan);
				$("#nama").val(namakaryawan.text());
				$("#posisi").val(posisikaryawan.text());
				$("#unit_kerja").val(unitkerja.text());
	   		});
		});
	});
</script>

<!-- Script: Form Validation -->
<script>
    $(document).ready(function() {
        $('form').parsley();
		
		//Script: Tambah List Persetujuan
		$("#form-add-persetujuan").submit(function(e){
			e.preventDefault();
			
			$("#loader").show();
			
			//Replace value of budget
			var min = $('input#min').autoNumeric('get');
            $('input#min').autoNumeric('destroy');
			$('input#min').val(min);
			
			var max = $('input#max').autoNumeric('get');
            $('input#max').autoNumeric('destroy');
			$('input#max').val(max);
			
			var formURL = "<?php echo site_url('list-persetujuan/process-add'); ?>";
			var formDatas = new FormData(this);
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
					//location.reload();
					window.location.href = '<?php echo site_url('list-persetujuan'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});
		});
		
		//Script: Edit List Persetujuan Usulan
		$("#form-edit-persetujuan").submit(function(e){
			e.preventDefault();
			
			$("#loader").show();
			
			//Replace value of budget
			var min = $('input#min').autoNumeric('get');
            $('input#min').autoNumeric('destroy');
			$('input#min').val(min);
			
			var max = $('input#max').autoNumeric('get');
            $('input#max').autoNumeric('destroy');
			$('input#max').val(max);
			
			var formURL = "<?php echo site_url('list-persetujuan/process-edit'); ?>";
			var formDatas = new FormData(this);
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
					window.location.href = '<?php echo site_url('list-persetujuan'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});	
		});
		
		
		//Script: Tambah List Persetujuan Pengganti
		$("#form-add-persetujuan-pengganti").submit(function(e){
			e.preventDefault();
			
			$("#loader").show();
			
			var formURL = "<?php echo site_url('list-persetujuan-pengganti/process-add'); ?>";
			var formDatas = new FormData(this);
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
					//location.reload();
					window.location.href = '<?php echo site_url('list-persetujuan-pengganti'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});
		});
		
		//Script: Edit List Persetujuan Usulan Pengganti
		$("#form-edit-persetujuan-pengganti").submit(function(e){
			e.preventDefault();
			
			$("#loader").show();
			
			var formURL = "<?php echo site_url('list-persetujuan-pengganti/process-edit'); ?>";
			var formDatas = new FormData(this);
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
					window.location.href = '<?php echo site_url('list-persetujuan-pengganti'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});	
		});
	});
</script>

<!-- Script: Fill Content User Alternate -->
<script>
	$(document).ready(function() {
		
		$("#user_alt").change(function(e){
			e.preventDefault();
			
			var id_persetujuan = $(this).val();
			
			$.ajax({ 
				url: '<?php echo site_url('list-persetujuan-pengganti/get-user-content'); ?>',
				data: { idpersetujuan: id_persetujuan },
				type: 'post'
			}).done(function(responseData) { 
				var list = $.parseJSON(responseData);
				
				//Fill selected content
				if (list.length > 0) {
					$("#nip_alt").val("");
					$("#posisi_alt").val("");
					$("#unitkerja_alt").val("");
					$.each(list, function () {
						$("#nip_alt").val(this['nip']);
						$("#posisi_alt").val(this['posisi']);
						$("#unitkerja_alt").val(this['unit_kerja']);
					});
					
				}
				
				console.log(responseData);
			}).fail(function() {
				console.log('Failed');
			});
		});
	});
</script>