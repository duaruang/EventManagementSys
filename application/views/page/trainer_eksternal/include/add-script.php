<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.js"></script>
<!-- Jquery filer js -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>
<!-- Jquery Document Viewer -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery.zohoviewer/jquery.zohoviewer.min.js"></script>

<!-- Script: jQuery Filer (Multiple Upload) -->
<script>
	 $(document).ready(function() {
		$('#filer_input2').filer({
			/*limit: 4,*/
			maxSize: 2, //2 MB
			extensions: ['jpg', 'jpeg', 'png', 'gif', 'pdf'],
			changeInput: true,
			showThumbs: true,
			addMore: true
		});
	});
</script>

<!-- Script: jQuery Document Preview -->
<script>
	 $(document).ready(function() {
		$('.embed-preview').zohoViewer();
		$('.zohoviewer').hide();
	});
</script>

<!-- Script: jQuery Delete(Slide Up) File -->
<script>
	 $(document).ready(function() {
		$('.delete-file').click(function(){
			var id_file = $(this).data('idfile'),
				val_hiddenid = $('#hidden-idfile-delete').val();
			
			$('#hidden-idfile-delete').val(val_hiddenid+';'+id_file);
			$('#file_delete'+id_file).slideUp();
		});
	});
</script>

<!-- Script: Form Validation -->
<script>
    $(document).ready(function() {
        $('form').parsley();
    
		//Script: Tambah trainer
		$("#form-add-trainereksternal").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('trainer-eksternal/process-add'); ?>";
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
					window.location.href = '<?php echo site_url('trainer-eksternal'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});	
		});

		//Script: Edit trainer
		$("#form-edit-trainereksternal").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('trainer-eksternal/process-edit'); ?>";
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
					window.location.href = '<?php echo site_url('trainer-eksternal'); ?>';
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