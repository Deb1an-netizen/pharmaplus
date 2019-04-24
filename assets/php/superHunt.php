<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
//    $query = "SELECT contracts.super,contracts.start_date,contracts.end_date,contracts.name,contracts.pname,SUM(sells.quantity) as quantity FROM contracts JOIN sells ON contracts.trade_name = sells.trade_name AND contracts.pname=sells.pname GROUP BY contracts.trade_name;";
    //$query = "SELECT contracts.super,contracts.start_date,contracts.end_date,DATEDIFF(contracts.end_date,contracts.start_date) as time,contracts.name,contracts.pname,SUM(sells.quantity) as quantity FROM contracts JOIN sells ON contracts.trade_name = sells.trade_name AND contracts.pname=sells.pname GROUP BY contracts.trade_name";
    $query = "SELECT contracts.super,contracts.start_date,contracts.end_date,DATEDIFF(contracts.end_date,contracts.start_date) as time,contracts.name,contracts.pname,SUM(sells.quantity) as quantity FROM contracts JOIN sells ON contracts.trade_name = sells.trade_name AND contracts.pname=sells.pname GROUP BY contracts.super";
    $result = $conn->query($query);

    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    //$result->close;

    mysqli_close($conn);

    print json_encode($data);