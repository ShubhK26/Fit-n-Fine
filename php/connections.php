<?php

//Establishing connection to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "Fit-n-Finedb";
$conn = mysqli_connect($servername,$username,$password,$database);
$usrnm= $_POST["username"];
$passwd= $_POST["Password"];
$age = $_POST["age"];
$height= $_POST["height"];
$weight = $_POST["weight"];
$bmi = ($weight / (($height / 100) * ($height / 100)));
if (!$conn) {
    die("Sorry we failed". mysqli_connect_error());
}
else{
    $fitdb = $conn->prepare("insert into customer values(?, ?, ?, ?, ?, ?)");
    $fitdb->bind_param("ssiddd",$usrnm,$passwd,$age,$height,$weight,$bmi);
    $fitdb->execute();
}
header("Location: ../Templates/Home.html");
?>