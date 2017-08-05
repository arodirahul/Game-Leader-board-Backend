<?php
	/* This script is run to display leader board of today's top 10 scorers from the table todays_players.*/

    // Configuration
    $hostname = 'cosmicrun.grape-labs.com';
    $username = 'grapurhu_grape1';
    $password = '4kar1219202124';
    $database = 'grapurhu_cosmic_run';
 
    try {
        $dbh = new PDO('mysql:host='. $hostname .';dbname='. $database, $username, $password);
    } catch(PDOException $e) {
        echo '<h1>An error has occurred.</h1><pre>', $e->getMessage() ,'</pre>';
    }
 
    $sth = $dbh->query('SELECT name, score FROM todays_players ORDER by score DESC LIMIT 10');
    $sth->setFetchMode(PDO::FETCH_ASSOC);
 
    $result = $sth->fetchAll();
 
    if(count($result) > 0) {
        foreach($result as $r) {
            echo $r['name'], "\t", $r['score'], "\n";
        }
    }
?>