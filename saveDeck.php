<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$deckName = $_GET['deckName'];
$class = $_GET['class'];
$userid = $_GET['userid'];
$cardlist = $_GET['cardlist'];
$costlist = $_GET['costlist'];
$quantlist = $_GET['quantlist'];
$deckNameTrim = str_replace(" ", "_", $deckName);

$cardl = json_decode($cardlist);
$costl = json_decode($costlist);
$quantl = json_decode($quantlist);


$user = 'root';
$pass = '';
$db = 'hearthstone';
$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql="DELETE FROM DeckUser WHERE deckname = '$deckName' AND userid = '$userid' AND class = '$class'";
$result = $con->query($sql);

$sql="INSERT INTO DeckUser (deckname, userid, class) VALUES ('$deckName', '$userid', '$class')";
$result = $con->query($sql);

$sql="DROP TABLE ".$deckNameTrim.$userid.$class;
$result = $con->query($sql);

$sql="CREATE TABLE ".$deckNameTrim.$userid.$class." (cardname varchar(30), cost int(10), quantity int(10))";
$result = $con->query($sql);

for ($i = 0; $i < count($cardl);$i++){
	$sql="INSERT INTO ".$deckNameTrim.$userid.$class." (cardname, cost, quantity) VALUES ('$cardl[$i]', '$costl[$i]', '$quantl[$i]')";
	$result = $con->query($sql);
}

$con->close();
?>
</body>
</html>