<?php
    include('../model/Admin.php'); 
    $admin_program = new Admin(); 

    if(isset($_POST['add_program'])) {
        $member_id              =   $_POST['member_id'];
        $program_name           =   $_POST['program_name'];
        $short_desc             =   $_POST['short_desc'];
        $with_exam              =   $_POST['with_exam'];
        $date_created           =   date("Y-m-d h:i:sa");

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
            header('location:../admin_programs.php');
        }
        else
        {
            /*sorry your profile is not update*/
            header('location:../add_edit_programs.php');
        }
    }
?>