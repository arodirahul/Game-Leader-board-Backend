<?php
	/* This script is run by the admin at the end of the day to transfer the entries from todays_players 
	to table containing all past players details i.e. all_players. Keeps the todays_players table fresh 
	for the next day's competition*/
	
	include 'database.php'; ?>
<?php
	$prepstatementinsert2 	= $connect->prepare("INSERT INTO all_players SELECT * FROM todays_players");
	$prepstatementinsert2->execute();

	$prepstatementdelete 	= $connect->prepare("DELETE FROM todays_players");		
	$prepstatementdelete->execute();
	
	$prepstatementinsert2->close();
	$prepstatementdelete->close();
	
		
?>