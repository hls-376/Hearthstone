<?php
	session_start();
?>
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

		$userid = $_GET["userid"];
		$password = $_GET["pw"];

		$sql = "SELECT * FROM user WHERE userid = '$userid' AND password = '$password'";
		$result = $con->query($sql);
		if ($result->num_rows == 0) {
			echo '<script>window.location = "login_error.html"</script>';
		} else {
			$_SESSION['userid'] = $userid;
			echo '<script>window.location = "login_success.html"</script>';
		}
	?>

</body>

</html>