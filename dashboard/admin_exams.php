<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List of Exams</h1>
    <p class="mb-4">Displays list of student's exams and ongoing exams.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><button class="btn btn-primary" data-toggle="modal" data-target="#add-exam">Add New Exam</button></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Program</th>
                            <th>Students who take the exam</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Exam</th>
                            <th>Program</th>
                            <th>Students who take the exam</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Exam 1</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-secondary">10</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Take Exam"><i class="fa fa-file"></i> View Students</button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-pen"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Exam 2</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-secondary">13</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Take Exam"><i class="fa fa-file"></i> View Students</button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-pen"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Exam 3</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-secondary">15</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Take Exam"><i class="fa fa-file"></i> View Students</button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-pen"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="add-exam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email1">Name of Program/Lesson</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Program 1</option>
                                <option>Program 2</option>
                                <option>Program 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email1">Exam Category</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Multiple Choice</option>
                                <option>Essay</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password1">Question</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choices</label>
                            <input type="text" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
                            <input type="text" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
                            <input type="text" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
                            <input type="text" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password1">Answer</label>
                            <input type="text" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <button type="submit" class="btn btn-success">Add another question</button>
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