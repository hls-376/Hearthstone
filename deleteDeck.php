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

$user = 'root';
$pass = '';
$db = 'hearthstone';
$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql="DELETE FROM DeckUser WHERE deckname = '$deckName' AND userid = '$userid' AND class = '$class'";
$result = $con->query($sql);

$sql="DROP TABLE ".$deckNameTrim.$userid.$class;
$result = $con->query($sql);

$con->close();
?>
</body>
</html>