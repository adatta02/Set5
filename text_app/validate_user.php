<?php
function login_user_existence ($form_array){

				$user = $form_array['user'];
				$password = $form_array['password'];


				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("SELECT Count(*) FROM users WHERE user_name = :username AND password = :password");

				$stmt->bindParam(':username', $user);
				$stmt->bindParam(':password', $password);

				$stmt->execute();

				$results = $stmt->fetchAll();
				
				//This means that the user/password combo exists inside the database (and only once): They've Logged in
				if($results[0][0] == 1){

					store_cur_session($user); //Login
					return true;
				}
				else{
					return flase;
				}
				

	}

function store_cur_session($cur_user){

	$temp = Core::getInstance();

	$stmt = $temp->dbh->prepare("SELECT id FROM users WHERE user_name = :username");

	$stmt->bindParam(':username', $cur_user);

	$stmt->execute();

	$results = $stmt->fetchAll();

	$_SESSION['current_user'] = $results[0]['id'];
}


function validate_input($form_array){

		if(array_key_exists('submit', $form_array)){

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
			return $error_array;
	}
?>