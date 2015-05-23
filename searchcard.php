<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$name = $_GET['name'];
$set = $_GET['set'];
$race = $_GET['race'];
$class = $_GET['classN'];
$atkmin = $_GET['atkmin'];
$atkmax = $_GET['atkmax'];
$costmin = $_GET['costmin'];
$costmax = $_GET['costmax'];
$filter = " AND attack >= ".$atkmin." AND attack <= ".$atkmax." AND cost >= ".$costmin." AND cost <= ".$costmax." ORDER BY playerClass, cost";
//$name = '';
//$set = 'Basic';
//$race = '';

$namefilter = true;
$setfilter = true;
$racefilter = true;

if ($set == ''){
	$setfilter = false;
}
if ($race == ''){
	$racefilter = false;
}
if ($name == ''){
	$namefilter = false;
}

$user = 'root';
$pass = '';
$db = 'hearthstone';
$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
$sql="SELECT name,cost,rarity,image FROM Card WHERE name LIKE '%".$name."%' AND set_name = '".$set."' AND race = '".$race."' AND (playerClass = '".$class."' OR playerClass = 'neutral')".$filter;

if ($set && !$name && !$race){
	$sql="SELECT name,cost,rarity,image FROM Card WHERE set_name = '".$set."' AND (playerClass = '".$class."' OR playerClass = 'neutral')".$filter;
} else if ($set && $name && !$race){
	$sql="SELECT name,cost,rarity,image FROM Card WHERE name LIKE '%".$name."%' AND set_name = '".$set."' AND (playerClass = '".$class."' OR playerClass = 'neutral')".$filter;
} else if (!$set && $name && !$race){
	$sql="SELECT name,cost,rarity,image FROM Card WHERE name LIKE '%".$name."%' AND (playerClass = '".$class."' OR playerClass = 'neutral')".$filter;
} else if (!$set && $name && $race){
	$sql="SELECT name,cost,rarity,image FROM Card WHERE name LIKE '%".$name."%' AND race = '".$race."' AND (playerClass = '".$class."' OR playerClass = 'neutral')".$filter;
} else if ($set && !$name && $race){
	$sql="SELECT name,cost,rarity,image FROM Card WHERE set_name = '".$set."' AND race = '".$race."' AND (playerClass = '".$class."' OR playerClass = 'neutral')".$filter;
} else if (!$set && !$name && $race){
	$sql="SELECT name,cost,rarity,image FROM Card WHERE race = '".$race."' AND (playerClass = '".$class."' OR playerClass = 'neutral')".$filter;
} else if (!$set && !$name && !$race){
	$sql="SELECT name,cost,rarity,image FROM Card WHERE (playerClass = '".$class."' OR playerClass = 'neutral')".$filter;
}

$result = $con->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$row["name"]=str_replace("'", "\'", $row["name"]);
		echo '<input type="image" src="'.$row["image"].'" onclick="addCard(\''.$row["name"].'\', \''.$row["cost"].'\',\''.$row["rarity"].'\')" width="200" height="303"/>';
	}
} else {
	echo "0 result";
}
?>
</body>
</html>