<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

<!-- Jquery filer js -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>
<!-- Jquery Document Viewer -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery.zohoviewer/jquery.zohoviewer.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- Validation js (Parsleyjs) -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.browser.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		$('#filer_input3').filer({
			limit: 1,
			maxSize: 1, //1 MB
			extensions: ['xls', 'xlsx'],
			changeInput: true,
			showThumbs: true,
			addMore: false
		});
		$('#filer_input4').filer({
			limit: 1,
			maxSize: 2, //1 MB
			extensions: ['docx', 'pdf','jpg', 'jpeg'],
			changeInput: true,
			showThumbs: true,
			addMore: false
		});
});
$(document).ready(function() {
		//FORM VALIDATION
		$('form').parsley();
		//RULES SOME FIELD TO NUMBERIC
		$('.autonumber').autoNumeric('init');
		$('.tinynumber').autoNumeric('init');
		$('.sss').autoNumeric('init');
		//INIT DATATABLE
		$('#exam_table').DataTable();

		$('.embed-preview').zohoViewer();
		$('.zohoviewer').hide();

		$('#denganFormat').on('click', function(e) {

			if($('#denganFormat').is(':checked'))
		    {
		    	 $( "#inputNomorMemo" ).remove();
				 $('<input type="text" class="form-control" data-mask="a-999/PNM-aaa/aa/9999" required id="inputNomorMemo" name="inputNomorMemo" placeholder="contoh : X-999/PNM-XXX/XX/9999"/>').appendTo($('#maskinput'));
			}
			else
			{
				
				$( "#inputNomorMemo" ).remove();
				$('<input type="text" class="form-control" required id="inputNomorMemo" name="inputNomorMemo" placeholder=""/>').appendTo($('#maskinput'));

			}
		});
		/*===============================================================================
        FUNCTION CLICK PILIH EXAM
        ================================================================================*/
		$('.pilih_exam').on('click', function (e) {
			e.preventDefault();
			//remove input hidden data peserta
			$("#wrapabcs").children().remove();
	        var $row = $(this).closest("tr");    // Find the row
	        var idexam	 			= $row.find("td:nth-child(1)");
	        var judulexam 			= $row.find("td:nth-child(2)");
	        var kategori			= $row.find("td:nth-child(6)");
	        var idjadwalexam		= $row.find("td:nth-child(7)");

	       document.getElementById("inputIdExam").value 		= idexam.text(); 
		   document.getElementById("judul_exam").value 			= judulexam.text();
		   document.getElementById("deskripsi").value 			= kategori.text();
		   document.getElementById("inputidjadwalexam").value 	= idjadwalexam.text();
		   var id_jadwal_exam= idjadwalexam.text();
		   //Menampilkan Tabel Peserta
		   $('#show_tabel_peserta').show();
		   //remove data tabel daftar peserta
		   $("#show_tabel_peserta tbody tr").children().remove();
		   $('#loader').show();
		   /*===============================================================================
	        GET DATA FROM SELECTED EXAM
	        ================================================================================*/
		   $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() ?>Event_controller/get_list_peserta/'+id_jadwal_exam,
                    dataType: 'json',
                    cache	: false,
   					processData: false,
                    success: function (data) {

                    	/*===============================================================================
				        STORE DATA FROM SELECTED EXAM TO TABLE PARTICIPANT AND TITLE EXAM
				        ================================================================================*/
                    	var jml_peserta = data.length;
                		$("#inputJumlahPeserta").val(jml_peserta); 

                    	$('#loader').hide();
                    	$.each(data, function(i, item) {
                    		//ADD INPUT HIDDEN 
                    		$('<div>').html ('<input type="hidden" id="inputIdSdm" name="inputIdSdm[]" value="'+data[i].id_sdm +'"><input type="hidden" id="inputNikPeserta" name="inputNikPeserta[]" value="'+data[i].nip +'"><input type="hidden" id="inputNamaPeserta" name="inputNamaPeserta[]" value="'+data[i].nama +'"><input type="hidden" id="inputPosisiPeserta" name="inputPosisiPeserta[]" value="'+data[i].posisi +'">').appendTo('#wrapabcs');
                    	
	                		//STORE DATA TO TABLE PARTICIPANT
						    $('<tr>').html(
						        "<td>" + data[i].nip + "</td><td>" + data[i].nama + "</td><td>" + data[i].posisi + "</td>").appendTo('#daftar_peserta_table');
					    });
                    },
                    error: function (e) {
                    	$('#loader').hide();
                        alert('error connection. please reload');
                    }
                });
	    });

		/*==================================================================================================================
        START/FUNCTION SUBMIT FORM EVENT TO DATABASE
        ====================================================================================================================*/
	    $("#add-form-event").submit(function(e){
			e.preventDefault();
			
			var formURL = "<?php echo site_url('pengajuan-event/process_add'); ?>";
			var frmdata = new FormData(this);

			$("#loader_container").show();
			var xhr = $.ajax({
				url: formURL,
				type: 'POST',
				data: frmdata,
				processData: false,
				contentType: false
			});
			xhr.done(function(data) {
				var obj = $.parseJSON(data);
				
				if(obj.result == 'OK')
				{
					window.location.href = '<?php echo site_url('event'); ?>';
				}
				if(obj.result == 'UP')
				{
					console.log(data);
				}
				if(obj.result == 'NG')
				{
					$("#loader_container").hide();
					$("#m-ap-cab").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> '+obj.msg+'</div>');
				}
			});
			xhr.fail(function() {
				$("#loader_container").hide();
				var failMsg = "Something error happened! as";
			});	
		});
	    /*==================================================================================================================
        END/FUNCTION SUBMIT FORM EVENT TO DATABASE
        ====================================================================================================================*/

		//SET DATE NEXT 3 DAYS FROM NOW DATE
		<?php $tomorrow_timestamp = strtotime("+ 3 day"); ?>

		//INIT DATE RANGE PICKER
		$('.input-limit-datepicker').daterangepicker({
	        toggleActive: true,
	        autoUpdateInput: false,
	        format: 'DD-MM-YYYY',
	        minDate: '<?php echo tgl_eng(date('Y-m-d', $tomorrow_timestamp)); ?>'

	    });

	    //SET VALUE TO FIELD START DATE
	    $('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
	      $('#inputStartTglPelaksanaan').val(picker.startDate.format('YYYY-MM-DD'));
	  	});

	    //SET VALUE TO FIELD END DATE
	    $('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
	      $('#inputAkhirTglPelaksanaan').val(picker.endDate.format('YYYY-MM-DD'));
	  	});
 		
 		$("#show_tipe_exam").hide();
	  	$('#show_tipe_pelatihan').hide();
		$('#myTab').hide();

		/*===============================================================================
    	FUNCTION IF EVENT CATEGORY ON CHANGE
    	================================================================================*/
		$('#inputKategoriEvent').on('change', function() {
			$('#myTab').show();
			/*
			//reset value
			var iu = document.getElementById('inputIdExam');
			var ij = document.getElementById('inputidjadwalexam');
			var je = document.getElementById('judul_exam');
			var im = document.getElementById('deskripsi');

			iu.value= iu.defaultValue;
        	ij.value= ij.defaultValue;
        	je.value= je.defaultValue;
        	im.value= im.defaultValue;*/
        	//$("#inputTipePelatihan").select2("val", "");
        	//$('#inputTipeExam').val('');

        	

	  		/*===============================================================================
        	RULES IF CATEGORY EVENT IS TRAINING
        	================================================================================*/
	  		if(this.value == '0000000001')
	  		{
				$("#inputTipeExam").removeAttr("required");
				$("#deskripsi").removeAttr("required");
				$("#judul_exam").removeAttr("required");
	  			$("#inputTipePelatihan").attr("required","");
	  			$("#inputDenganExam").attr("required","");
	  			
	  			$('#show_tipe_pelatihan').show();

	  			$('#show_tipe_exam').hide();
	  			$('#show_detail_exam').hide();
	  			$('#show_dengan_exam').show();

	  			$('#navdaftarpesertainput').hide();
	  			$('#show_tabel_peserta_input').hide();
	  			$('#navpicpanitia').hide();
	  			$('#navrab').hide();
	  			$('#navrundown').hide();
	  			$('#navbiayatraining').hide();
	  			$('#navmateri').hide();

	  			//remove data tabel daftar peserta
		   		$("#show_tabel_peserta tbody tr").children().remove();
		   		//remove input hidden data peserta
				$("#wrapabcs").children().remove();
				$('#navdaftarpesertainput').hide();
	  		}

	  		/*===============================================================================
        	RULES IF CATEGORY EVENT IS EXAM
        	================================================================================*/
	  		if(this.value == '0000000002')
	  		{
	  			$('#show_tipe_exam').show();
	  			$('#show_detail_exam').show();
	  			//show tab daftar peserta
	  			$('#navdaftarpeserta').show();
	  			//Hide tab selain daftar peserta
	  			$('#show_tipe_pelatihan').hide();
	  			$('#navdaftarpesertainput').hide();
	  			$('#show_tabel_peserta_input').hide();
	  			$('#navpicpanitia').hide();
	  			$('#navrab').hide();
	  			$('#navrundown').hide();
	  			$('#navbiayatraining').hide();
	  			$('#navmateri').hide();
	  			$('#show_dengan_exam').hide();

	  			$("#wrapabcs").children().remove();
	  			
	  			$("#inputTipeExam").attr("required","");
	  			$("#deskripsi").attr("required","");
				$("#judul_exam").attr("required","");
	  			$("#inputTipePelatihan").removeAttr("required");
	  			$("#inputDenganExam").removeAttr("required");
	  		}

	  		/*===============================================================================
        	RULES IF CATEGORY EVENT IS OTHERS
        	================================================================================*/
	  		if(this.value == '0000000004')
	  		{
	  			
	  			$('#navrab').show();
	  			$('#navrundown').show();
	  			$('#navdaftarpesertainput').show();
	  			$('#show_tabel_peserta_input').show();
	  			$('#navpicpanitia').show();
	  			//show tab daftar peserta

	  			//Hide tab selain daftar peserta
	  			$('#show_detail_exam').hide();
	  			$('#navdaftarpeserta').hide();
	  			$('#show_tabel_peserta').hide();
	  			$('#navbiayatraining').hide();
	  			$('#navmateri').hide();
	  			$('#show_dengan_exam').hide();
	  			$('#show_tipe_exam').hide();
	  			$('#show_tipe_pelatihan').hide();

	  			$("#inputTipeExam").removeAttr("required");
	  			$("#deskripsi").removeAttr("required");
				$("#judul_exam").removeAttr("required");
	  		}
		});



		//validasi untuk menampilkan rab
		$('#tipe_pelatihan').on('change', function() {
	  		$('#show_exam').hide();
	  		$('#navmateri').hide();
  			$('#navrab').hide();
  			$('#navrundown').hide();
  			$('#navbiayatraining').hide();
  			$('#navpicpanitia').hide();
	  			
		});

		$('input[name="inputDenganExam"]').on('click change', function(e) {
		    var variabel_x = $('input[name="inputDenganExam"]:checked').val();

		    /*===============================================================================
        	RULES WITH EXAM
        	================================================================================*/
		    if(variabel_x == 'ya')
		    {
		    	//show
		    	$('#show_tipe_exam').show();
		    	$('#show_detail_exam').show();
		    	$('#navdaftarpeserta').show();

		    	//hide 
		    	$('#navdaftarpesertainput').hide();
	  			$('#show_tabel_peserta_input').hide();
	  			$('#navmateri').hide();
	  			$('#navrab').hide();
	  			$('#navrundown').hide();
	  			$('#navbiayatraining').hide();
	  			$('#navpicpanitia').hide();

		    	//reset value
		    	$("#show_tabel_peserta tbody tr").children().remove();
		    	$("#daftar_peserta_table_input tbody tr").children().remove();
		    	document.getElementById("judul_exam").value 		= ''; 
		    	document.getElementById("deskripsi").value 			= ''; 
		    	document.getElementById("inputIdExam").value 		= ''; 
		    	document.getElementById("inputidjadwalexam").value 	= ''; 

		   		//add attribute
		   		$("#inputTipeExam").attr("required","");
	  			$("#deskripsi").attr("required","");
				$("#judul_exam").attr("required","");

				//set zero value rab
				$('#table-rab').find('input').each(function() {
					$(this).val(0);
				});

		    }

		    /*===============================================================================
        	RULES WITHOUT EXAM
        	================================================================================*/
		    if(variabel_x == 'tidak')
		    {
		    	$('#show_tipe_exam').hide();
		    	$('#show_detail_exam').hide();
		    	$('#navdaftarpesertainput').show();
		    	$('#show_tabel_peserta_input').show();
		    	$('#navdaftarpeserta').hide();
		    	$('#show_tabel_peserta').hide();
		    	
		    	$('#navmateri').show();
	  			$('#navrab').show();
	  			$('#navrundown').show();
	  			$('#navbiayatraining').show();
	  			$('#navpicpanitia').show();

		    	//remove input hidden data peserta
				$("#wrapabcs").children().remove();
		    	$("#show_tabel_peserta tbody tr").children().remove();
		    	document.getElementById("judul_exam").value 		= ''; 
		    	document.getElementById("deskripsi").value 			= ''; 
		    	document.getElementById("inputIdExam").value 		= ''; 
		    	document.getElementById("inputidjadwalexam").value 	= ''; 

		   		//add attribute
		   		$("#inputTipeExam").removeAttr("required");
	  			$("#deskripsi").removeAttr("required");
				$("#judul_exam").removeAttr("required");
		    	
		    }
		});
		/*===============================================================================
        FUNCTION GET ALL KARYAWAN TO GET SELECTED PARTICIPANT
        ================================================================================*/
		$('#get-list-psrt').on('click', function (e) {
			e.preventDefault();
			var table  = $('#get_list_peserta_table').DataTable({
				"bRetrieve" : "true",
				 ajax: {
			        url: '<?php echo site_url('Event_controller/get_all_list_peserta'); ?>',
			        type: 'POST',
			    	dataSrc: 'data'
			    },
			    'columnDefs': [{
			         'targets': 0,
			         'searchable':false,
			         'orderable':false,
			         'className': 'dt-body-center',
			         'render': function (data, type, full, meta){
			             return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
			         }
			      }],
		        select: {
		            style: 'multi',
		            selector: 'input[type="checkbox"]'
		        },
				columns: [
					{ data: "karyawan_id" },
					{ data: "karyawan_nip" },
					{ data: "karyawan_nama"},
					{ data: "karyawan_posisi"},
					{ data: "karyawan_unit_kerja"}
				]
			});
			/*===============================================================================
        	METHOD STORE DATA TO TABLE PARTICIPANT FROM SELECTED EMPLOYEE 
        	================================================================================*/
			$('#inputpeserta').on('click', function(){
				$("#daftar_peserta_table_input tbody tr").children().remove();
				var jml_peserta=0;
				var rowData = [];
	            var rowData = table.rows('.selected').data();
	            var countdata = table.rows('.selected').data().length;
	            //console.log(countdata);
	            //var obj = JSON.stringify(rowData);
	            //var parsejson = JSON.parse(obj);
                //$("#inputJumlahPeserta").val(countdata); 

				$("#wrapabcs").children().remove();
				jml_peserta = countdata;
                $("#inputJumlahPeserta").val(jml_peserta); 
	            for(i=0;i<countdata;i++)
	            {

	            $('<div>').html ('<input type="hidden" id="inputIdSdm" name="inputIdSdm[]" value="'+rowData[i].karyawan_id +'"><input type="hidden" id="inputNikPeserta" name="inputNikPeserta[]" value="'+rowData[i].karyawan_nip +'"><input type="hidden" id="inputNamaPeserta" name="inputNamaPeserta[]" value="'+rowData[i].karyawan_nama +'"><input type="hidden" id="inputPosisiPeserta" name="inputPosisiPeserta[]" value="'+rowData[i].karyawan_posisi +'">').appendTo('#wrapabcs');	

	            $('#daftar_peserta_table_input tbody').prepend( '<tr><td>'+rowData[i].karyawan_nip+'</td><td> '+rowData[i].karyawan_nama+'</td><td> '+rowData[i].karyawan_posisi+'</td></tr>' );
	        	}
	        });
			/*===============================================================================
        	METHOD SELECT ALL EMPLOYEE TO TABLE PARTICIPANT
        	================================================================================*/
			$('#example-select-all').on('click', function(){
		      // Get all rows with search applied
		      var rows = table.rows({ 'search': 'applied' }).nodes();

		      // Check/uncheck checkboxes for all rows in the table
		     	if (this.checked == true){
		     		$('input[type="checkbox"]', rows).prop('checked', this.checked, true);
		      		table.rows({filter:'applied'}).select();
		  		}else
		  		{
		  			$('input[type="checkbox"]', rows).prop('checked', this.checked, false);
		  			table.rows({filter:'applied'}).deselect();
		  		}
		   	});
		});

		/*===============================================================================
        FUNCTION GET TRAINER INTERNAL
        ================================================================================*/
		$('#get-trainer-internal').on('click', function (e) {
			e.preventDefault();
			var table_trainer  = $('#get_list_trainer_internal_table').DataTable({
				"bRetrieve" : "true",
				 ajax: {
			        url: '<?php echo site_url('Event_controller/get_trainer_internal'); ?>',
			        type: 'POST',
			    	dataSrc: 'data'
			    },
			    'columnDefs': [{
			         'targets': 0,
			         'searchable':false,
			         'orderable':false,
			         'className': 'dt-body-center',
			         'render': function (data, type, full, meta){
			             return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
			         }
			      }],
		        select: {
		            style: 'multi',
		            selector: 'input[type="checkbox"]'
		        },
				columns: [
					{ data: "id" },
					{ data: "nama_pemateri" },
					{ data: "posisi" },
					{ data: "unit_kerja" }
				]
			});

			/*===============================================================================
        	METHOD STORE DATA TO TABLE TRAINER FROM SELECTED TRAINER 
        	================================================================================*/
			$('#inputtrainer').on('click', function(){
				$("#table-trainer tbody tr").children().remove();
				var rowData = [];
	            var rowData = table_trainer.rows('.selected').data();
	            var countdata = table_trainer.rows('.selected').data().length;
	            //console.log(countdata);
	            //var obj = JSON.stringify(rowData);
	            //var parsejson = JSON.parse(obj);
                //$("#inputJumlahPeserta").val(countdata); 

	            for(i=0;i<countdata;i++)
	            {

	            	$('#table-trainer tbody').prepend( '<tr><td> '+rowData[i].nama_pemateri+'<input type="hidden" id="inputIdTrainer" name="inputIdTrainer[]" value="'+rowData[i].id +'"><input type="hidden" id="inputPerusahaan" name="inputPerusahaan[]" value="internal"></td><td>PNM</td><td><a href="javascript:void(0);" class="remTrainer" class="btn btn-danger remove-pic" type="button"><i class="fa fa-2x fa-times text-danger"></i></a></td></tr>' );
	        	}
	        });
			/*===============================================================================
        	METHOD SELECT ALL TRAINER 
        	================================================================================*/
			$('#select_all_trainer').on('click', function(){
		      // Get all rows with search applied
		      var rows = table_trainer.rows({ 'search': 'applied' }).nodes();

		      // Check/uncheck checkboxes for all rows in the table
		     	if (this.checked == true){
		     		$('input[type="checkbox"]', rows).prop('checked', this.checked, true);
		      		table_trainer.rows({filter:'applied'}).select();
		  		}else
		  		{
		  			$('input[type="checkbox"]', rows).prop('checked', this.checked, false);
		  			table_trainer.rows({filter:'applied'}).deselect();
		  		}
		   	});
		});
		/*===============================================================================
    	FUNCTION remove ROWS TRAINER
    	================================================================================*/
		 $("#table-trainer tbody").on('click','.remTrainer',function(){
	        $(this).parent().parent().remove();
	    });


		/*===============================================================================
        FUNCTION GET PIC
        ================================================================================*/
		$('#get-pic').on('click', function (e) {
			e.preventDefault();
			var table_pic  = $('#get_list_pic_table').DataTable({
				"bRetrieve" : "true",
				 ajax: {
			        url: '<?php echo site_url('Event_controller/get_all_list_peserta'); ?>',
			        type: 'POST',
			    	dataSrc: 'data'
			    },
			    'columnDefs': [{
			         'targets': 0,
			         'searchable':false,
			         'orderable':false,
			         'className': 'dt-body-center',
			         'render': function (data, type, full, meta){
			             return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
			         }
			      }],
		        select: {
		            style: 'multi',
		            selector: 'input[type="checkbox"]'
		        },
				columns: [
					{ data: "karyawan_id" },
					{ data: "karyawan_nip" },
					{ data: "karyawan_nama"},
					{ data: "karyawan_posisi"},
					{ data: "karyawan_unit_kerja"}
				]
			});

			/*===============================================================================
        	METHOD STORE DATA TO TABLE PIC FROM SELECTED PIC 
        	================================================================================*/
			$('#inputpic').on('click', function(){
				$("#table-picpanitia tbody tr").children().remove();
				var rowData = [];
	            var rowData = table_pic.rows('.selected').data();
	            var countdata = table_pic.rows('.selected').data().length;
	            //console.log(countdata);
	            //var obj = JSON.stringify(rowData);
	            //var parsejson = JSON.parse(obj);
                //$("#inputJumlahPeserta").val(countdata); 
	            for(i=0;i<countdata;i++)
	            {

	            	$('#table-picpanitia tbody').prepend( '<tr><td> '+rowData[i].karyawan_nama+'<input type="hidden" id="nama_pic" name="nama_pic[]" value="'+rowData[i].karyawan_nama +'"><input type="hidden" id="id_karyawan" name="id_karyawan[]" value="'+rowData[i].karyawan_nip+'"></td><td><a href="javascript:void(0);" class="remCF" class="btn btn-danger remove-pic" type="button"><i class="fa fa-2x fa-times text-danger"></i></a></td></tr>' );
	        	}
	        });
			/*===============================================================================
        	METHOD SELECT ALL PIC 
        	================================================================================*/
			$('#select_all_pic').on('click', function(){
		      // Get all rows with search applied
		      var rows = table_pic.rows({ 'search': 'applied' }).nodes();

		      // Check/uncheck checkboxes for all rows in the table
		     	if (this.checked == true){
		     		$('input[type="checkbox"]', rows).prop('checked', this.checked, true);
		      		table_pic.rows({filter:'applied'}).select();
		  		}else
		  		{
		  			$('input[type="checkbox"]', rows).prop('checked', this.checked, false);
		  			table_pic.rows({filter:'applied'}).deselect();
		  		}
		   	});
		});
		/*===============================================================================
    	FUNCTION ADD ROWS PIC 
    	================================================================================*/
		$('#add-pic').on('click', function(){
			 $('#table-picpanitia tbody').append('<tr><td><input type="text" class="form-control" placeholder="Type something" id="nama_pic" name="nama_pic[]"/><input type="hidden" id="id_karyawan" name="id_karyawan[]" value=""></td><td><a href="javascript:void(0);" class="remCF" class="btn btn-danger remove-pic" type="button"><i class="fa fa-2x fa-times text-danger"></i></a></td></tr>');
		});

		 $("#table-picpanitia tbody").on('click','.remCF',function(){
	        $(this).parent().parent().remove();
	    });
	
});
</script>

		<!-- JavaScript to show google map -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ5wb1vbg8uFrHhBGvhI9Ge-pqtzbwcN4"></script>    
		<script type="text/javascript">
		    $(document).ready(function() {
			  	var marker = null;;
			  	var lats = null;;
			  	var lngs = null;;
			  	var address = null;;
		        var geocoder = new google.maps.Geocoder();
		        var map = new google.maps.Map(document.getElementById('dvMap'), {
		          zoom: 12,
		          center: {lat:  -0.789275, lng: 113.92132700000002}
		        });

		        document.getElementById('submit').addEventListener('click', function() {
				    geocodeAddress(geocoder, map);
				  });


		      	google.maps.event.addListener(map, 'click', function(event) {
		      		var myLatLng = event.latLng;
				    lats = myLatLng.lat();
				    lngs = myLatLng.lng();
				  	placeMarker(myLatLng);
				});

				function placeMarker(location) {
				  if ( marker ) {
				    marker.setPosition(location);
				  } else {
				    marker = new google.maps.Marker({
				      position: location,
				      map: map
				    });
				  }
				}

		      	function geocodeAddress(geocoder, resultsMap) {
			        address = $('#address').val();
			        
			        
			        geocoder.geocode({'address': address}, function(results, status) {
			          if (status == google.maps.GeocoderStatus.OK) {
			            resultsMap.setCenter(results[0].geometry.location);
			            lats =results[0].geometry.location.lat;
			            lngs =results[0].geometry.location.lng;
			            placeMarker(results[0].geometry.location);
			          } else {
			            console.log('google maps was not successful for the following reason: ' + status);
			          }
			        });
		      	}


		      	$('.gmap').on('shown.bs.modal', function () {
				    google.maps.event.trigger(map, "resize");
				});

				$('#submit-map').on('click', function(){
					if(lats == null || lngs == null)
					{

					}else
					{
						//set empty
						$("#ev_latitude").val('');
						$("#ev_longitude").val(''); 
						$('#inputNamaTempat').val('');
				    	$('span#lat').empty();
						$('span#lng').empty();

						//set value latitude, longitude
						$('span#lat').append(lats);
						$('span#lng').append(lngs);
						$('#inputNamaTempat').val(address);
						$("#ev_latitude").val(lats);
						$("#ev_longitude").val(lngs);

						//close popup 
						$('.gmap').modal('toggle');
					}
				});
		    	/*
		        var mapOptions = {
		            center: new google.maps.LatLng(-6.933096, 107.623928),
		            zoom: 3,
		            mapTypeId: google.maps.MapTypeId.ROADMAP
		        };

		        var infoWindow = new google.maps.InfoWindow();
		        var latlngbounds = new google.maps.LatLngBounds();
		        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
		        google.maps.event.trigger(map, 'resize');
		        google.maps.event.addListener(map, 'click', function (e) {
		        	$('.gmap').modal('toggle');
		            alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
		        });
		        $('.gmap').on('shown.bs.modal', function () {
				    google.maps.event.trigger(map, "resize");
				});*/
		    });
		</script>
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

			 	
				   var total = 0;
				   var $table;
				   var ac;
				$('#table-rab input#jumlah,#table-rab input#frekwensi,#table-rab input#unit_cost').keyup(function(event) {
					//var abc = $("input#downpayment").autoNumeric('get');
				  	var sum = 0;
				    var thisRow = $(this).closest('tr');
				    $table = $('#table-rab input').closest('table');

				    var jumlah_unit 	= thisRow.find("input#jumlah").autoNumeric('get');
				    var frekwensi 		= thisRow.find("input#frekwensi").autoNumeric('get');
				    var harga_unit 		= thisRow.find("td input#unit_cost").autoNumeric('get');

				    
				    var sum = (jumlah_unit*harga_unit)*frekwensi;
				    
				    var total_jumlah = thisRow.find("td input#total_cost").val(sum);
				    total_jumlah.autoNumeric('set', sum);

				    var id_parent=1;
				    
				    $table.find('tr.parent-class').each(function() {
				    	var totaltr=0;
				    	$table.find('tr#parent_'+id_parent+' input#total_cost').each(function() {
				    		totaltr += parseInt($(this).autoNumeric('get'));
				    	});
				    	$table.find('tr#parent_'+id_parent+' input#totalcost').val(totaltr);

				    	$('tr#parent_'+id_parent+' input#totalcost').autoNumeric('set', totaltr);
				    	id_parent++;

				    });

				    ac = 0;
				    $('#table-rab').find('tr.parent-class').each(function() {
				    	ac +=  parseInt($(this).find('input#totalcost').autoNumeric('get'));
				    	
					    $table.find('tr input#grand_total').val(ac);
					    $('#grand_total').autoNumeric('set', ac);
				    });
			});

			$('input#downpayment').keyup(function() {

				    var down = $("input#downpayment").autoNumeric('get');
			  		
			  		var all_total= ac-down;

				    $table.find('tr input#grand_total').val(all_total);
				    $('#grand_total').autoNumeric('set', all_total);

				});
		</script>