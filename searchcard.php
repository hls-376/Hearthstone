<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$name = $_GET['name'];
//$attack = intval($_GET['attack']);
//$health = intval($_GET['health']);
//$cost = intval($_GET['cost']);

//$name = 'Prophet';
//$attack = 7;
//$health = 7;
//$cost = 7;

$user = 'root';
$pass = '';
$db = 'hearthstone';
$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql="SELECT name,cost,image FROM Card WHERE name LIKE '%".$name."%'"; //AND attack = ".$attack." AND health = ".$health." AND cost = ".$cost;
$result = $con->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo '<input type="image" src="'.$row["image"].'" onclick="addCard(\''.$row["name"].'\', \''.$row["cost"].'\')" width="200" height="303"/>';
	}
} else {
	echo "0 result";
}
?>
</body>
</html>