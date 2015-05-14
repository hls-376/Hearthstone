<?php

    $user = 'root';
	$pass = '';
	$db = 'hearthstone';

	$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	//$sql = "SELECT image from Card where name LIKE '%Sword%'";
	$sql = "SELECT name,image from card WHERE name = '%Voidwalker%'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row["name"],'<a href="http://www.w3.org"><img src = "'.$row["image"].'"/></a>';
		}
	} else {
		echo "0 results";
	}
?>