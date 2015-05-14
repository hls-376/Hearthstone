<?php
	session_start();
?>
<?php
    $user = 'root';
	$pass = '';
	$db = 'hearthstone';

	$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	//$sql = "SELECT image from Card where name LIKE '%Sword%'";
	$sql = "SELECT image from Card";
	$_SESSION["result"] = $con->query($sql);
	echo '<script>window.location = "builddeck.html"</script>';

?>