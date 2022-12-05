<?php
    include('../model/Admin.php'); 
    $sql ="SELECT * FROM students";
         $result = mysqli_query($db,$sql);
         $data = array();
         while ($row = mysqli_fetch_array($result)) { 
            $data[] = $row;
    }
    // $result = $admin->get_all_students_graph();
    // $data = array();
    // foreach ($result as $row) {
    //     $data[] = $row;
    // }
    echo json_encode($data);


?>