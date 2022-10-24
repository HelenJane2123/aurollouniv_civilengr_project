<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List of Exams</h1>
    <p class="mb-4">Displays list of student's exams and ongoing exams.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><button class="btn btn-primary">Add New Exam</button></h6>
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
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>