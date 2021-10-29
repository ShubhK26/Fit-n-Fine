<script src="../Style/java.js"></script>
<?php
session_start();
//Establishing connection to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "Fit-n-Finedb";
$msg = "";
$conn = mysqli_connect($servername, $username, $password, $database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$usrnm = $_POST["username"];
	$passwd = $_POST["Password"];
	$age = $_POST["age"];
	$height = $_POST["height"];
	$weight = $_POST["weight"];
	$bmi = ($weight / (($height / 100) * ($height / 100)));
	if (!$conn) {
		die("Sorry we failed" . mysqli_connect_error());
	} else {
		$user = mysqli_query($conn, "SELECT username FROM customer WHERE username='$usrnm'");
		$result = mysqli_num_rows($user);
		if ($result > 0) {
			$msg = "This username already exists!!";
		} else {
			$sql = $conn->prepare("INSERT INTO customer VALUES(?, ?, ?, ?, ?, ?)");
			$sql->bind_param("ssiddd", $usrnm, $passwd, $age, $height, $weight, $bmi);
			$sql->execute();
			if ($bmi < 18.5) {
				echo "<script>alert('You are Under Weight. BMI:' + $bmi)
				window.location='Home.html'
			</script>";
			} else if ($bmi >= 18.5 && $bmi < 24.9) {
				echo "<script>alert('You have Ideal Weight. BMI:' + $bmi)
				window.location='Home.html'
			</script>";
			} else if ($bmi > 25 && $bmi < 29.9) {
				echo "<script>alert('You are Over Weight. BMI:' + $bmi)
				window.location='Home.html'
			</script>";
			} else if ($bm > 30) {
				echo "<script>alert('You have Obessed Weight. BMI:' + $bmi)
				window.location='Home.html'
			</script>";
			}
			$_SESSION['username'] = $usrnm;
		}
	}
}
?>
<html>

<head>
	<title>Fit-n-Fine</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Style/css.css">
	<link rel="icon" href="../Assets/logo/logo.jpg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="../Style/java.js"></script>
	<style>
		/*Trigger Button*/
		.login-trigger {
			padding: 15px 30px;
			border-radius: 30px;
			position: relative;
			top: 50%;
		}

		/*Modal*/
		h4 {
			font-weight: bold;
			color: #fff;
		}

		.close {
			color: #fff;
			transform: scale(1.2)
		}

		.modal-content {
			font-weight: bold;
			background: linear-gradient(to bottom right, rgb(250, 200, 200), rgb(100, 110, 150));
		}

		.username,
		.password {
			border: none;
			border-radius: 0;
			box-shadow: none;
			border-bottom: 2px solid #eee;
			padding-left: 0;
			font-weight: normal;
			background: transparent;
		}

		.form-control::-webkit-input-placeholder {
			color: #505050;
		}

		.form-control:focus::-webkit-input-placeholder {
			font-weight: bold;
			color: #707070;
		}

		.login {
			padding: 6px 20px;
			border-radius: 20px;
			background: none;
			border: 2px solid #FAB87F;
			color: #505050;
			font-weight: bold;
			transition: all .5s;
			margin-top: 1em;
		}

		.login:hover {
			background: #FAB87F;
			color: #fff;
		}
	</style>
</head>

<body style="background-color: floralwhite;">
	<img src="../Assets/logo/logo.jpg" width="150" height="140">
	<div class="container introset">
		<div class="logo">
			<center>
				<h3>Fit-n-Fine workout</h4>
					<h6>Stay healthy stay effective</h6>
			</center>
			<br><br>
		</div>
		<div class="row" style="float: left; width: 60%;">
			<div class="col-lg-12 col-md-12 col-sm-10 col-10 d-block m-auto">
				<a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Already have a account?</a>
				<div id="login" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<button data-dismiss="modal" class="close">&times;</button>
								<h4>Login</h4>
								<form>
									<input type="text" name="username" class="username form-control" placeholder="Username" />
									<input type="password" name="password" class="password form-control" placeholder="password" />
									<input class="btn login" type="submit" value="Login" />
								</form>
							</div>
						</div>
					</div>
				</div>
				<br><br>
				<form action="" method="post">
					Please select your age
					<div class="form-group slidercontainer"><input type="range" min="10" max="90" value="18" class="slider" id="myRange" name="age">
					</div>

					<p>
						Your age is : <span id="demo"></span>
					</p>
					<div>
						<div class="info form-group">
							Enter username : <input type="text" id="usrname" class="form-control" name="username" required>
						</div>
						<div id="usererror" style="color: red;"> <?php echo "$msg"; ?></div>
						<div class="info form-group">
							Password : <input type="password" id="passwd" class="form-control" name="Password" required>
						</div>
						<div class="info form-group">
							Please enter your height in cm : <input type="number" id="height" class="form-control" name="height" required>
						</div>
						<div class="info form-group">
							Please enter your weight in kg : <input type="number" id="weight" class="form-control" name="weight" required>
						</div>
						<button class="btn btn-success" value="submit" onclick="myFunction()">Submit</button>
						&nbsp;&nbsp;&nbsp;
						<button class="btn btn-danger" value="reset">Reset</button>
					</div>
				</form>

			</div>
		</div>
		<div class="imgset">
			<marquee behavior="scroll" direction="up" height="500px">
				<img src="../Assets/Workout/workout1.jpg" width="300" height="200"><br><br>
				<img src="../Assets/Workout/workout2.jpg" width="300" height="200"><br><br>
				<img src="../Assets/Workout/workout3.jpg" width="300" height="200"><br><br>
				<img src="../Assets/Workout/workout4.jpg" width="300" height="200"><br><br>
				<img src="../Assets/Workout/wrk2.jpg" width="300" height="200"><br><br>
				<img src="../Assets/Workout/diet.jpeg" width="300" height="200">
			</marquee>
		</div>
	</div>

	<script>
		var slider = document.getElementById("myRange");
		var output = document.getElementById("demo");
		output.innerHTML = slider.value;
		slider.oninput = function() {
			output.innerHTML = this.value;
		}
	</script>
</body>

</html>