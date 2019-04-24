<?php
header('Content-Type: application/json');
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $name = mysqli_real_escape_string($conn,$_POST["name2"]);
    $start = mysqli_real_escape_string($conn,$_POST["start_date"]);
    $end = mysqli_real_escape_string($conn,$_POST["end_date"]);

    $start=date("Y-m-d H:i:s",strtotime($start));
    $end=date("Y-m-d H:i:s",strtotime($end));
    
    $query = "SELECT sells.date,sells.quantity FROM sells NATURAL JOIN drug WHERE drug.name = '$name' AND sells.date BETWEEN '$start' AND '$end' ";
    $result = $conn->query($query);

    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    //$result->close;

    mysqli_close($conn);

    $json = json_encode($data);
    file_put_contents('bar.json',$json);
  