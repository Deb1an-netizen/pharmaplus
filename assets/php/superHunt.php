<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $name = mysqli_real_escape_string($conn,$_POST["name3"]);
//    $query = "SELECT contracts.super,contracts.start_date,contracts.end_date,contracts.name,contracts.pname,SUM(sells.quantity) as quantity FROM contracts JOIN sells ON contracts.trade_name = sells.trade_name AND contracts.pname=sells.pname GROUP BY contracts.trade_name;";
    //$query = "SELECT contracts.super,contracts.start_date,contracts.end_date,DATEDIFF(contracts.end_date,contracts.start_date) as time,contracts.name,contracts.pname,SUM(sells.quantity) as quantity FROM contracts JOIN sells ON contracts.trade_name = sells.trade_name AND contracts.pname=sells.pname GROUP BY contracts.trade_name";
    $query = "SELECT contracts.super,contracts.start_date,contracts.end_date,DATEDIFF(contracts.end_date,contracts.start_date) as time,contracts.name,contracts.pname,SUM(sells.quantity) as quantity FROM contracts JOIN sells ON contracts.trade_name = sells.trade_name AND contracts.pname=sells.pname WHERE contracts.name = '$name' GROUP BY contracts.super";
    $result = $conn->query($query);

    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    //$result->close;

    mysqli_close($conn);

    $json = json_encode($data);
    file_put_contents('superHunt.json',$json);