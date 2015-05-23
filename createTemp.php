<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$deckName = $_GET['deckName'];
$class = $_GET['class'];
$userid = $_GET['userid'];
$deckNameTrim = str_replace(" ", "_", $deckName);
$s = 'temp';
$tableName = $deckNameTrim.$userid.$class;
$tempTableN = $s.$tableName;

$user = 'root';
$pass = '';
$db = 'hearthstone';
$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql="DROP TABLE $tempTableN";
$result = $con->query($sql);

$sql="CREATE TABLE $tempTableN (cardname varchar(30), image varchar(100), quantity int(10))";
$result = $con->query($sql);

$sql="SELECT $tableName.cardname, card.image, $tableName.quantity FROM $tableName, card WHERE $tableName.cardname = card.name";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
	$cardN = $row["cardname"];
	$url = $row["image"];
	$quant = $row["quantity"];
	$sql2="INSERT INTO $tempTableN (cardname, image, quantity) VALUES ('$cardN', '$url', 1)";
	$result2 = $con->query($sql2);
	if ($quant == 2){
		$sql3="INSERT INTO $tempTableN (cardname, image, quantity) VALUES ('$cardN', '$url', 2)";
		$result3 = $con->query($sql3);
	}
}

$con->close();
?>
</body>
</html>