<?php 
	/* At the end of the day the admin can decide the number of winners depending on the 
	number of takeaway prizes. The table all_winners contains the details all past winners
	of the offer */
	
	include 'database.php'; ?>
<?php
	$count= $_POST['count'];
	
	$prepstatementwinner	= $connect->prepare("INSERT INTO all_winners SELECT * FROM all_players ORDER BY score DESC LIMIT 0,?");
	
	if($prepstatementwinner){
		$prepstatementwinner->bind_param("i", $count);
		if($prepstatementwinner->execute()){
			echo"executed";
		}	
		else{
			echo"execute failed";
		}
	}
	else{
	echo"failed prepare";
	}

	$prepstatementwinner->close();
		
?>