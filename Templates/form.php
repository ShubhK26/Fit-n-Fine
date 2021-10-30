<?php
$msg2="";
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  $connect = mysqli_connect("localhost","root","","Fit-n-Finedb");
  if (!$connect) {
    die("Sorry we could not connect to the databse " . $mysqli_connect_error);
  }
  else{
    $usernm=$_POST["users"];
    $pwd=$_POST["passwords"];
    $_SESSION["usernm"]=$usernm;
    $users=mysqli_query($connect,"SELECT username FROM customer WHERE username='$usernm' AND passwd='$pwd'");
    $result=mysqli_num_rows($users);
    if ($result > 0) {
      $sql=mysqli_query($connect,"SELECT bmi from customer WHERE username='$usernm'");
      $row=mysqli_fetch_assoc($sql);
      $bmis=floatval($row['bmi']);
			if ($bmis < 18.5) {
				echo "<script>
					window.location='underweight.php'
				</script>";
			} else if ($bmis >= 18.5 && $bmis < 24.9) {
				echo "<script>
					window.location='Ideal.php'
				</script>";
			} else if ($bmis > 25 && $bmis < 29.9) {
				echo "<script>
					window.location='overweight.php'
				</script>";
			} else if ($bmis > 30) {
				echo "<script>
					window.location='obessed.php'
				</script>";
			}
    }
    else{
      $msg2="Username or password is invalid!!";
    }
  }
}

?>
<html>

<head>
  <title>Fit-n-Fine Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Style/css.css">
  <link rel="icon" href="../Assets/logo/logo.jpg">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    form {
      border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: none;
      border-bottom: 2px solid #ccc;
      -webkit-transition: 1s;
      transition: 1s;
      outline: none;
    }
    input[type=text]:focus,
    input[type=password]:focus{
      border: none;
      border-bottom: 2px solid rgb(12, 206, 222);
    }
    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }
    #loginerror{
      color: red;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-9 col-10 d-block m-auto">
        <div class="logingin">
          <form action="" method="post">
            <div class="imgcontainer">
              <img src="../Assets/logo/avatar.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
              <label for="uname"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="users" required>

              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="passwords" required>

              <button type="submit">Login</button>
              <div id="loginerror"><?php echo "$msg2"; $msg2="";?></div>
            </div>

            <div class="container" style="background-color:#f1f1f1">
              <button type="button" class="cancelbtn" onclick="goBack()">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  function goBack() {
    window.history.back();
  }
</script>

</html>