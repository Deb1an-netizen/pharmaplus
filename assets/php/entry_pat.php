<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
    $mname = mysqli_real_escape_string($conn,$_POST["mname"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
    $pssn = mysqli_real_escape_string($conn,$_POST["pssn"]);
    $age = mysqli_real_escape_string($conn,$_POST["age"]);
    $primary = mysqli_real_escape_string($conn,$_POST["primary"]);
    $pin = mysqli_real_escape_string($conn,$_POST["pin"]);
    $street = mysqli_real_escape_string($conn,$_POST["street"]);
    $city = mysqli_real_escape_string($conn,$_POST["city"]);
    
}

$query = "INSERT INTO `patient` (`pssn`, `fname`, `mname`, `lname`, `age`, `street`, `pincode`, `city`, `pri_phy`) VALUES ('$pssn','$fname','$mname','$lname','$age','$street','$pin','$city','$primary')";
if (mysqli_query($conn, $query)) {
    echo "New record created successfully";      
    header('Location: ../../entry.html');
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>