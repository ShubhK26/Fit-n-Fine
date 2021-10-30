<?php
$msg2 = "";
?>
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
	$_SESSION["usernm"]=$usrnm;
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
					window.location='underweight.php'
				</script>";
			} else if ($bmi >= 18.5 && $bmi < 24.9) {
				echo "<script>alert('You have Ideal Weight. BMI:' + $bmi)
					window.location='Ideal.php'
				</script>";
			} else if ($bmi > 25 && $bmi < 29.9) {
				echo "<script>alert('You are Over Weight. BMI:' + $bmi)
					window.location='overweight.php'
				</script>";
			} else if ($bmi > 30) {
				echo "<script>alert('You have Obessed Weight. BMI:' + $bmi)
					window.location='obessed.php'
				</script>";
			}
		}
	}
}
?>

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
				<a href="form.php">Already have a account?</a <br><br>
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