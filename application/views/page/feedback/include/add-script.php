<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>

<!-- Script: Multiselect (Select All/Deselect All) -->
<script>
	$(document).ready(function() {
		//Select All Function
		$('.multi-select').multiSelect();
		$('#select-all').click(function(){
		  $('.multi-select').multiSelect('select_all');
		  return false;
		});
		//Deselect All Function
		$('#deselect-all').click(function(){
		  $('#my_multi_select1').multiSelect('deselect_all');
		  return false;
		});
		
		//Re-Load Content Participant List
		$("#event").change(function(e){
			var id_event = $("option:selected", this).val();
			$.ajax({ 
				url: '<?php echo site_url('feedback/generate-participant'); ?>',
				data: { idevent: id_event },
				type: 'post'
			}).done(function(responseData) { 
				var list = $.parseJSON(responseData),
					i = 0;
				if (list.length > 0) {
					$("#my_multi_select1").empty();
					$.each(list, function () {
						$("#my_multi_select1").multiSelect('addOption', { value: this['idsdm'], text: this['nama'], index: i}).attr('disabled', false);
						i = parseInt(i) + 1; 
					});
					$("#my_multi_select1").multiSelect('refresh'); //refresh the select here
					return false;
				}
				else {
					$("#my_multi_select1").empty().multiSelect('addOption', { value: '0', text: 'Tidak ada data peserta.', index: 0}).attr('disabled', true);
					$("#my_multi_select1").multiSelect('refresh'); //refresh the select here
				}
				
				console.log(responseData);
			}).fail(function() {
				console.log('Failed');
			});
		});
		
	});
</script>

<!-- Script: Form Validation -->
<script>
    $(document).ready(function() {
        $('form').parsley();
    
		//Script: Tambah trainer
		$("#form-send-feedback").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('feedback/process-send'); ?>";
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