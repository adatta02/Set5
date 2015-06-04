<?php

function populate_past(){
	date_default_timezone_set('America/New_York');
	$today = date("Y-m-d");
	$user = '2'; //This will be set using $_SESSION 

	$temp = Core::getInstance();

	$stmt = $temp->dbh->prepare("SELECT * FROM events WHERE user_id = :cur_user AND event_date < :today");

				$stmt->bindParam(':cur_user', $user);
				$stmt->bindParam(':today', $today);

				$stmt->execute();

				$results = $stmt->fetchAll();
				//print_r($results);

				foreach ($results as $value) {
					echo'<li class ="item"> Event Name: ' . $value['event_name']. ' Event Date: ' . $value['event_date'] . '</li>';
				}
				
				

}

function populate_future(){
	date_default_timezone_set('America/New_York');
	$today = date("Y-m-d");
	$user = '2';

	$temp = Core::getInstance();

	$stmt = $temp->dbh->prepare("SELECT * FROM events WHERE user_id = :cur_user AND event_date > :today");

				$stmt->bindParam(':cur_user', $user);
				$stmt->bindParam(':today', $today);

				$stmt->execute();

				$results = $stmt->fetchAll();
				//print_r($results);

				foreach ($results as $value) {
					echo'<li class ="item"> Event Name: ' . $value['event_name']. ' Event Date: ' . $value['event_date'] . '</li>';
				}

}
?>