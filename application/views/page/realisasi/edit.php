<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('event'); ?>">List Event</a></li>
            <li class="active">Edit Pengajuan Event</li>
        </ol>
    </div>
</div>
<?php $data = $load_event->result_array(); ?>
<div class="container"> 

<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Pengajuan Event</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
             <div class="form-group" id="loader_container" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: rgba(255,255,255,0.9);z-index: 1000;">
<img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif">
            </div>
            <div class="card-box">
                <div class="row m-t-10">
                    <div class="col-sm-12">
                    <div class="p-20">
                        <?php 
                        $attrib = array('class' => 'form-horizontal','id'=>'edit-form-event','name'=>'edit-form-event','enctype'=>'multipart/form-data');
                        echo form_open('',$attrib); ?>
                            <?php echo form_hidden('id_event', $data[0]['idevent']); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Nomor Memo <span class="text-danger">*</span></label>
                                <div class="col-sm-3" id="maskinput">
                                    <input type="text" class="form-control" data-mask="a-999/PNM-aaa/aa/9999" required id="inputNomorMemo" name="inputNomorMemo" placeholder="contoh : X-999/PNM-XXX/XX/9999" value="<?php echo $data[0]['nomor_memo']; ?>" />
                                </div>
                                <div class="col-sm-2">
                                     <label class="c-input c-checkbox">
                                        <input type="checkbox" id="denganFormat" name="denganFormat" value="use" checked="">
                                        <span class="c-indicator"></span> 
                                        Gunakan Format Nomor Memo
                                    </label> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Event <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required placeholder="Type something" id="inputNamaEvent" name="inputNamaEvent" value="<?php echo $data[0]['nama_event']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Topik Event <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required placeholder="Type something" id="inputTopikEvent" name="inputTopikEvent" value="<?php echo $data[0]['topik_event']; ?>"/>
                                </div>
                            </div>
                            <!--
                            <div class="form-group row">
                                <label class="col-sm-2">Lokasi Kerja</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" readonly="" value="" id="inputLokasiKerja" name="inputLokasiKerja" />
                                </div>
                            </div>-->
                            <div class="form-group row">
                                <label class="col-sm-2">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                     <div class="input-group">
                                        <input type="text" class="form-control input-limit-datepicker" id="inputStartTglPelaksanaan" name="inputStartTglPelaksanaan" required value="<?php echo $data[0]['mulai_tanggal_pelaksanaan']; ?>"/>
                                        <span class="input-group-addon bg-custom b-0">s/d</span>
                                            <input type="text" class="form-control" readonly="" id="inputAkhirTglPelaksanaan" name="inputAkhirTglPelaksanaan" value="<?php echo $data[0]['selesai_tanggal_pelaksanaan']; ?>"/>
                                        <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                    </div><!-- input-group -->
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-2">Tempat Pelaksanaan <span class="text-danger">*</span></label>
                                <div class="col-sm-2">
                                     <?php $style_d= array('class'=>'form-control select2', 'Required'=>'','id'=>'inputTempatPelaksanaan'); ?>
                                    <?php echo form_dropdown('inputTempatPelaksanaan', $load_kategori_tempat, $data[0]['id_kategori_tempat_pelaksanaan'],$style_d); ?>
                                </div>
                                <div class="col-sm-2"><a class="maps-google" data-toggle="modal" data-target=".gmap"><i class="fa fa-2x fa-map-marker"></i> get location</a></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-5">
                                    <textarea type="text" class="form-control" required="" placeholder="Nama Tempat" id="inputNamaTempat" name="inputNamaTempat" rows="3"><?php echo $data[0]['nama_tempat']; ?></textarea>
                                    <span class="font-13 text-muted">latitude : <span id="lat" class="text-dark"><?php echo $data[0]['latitude']; ?></span>, longitude :<span id="lng" class="text-dark"><?php echo $data[0]['longitude']; ?></span></span>
                                    <input type="hidden" id="ev_latitude" name="ev_latitude" value="<?php echo $data[0]['latitude']; ?>">
                                    <input type="hidden" id="ev_longitude" name="ev_longitude" value="<?php echo $data[0]['longitude']; ?>">
                                </div>
                            </div>
                            <div class="form-group row input_anggaran">
                                <label class="col-sm-2">Program Anggaran <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <?php $style_d= array('class'=>'form-control select2', 'Required'=>'','id'=>'inputProgramAnggaran'); ?>
                                    <?php echo form_dropdown('inputProgramAnggaran', $load_program_anggaran, $data[0]['id_program_anggaran'],$style_d); ?>
                                    <span class="text-muted" id="anggaran"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Target / Sasaran Peserta <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                     <?php $style_d= array('class'=>'select2 form-control select2-multiple', 'Required'=>'','id'=>'inputSasaranTarget','multiple'=>'multiple', 'multiple','placeholder'=>'--pilih target--'); ?>
                                    <?php echo form_dropdown('inputSasaranTarget[]', $load_bu, $data[0]['target_sasaran'],$style_d); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Kategori Event <span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <?php $style_d= array('class'=>'form-control select2', 'Required'=>'','id'=>'inputKategoriEvent'); ?>
                                    <?php echo form_dropdown('inputKategoriEvent', $load_kategori_event, $data[0]['id_kategori_event'],$style_d); ?>
                               
                                </div>
                            </div>

                            <div class="form-group row" id="show_dengan_exam"  <?php  if($data[0]['kategori_event'] ==  'Training' ){ ?> style="display: show;" <?php }else{ ?> style="display: none;" <?php }?>>
                                <label class="col-sm-2">Dengan Exam</label>
                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <div class="radio radio-success">
                                                <input name="inputDenganExam" class="denganExam" id="radio1" value="ya" type="radio" <?php if($data[0]['dengan_exam'] == 'ya'){ echo 'checked'; } ?>>
                                                <label for="radio1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="radio radio-success">
                                                <input name="inputDenganExam" class="denganExam" id="radio2" value="tidak" type="radio" <?php if($data[0]['dengan_exam'] == 'tidak'){ echo 'checked'; } ?>>
                                                <label for="radio2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="show_tipe_pelatihan" <?php  if($data[0]['id_exam'] != '' || $data[0]['dengan_exam'] == 'ya' || $data[0]['kategori_event'] == 'others'){ ?> style="display: none;" <?php }else{ ?> style="display: show;" <?php }?>>
                                <label class="col-sm-2">Tipe Pelatihan</label>
                                <div class="col-sm-3">
                                     <?php $style_d= array('class'=>'form-control select2', 'Required'=>'','id'=>'inputTipePelatihan'); ?>
                                    <?php echo form_dropdown('inputTipePelatihan', $load_tipe_pelatihan, $data[0]['id_tipe_pelatihan'],$style_d); ?>
                                </div>
                            </div>
                            <div class="form-group row" id="show_tipe_exam" <?php  if($data[0]['id_exam'] != '' || $data[0]['dengan_exam'] == 'ya'){ ?> style="display: show;" <?php }else{ ?> style="display: none;" <?php }?>>
                                <label class="col-sm-2">Tipe Exam</label>
                                <div class="col-sm-2">
                                <?php if($data[0]['id_exam'] != ''){ 
                                    $idexam = $data[0]['tipe_exam'];
                                    $pecah = explode("|",$idexam);
                                    $post_test =  $pecah[0];
                                    $pre_test  =  $pecah[1];
                                }
                                ?>
                                <?php if($load_tipe_exam->num_rows() > 0){ ?>
                                    <?php foreach($load_tipe_exam->result() as $datas){ ?>
                                    <label class="c-input c-checkbox">
                                        <?php
                                        $db = '';
                                        if($post_test == $datas->tipe_exam || $pre_test == $datas->tipe_exam)
                                        { $db= true; }
                                        $checkdata = array(
                                                    'name'          => 'inputTipeExam[]',
                                                    'id'            => 'inputTipeExam',
                                                    'value'         =>  $datas->tipe_exam,
                                                    'checked'       =>  $db
                                            );
                                        echo form_checkbox($checkdata); ?>
                                        <span class="c-indicator"></span> 
                                        <?php echo $datas->tipe_exam; ?> 
                                    </label> 
                                    <?php } ?>
                                <?php } ?>
                                </div>
                            </div>
                            
                            
                            <div id="show_detail_exam" <?php  if($data[0]['id_exam'] != '' || $data[0]['dengan_exam'] == 'ya'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php }?>>
                                <div class="form-group row">
                                    <label class="col-sm-2">Judul Exam</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="judul_exam" name="judul_exam" readonly="" value="<?php echo $data[0]['judul_exam']; ?>"/>
                                        <input type="hidden" id="inputIdExam" name="inputIdExam" value="<?php echo $data[0]['id_exam']; ?>">
                                        <input type="hidden" id="inputidjadwalexam" name="inputidjadwalexam" value="<?php echo $data[0]['id_jadwal_exam']; ?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Pilih Exam</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2">Kategori</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" readonly="" value="<?php echo $data[0]['kategori_exam']; ?>"/>
                                    </div>
                                    
                                </div>
                            </div>        
                                <ul class="nav nav-tabs m-t-30" id="myTab" role="tablist">
                                        <li class="nav-item active" id="navdaftarpeserta"  <?php  if($data[0]['id_exam'] != '' || $data[0]['dengan_exam'] == 'ya'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php }?>>
                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#daftar_peserta"
                                               role="tab" aria-controls="home" aria-expanded="true">Daftar Peserta</a>
                                        </li>
                                         <li class="nav-item active" id="navdaftarpesertainput"  <?php  if($data[0]['id_exam'] == '' || $data[0]['dengan_exam'] == 'tidak'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php }?>>
                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#daftar_peserta_input"
                                               role="tab" aria-controls="home" aria-expanded="true">Input Peserta</a>
                                        </li>
                                        <li class="nav-item" id="navpicpanitia"  <?php  if($data[0]['id_exam'] == '' || $data[0]['dengan_exam'] == 'tidak'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php }?>>
                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#pic-panitia"
                                               role="tab" aria-controls="home" aria-expanded="true">PIC Panitia dan Trainer</a>
                                        </li>
                                        <li class="nav-item" id="navrab"  <?php  if($data[0]['id_exam'] == '' || $data[0]['dengan_exam'] == 'tidak'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php }?>>
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rab"
                                               role="tab" aria-controls="profile">Rencana Anggaran Biaya</a>
                                        </li>
                                        <li class="nav-item" id="navrundown"  <?php  if($data[0]['id_exam'] == '' || $data[0]['dengan_exam'] == 'tidak'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php }?>>
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rundown"
                                               role="tab" aria-controls="profile">Rundown</a>
                                        </li>
                                        <!--
                                        <li class="nav-item" id="navbiayatraining">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#biayatraining"
                                               role="tab" aria-controls="profile">Biaya Training dan Vendor</a>
                                        </li>-->
                                        <li class="nav-item" id="navmateri"  <?php  if($data[0]['id_exam'] == '' || $data[0]['dengan_exam'] == 'tidak'){ ?> style="display: block;" <?php }else{ ?> style="display: none;" <?php }?>>
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#materi"
                                               role="tab" aria-controls="profile">Materi</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div role="tabpanel" class="tab-pane fade in active" id="daftar_peserta"
                                             aria-labelledby="home-tab">
                                             <div class="p-20" id="show_tabel_peserta" <?php  if($data[0]['id_exam'] != '' || $data[0]['dengan_exam'] == 'ya'){ ?> style="display: block;position: relative;" <?php }else{ ?> style="display: none;" <?php }?>>
                                             <div class="form-group" id="loader" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: #fff;z-index: 1000;">
<img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif">
            </div>
                                                   <table id="daftar_peserta_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Posisi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if($load_peserta->num_rows() > 0){ ?>
                                                        <?php foreach($load_peserta->result() as $result_peserta){ ?>
                                                        <tr>
                                                            <td><?php echo $result_peserta->nik; ?></td>
                                                            <td><?php echo $result_peserta->nama; ?></td>
                                                            <td><?php echo $result_peserta->posisi; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                            <input type="hidden" id="inputJumlahPeserta" name="inputJumlahPeserta" value="<?php echo $data[0]['jumlah_peserta'];  ?>">
                                            <div id="wrapabcs">
                                            <?php if($load_peserta->num_rows() > 0){ ?>
                                                        <?php foreach($load_peserta->result() as $result_peserta){ ?>
                                            <div><input type="hidden" id="inputIdSdm" name="inputIdSdm[]" value="<?php echo $result_peserta->idsdm; ?>"><input type="hidden" id="inputNikPeserta" name="inputNikPeserta[]" value="<?php echo $result_peserta->nik; ?>"><input type="hidden" id="inputNamaPeserta" name="inputNamaPeserta[]" value="<?php echo $result_peserta->nama; ?>"><input type="hidden" id="inputPosisiPeserta" name="inputPosisiPeserta[]" value="<?php echo $result_peserta->posisi; ?>"></div>  
                                            <?php } ?>
                                                        <?php } ?>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in active" id="daftar_peserta_input"
                                             aria-labelledby="home-tab">
                                                <div class="p-20" id="show_tabel_peserta_input"  <?php  if(($data[0]['kategori_event'] == 'Training' && $data[0]['dengan_exam'] == 'tidak') || ($data[0]['kategori_event'] == 'others')){ ?> style="display: block;position: relative;" <?php }else{ ?> style="display: none;position: relative;" <?php } ?>>
                                                    <div class="m-b-20">
                                                        <a class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-get-list-peserta" id="get-list-psrt">Pilih List Peserta</a>
                                                    </div>
                                                    <div class="form-group" id="loader" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: #fff;z-index: 1000;">
                                                    <img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif"></div>
                                                       <table id="daftar_peserta_table_input" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>NIK</th>
                                                                <th>Nama</th>
                                                                <th>Posisi</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php if($load_peserta->num_rows() > 0){ ?>
                                                                <?php foreach($load_peserta->result() as $result_peserta){ ?>
                                                                <tr>
                                                                    <td><?php echo $result_peserta->nik; ?></td>
                                                                    <td><?php echo $result_peserta->nama; ?></td>
                                                                    <td><?php echo $result_peserta->posisi; ?></td>
                                                                </tr>
                                                                <?php } ?>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                </div>
                                        </div>
                                        <div class="tab-pane fade" id="pic-panitia" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="p-20">
                                                    <h4 class="header-title m-t-0">PIC / PANITIA</h4>
                                                    <p class="text-muted font-13 m-b-20">Masukkan nama PIC atau nama panitia</p>
                                                    <a class="btn btn-primary waves-effect waves-light m-b-20" data-toggle="modal" data-target=".bs-get-pic" id="get-pic">Pilih PIC</a>
                                                     <table id="table-picpanitia" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Nama PIC</th>
                                                            <th width="15">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if($load_pic->num_rows() > 0){ ?>
                                                                <?php foreach($load_pic->result() as $result_pic){ ?>
                                                                <tr>
                                                                    <td><?php echo $result_pic->nama_pic; ?>
                                                                        <input type="hidden" id="nama_pic" name="nama_pic[]" value="<?php echo $result_pic->nama_pic; ?>">
                                                                        <input type="hidden" id="id_karyawan" name="id_karyawan[]" value="<?php echo $result_pic->id_karyawan; ?>">
                                                                    </td>
                                                                    <td><a href="javascript:void(0);" class="remCF" class="btn btn-danger remove-pic" type="button"><i class="fa fa-2x fa-times text-danger"></i></a></td>
                                                                </tr>
                                                                <?php } ?>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <span class="text-muted">Jika tidak terdaftar atau ingin memasukkan pic diluar tabel karyawan, silahkan tambahkan ini</span><br>
                                                    <a id="add-pic"><i class="fa fa-3x fa-plus-square"></i></a> 
                                                </div>
                                                <hr>
                                                <div class="m-t-10"></div>
                                                <div class="p-20">
                                                
                                                    <h4 class="header-title m-t-0">Trainer</h4>
                                                    <p class="text-muted font-13 m-b-30">pilih trainer yang diinginkan</p>
                                                    <div class="m-b-20">
                                                    <a class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-get-trainer" id="get-trainer-internal">Pilih Trainer</a>
                                                    </div>
                                                    <table id="table-trainer" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Nama Trainer</th>
                                                            <th>Nama Materi</th>
                                                            <th width="15">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($load_trainer->num_rows() > 0){ ?>
                                                                <?php 
                                                                $no=0;
                                                                foreach($load_trainer->result() as $result_trainer){ ?>
                                                                <tr>
                                                                    <td><?php echo $result_trainer->nama_pemateri; ?>
                                                                        <input type="hidden" id="inputIdTrainer" name="inputIdTrainer[]" value="<?php echo $result_trainer->id_kategori_trainer; ?>"><input type="hidden" id="inputPerusahaan" name="inputPerusahaan[]" value="internal">
                                                                    </td>
                                                                    <td><input type="text" class="form-control" id="autocomplete-ajax<?php echo $no; ?>" name="inputMateri[]" value="<?php echo $result_trainer->materi; ?>"></td>
                                                                    <td><a href="javascript:void(0);" class="remCF" class="btn btn-danger remove-pic" type="button"><i class="fa fa-2x fa-times text-danger"></i></a></td>
                                                                </tr>
                                                                <?php $no++;} ?>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="rab" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                                <div class="p-20">
                                                    <h4 class="header-title m-t-0">RAB</h4>
                                                    <p class="text-muted font-13 m-b-30">tentukan rencana biaya yang dianggarkan.</p>
                                                    <table id="table-rab" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th width="30">No</th>
                                                            <th>Deskripsi</th>
                                                            <th>Jumlah</th>
                                                            <th>Unit</th>
                                                            <th colspan="2">Frekwensi</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total Cost</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                           <?php if($load_parent->num_rows() > 0){ ?>
                                                            <?php 
                                                                $id = $data[0]['id_event'];
                                                                $id_rab = 0;
                                                                $total_rab=0;
                                                                $hs=1;
                                                                foreach($load_parent->result() as $datas){ 
                                                                    
                                                                    $load_child = $this->kategori_rab_model->select_child_category($datas->id);
                                                                    $load_rab   = $this->event_model->select_rab($datas->id,$id);
                                                                    if($load_rab ->num_rows() > 0)
                                                                    {
                                                                       $rab_insert = $load_rab->result_array();

                                                                       $id_rab      = $rab_insert[0]['id_rab'];
                                                                       $total_rab   = $rab_insert[0]['total'];

                                                                    }

                                                                    $child_exist = 0; 
                                                                    if($load_child->num_rows() > 0)
                                                                    {
                                                                        $child_exist = 1;
                                                                    }
                                                            ?> 
                                                            <tr class="parent-class" id="parent_<?php echo $hs; ?>" style="background-color: #eaeaea;">
                                                                <td colspan="7"><strong><?php echo ($child_exist==1 ? ' '.$datas->deskripsi:$datas->deskripsi); ?></strong></td>
                                                                <td><input type="text" class="form-control autonumber" id="totalcost" name="totalcost_<?php echo $datas->id; ?>" data-a-sign="Rp. " readonly=""  <?php if($id_rab == $datas->id){ ?> value="<?php echo $total_rab; ?>" <?php }else{ ?> value="0" <?php } ?>> </td>
                                                            </tr>
                                                           <?php 
                                                                if($child_exist==1)
                                                                {
                                                                    $no=1;
                                                                    $idchild_rab=0;
                                                                    $jumlahchild_rab=0;
                                                                    $qtychild_rab=0;
                                                                    $unitcostchild_rab=0;
                                                                    $totalchild_rab=0;
                                                                    foreach($load_child->result() as $c)
                                                                    {
                                                                    $load_rab   = $this->event_model->select_rab($c->id,$id);    
                                                                    if($load_rab ->num_rows() > 0)
                                                                    {
                                                                       $rab_insert = $load_rab->result_array();

                                                                       $idchild_rab         = $rab_insert[0]['id_rab'];
                                                                       $jumlahchild_rab     = $rab_insert[0]['jumlah'];
                                                                       $qtychild_rab        = $rab_insert[0]['qty'];
                                                                       $unitcostchild_rab   = $rab_insert[0]['unit_cost'];
                                                                       $totalchild_rab      = $rab_insert[0]['total'];
                                                                    }
                                                                   
                                                            ?>
                                                            <tr id="parent_<?php echo $hs; ?>">
                                                                <td><?php echo $no; ?></td>
                                                                <td><?php echo $c->deskripsi; ?></td>
                                                                <td><input type="text" class="form-control autonumber" id="jumlah" name="jumlah_<?php echo $c->id; ?>" <?php if($idchild_rab == $c->id){ ?> value="<?php echo $jumlahchild_rab; ?>" <?php }else{ ?> value="0" <?php } ?>></td>
                                                                <td width="30" ><?php echo $c->jumlah_unit; ?></td>
                                                                <td><input type="text" class="form-control autonumber" id="frekwensi"  name="frekwensi_<?php echo $c->id; ?>" <?php if($idchild_rab == $c->id){ ?> value="<?php echo $qtychild_rab; ?>" <?php }else{ ?> value="0" <?php } ?>></td>
                                                                <td width="30"><?php echo $c->frekwensi; ?></td>
                                                                <td><input type="text" class="form-control autonumber" id="unit_cost" name="unit_cost_<?php echo $c->id; ?>" data-a-sign="Rp. " <?php if($idchild_rab == $c->id){ ?> value="<?php echo $unitcostchild_rab; ?>" <?php }else{ ?> value="0" <?php } ?>></td>
                                                                <td><input type="text" class="form-control autonumber" data-parent="<?php echo $c->id_parent; ?>" id="total_cost" name="total_cost_<?php echo $c->id; ?>" data-a-sign="Rp. " readonly="" <?php if($idchild_rab == $c->id){ ?> value="<?php echo $totalchild_rab; ?>" <?php }else{ ?> value="0" <?php } ?>></td>
                                                            </tr>
                                                            <?php
                                                                    $no++;}
                                                                }
                                                            $hs++; } 
                                                            ?>
                                                        <?php } ?>
                                                            <tr style="background-color: #eaeaea;">
                                                                <td colspan="7"><strong>Uang Muka</strong></td>
                                                                <td>
                                                                <input type="text" class="form-control autonumber" id="downpayment" name="downpayment" data-a-sign="Rp. " value="<?php echo $data[0]['uang_muka']; ?>">    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="7"><strong>Grand Total</strong></td>
                                                                <td><input type="text" class="form-control autonumber" id="grand_total" name="grand_total" data-a-sign="Rp. " readonly="" value="<?php echo $data[0]['total_rab'] ?>"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="rundown" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                                <div class="p-20">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2">Upload Rundown Acara</label>
                                                            <div class="col-sm-6">
                                                                <input type="file" name="rundown_input" id="filer_input3">
                                                                <span class="font-13 text-muted">upload size maks : 1MB, File allowed: xls,xlsx</span>
                                                            </div>
                                                            <?php
                                                            //Load files which status is active
                                                            if($load_rundown->num_rows() > 0)
                                                            {
                                                                    foreach($load_rundown->result() as $f)
                                                                    {
                                                            ?>
                                                            <div id="file_delete<?php echo $f->id;?>" class="form-group row" style="margin-bottom:-4px">
                                                                <label class='col-sm-2'>&nbsp;</label>
                                                                <div class="col-sm-10">
                                                                    <div class="col-doc" >
                                                                        <a class="btn waves-effect waves-light btn-danger delete-file" data-idfile="<?php echo $f->id; ?>"><i class="fa fa-trash"></i></a>
                                                                        <a href="<?php echo base_url().'assets/attachments/rundown/'.$f->nama_file;?>" target="_blank" class="btn waves-effect waves-light btn-primary embed-preview"><i class="fa fa-eye"></i></a>
                                                                        <a href="<?php echo base_url().'assets/attachments/rundown/'.$f->nama_file;?>" class="btn waves-effect waves-light btn-primary" download><i class="fa fa-download"></i></a>
                                                                        &nbsp;<?php echo $f->nama_file;?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="tab-pane fade" id="biayatraining" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                                <div class="p-20">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3">Materi Training <span class="text-danger">*</span></label>
                                                        <div class="col-sm-5">
                                                            <select class="select2 form-control">
                                                                <option value="">--pilih materi--</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div class="tab-pane fade" id="materi" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                                <div class="p-20">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2">Upload Rundown Acara</label>
                                                        <div class="col-sm-6">
                                                            <input type="file" name="materi_input" id="filer_input4">
                                                            <span class="font-13 text-muted">upload size maks : 2MB, File allowed: pdf,jpg,.docx,jpeg</span>
                                                        </div>
                                                        <?php
                                                            //Load files which status is active
                                                            if($load_materi->num_rows() > 0)
                                                            {
                                                                    foreach($load_materi->result() as $materi_data)
                                                                    {
                                                            ?>
                                                            <div id="file_delete<?php echo $materi_data->id;?>" class="form-group row" style="margin-bottom:-4px">
                                                                <label class='col-sm-2'>&nbsp;</label>
                                                                <div class="col-sm-10">
                                                                    <div class="col-doc" >
                                                                        <a class="btn waves-effect waves-light btn-danger delete-file" data-idfile="<?php echo $materi_data->id; ?>"><i class="fa fa-trash"></i></a>
                                                                        <a href="<?php echo base_url().'assets/attachments/materi/'.$materi_data->nama_file;?>" target="_blank" class="btn waves-effect waves-light btn-primary embed-preview"><i class="fa fa-eye"></i></a>
                                                                        <a href="<?php echo base_url().'assets/attachments/materi/'.$materi_data->nama_file;?>" class="btn waves-effect waves-light btn-primary" download><i class="fa fa-download"></i></a>
                                                                        &nbsp;<?php echo $materi_data->nama_file;?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                            
                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <?php echo form_submit('submit', 'Submit', 'class="buttonstyle btn-primary"'); ?>
                                    <?php echo form_submit('draft', 'save as draft', 'class="buttonstyle btn-warning"'); ?>
                                     <a href="<?php echo site_url('event'); ?>" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tabel Karyawan yang sudah didaftarkan untuk aplikasi event pada sso</h4>
            </div>
            <div class="modal-body">
             <div class="p-20">
                     <table id="exam_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th hidden="">id Exam</th>
                            <th>Judul Exam</th>
                            <th>Deskripsi</th>
                            <th>Durasi</th>
                            <th>Jumlah Pertanyaan</th>
                            <th>Kategori</th>
                            <th hidden="">id Jadwal Exam</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($load_exam->exam[0]->data as $data){ ?>
                        <tr>
                            <td scope="row" hidden=""><?php echo $data->id_exam; ?></td>
                            <td><?php echo $data->judul_exam; ?></td>
                            <td><?php echo $data->deskripsi; ?></td>
                            <td><?php echo $data->durasi ?></td>
                            <td><?php echo $data->jml_pertanyaan; ?></td>
                            <td><?php echo $data->avail; ?></td>
                            <td scope="row" hidden=""><?php echo $data->id_jadwal_exam; ?></td>
                            <td><button type="button" class="pilih_exam" data-dismiss="modal">pilih</button></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  Modal content for the above example -->
<div class="modal fade bs-get-list-peserta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Pilih Peserta</h4>
            </div>
            <div class="modal-body">
             <div class="p-20">

                    <button id="inputpeserta" class="btn btn-primary m-b-20" data-dismiss="modal">Masukkan peserta</button>
                     <table id="get_list_peserta_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Unit Kerja</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <div id="events"></div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the above example -->
<div class="modal fade gmap" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">dapatkan Lokasi</h4>
            </div>
            <div class="modal-body">
                <div class="p-20">
                    <!-- google map will be shown here -->
                        <div id="floating-panel">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="address" class="form-control" type="textbox" value="Indonesia">
                                </div>
                                 <div class="col-sm-6">
                                    <input class="btn btn-default" id="submit" type="button" value="cari">
                                    <input class="btn btn-primary" id="submit-map" type="button" value="masukkan data">
                                </div>
                            </div>
                          
                        </div>
                    <div id="dvMap" class="m-t-30" style="width: 100%; height: 400px">
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the above example -->
<div class="modal fade bs-get-trainer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Pilih Trainer</h4>
            </div>
            <div class="modal-body">
             <div class="p-20">

                    <button id="inputtrainer" class="btn btn-primary m-b-20" data-dismiss="modal">Masukkan trainer</button>
                     <table id="get_list_trainer_internal_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="select_all_trainer"></th>
                            <th>Nama Trainer</th>
                            <th>Posisi</th>
                            <th>Unit Kerja</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the above example -->
<div class="modal fade bs-get-pic" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Pilih PIC/PANITIA</h4>
            </div>
            <div class="modal-body">
             <div class="p-20">

                    <button id="inputpic" class="btn btn-primary m-b-20" data-dismiss="modal">Masukkan PIC/PANITIA</button>
                     <table id="get_list_pic_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="select_all_pic"></th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Unit Kerja</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->