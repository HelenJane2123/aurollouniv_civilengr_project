<?php
    include('../global/db_connect.php');
    if (isset($_POST['login_user'])) {
        $email_address = mysqli_real_escape_string($conn_db, $_POST['email_address']);
        $password = mysqli_real_escape_string($conn_db, $_POST['password']);
      
        // if (empty($username)) {
        //     array_push($errors, "Username is required");
        // }
        // if (empty($password)) {
        //     array_push($errors, "Password is required");
        // }
      
        //if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user_account WHERE email_address='$email_address' AND password='$password'";
            $results = mysqli_query($conn_db, $query);
            if (mysqli_num_rows($results) == 1) {
              $_SESSION['email_address'] = $email_address;
              $_SESSION['success'] = "You are now logged in";
              header('location: ../dashboard/index.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        //}
      }
?>