<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/jquery.formadvanced.init.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: [
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
				
				
				
		
		//Load Participant Detail Data 
		$('#event').change(function(e){ 
			var id_event = $("option:selected", this).val(); 
			var tablecontent = table.rows().data();
			$.ajax({ 
				url: '<?php echo site_url('list-peserta-event/load-user'); ?>',
				data: { idevent: id_event },
				type: 'post'
			}).done(function(responseData) { 
				var list = $.parseJSON(responseData),
					i = 0; 
				if (list.length > 0) { 
					$.each(list, function () { 
						//console.log('Data in index: ' + i + ' is: ' + this['nama']);
						$('#datatable-buttons').dataTable().fnAddData( [
							this['nama'],
							this['nik'],
							this['email'],
							this['created_date'],
							this['nama_replaced'],
							this['nik_replaced'],
							this['email_replaced']
						]);
					});
				}
				
				console.log(responseData);
			}).fail(function() {
				console.log('Failed');
			});
		});
    } );
</script>  

<!-- Script: Fill Content Event Detail -->
<script>
	$(document).ready(function(){ 
		$('#event').change(function(e){
			e.preventDefault();
			
			var id_event = $("option:selected", this).val(); 
			
			//Set empty variable
			$('#topik_event').val("");
			$('#no_memo').val("");
			$('#tanggal_start').val("");
			$('#tanggal_end').val("");
			$('#kategori_tempat').val("");
			$('#poin_tempat').html("");
			$('#nama_tempat').val("");
			$('#target').val("");
			$('#kategori_event').val("");
			$('#err-load-data').html("");
			
			//Load Event Detail Data 
			var formURL = "<?php echo site_url('list-peserta-event/load-data'); ?>";
			//$("#loader").show();
			$.ajax({ 
				url: formURL,
				data: { idevent: id_event },
				type: 'post'
			}).done(function(data) {  
				var obj = $.parseJSON(data);
				
				if(obj.result == 'OK')
				{
					//location.reload();
					//window.location.href = '<?php echo site_url('list-feedback'); ?>';
					$('#topik_event').val(obj.topik_event);
					$('#no_memo').val(obj.no_memo);
					$('#tanggal_start').val(obj.tanggal_start);
					$('#tanggal_end').val(obj.tanggal_end);
					$('#kategori_tempat').val(obj.kategori_tempat);
					$('#poin_tempat').html("latitude: <span class='text-dark'>"+obj.latitude+"</span> <br/>longitude: <span class='text-dark'>"+obj.longitude+'</span>');
					$('#nama_tempat').val(obj.nama_tempat);
					$('#target').val(obj.target);
					$('#kategori_event').val(obj.kategori_event);
				}
				else
				{
					$('#err-load-data').html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+obj.msg+'</div>');
				}
				
				//$("#loader").hide();
				console.log(data);
			}).fail(function() {
				//$("#loader").hide();
				var failMsg = "Something error happened!";
				alert(failMsg);
			});
			
		});
	});
</script>