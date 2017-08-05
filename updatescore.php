<?php 
	/* If the player makes a new high score then this script is called by the client side game to update the score of that player. */
	
	require 'database.php'; ?>
<?php
	
	//client side  - logic for specific player recognized via email - if new_score > previous_score; update score, date and time
	//$updatescore= 1000;
	//$updatedate	= "2015-11-05";
	//$updatetime	= "15:15:15";
	//$email		= "kbb@gmail.com";
	
	$email			= $_POST['email'];
	$updatescore	= $_POST['score'];
	$updatedate		= $_POST['date'];
	$updatetime		= $_POST['time'];
	//$udid			= $_POST['udid']
	$prepstatementupdate = $connect->prepare("UPDATE todays_players SET score = ?, date =? , time = ?  WHERE email = ?");
	$prepstatementupdate->bind_param("isss", $updatescore, $updatedate, $updatetime, $email);
	$prepstatementupdate->execute();
	$prepstatementupdate->close();

?>