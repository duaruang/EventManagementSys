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
	        var kategori			= $row.find("td:nth-child(6)");
	        var idjadwalexam		= $row.find("td:nth-child(7)");

	       document.getElementById("idexam").value 			= idexam.text(); 
		   document.getElementById("judul_exam").value 		= judulexam.text();
		   document.getElementById("deskripsi").value 		= kategori.text();
		   document.getElementById("idjadwalexam").value 	= idjadwalexam.text();
		   var id_jadwal_exam= idjadwalexam.text();
		   //Menampilkan Tabel Peserta
		   $('#show_tabel_peserta').show();
		   $("#show_tabel_peserta tbody tr").children().remove();
		   $('#loader').show();
		   $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() ?>Event_controller/get_list_peserta/'+id_jadwal_exam,
                    dataType: 'json',
                    cache	: false,
   					processData: false,
                    success: function (data) {
                    	//for (var i=0; i<data.length; i++){

                    	//	console.log(data[i].nama);
                    	//}
                    	$('#loader').hide();
                    	$.each(data, function(i, item) {
					    $('<tr>').html(
					        "<td>" + data[i].id_sdm + "</td><td>" + data[i].nama + "</td><td>" + data[i].posisi + "</td>").appendTo('#daftar_peserta_table');
					    });
                    },
                    error: function (e) {
                    	$('#loader').hide();
                        alert('error connection. please reload');
                    }
                });
	    });
  	 });
	
	$(document).ready(function() {
		//Validasi Field Kosong
		$('form').parsley();
		$('.autonumber').autoNumeric('init');
		//Tabel Exam
		$('#exam_table').DataTable();
		//Date range picker
		<?php $tomorrow_timestamp = strtotime("+ 3 day"); ?>
		$('.input-limit-datepicker').daterangepicker({
	        toggleActive: true,
	        autoUpdateInput: false,
	        format: 'DD-MM-YYYY',
	        minDate: '<?php echo tgl_eng(date('Y-m-d', $tomorrow_timestamp)); ?>'

	    });

	    //Menampilkan nilai tanggal awal pada field tanggal awal
	    $('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
	      $('#start').val(picker.startDate.format('DD-MM-YYYY'));
	  	});

	    //Menampilkan nilai tanggal akhir pada field tanggal akhir
	    $('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
	      $('#end').val(picker.endDate.format('DD-MM-YYYY'));
	  	});
 		
 		$("#show_tipe_exam").hide();
	  	$('#show_tipe_pelatihan').hide();
		$('#myTab').hide();

		//validasi apabila kategori event terpilih
		$('#kategori_event').on('change', function() {
			
			$('#myTab').show();

	  		if(this.value == '0000000004')
	  		{

	  			$('#show_tipe_exam').hide();
	  			$('#show_tipe_pelatihan').hide();
	  			//$('#show_tipe_pelatihan').hide();
	  			//$("#tipe_exam").select2("val", "");
	  			//$('#show_exam').hide();
	  			//$('#show_tipe').hide();
	  			//$('#show_tabel_peserta').hide();
	  			//$("#show_tabel_peserta tbody tr").children().remove();

	  		}

	  		if(this.value == '0000000001')
	  		{

	  			$('#show_tipe_exam').hide();
	  			$('#show_tipe_pelatihan').show();
	  			//$('#navmateri').show();
	  			//$('#navrab').show();
	  			//$('#navrundown').show();
	  			//$('#navbiayatraining').show();
	  			//$('#navpicpanitia').show();
	  			//$('#show_tipe_pelatihan').show();
	  			//$('#dengan_exam').show();
	  		}

	  		if(this.value == '0000000002')
	  		{
	  			$('#show_tipe_exam').show();
	  			$('#show_tipe_pelatihan').hide();

	  			//show tab daftar peserta
	  			$('#navdaftarpeserta').show();
	  			//Hide tab selain daftar peserta
	  			$('#daftarpesertainput').hide();
	  			$('#navpicpanitia').hide();
	  			$('#navrab').hide();
	  			$('#navrundown').hide();
	  			$('#navbiayatraining').hide();
	  			$('#navmateri').hide();
	  		}


		});



		//validasi untuk menampilkan pilih exam
		$('#tipe_exam').on('change', function() {
	  		$('#show_detail_exam').show();
	  		//$('#navmateri').hide();
  			//$('#navrab').hide();
  			//$('#navrundown').hide();
  			//$('#navbiayatraining').hide();
  			//$('#navpicpanitia').hide();
	  			
		});

		//validasi untuk menampilkan rab
		$('#tipe_pelatihan').on('change', function() {
	  		//$('#show_exam').hide();
	  		//$('#navmateri').hide();
  			//$('#navrab').hide();
  			//$('#navrundown').hide();
  			//$('#navbiayatraining').hide();
  			//$('#navpicpanitia').hide();
	  			
		});


		
	 });

	
</script>