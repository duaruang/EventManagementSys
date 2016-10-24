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
<!-- Modal-Effect -->
<script src="<?php echo base_url(); ?>assets/plugins/custombox/js/custombox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custombox/js/legacy.min.js"></script>
<!-- Responsive examples -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
			bSort : false,
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
				
		
		//Script: Delete User Group
		$('#datatable-buttons tbody').on('click', '.delete-rab', function () {
			var id_rab = $(this).data('idrab'); 
			var id_parent = $(this).data('idparent'); 
			var deskripsi = $(this).data('deskripsi'); 
			
			if(id_parent=='') $('.text-delete-custom').html('Apakah Anda yakin ingin menghapus Kategori RAB <strong>"<span class="ss text-danger">' + deskripsi + '</span>"</strong> beserta Sub-Kategori nya?');
			else $('.text-delete-custom').html('Apakah Anda yakin ingin menghapus Sub-Kategori RAB <strong>"<span class="ss text-danger">' + deskripsi + '</span>"</strong>?');
			
			$('.hidden-idrab').val(id_rab);
			$('.hidden-idparent').val(id_parent);
			$('.hidden-deskripsi').val(deskripsi);
		});
    } );
</script>       