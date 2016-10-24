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
    } );

        
        //Script: Delete Divisi
        $('#datatable-buttons tbody').on('click', '.delete-kategori_tempat', function () {
            var idkategori_tempat = $(this).data('idkategori_tempat'); 
            $('.f-id-kategoritempat').val(idkategori_tempat);

            var namakategori_tempat = $(this).data('namakategori_tempat'); 
            $('.f-nama-kategoritempat').val(namakategori_tempat);
            $(".ss").html(namakategori_tempat);
        } );
</script>       