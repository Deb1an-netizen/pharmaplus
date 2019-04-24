<?php
    $conn = mysqli_connect("localhost","root","","pharmaplus");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

if (isset($_POST['submit'])) {
    $dssn = mysqli_real_escape_string($conn,$_POST["dssn"]);
    $pssn = mysqli_real_escape_string($conn,$_POST["pssn"]);
    $trade_name = mysqli_real_escape_string($conn,$_POST["trade_name"]);
    $date = mysqli_real_escape_string($conn,$_POST["date"]);
    $quantity = mysqli_real_escape_string($conn,$_POST["quantity"]);
    $pname = mysqli_real_escape_string($conn,$_POST["pname"]);
    $price = mysqli_real_escape_string($conn,$_POST["price"]);
    
}
$query1 = "INSERT INTO `prescription` (`pssn`, `dssn`, `trade_name`, `date`, `quantity`) VALUES ('$pssn', '$dssn', '$trade_name', '$date', '$quantity')";
$query2 = "INSERT INTO `sells` (`pname`, `trade_name`, `price`, `date`, `quantity`) VALUES ('$pname', '$trade_name', '$price', '$date', '$quantity')";
if (mysqli_query($conn,$query1) && mysqli_query($conn,$query2)) {
    echo "New record created successfully";      
    header('Location: ../../entry.html');
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>