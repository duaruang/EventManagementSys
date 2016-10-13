
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
            </div>
            <div class="modal-body">
             <div class="p-20">
                     <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama karyawan</th>
                            <th>Email</th>
                            <th>Unit Kerja</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($load_all_karyawan->karyawan[0]->data as $data){ ?>
                        <tr>
                            <th scope="row"><?php echo $data->karyawan_nip ?></th>
                            <td><?php echo $data->karyawan_nama; ?></td>
                            <td><?php echo $data->karyawan_posisi ?></td>
                            <td><?php echo $data->karyawan_unit_kerja; ?></td>
                            <td><input type="button" name="select_karyawan" class="select_karyawan" value="pilih"></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->