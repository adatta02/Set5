<?php
include('text_app_connect/mysql_connect.php');

function user_existence ($form_array){

				$user = (strip_tags(trim($form_array['user'])));
				$password = (strip_tags(trim($form_array['password'])));


				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("SELECT Count(*) FROM users WHERE user_name = :username AND password = :password");

				$stmt->bindParam(':username', $user);
				$stmt->bindParam(':password', $password);

				$stmt->execute();

				$results = $stmt->fetchAll();
				
				if($results[0][0] == 1){
					echo'This is a valid username';
				}
				else{
					echo'No User exists with this name';
				}
				

	}


function validate_input($form_array){

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