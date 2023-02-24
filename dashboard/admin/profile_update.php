<?php
    include('../model/Admin.php'); 
    $admin_profile = new Admin(); 

    if(isset($_POST['update_profile'])) {
        $member_id          =   $_POST['member_id'];
        $firstname          =   $_POST['firstname'];
        $last_name          =   $_POST['last_name'];
        $gender             =   $_POST['gender'];
        $phone_number       =   $_POST['phone_number'];
        $age                =   $_POST['age'];
        $birthday           =   $_POST['birthday'];
        $religion           =   $_POST['religion'];
        $blood_type         =   $_POST['blood_type'];
        $academic_year      =   $_POST['academic_year'];
        $teaching_class     =   $_POST['teaching_class'];
        $section            =   $_POST['section'];
        $date_modified      =   date("Y-m-d h:i:sa");

        $get_member_id      = $admin_profile->get_memberid($member_id);

        //upload image
        $filename = $_FILES['upload_image']['name'];
        $img_location = "../uploads/profile/".$member_id;
        // Create directory if it does not exist
        if(!is_dir($img_location)){
            mkdir($img_location, 0755);
        }
        $img_location .= "/".$member_id.'_'.$filename;
        move_uploaded_file($_FILES['upload_image']['tmp_name'],$img_location);

        if($get_member_id == $member_id) {
            $update_profile = $admin_profile->update_profile($member_id, 
                $firstname, 
                $last_name,
                $gender,
                $age,
                $phone_number,
                $birthday,
                $religion,
                $blood_type,
                $filename,
                $academic_year,
                $teaching_class,
                $section,
                $date_modified);

            if($update_profile) {
                /*Successful*/
                header('location:../admin_profile.php');
            }
            else
            {
                /*sorry your profile is not update*/
                header('location:../update_admin_profile.php');
            }
        }
        else {
            /*error occurred*/
            header('location:../update_admin_profile.php');
        }
    }
    //Register User
    else if(isset($_POST['reg_user'])) {
        // receive all input values from the form
        $first_name       = $_POST['first_name'];
        $last_name        = $_POST['last_name'];
        $email_address    = $_POST['email_address'];
        $mobile_number    = $_POST['mobile_number'];
        $user_type        = $_POST['user_type'];
        $password_1       = $_POST['password'];
        $password_2       = $_POST['confirm_password'];
        $date_created     = date("Y-m-d h:i:sa");
        $fourRandomDigit  = rand(0001,9999);
        $member_id        = "M-".$fourRandomDigit;
      
        if ($password_1 != $password_2) {
          array_push($errors, "The two passwords do not match");
        }
        $query = $admin_profile->reg_user($member_id,$email_address, $first_name, $last_name, $mobile_number, $user_type, $password_1, $date_created);
        if ($query) {
          $_SESSION['message_success'] = true;
          $_SESSION['message_success'] = 'Registration successful. You may approved now approved the registration.';
          header('Location:../add_edit_user.php?action=add');
        }
        else {
          $_SESSION['message_error'] = 'Registration failed. Email or Username already exits please try again';
          header('Location:../add_edit_user.php?action=add');
        }
    }
    //Delete function
    else {
        $id = $_GET['id'];
        $delete_user = $admin_profile->approve_user($id);
        if($delete_user) {
            $_SESSION['message_success'] = "User request has been successfully approved."; 
            header('location:../admin_users.php');
        }
        else {
            $_SESSION['message_error'] = "User request cannot be deleted. An error has occurred."; 
            header('location:../admin_users.php');
        }
    }
?>