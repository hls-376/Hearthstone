<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$userid = $_GET['userid'];

$user = 'root';
$pass = '';
$db = 'hearthstone';
$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql="SELECT deckname FROM deckuser WHERE userid = '$userid'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
	echo 'Your decks:<br>';
	while($row = $result->fetch_assoc()) {
		echo '<input type="button" value="'.$row["deckname"].'"/><br>';
	}
} else {
	echo "You don't have any saved decks";
}
?>
</body>
</html>