<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active">Bisnis Unit Administration</li>
        </ol>
    </div>
</div>

<div class="container">                      
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">Bisnis Unit Administration</h4>
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
					 <a href="<?php echo site_url('bisnis-unit-jabatan/add'); ?>" class="btn btn-primary waves-effect waves-light">
						<span class="btn-label"><i class="fa fa-plus"></i></span>Tambah Bisnis Unit dan Jabatan
					 </a>
				</p>
				<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th width="30%">Deskripsi</th>
							<th>Status</th>
							<th width="280">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php if($load_bisnis->num_rows() > 0){ ?>
					<?php 
						foreach($load_bisnis->result() as $data){ 
							
							$load_jabatan = $this->bisnis_unit_model->select_jabatan($data->id);
							$child_exist = 0; 
							if($load_jabatan->num_rows() > 0)
							{
								$child_exist = 1;
							}
					?>
						<tr>
							<td><strong><?php echo ($child_exist==1 ? '<i class="fa fa-caret-down"></i> '.$data->deskripsi:$data->deskripsi); ?></strong></td>
							<td><strong><?php echo ($data->is_active=='active'?'Aktif':'Tidak Aktif'); ?></strong></td>
							<td>
								<a href="<?php echo site_url('bisnis-unit-jabatan/view/1/'.$data->id);?>" class="btn action btn-warning waves-effect waves-light"><span class="btn-label"><i class="fa fa-eye"></i></span>View</a>&nbsp;&nbsp;
								<a href="<?php echo site_url('bisnis-unit-jabatan/edit/1/'.$data->id); ?>" class="btn action btn-warning  waves-effect waves-light"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>&nbsp;&nbsp;
								<a href="#custom-modal" class="btn action btn-danger waves-effect waves-light delete-bisnis-jabatan" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" data-id="<?php echo $data->id; ?>" data-type="1" data-deskripsi="<?php echo $data->deskripsi ?>"><span class="btn-label"><i class="fa fa-times"></i></span>Delete</a>
							</td>
						</tr>
						<?php 
							if($child_exist==1)
							{
								foreach($load_jabatan->result() as $j)
								{
						?>
						<tr>
							<td><span style="margin-left:25px"><?php echo $j->nama_jabatan; ?></span></td>
							<td><?php echo ($j->is_active=='active'?'Aktif':'Tidak Aktif'); ?></td>
							<td>
								<a href="<?php echo site_url('bisnis-unit-jabatan/view/2/'.$j->id);?>" class="btn action btn-warning waves-effect waves-light"><span class="btn-label"><i class="fa fa-eye"></i></span>View</a>&nbsp;&nbsp;
								<a href="<?php echo site_url('bisnis-unit-jabatan/edit/2/'.$j->id); ?>" class="btn action btn-warning  waves-effect waves-light"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>&nbsp;&nbsp;
								<a href="#custom-modal" class="btn action btn-danger waves-effect waves-light delete-bisnis-jabatan" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" data-id="<?php echo $j->id; ?>" data-type="2" data-deskripsi="<?php echo $j->nama_jabatan; ?>"><span class="btn-label"><i class="fa fa-times"></i></span>Delete</a>
							</td>
						</tr>
						<?php
								}
							}
						 } 
						?>
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
		<?php echo form_open('bisnis-unit-jabatan/process-delete'); ?>
		<h4 class="custom-modal-title" style="background-color: #E9311B;">Delete</h4>
		<div class="custom-modal-text">
			<div class="text-delete-custom"></div>
			<!--Apakah Anda yakin ingin menghapus Kategori RAB <strong>"<span class="ss text-danger del-rab"></span>"</strong><span class="additional-text"></span>?-->
		</div>
		<input type="hidden" class="hidden-id" name="hidden-id" value=""/>
		<input type="hidden" class="hidden-type" name="hidden-type" value=""/>
		<input type="hidden" class="hidden-deskripsi" name="hidden-deskripsi" value=""/>
		<div class="modal-footer" style="border:none">
			<button type="button" class="btn btn-default" onclick="Custombox.close();">Batal</button>
			<button type="submit" class="btn btn-danger">Hapus</a>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
