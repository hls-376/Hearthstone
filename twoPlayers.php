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

$sql="SELECT deckname, class FROM deckuser WHERE userid = '$userid'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
	echo '<h2>Choose a deck for your opponent:</h2><br><br>';
	echo '<table id="decks" style="width:100%">';
		echo '<tr>
				<th width="35%">Deck Name</th>
				<th width="35%">Class</th>
				<th width="15%">&nbsp;</th>
			</tr>';
	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo '<td>'.$row["deckname"].'</td>';
		echo '<td>'.$row["class"].'</td>';
		echo '<td><input type="button" class="btn btn-warning" value = "Choose" onClick="chooseYourDeck(this)"></form></td>';
		echo '</tr>';
	}
	echo '</table>';
} else {
	echo "You don't have any saved decks";
}
?>
</body>
</html>