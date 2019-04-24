<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_REQUEST['query'])){
        $query = $_REQUEST['query'];
        $sql = mysql_query("SELECT pssn,fname from patient where pssn like '%{$query}%' or fname LIKE '%{$query}%'");
        $array = array();
        while($row = mysql_fetch_array($sql)){
            $array[] = array(
                'label' => $row['pssn']. ', ' . $row['fname'],
                'value' => $row['pssn'],
            );
        }
        echo json_encode($array);
    }
    /*
    $result = $conn->query($query);

    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    //$result->close;

    mysqli_close($conn);

    print json_encode($data);
    */