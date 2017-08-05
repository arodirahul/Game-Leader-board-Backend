<?php
	$HOST = '198.54.116.193:3306';
	$USER = 'grapurhu_grape1';
	$PASS = '4kar1219202124';
	$DB = 'grapurhu_cosmic_run';
	$connect = mysqli_connect($HOST,$USER,$PASS,$DB);
	
	if(mysqli_connect_errno($connect)){
		echo 'Connection failed';		
	}	
	
	/*echo phpversion();*/
?>