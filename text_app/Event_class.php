<?php
	class Event
	{
		public function set_event_date($value){
			$this->username = $value;
		}

		public function set_twilio_number($value){
			$this->email = $value;
		}

		public function set_user_id($value){
			$this->password = $value;
		}
		public function set_event_name($value){
			$this->id = $value;
		}

		public function set_id($value){
			$this->id = $value;
		}

		public function get_event_date(){
			return $this->event_date;
		}

		public function get_twilio_number(){
			return $this->twilio_number;	
		}

		public function get_user_id(){
			return $this->user_id;	
		}

		public function get_event_name(){
			return $this->event_name;
		}

		public function get_id(){
			return $this->id;
		}

		public function populate_past(){
			date_default_timezone_set('America/New_York');
			$today = date("Y-m-d");
			$user = '2'; //This will be set using $_SESSION 

			$temp = Core::getInstance();

			$stmt = $temp->dbh->prepare("SELECT * FROM events WHERE user_id = :cur_user AND event_date < :today");

				$stmt->bindParam(':cur_user', $user);
				$stmt->bindParam(':today', $today);

				$stmt->execute();

				$results = $stmt->fetchAll();
				print_r($results);

				return $results;
		}

		public function populate_future(){
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

				return $results;
		}

		private $event_date;
		private $twilio_number;
		private $user_id;
		private $event_name;
		private $id;

}
?>