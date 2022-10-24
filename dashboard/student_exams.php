<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Exams</h1>
    <p class="mb-4">Displays list of student's exams and ongoing exams.</p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Program</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Exam</th>
                            <th>Program</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Exam 1</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-secondary">Not yet started</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Take Exam"><i class="fa fa-file"></i> Take exam</button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Exam 2</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-success">Done</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View Score"><i class="fa fa-eye"></i> View Score</button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete Exam"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>

                        </tr>
                        <tr>
                            <td>Exam 3</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-warning">Ongoing</span></td>
                            <td>
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