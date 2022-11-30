<?php
    include_once('db_header.php');
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <?php
                    $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                ?>
                <div class="col-lg-12">
                    <?php
                        if ($_GET['action'] == 'add') {
                    ?>
                        <!-- Page Heading -->
                        <?php if (isset($_SESSION['message_error'])): ?>
                            <div class="msg_error">
                                <?php 
                                    echo $_SESSION['message_error']; 
                                    unset($_SESSION['message_error']);
                                ?>
                            </div>
                        <?php endif ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_programs.php">Programs/Lessons</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Programs</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Add Programs</h1>
                        <form action="admin/programs.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Add New Program</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="action" value="add">
                                        <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_profile_info['member_id'];?>">
                                        <label for="first" class="text-bold">Program/Lesson</label>
                                        <input type="text" class="form-control" name="program_name" placeholder="Enter a program">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Description</label>
                                        <textarea id="basic-example" name="short_desc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">With Exam?</label>
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
                        else if($_GET['action'] == 'edit') {
                            $get_profile_info_by_id =  $admin->get_program_by_id($_GET['id']);
                    ?>
                        <!-- Page Heading -->
                        <?php if (isset($_SESSION['message_error'])): ?>
                            <div class="msg_error">
                                <?php 
                                    echo $_SESSION['message_error']; 
                                    unset($_SESSION['message_error']);
                                ?>
                            </div>
                        <?php endif ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_programs.php">Programs/Lessons</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit a Program</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Edit a Program</h1>
                        <form action="admin/programs.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Edit Program</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="program_id" value="<?php echo $_GET['id']?>">
                                        <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_profile_info_by_id['member_id'];?>">
                                        <label for="first" class="text-bold">Program/Lesson</label>
                                        <input type="text" class="form-control" name="program_name" value="<?php echo $get_profile_info_by_id['program_name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Description</label>
                                        <textarea id="basic-example" name="short_desc"><?php echo $get_profile_info_by_id['short_desc'];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">With Exam?</label>
                                        <select class="form-control" name="with_exam" required>
                                            <option selected=""> Select Type</option>
                                            <option value="1"<?php if ($get_profile_info_by_id['with_exam'] == '1') echo ' selected="selected"'; ?>>Yes</option>
                                            <option value="2"<?php if ($get_profile_info_by_id['with_exam'] == '2') echo ' selected="selected"'; ?>>No</option>
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
                                        <input class="btn btn-primary pull-right" type="Submit" name="edit_program">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        else if($_GET['action'] == 'view') {
                            $get_profile_info_by_id =  $admin->get_program_by_id($_GET['id']);

                    ?>
                        <!-- Page Heading -->
                        <?php if (isset($_SESSION['message_error'])): ?>
                            <div class="msg_error">
                                <?php 
                                    echo $_SESSION['message_error']; 
                                    unset($_SESSION['message_error']);
                                ?>
                            </div>
                        <?php endif ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_programs.php">Programs/Lessons</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Program</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">View Program Details for <?php echo $get_profile_info_by_id['program_name'];?></h1>
                        <form action="admin/programs.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Program/Lesson</label>
                                        <input type="text" class="form-control" name="program_name" disabled value="<?php echo $get_profile_info_by_id['program_name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Description</label>
                                        <?php echo $get_profile_info_by_id['short_desc'];?>
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">With Exam?</label>
                                        <?php
                                            if ($get_profile_info_by_id['with_exam'] == '1') {
                                        ?>
                                            <input type="text" class="form-control" name="program_name" disabled value="Yes">
                                        <?php
                                            }
                                            else {
                                        ?>
                                            <input type="text" class="form-control" name="program_name" disabled value="No">
                                        <?php
                                            }
                                        ?>
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
                                                <small>* List of all uploaded lessons</small>
                                            </th>
                                            <td width="2%">:</td>
                                            <td>
                                                <a href="uploads/programs/<?php echo $get_profile_info_by_id['member_id']; ?>/<?php echo $get_profile_info_by_id['member_id']; ?>_<?php echo $get_profile_info_by_id['program_uploaded_files']; ?>" download>
                                                    <?php echo $get_profile_info_by_id['program_uploaded_files']; ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Program Image
                                                <br/>
                                                <small>*Uploaded image will be displayed under Programs page</small>
                                            </th>
                                            <td width="2%">:</td>
                                            <td>
                                                <img src="uploads/program_images/<?php echo $get_profile_info_by_id['member_id']; ?>/<?php echo $get_profile_info_by_id['member_id']; ?>_<?php echo $get_profile_info_by_id['upload_image']; ?>" style="height:200px;">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
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
    

             