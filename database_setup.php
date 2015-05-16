<?php
    $user = 'root';
	$pass = '';
	$db = 'hearthstone';
	
	$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	
	$jsondata = file_get_contents('cards.json');
	$data = json_decode($jsondata, true);
	$cards = $data['cards'];
	foreach ($cards as $value){
		$name = $value['name'];
		$cost = $value['mana'];
		$rarity = $value['quality'];
		$playerClass = $value['hero'];
		$attack = $value['attack'];
		$health = $value['health'];
		$image = $value['image_url'];
		$race = $value['race'];
		$category = $value['category'];
		$set = $value['set'];
		if ($category != "hero"){
			$sql = "INSERT INTO Card (name, cost, rarity, playerClass, attack, health, image, race, category, set_name)
			VALUES('$name', '$cost', '$rarity', '$playerClass', '$attack', '$health', '$image', '$race', '$category', '$set')";
			$con->query($sql);
		}
	}
?>