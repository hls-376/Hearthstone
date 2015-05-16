<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$deckName = $_GET['deckName'];
$userid = $_GET['userid'];
$cardName = $_GET['cardName'];
$cost = $_GET['cost'];
$quantity = $_GET['quantity'];

//$deckName = 'zhu';
//$userid = 'zhuzhu';
//$cardName = 'wisp';
//$cost = '0';
//
$user = 'root';
$pass = '';
$db = 'hearthstone';
$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql="INSERT INTO ".$deckName.$userid." (cardname, cost, quantity) VALUES ('$cardName', '$cost', '$quantity')";
$result = $con->query($sql);
?>
</body>
</html>