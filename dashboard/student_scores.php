<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Scores</h1>
    <p class="mb-4">Displays list of student's scores.</p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Programs</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Exam</th>
                            <th>Programs</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Exam 1</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-warning">80%</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View Exam Summary"><i class="fa fa-table"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Exam 2</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-danger">70%</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View Exam Summary"><i class="fa fa-table"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Exam 3</td>
                            <td>Program Lorem ipsum</td>
                            <td><span class="badge badge-success">90%</span></td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View Exam Summary"><i class="fa fa-table"></i></button>
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
    

             