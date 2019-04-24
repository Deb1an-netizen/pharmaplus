<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
        $name = mysqli_real_escape_string($conn,$_POST["name"]);
       // $drug_name = mysqli_real_escape_string($conn,$_POST["drug_name"]);
    
    $query = "SELECT doctor.dssn,doctor.fname,doctor.mname,doctor.lname,doctor.specialty,doctor.years_xp,SUM(prescription.quantity) AS quantity,name from doctor NATURAL JOIN prescription NATURAL JOIN drug WHERE drug.name = '$name' GROUP BY prescription.dssn";
    //$query = "SELECT * from doctor";
    $result = $conn->query($query);
    //header('Location: ../../index2.html');
    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    //$result->close;

    mysqli_close($conn);

    $json = json_encode($data);
    file_put_contents('doctorhunt.json',$json);