<?php
	class Event
	{
		public function set_event_date($value){
			$this->event_date = $value;
		}

		public function set_twilio_number($value){
			$this->twilio_number = $value;
		}

		public function set_user_id($value){
			$this->user_id = $value;
		}
		public function set_event_name($value){
			$this->event_name = $value;
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

		/////////////////////These functions are used to create new events/////////////////////////////////////

		public function event_existence ($form_array){

				$event_name = $form_array['event_name'];
				$event_date = $form_array['date'];
				$user = $_SESSION['current_user']; 


				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("SELECT Count(*) FROM events WHERE event_name = :name AND event_date = :edate AND user_id = :user ");

				$stmt->bindParam(':name', $event_name);
				$stmt->bindParam(':edate', $event_date);
				$stmt->bindParam('user', $user);

				$stmt->execute();

				$results = $stmt->fetchAll();
				
				//This means that the user/password combo exists inside the database (and only once): They've Logged in
				if($results[0][0] != 0){
					return true;
				}
				else{
					return false;
				}
	}

	public function post_event($form_array){

				$date = $form_array['date'];
				$event_name = $form_array['event_name'];
				$user_id = $_SESSION['current_user']; 
				$twilio = '5555555555'; //This will be set ussing Twilio Api

				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("INSERT INTO events (event_date, twilio_number, user_id, event_name) VALUES (:edate, :twilio, :user_id, :event_name)");

				$stmt->bindParam(':edate', $date);
				$stmt->bindParam(':twilio', $twilio); 
				$stmt->bindParam(':user_id', $user_id);
				$stmt->bindParam(':event_name', $event_name);

				$result = $stmt->execute();


				if($result == true){ //Ask Ashish if this is ok
				}

	}
	

	public function validate_event($form_array){

		if(array_key_exists('submit', $form_array)){

			$error_array = [];

			if(empty($form_array['event_name'])){
				$error_array['event_name'] = 'missing event name data from form';
			}
			else{
				if (strlen(trim($form_array['event_name']) > 30)){
					$error_array['event_name'] = 'event name input to long';	
				}
			}

			if(empty($form_array['date'])){
				$error_array['date'] = 'missing date data from form';
			}
			else{
				$temp = trim($form_array['date']);

				if (strlen($temp) > 30){
					$error_array['date'] = 'date input to long';	
				}
				else{
					$date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';
					if (!preg_match($date_regex, $temp)) {
    				$error_array['date'] = 'Event date does not match the YYYY-MM-DD required format';
					} 
				}
			}		
			return $error_array;
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////

		private $event_date;
		private $twilio_number;
		private $user_id;
		private $event_name;
		private $id;

}
?>