	<?php
	

	function post_event($form_array){

				$date = (strip_tags(trim($form_array['date'])));
				$event_name = (strip_tags(trim($form_array['event_name'])));
				$user_id = 2; //This will be set using $_SESSION
				$twilio = 5555555555; //This will be set ussing Twilio Api

				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("INSERT INTO events (event_date, twilio_number, user_id, event_name) VALUES (:edate, :twilio, :user_id, :event_name)");

				$stmt->bindParam(':edate', $date);
				$stmt->bindParam(':twilio', $twilio); 
				$stmt->bindParam(':user_id', $user_id);
				$stmt->bindParam(':event_name', $event_name);

				$result = $stmt->execute();


				if($result == true){ //Ask Ashish if this is ok
				}
				else{
					echo 'Username already exists';
				}
	}
	

	function validate_event($form_array){

		if(isset($form_array['submit'])){

			$error_array = array();

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
			return($error_array);
		}
	}

	?>
