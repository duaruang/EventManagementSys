<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>

<!-- Script: Form Validation -->
<script>
    $(document).ready(function() {
        $('form').parsley();
    
		//Script: Tambah Kategori RAB
		$("#form-add-bisnis-unit").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('bisnis-unit-jabatan/process-add-bisnis-unit'); ?>";
			var formDatas = new FormData(this);
			$("#loader1").show();
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
					window.location.href = '<?php echo site_url('bisnis-unit-jabatan'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader1").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});	
		});
    
		//Script: Tambah Jabatan
		$("#form-add-jabatan").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('bisnis-unit-jabatan/process-add-jabatan'); ?>";
			var formDatas = new FormData(this);
			$("#loader2").show();
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
					window.location.href = '<?php echo site_url('bisnis-unit-jabatan'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader2").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});	
		});

		//Script: Edit Bisnis Unit dan Jabatan
		$("#form-edit-bisnis-jabatan").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('bisnis-unit-jabatan/process-edit'); ?>";
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
					window.location.href = '<?php echo site_url('bisnis-unit-jabatan'); ?>';
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