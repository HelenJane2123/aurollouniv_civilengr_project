<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <?php if (isset($_SESSION['message_success'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message_success']; 
                unset($_SESSION['message_success']);
            ?>
        </div>
    <?php endif ?>
    <h1 class="h3 mb-2 text-gray-800">Exam Category</h1>
    <p class="mb-4">List of Exam Category.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="add_edit_exam_cat.php?action=add">Add New Exam Category</a>
                <?php 
                    $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Exam Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Exam Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            //get program list by member_id
                            $get_exam_cat_list =  $admin->get_all_exam_cat_list($get_profile_info['member_id']);
                            foreach($get_exam_cat_list as $exam_cat_list) {
                        ?>
                            <tr>
                                <td><?php echo $exam_cat_list['exam_category']; ?></td>
                                <td>
                                    <li class="list-inline-item">
                                        <a class="btn btn-warning" href="add_edit_exam_cat.php?action=view&id=<?php echo $exam_cat_list['exam_category_id']?>"><i class="fa fa-eye"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-primary" href="add_edit_exam_cat.php?action=edit&id=<?php echo $exam_cat_list['exam_category_id']?>"><i class="fa fa-pen"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-danger" href="admin/exam_category.php?action=delete&id=<?php echo $exam_cat_list['exam_category_id']?>"><i class="fa fa-trash"></i></a>
                                    </li>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>