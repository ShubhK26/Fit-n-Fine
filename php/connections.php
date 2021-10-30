<?php
    session_start();
    $con=mysqli_connect("localhost","root","","Fit-n-Finedb");
	$userdis=$_SESSION["usernm"];
?>