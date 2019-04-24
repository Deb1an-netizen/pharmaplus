<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
        //$name = mysqli_real_escape_string($conn,$_POST["name"]);
       // $drug_name = mysqli_real_escape_string($conn,$_POST["drug_name"]);
    
    //$query = "SELECT doctor.dssn,doctor.fname,doctor.mname,doctor.lname,doctor.specialty,doctor.years_xp,prescription.trade_name,SUM(prescription.quantity) AS quantity from doctor NATURAL JOIN prescription WHERE trade_name IN (SELECT drug.trade_name FROM drug WHERE drug.name LIKE '$name') GROUP BY trade_name";
    $query = "SELECT * from doctor";
    $result = $conn->query($query);
    //header('Location: ../../index2.html');
    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    //$result->close;

    mysqli_close($conn);

    print json_encode($data);