<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List of Students</h1>
    <p class="mb-4">Displays list of student's who take the exam and their scores.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><button class="btn btn-primary">Enroll a Student</button></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Program</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Exam Status</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Exam</th>
                            <th>Program</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Exam Status</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Exam 1</td>
                            <td>Program Lorem ipsum</td>
                            <td>John Doe</td>
                            <td>Civil Engineering</td>
                            <td>4th year</td>
                            <td><span class="badge badge-secondary">Not yet Started</span></td>
                            <td><span class="badge badge-secondary">0</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Take Exam"><i class="fa fa-eye"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Exam 1</td>
                            <td>Program Lorem ipsum</td>
                            <td>John Doe</td>
                            <td>Civil Engineering</td>
                            <td>4th year</td>
                            <td><span class="badge badge-warning">Ongoing</span></td>
                            <td><span class="badge badge-secondary">0</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Take Exam"><i class="fa fa-eye"></i></button>
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