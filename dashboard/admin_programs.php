<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List of Programs</h1>
    <p class="mb-4">Displays list of student's programs.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><button class="btn btn-primary" data-toggle="modal" data-target="#add-program">Add New Program</button></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Programs</th>
                            <th>Short Description</th>
                            <th>With Exam?</th>                            
                            <th>Enrolled Students</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Programs</th>
                            <th>Short Description</th>
                            <th>With Exam?</th>                            
                            <th>Enrolled Students</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Program 1</td>
                            <td>Lorem ipsum</td>
                            <td>Yes</td>
                            <td><span class="badge badge-primary">50</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-table"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pen"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Program 2</td>
                            <td>Lorem ipsum</td>
                            <td>Yes</td>
                            <td><span class="badge badge-primary">30</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-table"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pen"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Program 3</td>
                            <td>Lorem ipsum</td>
                            <td>Yes</td>
                            <td><span class="badge badge-primary">20</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-table"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pen"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="add-program" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="admin/add_programs.php"  method="post"  name="add_program" id="add_program" class="needs-validation-registration" novalidate enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="program" name="created_by" value="<?php echo $user->get_fullname($_SESSION['email_address']); ?>">
                            <label for="email1">Name of Program/Lesson</label>
                            <input type="text" class="form-control" id="program" name="program_name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="email1">Upload Image</label>
                            <input type="file" class="form-control" name="upload_image">
                        </div>
                        <div class="form-group">
                            <label for="password1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="short_desc" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="password1">Upload Lessons</label>
                            <input type="file" class="form-control" name="upload_program_lesson">
                            <small class="red">*Should be pdf extension file only </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">With Exam?</label>
                            <select class="form-control" name="with_exam" id="exampleFormControlSelect1">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>
    

             