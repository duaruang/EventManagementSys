<div style="background: #fff;box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active">Pengajuan Event</li>
        </ol>
    </div>
</div>

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
                        $attrib = array('class' => 'form-horizontal','id'=>'add-form-event');
                        echo form_open('',$attrib); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Nomor Memo <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" data-mask="a-999/PNM-aaa/aaa/9999" required id="inputNomorMemo" name="inputNomorMemo" />
                                    <span class="font-13 text-muted">contoh : X-999/PNM-XXX/XXX/9999</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Event <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required placeholder="Type something" id="inputNamaEvent" name="inputNamaEvent"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Topik Event <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required placeholder="Type something" id="inputTopikEvent" name="inputTopikEvent"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Lokasi Kerja</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" readonly="" value="<?php echo $this->session->userdata('sess_user_lokasi_kerja'); ?>" id="inputLokasiKerja" name="inputLokasiKerja" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                     <div class="input-group">
                                        <input type="text" class="form-control input-limit-datepicker" id="inputStartTglPelaksanaan" name="inputStartTglPelaksanaan" required />
                                        <span class="input-group-addon bg-custom b-0">s/d</span>
                                            <input type="text" class="form-control" readonly="" id="inputAkhirTglPelaksanaan" name="inputAkhirTglPelaksanaan"/>
                                        <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                    </div><!-- input-group -->
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-2">Tempat Pelaksanaan <span class="text-danger">*</span></label>
                                <div class="col-sm-2">
                                    <select class="form-control select2" required="" id="inputTempatPelaksanaan" name="inputTempatPelaksanaan">
                                        <option value="">--pilih kategori--</option>
                                        <?php if($load_kategori_tempat->num_rows() > 0){ ?>
                                        <?php foreach($load_kategori_tempat->result() as $data){ ?>
                                            <option value="<?php echo $data->id; ?>"><?php echo $data->kategori_tempat; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" required="" placeholder="Nama Tempat" id="inputNamaTempat" name="inputNamaTempat"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Target / Sasaran Peserta <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required="" id="inputSasaranTarget" name="inputSasaranTarget"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Kategori Event <span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <select class="form-control select2" id="inputKategoriEvent" name="inputKategoriEvent"  required="">
                                     <option value="">--pilih kategori--</option>
                                        <?php if($load_kategori_event->num_rows() > 0){ ?>
                                        <?php foreach($load_kategori_event->result() as $data){ ?>
                                            <option value="<?php echo $data->id; ?>"><?php echo $data->kategori_event; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="show_tipe_exam">
                                <label class="col-sm-2">Tipe Exam</label>
                                <div class="col-sm-2">
                                    <select class="select2 form-control" id="inputTipeExam" name="inputTipeExam">
                                        <option value="">--pilih tipe exam--</option>
                                       <?php if($load_tipe_exam->num_rows() > 0){ ?>
                                        <?php foreach($load_tipe_exam->result() as $data){ ?>
                                            <option value="<?php echo $data->id; ?>"><?php echo $data->tipe_exam; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="show_tipe_pelatihan">
                                <label class="col-sm-2">Tipe Pelatihan</label>
                                <div class="col-sm-3">
                                    <select class="select2 form-control" id="inputTipePelatihan" name="inputTipePelatihan">
                                        <option value="">--pilih tipe pelatihan--</option>
                                       <?php if($load_tipe_pelatihan->num_rows() > 0){ ?>
                                        <?php foreach($load_tipe_pelatihan->result() as $data){ ?>
                                            <option value="<?php echo $data->id; ?>"><?php echo $data->tipe_pelatihan; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" id="show_dengan_exam" style="display: none;">
                                <label class="col-sm-2">Dengan Exam</label>
                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <div class="radio radio-success">
                                                <input name="inputDenganExam" id="radio1" value="ya" type="radio">
                                                <label for="radio1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="radio radio-success">
                                                <input name="inputDenganExam" id="radio2" value="tidak" type="radio">
                                                <label for="radio2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="show_detail_exam" style="display: none;">
                                <div class="form-group row">
                                    <label class="col-sm-2">Judul Exam</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" required="" id="judul_exam" required="" name="judul_exam" readonly=""/>
                                        <input type="hidden" id="inputIdExam" name="inputIdExam">
                                        <input type="hidden" id="inputidjadwalexam" name="inputidjadwalexam">
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Pilih Exam</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2">Kategori</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" required="" id="deskripsi" required="" name="deskripsi" readonly=""/>
                                    </div>
                                    
                                </div>
                            </div>        
                                <ul class="nav nav-tabs m-t-30" id="myTab" role="tablist">
                                        <li class="nav-item active" id="navdaftarpeserta">
                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#daftar_peserta"
                                               role="tab" aria-controls="home" aria-expanded="true">Daftar Peserta</a>
                                        </li>
                                         <li class="nav-item active" id="daftarpesertainput">
                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#daftar_peserta_input"
                                               role="tab" aria-controls="home" aria-expanded="true">Input Peserta</a>
                                        </li>
                                        <li class="nav-item" id="navpicpanitia">
                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#pic-panitia"
                                               role="tab" aria-controls="home" aria-expanded="true">PIC Panitia dan Trainer</a>
                                        </li>
                                        <li class="nav-item" id="navrab">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rab"
                                               role="tab" aria-controls="profile">Rencana Anggaran Biaya</a>
                                        </li>
                                        <li class="nav-item" id="navrundown">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rundown"
                                               role="tab" aria-controls="profile">Rundown</a>
                                        </li>
                                        <li class="nav-item" id="navbiayatraining">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#biayatraining"
                                               role="tab" aria-controls="profile">Biaya Training dan Vendor</a>
                                        </li>
                                        <li class="nav-item" id="navmateri">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#materi"
                                               role="tab" aria-controls="profile">Materi</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="result" id="result"></div>
                                    <div class="tab-content" id="myTabContent">
                                        <div role="tabpanel" class="tab-pane fade in active" id="daftar_peserta"
                                             aria-labelledby="home-tab">
                                             <div class="p-20" id="show_tabel_peserta" style="display: none; position: relative;">
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
                                                        
                                                        </tbody>
                                                    </table>
                                            </div>
                                            
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in active" id="daftar_peserta_input"
                                             aria-labelledby="home-tab">
                                             <div class="p-20" id="show_tabel_peserta_input" style="display: none; position: relative;">
                                             <div class="form-group" id="loader" style="position:absolute;display:none;width: 100%;height:100%;text-align: center;background-color: #fff;z-index: 1000;">
<img style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" src="<?php echo base_url(); ?>assets/images/Preloader_2.gif">
            </div>
                                                   <table id="daftar_peserta_table_input" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Posisi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                        </tbody>
                                                    </table>
                                            </div>
                                            <input type="hidden" id="inputJumlahPeserta" name="inputJumlahPeserta">
                                            <!-- <input type="hidden" id="inputIdSdm" name="inputIdSdm[]">
                                             <input type="hidden" id="inputNamaPeserta" name="inputNamaPeserta[]">
                                             <input type="hidden" id="inputPosisiPeserta" name="inputPosisiPeserta[]">-->
                                        </div>
                                            <div class="tab-pane fade" id="PIC/Panitia" role="tabpanel"
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
                                            </div>
                                            <div class="tab-pane fade" id="pic-panitia" role="tabpanel"
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
                                            </div>
                                            <div class="tab-pane fade" id="rundown" role="tabpanel"
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
                                            </div>
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
                                            </div>
                                            <div class="tab-pane fade" id="materi" role="tabpanel"
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
                                            </div>
                                        </div>

                            </div>
                            
                            
                            <div class="form-group">
                                <div style="margin-top: 40px;">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <button type="submit" class="btn btn-warning waves-effect m-l-5">
                                        Save as draft
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->