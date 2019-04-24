<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

if (isset($_POST['submit'])) {
    $super = mysqli_real_escape_string($conn,$_POST["super"]);
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $pname = mysqli_real_escape_string($conn,$_POST["pname"]);
    $trade_name = mysqli_real_escape_string($conn,$_POST["trade_name"]);
    $start_date = mysqli_real_escape_string($conn,$_POST["start_date"]);
    $end_date = mysqli_real_escape_string($conn,$_POST["end_date"]);
    $desc = mysqli_real_escape_string($conn,$_POST["desc"]);
    
}
$query = "INSERT INTO `contracts` (`name`, `pname`, `trade_name`, `super`, `start_date`, `end_date`, `description`) VALUES ('$name', '$pname', '$trade_name', '$super', '$start_date', '$end_date', '$desc')";
if (mysqli_query($conn,$query)) {
    echo "New record created successfully";      
    header('Location: ../../entry.html');
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>