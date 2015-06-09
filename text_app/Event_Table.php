<?php
Class Event_Table{

	public function create_objects($results){
		$object_array = [];
	
		foreach ($results as $key => $value) {
			$event = new Event();

			$event->set_event_date($results[$key]['event_date']);
			$event->set_twilio_number($results[$key]['twilio_number']); 
			$event->set_user_id($results[$key]['user_id']); 
			$event->set_event_name($results[$key]['event_name']); 
			$event->set_id($results[$key]['id']);

			$object_array[] = $event;
		}
		//print_r($object_array);
		return $object_array;

	}
	public function populate_past(){
			date_default_timezone_set('America/New_York');
			$today = date("Y-m-d");
			$user = $_SESSION['current_user']; 

			$temp = Core::getInstance();

			$stmt = $temp->dbh->prepare("SELECT * FROM events WHERE user_id = :cur_user AND event_date < :today");

				$stmt->bindParam(':cur_user', $user);
				$stmt->bindParam(':today', $today);

				$stmt->execute();

				$results = $stmt->fetchAll();
				//print_r($results);

				return self::create_objects($results);
		}

		public function populate_future(){
			date_default_timezone_set('America/New_York');
			$today = date("Y-m-d");
			$user = $_SESSION['current_user'];

			$temp = Core::getInstance();

			$stmt = $temp->dbh->prepare("SELECT * FROM events WHERE user_id = :cur_user AND event_date > :today");

				$stmt->bindParam(':cur_user', $user);
				$stmt->bindParam(':today', $today);

				$stmt->execute();

				$results = $stmt->fetchAll();
				//print_r($results);

				return self::create_objects($results);
	
		}
}
?>