<?php
	/* This script runs in the beginning only when the players tries to register from the client side game*/
	
	$HOST = 'cosmicrun.grape-labs.com';
	$USER = 'grapurhu_grape1';
	$PASS = '4kar1219202124';
	$DB = 'grapurhu_cosmic_run';
	$connect = new PDO('mysql:host='.$HOST.';dbname='.$DB,
                 $USER,
                 $PASS);

	
	if(mysqli_connect_errno($connect)){
		echo 'Connection failed';		
	}
	
	$name			= $_POST['name'];
	$email			= $_POST['email'];
	$country_code 	= $_POST['country_code'];
	$phone_number 	= $_POST['phone_number'];	
	$date 			= $_POST['date'];
	$time			= $_POST['time'];
	$city 			= $_POST['city'];
	$udid			= $_POST['udid'];
	
	/* This next block is to make sure a registered user does not register again. That's why the uniqueQuery is used. */
	$uniqueQuery = "SELECT * FROM todays_players WHERE udid = ?";
	$params = array($udid);
	
	try {
		$stmt = $connect->prepare($uniqueQuery);
		$result = $stmt->execute($params);
	} catch(PDOException $ex) {
		echo $ex->getMessage();
	}
	
	if($stmt->rowCount() > 0){
		echo "This device is already registered.";
	}else{	
	
		$prepstatementInsert = "INSERT INTO todays_players (name, email, phone_number, country_code,  date, time, city, udid) VALUES (?, ?,  ?, ?, ?, ?, ?, ?)";
		$params2 = array($name, $email, $phone_number,$country_code, $date, $time, $city, $udid);
		try {
			$stmt2 = $connect->prepare($prepstatementInsert);
			$result2 = $stmt2->execute($params2);
		} catch(PDOException $ex) {
			echo $ex->getMessage();
		}
		if($stmt2->rowCount() === 1){
			echo 'Successfully registered';
		}
		else{
			echo 'Failed to register. Try again after sometime.';
		}		
	}
?>