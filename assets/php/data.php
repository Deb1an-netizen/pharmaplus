<?php
    header('Content-Type: application/json');

    //database vars
    define('DB_HOST', '127.0.0.1');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'PharmaPLUS');

    //get connection
    $mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if(!$mysqli){
        die("cannot connect: " . $mysqli->error);
    }

    //query creation
    $query = sprintf("SELECT fname,years_xp FROM `doctor` ORDER BY years_xp");


    //query execution
    $result = $mysqli->query($query);

    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    $result->close();

    $mysqli->close();

    print json_encode($data);
?>