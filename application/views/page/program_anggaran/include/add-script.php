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

<!-- Script: On change level -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#level2").change(function(){
			var level2 = $("#level2").val();
			$.ajax({
				url: "<?php echo site_url('matriks-program-anggaran/load-lv2'); ?>",
				data: "level2="+level2,
				cache: false,
				success: function(msg){
					$("#detail-lv2").html(msg);
				}
			});
		});
		
		//Re-Load Content Kategori Program based on bisnis unit 
		$("#root").change(function(e){
			var root = $("option:selected", this).val();
			$.ajax({ 
				url: '<?php echo site_url('matriks-program-anggaran/load-kategori-program'); ?>',
				data: { idroot: root },
				type: 'post'
			}).done(function(responseData) {
				var list = $.parseJSON(responseData),
					i = 0;
				if (list.length > 0) {
					$("#parent").select2('val', ""); // clear out values selected
					$("#parent").empty();
					$("#parent").append($('<option>', {value:"", text: "--pilih kategori program--"}));
					$.each(list, function () {
						$("#parent").append($('<option>', {value:this['id'], text: this['deskripsi']}));
					});
				}
				else {
					$("#parent").select2("val", "");
					$("#parent").empty().append($('<option>', {value:"", text: "--pilih kategori program--"}));
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
    
		//Script: Tambah Level 1
		$("#form-add-level1").submit(function(e){
			e.preventDefault();
			
			$("#loader1").show();
			
			//Replace value of budget
			var v = $('input#budget1').autoNumeric('get');
            $('input#budget1').autoNumeric('destroy');
			$('input#budget1').val(v);
			
			var formURL = "<?php echo site_url('matriks-program-anggaran/process-add-lv1'); ?>";
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
					window.location.href = '<?php echo site_url('matriks-program-anggaran'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader1").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});
		});
    
		//Script: Tambah Level 2
		$("#form-add-level2").submit(function(e){
			e.preventDefault();
			
			$("#loader2").show();
			
			//Replace value of budget
			var v = $('input#budget2').autoNumeric('get');
            $('input#budget2').autoNumeric('destroy');
			$('input#budget2').val(v);
			
			var formURL = "<?php echo site_url('matriks-program-anggaran/process-add-lv2'); ?>";
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
					window.location.href = '<?php echo site_url('matriks-program-anggaran'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader2").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});
		});
    
		//Script: Tambah Level 3
		$("#form-add-level3").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('matriks-program-anggaran/process-add-lv3'); ?>";
			var formDatas = new FormData(this);
			$("#loader3").show();
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
					window.location.href = '<?php echo site_url('matriks-program-anggaran'); ?>';
				}
				
				console.log(data);
			});
			xhr.fail(function() {
				$("#loader3").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});
		});
		
		
    
		//Script: Tambah Level 3
		$("#form-edit-program-anggaran").submit(function(e){
			e.preventDefault();
			
			//Replace value of budget
			var type = $('#hidden-type').val();
			
			if(type != 3)
			{
				var v = $('input#budget').autoNumeric('get');
				$('input#budget').autoNumeric('destroy');
				$('input#budget').val(v);
			}
			
			var formURL = "<?php echo site_url('matriks-program-anggaran/process-edit'); ?>";
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
					window.location.href = '<?php echo site_url('matriks-program-anggaran'); ?>';
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