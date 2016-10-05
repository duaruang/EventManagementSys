<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Pengajuan Event</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card-box">
                <div class="row m-t-10">
                    <div class="col-sm-12">
                    <div class="p-20">
                        <?php 
                        $attrib = array('class' => 'form-horizontal');
                        echo form_open('',$attrib); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Nomor Memo</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" data-mask="a-999/PNM-aaa/aaa/9999" required placeholder="Type something"/>
                                    <span class="font-13 text-muted">contoh : X-999/PNM-XXX/XXX/9999</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Event</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required placeholder="Type something"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Topik Event</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required placeholder="Type something"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Cabang</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" readonly="" placeholder="CABANG ABCD"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tanggal Pelaksanaan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="Type something"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tempat Pelaksanaan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="Type something"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Target / Sasaran Peserta</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="Type something"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Kategori Event</label>
                                <div class="col-sm-5">
                                    <select class="form-control select1">
                                    <option>--pilih kategori--</option>
                                    <option value="">Training</option>
                                    <option value="">Exam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tipe Pelatihan</label>
                                <div class="col-sm-5">
                                    <select class="form-control select1">
                                    <option>--pilih kategori--</option>
                                    <option value="">Training</option>
                                    <option value="">Exam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Dengan Exam</label>
                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <div class="radio radio-success">
                                                <input name="radio" id="radio1" value="option1" checked="" type="radio">
                                                <label for="radio1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="radio radio-success">
                                                <input name="radio" id="radio2" value="option1" checked="" type="radio">
                                                <label for="radio2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Pilih Exam</label>
                                <div class="col-sm-5">
                                    <select class="select2 form-control">
                                        <option>--pilih exam--</option>
                                        <option value="">Training</option>
                                        <option value="">Exam</option>
                                        <option value="">Training</option>
                                        <option value="">Exam</option>
                                        <option value="">Training</option>
                                        <option value="">Exam</option>
                                        <option value="">Training</option>
                                        <option value="">Exam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tipe Exam</label>
                                <div class="col-sm-5">
                                    <select class="select1 form-control">
                                        <option>--pilih tipe exam--</option>
                                        <option value="">Training</option>
                                        <option value="">Exam</option>
                                        <option value="">Training</option>
                                        <option value="">Exam</option>
                                        <option value="">Training</option>
                                        <option value="">Exam</option>
                                        <option value="">Training</option>
                                        <option value="">Exam</option>
                                    </select>
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