<?php
    include_once('db_header.php');
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
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
                                <li class="breadcrumb-item"><a href="admin_exam_cat.php">Exam Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Exam Category</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Add Exam Category</h1>
                        <form action="admin/exam_category.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Add New Exam Category</h3>
                                    <?php 
                                        $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_profile_info['member_id'];?>">
                                        <label for="first" class="text-bold">Exam Category</label>
                                        <input type="text" class="form-control" name="exam_category" placeholder="Enter Exam Category">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Description</label>
                                        <textarea id="basic-example" name="exam_cat_desc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="add_exam_category">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        //edit program
                        else if($_GET['action'] == 'edit') {
                            $get_exam_cat_by_id =  $admin->get_exam_cat_by_id($_GET['id']);
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
                                <li class="breadcrumb-item"><a href="admin_exam_cat.php">Exam Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Exam Category</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Edit Exam Category</h1>
                        <form action="admin/exam_category.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Edit Exam Category</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="exam_category_id" value="<?php echo $_GET['id']?>">
                                        <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_exam_cat_by_id['member_id'];?>">
                                        <label for="first" class="text-bold">Exam Category</label>
                                        <input type="text" class="form-control" name="exam_category" value="<?php echo $get_exam_cat_by_id['exam_category'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Description</label>
                                        <textarea id="basic-example" name="exam_cat_desc"><?php echo $get_exam_cat_by_id['exam_cat_desc'];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="edit_exam_category">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        else if($_GET['action'] == 'view') {
                            $get_exam_cat_by_id =  $admin->get_exam_cat_by_id($_GET['id']);

                    ?>
                        <!-- Page Heading -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_exam_cat.php">Exam Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Exam Category</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">View Program Details for <?php echo $get_exam_cat_by_id['exam_category'];?></h1>
                        <form action="admin/programs.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Exam Category</label>
                                        <input type="text" class="form-control" name="exam_category" disabled value="<?php echo $get_exam_cat_by_id['exam_category'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Description</label>
                                        <?php echo $get_exam_cat_by_id['exam_cat_desc'];?>
                                    </div>
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
    

             