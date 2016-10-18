<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>

<!--Script: Global Privilege (Select All)-->
<script type="text/javascript">
	$(document).ready(function() {
		//First time load
		$('.global-checkbox').each(function(){ //iterate all listed global-checkbox items
			var idsystem_a = $(this).data('idsystemglobal'); //global-checkbox id system
		
			if($('[data-idsystem="'+idsystem_a+'"]:checked').length == $('[data-idsystem="'+idsystem_a+'"]').length ){ 
				//change "select all" checked status to true
				this.checked = true; //change ".checkbox" checked status
			}
		});
		
		
		//select all checkboxes
		$('.global-checkbox').change(function(e){  //"select all" change 
			e.preventDefault();
			
			var status = this.checked, // "select all" checked status
				idsystem = $(this).data('idsystemglobal'); //global-checkbox id system
				
			$('input[type=checkbox]').each(function(){ //iterate all listed checkbox items
				if($(this).attr('data-idsystem')==idsystem) this.checked = status; //change ".checkbox" checked status
			});
		});
		
		$('input[type=checkbox]').change(function(){ //".checkbox" change 
			//uncheck "select all", if one of the listed checkbox item is unchecked
			var idsystem_c = $(this).data('idsystem'); //checkbox id system
			
			if(this.checked == false){ //if this item is unchecked
				//change "select all" checked status to false
				$('.global-checkbox').each(function(){ //iterate all listed global-checkbox items
					if($(this).attr('data-idsystemglobal')==idsystem_c) this.checked = false; //change ".checkbox" checked status
				});
			}
			
			if($('[data-idsystem="'+idsystem_c+'"]:checked').length == $('[data-idsystem="'+idsystem_c+'"]').length ){ 
				//change "select all" checked status to true
				$('.global-checkbox').each(function(){ //iterate all listed global-checkbox items
					if($(this).attr('data-idsystemglobal')==idsystem_c) this.checked = true; //change ".checkbox" checked status
				});
			}
		});
	});
</script>
<!--EndScript: Global Privilege (Select All)-->

<!--Script: Form Validation-->
<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();
		
		//Script: Add User Group
		$("#form-add-usergroup").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('user-group/process-add'); ?>";
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
					window.location.href = '<?php echo site_url('user-group'); ?>';
				}
				/*
				if(obj.result == 'NG')
				{
					$("#loader").hide();
					$("#m-ap-cab").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> '+obj.msg+'</div>');
				}
				*/
				console.log(data);
			});
			xhr.fail(function() {
				var failMsg = "Something error happened!";
				alert(failMsg);
			});	
		});
		
		//Script: Edit User Group
		$("#form-edit-usergroup").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('user-group/process-edit'); ?>";
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
					window.location.href = '<?php echo site_url('user-group'); ?>';
				}
				/*
				if(obj.result == 'NG')
				{
					$("#loader").hide();
					$("#m-ap-cab").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> '+obj.msg+'</div>');
				}
				*/
				console.log(data);
			});
			xhr.fail(function() {
				var failMsg = "Something error happened!";
				alert(failMsg);
			});	
		});
	});
</script>
<!--EndScript: Form Validation-->