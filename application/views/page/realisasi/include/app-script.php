<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<!-- Validation js (Parsleyjs) -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
<!-- Script: Form Validation -->

<!-- Jquery filer js -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>
<!-- Jquery Document Viewer -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery.zohoviewer/jquery.zohoviewer.min.js"></script>
<script>
    $(document).ready(function() {
    	$('textarea.ckeditor').ckeditor();
    	$('.embed-preview').zohoViewer();
    	$('.autonumber').autoNumeric('init', {vMin: '0', vMax: '99999999999' });
        $('form').parsley();
    	$('#filer_input2').filer({
			limit: 1,
			maxSize: 2, //2 MB
			extensions: ['jpg', 'jpeg', 'png', 'gif', 'pdf'],
			changeInput: true,
			showThumbs: true,
			addMore: false
		});
		
		//Script: Approval oleh Atasan
		$("#form-approval-atasan").submit(function(e){
			e.preventDefault();
			for ( instance in CKEDITOR.instances ) {
		        CKEDITOR.instances[instance].updateElement();
		    }
			var formURL = "<?php echo site_url('pengajuan-event/process_approval_atasan'); ?>";
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
					//location.reload();
					window.location.href = '<?php echo site_url('pengajuan-event/list-approval-atasan'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});	
		});
		
		//Script: Approval dan Data Validasi oleh Pusat
		$("#form-approval-pusat").submit(function(e){
			e.preventDefault();
			for ( instance in CKEDITOR.instances ) {
		        CKEDITOR.instances[instance].updateElement();
		    }
			var formURL = "<?php echo site_url('pengajuan-event/process_approval_pusat'); ?>";
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
					//location.reload();
					window.location.href = '<?php echo site_url('pengajuan-event/list-approval-pusat'); ?>';
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