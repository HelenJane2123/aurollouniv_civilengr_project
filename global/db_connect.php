<?php
    $url='localhost';
    $username ='root';
    $password ='';
    $conn_db = mysqli_connect($url,$username,$password,"aurollo_project");
    if(!$conn_db){
        die('Could not Connect My Sql:' .mysql_error());
    }
?>