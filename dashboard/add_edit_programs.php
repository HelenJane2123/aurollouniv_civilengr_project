<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_programs.php">Programs/Lessons</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Programs</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800">Add Programs</h1>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <?php
                    $action = 'add';
                    $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                ?>
                <div class="col-lg-12">
                    <?php
                        if ($action == 'add') {
                    ?>
                        <form action="admin/add_programs.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Add New Program</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="action" value="add">
                                        <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_profile_info['member_id'];?>">
                                        <label for="first">Program/Lesson</label>
                                        <input type="text" class="form-control" name="program_name" placeholder="Enter a program">
                                    </div>
                                    <div class="form-group">
                                        <label for="first">Description</label>
                                        <textarea id="basic-example" name="short_desc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="first">With Exam?</label>
                                        <select class="form-control" name="with_exam" required>
                                            <option selected=""> Select Type</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Upload Files Here</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Lessons
                                                <br/>
                                                <small>*Note: You can upload multiple files with pdf, docx extension only</small>
                                            </th>
                                            <td width="2%">:</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="file" name="mutiple_file_lessons[]" id="file" multiple>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Program Image
                                                <br/>
                                                <small>*Uploaded image will be displayed under Programs page</small>
                                            </th>
                                            <td width="2%">:</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="file" name="upload_image" id="file">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="add_program">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        //edit program
                        else {
                    ?>

                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>
    

             