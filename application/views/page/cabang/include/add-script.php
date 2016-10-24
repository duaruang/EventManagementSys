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
		//Script: Tambah Cabang
		$("#form-add-cabang").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('cabang/process_add_cabang'); ?>";
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

		//Script: Edit Cabang
		$("#form-edit-cabang").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('cabang/process_edit_cabang'); ?>";
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