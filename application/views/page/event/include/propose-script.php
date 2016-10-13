<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- Validation js (Parsleyjs) -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.pilih_exam').on('click', function (e) {
			e.preventDefault();
	        var $row = $(this).closest("tr");    // Find the row
	        var idexam	 			= $row.find("td:nth-child(1)");
	        var judulexam 			= $row.find("td:nth-child(2)");
	        var deskripsi			= $row.find("td:nth-child(3)");

	       document.getElementById("idexam").value 		= idexam.text(); 
		   document.getElementById("judul_exam").value 	= judulexam.text();
		   document.getElementById("deskripsi").value 	= deskripsi.text();

	    });
  	 });
	
	$(document).ready(function() {
		$('form').parsley();
		$('.autonumber').autoNumeric('init');
		$('#exam_table').DataTable();
		//Date range picker
		<?php $tomorrow_timestamp = strtotime("+ 3 day"); ?>
		$('.input-limit-datepicker').daterangepicker({
	        toggleActive: true,
	        autoUpdateInput: false,
	        format: 'DD-MM-YYYY',
	        minDate: '<?php echo tgl_eng(date('Y-m-d', $tomorrow_timestamp)); ?>'

	    });
	    
	    $('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
	      $('#start').val(picker.startDate.format('DD-MM-YYYY'));

	  });

	    $('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
	      $('#end').val(picker.endDate.format('DD-MM-YYYY'));

	  });
 
		$('#kategori_event').on('change', function() {
			$('#show_exam').hide();
	  		if(this.value == '0000000002')
	  		{
	  			$('#show_exam').show();
	  		}
		});


		
	 });

	
</script>