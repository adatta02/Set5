	<?php
	include('text_app_connect/mysql_connect.php');

	function post_data($form_array){

				$user = (strip_tags(trim($form_array['user'])));
				$email = $form_array['email'];
				$password = (strip_tags(trim($form_array['password'])));


				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("INSERT INTO users (user_name, email, password) VALUES (:user, :email, :password)");

				$stmt->bindParam(':user', $user);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':password', $password);

				$result = $stmt->execute();


				if($result == true){ //Ask Ashish if this is ok
				}
				else{
					echo 'Username already exists';
				}
	}
	

	function validate_data($form_array){

		if(isset($form_array['submit'])){

			$error_array = array();

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
			return($error_array);
	}

	?>
