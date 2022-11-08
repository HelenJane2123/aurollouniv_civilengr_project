<?php
    include('../model/Admin.php'); 
    $email_address  = "";
    $errors = array(); 
    $programfunc = new Admin(); 

    //Set the file upload path for uploaded programs
    $targetDir_programs = "../uploads/programs";    
    $fileName_program = basename($_FILES["upload_program_lesson"]["name"]);
    $targetFilePath_programs = $targetDir_programs . $fileName_program;
    $fileType_program = pathinfo($targetFilePath_programs,PATHINFO_EXTENSION);

    //Set the file upload path for uploaded images
    $targetDir_programs_images = "../uploads/program_images";
    $fileName_program_images= basename($_FILES["upload_image"]["name"]);
    $targetFilePath = $fileName_program_images . $fileName_program;
    $fileType_program_image = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $move_file_image = move_uploaded_file($_FILES["upload_image"]["tmp_name"], $fileType_program_image);

    if (isset($_POST['add_program']) && !empty($_FILES["upload_program_lesson"]["name"])) {
        // receive all input values from the form
        $program_name = $_POST['program_name'];
        $short_desc = $_POST['short_desc'];
        $with_exam = $_POST['with_exam'];
        $date_created = date("Y-m-d h:i:sa");
        $created_by = $_POST['created_by'];

        $allowTypes_programs = array('pdf');
        $allowTypes_images = array('jpg','png','jpeg','gif');
        //if(in_array($fileType_program,$allowTypes_programs)){
            // Upload file to server
            //if(move_uploaded_file($_FILES["upload_program_lesson"]["tmp_name"], $fileName_program)){
                $query = $programfunc->add_new_program($program_name,$short_desc,$with_exam,$fileName_program,$move_file_image,$date_created,$created_by);
                if ($query) {
                    $_SESSION['success'] = true;
                    $_SESSION['message'] = 'Program has been successfully added';
                    header('Location:../admin_program.php');
                }
                else {
                    $_SESSION['message'] = 'Adding a program failed.';
                    header('Location:../admin_program.php');
                }
            //}
        //}
    }      
?>