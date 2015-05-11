<!DOCTYPE html>
<html>

<head>

</head>

<body>
	<?php
		$user = 'root';
		$pass = '';
		$db = 'hearthstone';
	
		$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

		$userid = $_POST["userid"];
		$password = $_POST["pw"];
		$confirmpw = $_POST["cpw"];
		$email = $_POST["email"];

		$sql = "SELECT * FROM user WHERE userid = '$userid'";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			echo '<script>window.location = "signup_error.html"</script>';
		} else {
			$insert = "INSERT INTO user (userid, password, email) 
			VALUES('$userid', '$password', '$email')";
			if($con->query($insert) === TRUE)	{
        		echo '<script>window.location = "signup_success.html"</script>';
    		} else {
    			echo "Fail";
    		}
		}
	?>

</body>

</html>