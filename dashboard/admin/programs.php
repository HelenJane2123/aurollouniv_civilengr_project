<?php
    include('../model/Admin.php'); 
    $admin_program = new Admin();
    session_start(); 

    // Add Progam
    if(isset($_POST['add_program'])) {
        $member_id              =   $_POST['member_id'];
        $program_name           =   $_POST['program_name'];
        $short_desc             =   $_POST['short_desc'];
        $with_exam              =   $_POST['with_exam'];
        $date_created           =   date("Y-m-d h:i:sa");
        $action                 =   $_POST['action'];

        //upload image
        $filename = $_FILES['upload_image']['name'];
        $img_location = "../uploads/program_images/".$member_id;
        // Create directory if it does not exist
        if(!is_dir($img_location)){
            mkdir($img_location, 0755);
        }
        $img_location .= "/".$member_id.'_'.$filename;
        move_uploaded_file($_FILES['upload_image']['tmp_name'],$img_location);

        // Count total files
        $countfiles = count($_FILES['mutiple_file_lessons']['name']);
        // Looping all files
        for($i=0;$i<$countfiles;$i++){
            $filename_files = $_FILES['mutiple_file_lessons']['name'][$i];
            $files_location = "../uploads/programs/".$member_id;
            // Create directory if it does not exist
            if(!is_dir($files_location)){
                mkdir($files_location, 0755);
            }
            $files_location .= "/".$member_id.'_'.$filename_files;
            // Upload file
            move_uploaded_file($_FILES['mutiple_file_lessons']['tmp_name'][$i],$files_location);
        }
        $add_programs = $admin_program->add_new_program($member_id,$program_name, $short_desc,$with_exam,$filename,$filename_files,$date_created);
        if($add_programs) {
            /*Successful*/
            $_SESSION['message_success'] = "New program has been successfully added."; 
            header('location:../admin_programs.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New program cannot be added. An error has occurred."; 
            header('location:../add_edit_programs.php?action=add');
        }
    }
    //Edit Program
    else if(isset($_POST['edit_program'])) {
        $member_id              =   $_POST['member_id'];
        $program_name           =   $_POST['program_name'];
        $short_desc             =   $_POST['short_desc'];
        $with_exam              =   $_POST['with_exam'];
        $date_modified          =   date("Y-m-d h:i:sa");
        $id                     =   $_POST['program_id'];

        //upload image
        $filename = $_FILES['upload_image']['name'];
        $img_location = "../uploads/program_images/".$member_id;
        // Create directory if it does not exist
        if(!is_dir($img_location)){
            mkdir($img_location, 0755);
        }
        $img_location .= "/".$member_id.'_'.$filename;
        move_uploaded_file($_FILES['upload_image']['tmp_name'],$img_location);

        // Count total files
        $countfiles = count($_FILES['mutiple_file_lessons']['name']);
        // Looping all files
        for($i=0;$i<$countfiles;$i++){
            $filename_files = $_FILES['mutiple_file_lessons']['name'][$i];
            $files_location = "../uploads/programs/".$member_id;
            // Create directory if it does not exist
            if(!is_dir($files_location)){
                mkdir($files_location, 0755);
            }
            $files_location .= "/".$member_id.'_'.$filename_files;
            // Upload file
            move_uploaded_file($_FILES['mutiple_file_lessons']['tmp_name'][$i],$files_location);
        }
        $update_programs = $admin_program->update_program($id,$program_name, $short_desc,$with_exam,$filename,$filename_files,$date_modified);
        if($update_programs) {
            /*Successful*/
            $_SESSION['message_success'] = "Selected program has been successfully updated."; 
            header('location:../admin_programs.php');
        }
        else
        {
            /*sorry your porgram is not update*/
            $_SESSION['message_error'] = "Selected program cannot be updated. An error has occurred."; 
            header("location:../add_edit_programs.php?action=edit&id=$id");
        }
    }
    //Delete function
    else {
        $id = $_GET['id'];
        $delete_programs = $admin_program->delete_program($id);
        if($delete_programs) {
            $_SESSION['message_success'] = "Program has been successfully deleted."; 
            header('location:../admin_programs.php');
        }
        else {
            $_SESSION['message_error'] = "Program cannot be deleted. An error has occurred."; 
            header('location:../admin_programs.php');
        }
    }
?>