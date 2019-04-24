<?php
header('Content-Type: application/json');
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT sells.date,sells.quantity FROM sells";
    $result = $conn->query($query);

    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    //$result->close;

    mysqli_close($conn);

    print json_encode($data);
  