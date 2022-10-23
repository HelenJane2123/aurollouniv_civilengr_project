<?php
    include('../global/db_connect.php');
    session_start();
    
    // initializing variables
    $email_address  = "";
    $errors = array(); 

    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        $first_name = mysqli_real_escape_string($conn_db, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn_db, $_POST['last_name']);
        $email_address = mysqli_real_escape_string($conn_db, $_POST['email_address']);
        $mobile_number = mysqli_real_escape_string($conn_db, $_POST['mobile_number']);
        $user_type = mysqli_real_escape_string($conn_db, $_POST['user_type']);
        $password_1 = mysqli_real_escape_string($conn_db, $_POST['password']);
        $password_2 = mysqli_real_escape_string($conn_db, $_POST['confirm_password']);
        $date_created = date("Y-m-d h:i:sa");
      
        if ($password_1 != $password_2) {
          array_push($errors, "The two passwords do not match");
        }
      
        // first check the database to make sure 
        // a user does not already exist with the same email
        $user_check_query = "SELECT * FROM user_account WHERE email_address='$email_address' LIMIT 1";
        $result = mysqli_query($conn_db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
          if ($user['email_address'] === $email_address) {
            array_push($errors, "email already exists");
          }
        }
      
        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
      
            $query = "INSERT INTO user_account (email_address, firstname, last_name, phone_number, user_type, password, date_created) 
                      VALUES('$email_address','$first_name','$last_name','$mobile_number','$user_type','$password', '$date_created')";
            mysqli_query($conn_db, $query);
            $_SESSION['email_address'] = $email_address;
            $_SESSION['full_name'] = $first_name.' '.$last_name;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['success'] =  "<strong>Success!</strong> You have been signed in successfully!";
            header('location: ../dashboard/index.php');
        }
    }      
?>