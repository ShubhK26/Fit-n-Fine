<?php
    include("../php/connections.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/logo/logo.jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../Style/java.js"></script>
    <link rel="stylesheet" href="../Style/css.css">
    <title>Fit-n-Fine</title>
</head>

<body style="background-color:#3D3D3D;">
    <nav class="navbar navbar-expand-md bg-warning navbar-dark fixed-top ml-auto"
        style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">

        <a class="navbar-brand font-weight-bold" href="#" style="color: #3D3D3D;">Fit-n-Fine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a href="#" class="nav-link" style="color: #3D3D3D; font-weight: bold;"> Hello, <?php $userdis=$_SESSION["usernm"]; echo "$userdis"; ?></a>
            </li>
        </ul>
    </nav>

</body>

</html>