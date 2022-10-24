<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Programs</h1>
    <p class="mb-4">Displays list of student's programs.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><button class="btn btn-primary">Add New Program/s</button></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Programs</th>
                            <th>Short Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Programs</th>
                            <th>Short Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Program 1</td>
                            <td>Lorem ipsum</td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-table"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Program 2</td>
                            <td>Lorem ipsum</td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-table"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                </li>
                            </td>
                        </tr>
                        <tr>
                            <td>Program 3</td>
                            <td>Lorem ipsum</td>
                            <td>
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-table"></i></button>
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
    </div>
<?php
    include_once('db_footer.php');
?>
    

             