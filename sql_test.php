<?php

    $user = 'root';
	$pass = '';
	$db = 'hearthstone';

	$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

	$sql="CREATE TABLE ".$user." (cardname varchar(30), cost int(10), quantity int(10))";
	$result = $con->query($sql);



	//$sql = "SELECT image from Card where name LIKE '%Sword%'";
	$sql = "SELECT name,image from card WHERE name LIKE '%Hunter%'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$row["name"]=str_replace("'", "\'", $row["name"]);
			echo $row["name"],'<a href="http://www.w3.org"><img src = "'.$row["image"].'"/></a>';
		}
	} else {
		echo "0 results";
	}
?>