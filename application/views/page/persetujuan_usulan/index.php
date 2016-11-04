<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active">List Persetujuan Administration</li>
        </ol>
    </div>
</div>

<div class="container">                      
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">List Persetujuan Administration</h4>
		</div>
	</div>


	<!-- Page-data -->
	<div class="row">
		<div class="col-sm-12">
			<?php
			$s_message = '';
			$s_message = $this->session->flashdata('message_success');
			if($s_message)
			{
			?>
			<div class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<strong>Well done!</strong> <?php echo $s_message;?>
			</div>
			<?php
				}
				
				$e_message = '';
				$e_message = $this->session->flashdata('message_error');
				if($e_message)
				{
			?>
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
				<?php echo $e_message;?>
			</div>
			<?php
				}
			?>
			
			<div class="card-box table-responsive">
				<p class="text-muted font-13 m-b-30">
					 <a href="<?php echo site_url('list-persetujuan/add'); ?>" class="btn btn-primary waves-effect waves-light">
						<span class="btn-label"><i class="fa fa-plus"></i></span>Tambah List Persetujuan
					 </a>
				</p>
				<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th width="30%">Nama Lengkap</th>
							<th>Unit Kerja</th>
							<th>Posisi</th>
							<th>Status</th>
							<th width="280">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach($load_list->result() as $data){ 
					?>
						<tr>
							<td><strong><?php echo $data->nama_lengkap; ?></strong></td>
							<td><strong><?php echo $data->unit_kerja; ?></strong></td>
							<td><strong><?php echo $data->posisi; ?></strong></td>
							<td><strong><?php echo ($data->is_active=='active'?'Aktif':'Tidak Aktif'); ?></strong></td>
							<td>
								<a href="<?php echo site_url('list-persetujuan/view/'.$data->id);?>" class="btn action btn-warning waves-effect waves-light"><span class="btn-label"><i class="fa fa-eye"></i></span>View</a>&nbsp;&nbsp;
								<a href="<?php echo site_url('list-persetujuan/edit/'.$data->id); ?>" class="btn action btn-warning  waves-effect waves-light"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>&nbsp;&nbsp;
								<a href="#custom-modal" class="btn action btn-danger waves-effect waves-light delete-persetujuan" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" data-id="<?php echo $data->id; ?>" data-nama="<?php echo $data->nama_lengkap ?>"><span class="btn-label"><i class="fa fa-times"></i></span>Delete</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!-- end row -->

	<!-- Modal -->
	<div id="custom-modal" class="modal-demo">
		<button type="button" class="close" onclick="Custombox.close();">
			<span>&times;</span><span class="sr-only">Close</span>
		</button>
		<?php echo form_open('list-persetujuan/process-delete'); ?>
		<h4 class="custom-modal-title" style="background-color: #E9311B;">Delete</h4>
		<div class="custom-modal-text">
			Apakah Anda yakin ingin menghapus List Persetujuan Usulan <strong>"<span class="ss text-danger del-persetujuan"></span>"</strong> beserta List Persetujuan Pengganti nya?
		</div>
		<input type="hidden" class="hidden-id" name="hidden-id" value=""/>
		<input type="hidden" class="hidden-nama" name="hidden-nama" value=""/>
		<div class="modal-footer" style="border:none">
			<button type="button" class="btn btn-default" onclick="Custombox.close();">Batal</button>
			<button type="submit" class="btn btn-danger">Hapus</a>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
