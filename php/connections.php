<?php
session_start();
//Establishing connection to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "Fit-n-Finedb";
$msg="";
$conn = mysqli_connect($servername, $username, $password, $database);
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $usrnm = $_POST["username"];
$passwd = $_POST["Password"];
$age = $_POST["age"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$bmi = ($weight / (($height / 100) * ($height / 100)));
if (!$conn) {
    die("Sorry we failed" . mysqli_connect_error());
} else {
    $user=mysqli_query($conn,"SELECT username FROM customer WHERE username='$usrnm'");
    $result=mysqli_num_rows($user);
    if ($result>0) {
        $msg="This username already exists!!";
    }
    else{
        $sql=$conn->prepare("INSERT INTO customer VALUES(?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssiddd",$usrnm,$passwd,$age,$height,$weight,$bmi);
        $sql->execute();
        echo '<script src="../Style/java.js"></script>';
        $_SESSION['username']=$usrnm;
    }
}
}
?>