<?php
	function user_existence ($form_array){

				$user = $form_array['user'];

				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("SELECT Count(*) FROM users WHERE user_name = :username");

				$stmt->bindParam(':username', $user);

				$stmt->execute();

				$results = $stmt->fetchAll();				
				//This means that the user/password combo exists inside the database (and only once)
				if($results[0][0] == 0){
					return false;
				}
				else{
					return true;
				}
	}

	function post_user($form_array){

				$user = $form_array['user'];
				$email = $form_array['email'];
				$password = $form_array['password'];


				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("INSERT INTO users (user_name, email, password) VALUES (:user, :email, :password)");

				$stmt->bindParam(':user', $user);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':password', $password);

				$result = $stmt->execute();


				if($result == true){ //Ask Ashish if this is ok
				}
				else{
				}
	}
	
	function validate_user($form_array){

		if(array_key_exists('submit', $form_array)){

			$error_array = [];

			if(empty($form_array['user'])){
				$error_array['user'] = 'missing username data from form';
			}
			else{
				if (strlen(strip_tags(trim($form_array['user']))) > 15 ){
					$error_array['user'] = 'username is to long';	
				}
			}

			if(empty($form_array['email'])){
				$error_array['email'] = 'missing email data from form';
			}
			else{
				$temp = trim($form_array['email']);

				if (strlen($temp) > 30){
					$error_array['email'] = 'email input to long';	
				}
				else if (filter_var($temp, FILTER_VALIDATE_EMAIL)){
					}
				else{
					$error_array['email'] = 'email input is not in the correct format';
				}
			}

			if(empty($form_array['password'])){
				$error_array['password'] = 'missing password data from form';
			}
			else{
				if (strlen(strip_tags(trim($form_array['password']))) < 5 || strlen(strip_tags(trim($form_array['password']))) > 30){
					$error_array['password'] = 'password is not the right length';
				}
			}
		}
			return $error_array;
	}
?>
