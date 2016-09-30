                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">User Administration</h4>
                    </div>
                </div>


                <!-- Page-data -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">
                                 <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-plus"></i></span>Add User
                                 </button>
                            </p>
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                        <th width="200">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>
                                            <a href="#" class="btn btn-warning  waves-effect waves-light"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>&nbsp;&nbsp;
                                            <a href="#custom-modal" class="btn btn-danger waves-effect waves-light delete-user" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" data-iduser=""><span class="btn-label"><i class="fa fa-times"></i></span>Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                        <td>
                                            <a href="#" class="btn btn-warning  waves-effect waves-light"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>&nbsp;&nbsp;
                                            <a href="#custom-modal" class="btn btn-danger waves-effect waves-light delete-user" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" data-iduser=""><span class="btn-label"><i class="fa fa-times"></i></span>Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                        <td>
                                            <a href="#" class="btn btn-warning  waves-effect waves-light"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>&nbsp;&nbsp;
                                            <a href="#custom-modal" class="btn btn-danger waves-effect waves-light delete-user" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" data-iduser=""><span class="btn-label"><i class="fa fa-times"></i></span>Delete</a>
                                        </td>
                                    </tr>
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
                    <h4 class="custom-modal-title" style="background-color: #E9311B;">Delete</h4>
                    <div class="custom-modal-text">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <input type="hidden" class="f-hidden-id-user" name="f-hidden-id-user" value=""/>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-default" onclick="Custombox.close();">Batal</button>
                        <button type="submit" class="btn btn-default">Hapus</a>
                    </div>
                </div>

