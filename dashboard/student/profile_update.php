<?php
    include('../model/Student.php'); 
    $student_profile = new Student(); 

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
        $class              =   $_POST['class'];
        $section            =   $_POST['section'];
        $course            =   $_POST['course'];
        $date_modified      =   date("Y-m-d h:i:sa");

        $get_member_id      = $student_profile->get_memberid($member_id);

        //upload image
        $student_filename = $_FILES['student_upload_image']['name'];
        $img_location = "../uploads/profile/".$member_id;
        // Create directory if it does not exist
        if(!is_dir($img_location)){
            mkdir($img_location, 0755,true);
        }
        $img_location .= "/".$member_id.'_'.$student_filename;
        move_uploaded_file($_FILES['student_upload_image']['tmp_name'],$img_location);

        if($get_member_id == $member_id) {
            $update_profile = $student_profile->update_profile($member_id, 
                $firstname, 
                $last_name,
                $gender,
                $age,
                $phone_number,
                $birthday,
                $religion,
                $blood_type,
                $student_filename,
                $academic_year,
                $class,
                $section,
                $course,
                $date_modified);

            if($update_profile) {
                /*Successful*/
                header('location:../student_profile.php');
            }
            else
            {
                /*sorry your profile is not update*/
                header('location:../update_student_profile.php');
            }
        }
        else {
            /*error occurred*/
            header('location:../update_student_profile.php');
        }
    }
?>