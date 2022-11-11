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

        $get_member_id = $admin_profile->get_memberid($member_id);

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
?>