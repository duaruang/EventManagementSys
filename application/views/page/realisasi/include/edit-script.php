<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

 <!-- Autocomplete -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
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
<script>
<?php $data = $load_events->result_array(); ?>
	var selectedValues = new Array();
	<?php $array_es = explode(';', $data[0]['target_sasaran']); 
	$arrlength = count($array_es);
	for($x = 0; $x < $arrlength; $x++) { ?>  
	selectedValues[<?php echo $x; ?>] = <?php echo '"'.$array_es[$x].'"'; ?>;
	<?php } ?>
$("#inputSasaranTarget").val(selectedValues);
</script>
<script type="text/javascript">
$(document).ready(function() {
		$('#filer_input3').filer({
			limit: 4,
			maxSize: 2, //2 MB
			extensions: ['jpg','jpeg','png'],
			changeInput: true,
			showThumbs: true,
			addMore: true
		});
		$('#filer_input4').filer({
			limit: 1,
			maxSize: 2, //1 MB
			extensions: ['docx', 'pdf','jpg', 'jpeg'],
			changeInput: true,
			showThumbs: true,
			addMore: false
		});
		$('#filer_input5').filer({
			limit: 1,
			maxSize: 2, //2 MB
			extensions: ['pdf','docx'],
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

		
		$('#anggaran').hide();
		$('#inputProgramAnggaran').on('change', function (e) {
			e.preventDefault(); 
			
			var inputanggaran = $(this).val(); 
			
			//Load Deskripsi Kegiatan
			if(inputanggaran != '')
			{
				$.ajax({
					url: "<?php echo base_url()?>event/get_parent_anggaran",
					data: "anggaran_id="+inputanggaran,
					cache: false,
					success: function(data){
						$('#anggaran').show(10);
						$("#anggaran").html(data);
					}
				});
			}
			else
			{
				$('#anggaran').hide(650);
			}
		});
		

		/*==================================================================================================================
        START/FUNCTION SUBMIT FORM EVENT TO DATABASE
        ====================================================================================================================*/
	    $("#edit-form-event").submit(function(e){
			e.preventDefault();
			for ( instance in CKEDITOR.instances ) {
		        CKEDITOR.instances[instance].updateElement();
		    }
        	var button_boolean	= $('input[name="draft"]').is(':focus');
        	
			var formURL = "<?php echo site_url('pengajuan-event/process_edit'); ?>";
			var frmdata = new FormData(this);
			if(button_boolean == true)
			{
				frmdata.append('draft', 'draft');
			}
			if(button_boolean == false)
			{
				frmdata.append('submit', 'submit');
				
			}
			
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
			console.log(button_boolean);
		});
	    /*==================================================================================================================
        END/FUNCTION SUBMIT FORM EVENT TO DATABASE
        ====================================================================================================================*/
		//INIT DATE RANGE PICKER
		$('.input-limit-datepicker').daterangepicker({
	        toggleActive: true,
	        autoUpdateInput: false,
	        format: 'DD-MM-YYYY'
	    });

	    //SET VALUE TO FIELD START DATE
	    $('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
	      $('#inputStartTglPelaksanaan').val(picker.startDate.format('YYYY-MM-DD'));
	  	});

	    //SET VALUE TO FIELD END DATE
	    $('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
	      $('#inputAkhirTglPelaksanaan').val(picker.endDate.format('YYYY-MM-DD'));
	  	});
 		
		/*===============================================================================
        FUNCTION GET TRAINER INTERNAL
        ================================================================================*/
        var count_trainer =  $('#table-trainer tbody #inputDurasiTrainer').length;
        for(i=0;i<count_trainer;i++)
        {
        	$('#autocomplete-ajax'+i).autocomplete({
		    	serviceUrl: '<?php echo base_url() ?>event/get_materi'
		    });
		 	$('#table-trainer tbody td').find('#namaPemateri'+i).autocomplete({

		    	serviceUrl: '<?php echo base_url() ?>realisasi_controller/get_trainer',
		    	onSelect: function(suggestion) {
					$(this).parent().find("#inputIdTrainer").val(suggestion.data);
					console.log($(this).parent().find("#inputIdTrainer").val(suggestion.data));
				}
		    });
        }
    	/*===============================================================================
    	FUNCTION ADD ROWS trainer 
    	================================================================================*/
		$('#add-trainer').on('click', function(){

			 $('#table-trainer tbody').append('<tr><td><input type="text" class="form-control" id="namaPemateri'+(++count_trainer)+'"><input type="hidden" class="form-control" id="inputIdTrainer" name="inputIdTrainer[]"><input type="hidden" id="inputPerusahaan" name="inputPerusahaan[]" value="internal"></td><td><input type="text" class="form-control" id="autocomplete-ajax'+count_trainer+'" name="inputMateri[]" ></td><td><input type="text" class="form-control tinyn" id="inputDurasiTrainer" name="inputDurasiTrainer[]" data-v-min="1" data-v-max="999"></td><td><input type="text" class="form-control tinyn" data-v-min="1" data-v-max="4" id="inputNilaiEvaluasi" name="inputNilaiEvaluasi[]"></td><td><a href="javascript:void(0);" class="remTrainer" class="btn btn-danger remove-pic" type="button"><i class="fa fa-2x fa-times text-danger"></i></a></td></tr>');

			$('#autocomplete-ajax'+count_trainer).autocomplete({
		    	serviceUrl: '<?php echo base_url() ?>event/get_materi'
		    });
			$('#table-trainer tbody td').find('#namaPemateri'+count_trainer).autocomplete({
		    	serviceUrl: '<?php echo base_url() ?>realisasi_controller/get_trainer',
		    	onSelect: function(suggestion) {
					$(this).parent().find("#inputIdTrainer").val(suggestion.data);
				}
			});

			 $('.tinyn').autoNumeric('init');

		});
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
			        url: '<?php echo site_url('Realisasi_controller/get_all_list_pesertas'); ?>',
			        type: 'POST',
			    	dataSrc: 'data'
			    },
			    "rowCallback": function ( row, data, index ) {
		            if(data.karyawan_nip == 'MKR2259.07.16')
		            {
		            	$('tr',row).addClass('selected');
		            	console.log($('tr',row));
		            }
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
				],
				rowId: 'karyawan_nip'
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
				   var ac = $('#grand_total').val();
				$('#table-rab input#jumlah,#table-rab input#frekwensi,#table-rab input#unit_cost').keyup(function(event) {
					//var abc = $("input#downpayment").autoNumeric('get');
				  	var sum = 0;
				  	 ac = 0;
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

				   
				    $('#table-rab').find('tr.parent-class').each(function() {
				    	ac +=  parseInt($(this).find('input#totalcost').autoNumeric('get'));
				    	
					    $table.find('tr input#grand_total').val(ac);
					    $('#grand_total').autoNumeric('set', ac);
				    });
				    var down = $("input#downpayment").autoNumeric('get');
			  		 
			  		var all_total= ac-down;
				    $('#table-rab input').find('tr input#grand_total').val(all_total);
				    $('#grand_total').autoNumeric('set', all_total);
			});

			$('input#downpayment').keyup(function() {

				    var down = $("input#downpayment").autoNumeric('get');
			  		 
			  		var all_total= ac-down;
				    $('#table-rab input').find('tr input#grand_total').val(all_total);
				    $('#grand_total').autoNumeric('set', all_total);

			});
		</script>