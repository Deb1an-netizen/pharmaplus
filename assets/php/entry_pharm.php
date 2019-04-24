<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

if (isset($_POST['submit'])) {
    $pname = mysqli_real_escape_string($conn,$_POST["pname"]);
    $phone = mysqli_real_escape_string($conn,$_POST["phone"]);
    $street = mysqli_real_escape_string($conn,$_POST["street"]);
    $pin = mysqli_real_escape_string($conn,$_POST["pin"]);
    $city = mysqli_real_escape_string($conn,$_POST["city"]);
}

$query = "INSERT INTO `pharmacy` (`pname`, `ph_no`, `street`, `pincode`, `city`) VALUES ('$pname', '$phone', '$street', '$pin', '$city')";

if (mysqli_query($conn, $query)) {
    
    header('Location: ../../entry.html');
    echo "<script>(function(){alert('Success!');})();</script>";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>