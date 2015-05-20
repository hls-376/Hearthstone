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

$sql="SELECT * FROM ".$deckNameTrim.$userid.$class;
$result = $con->query($sql);
if ($result->num_rows > 0) {
	echo '<input type="hidden" id="deckName" value="'.$deckName.'" >';
	echo 'Deck Name: '.$deckName.'<br><br>';
	echo '<table id="deck" style="width:100%">';
		echo '<tr>
				<th width="45%">Card Name</th>
				<th width="20%">Mana Cost</th>
				<th width="15%">Quantity</th>
				<th width="20%">&nbsp;</th>
			</tr>';
	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo '<td>'.$row["cardname"].'</td>';
		echo '<td>'.$row["cost"].'</td>';
		echo '<td>'.$row["quantity"].'</td>';
		echo '<td><input type="button" class="btn btn-success" value = "Remove" onClick="Javacsript:deleteCard(this)"></td>';
		echo '</tr>';
	}
	echo '</table><br>';
	echo '<a href="user_home.html"><input type="button" id="save" value="Save Decklist" onClick="saveDeck()"></a>';
} else {
	echo "You don't have any saved decks";
}
?>
</body>
</html>