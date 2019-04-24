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
    $year = mysqli_real_escape_string($conn,$_POST["year"]);
    $spec = mysqli_real_escape_string($conn,$_POST["spec"]);
}

$query = "INSERT INTO `doctor` (`dssn`, `fname`, `mname`, `lname`, `specialty`, `years_xp`) VALUES ('$pssn','$fname', '$mname' , '$lname' , '$spec', '$year ')";

if (mysqli_query($conn, $query)) {
    echo "New record created successfully";      
    header('Location: ../../entry.html');
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>