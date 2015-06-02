	<?php
	include('text_app_connect/mysql_connect.php');
	
	post_data();

	function post_data(){

		if(isset($_POST['submit'])){
			$datacleared = validate_data();

			$datamissing = array();

			if(empty($_POST['user'])){
				$datamissing[] = 'user';
			}
			else{
				if ( strlen( $_POST[ ‘user’ ] ) <= 15 ){
					$user = strip_tags(trim($_POST['user']));
				}
			}

			if(empty($_POST['email'])){
				$datamissing[] = 'email';
			}
			else{
				$regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$";
				if ( strlen( $_POST[ ‘email’ ] ) <= 30 ){
						$temp = trim($_POST['email']);
					if ( preg_match( $regex, $temp ) ){
						$email = trim($_POST['email']);
					}
				}
			}

			if(empty($_POST['password'])){
				$datamissing[] = 'password';
			}
			else{
				if ( strlen( $_POST[ ‘password’] ) >= 5 && strlen( $_POST[ ‘password’ ] ) <= 30 ){
					$password = strip_tags(trim($_POST['password']));
				}
			}

			if(empty($datamissing)){
				
				$temp = Core::getInstance();

				$stmt = $temp->dbh->prepare("INSERT INTO users (user_name, email, password) VALUES (:user, :email, :password)");

				$stmt->bindParam(':user', $user);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':password', $password);

				$result = $stmt->execute();

				//$affected_rows = $stmt->affected_rows;

				if($result == true){
				}
				else{
					echo 'Error inputing user';
					echo mysql_error();
				}

			}

		}
		else{
			echo'<h1> Please input all required submit fields </h1>';
		}
	}
	function validate_data($form_array){
		$datacleared = false;

		if(isset($formarray['submit'])){

			$error_array = array();

			if(empty(form_array['user'])){
				$error_array['user'] = 'missing  user name data from form';
				return $datacleared;
			}
			else{
				if ( strlen( $_POST[ ‘user’ ] ) <= 15 ){
					$user = strip_tags(trim($_POST['user']));
				}
			}

			if(empty($form_array['email'])){
				$datamissing['email'] = 'missing email data from form';
				return $datacleared;
			}
			else{
				$regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$";
				if ( strlen( $_POST[ ‘email’ ] ) <= 30 ){
						$temp = trim($_POST['email']);
					if ( preg_match( $regex, $temp ) ){
						$email = trim($_POST['email']);
					}
				}
			}

			if(empty($form_array['password'])){
				$error_array['password'] = 'password';
				return $datacleared;
			}
			else{
				if ( strlen( $_POST[ ‘password’] ) >= 5 && strlen( $_POST[ ‘password’ ] ) <= 30 ){
					$password = strip_tags(trim($_POST['password']));
					$datacleared = true;
				}
			}
		}
		return($error_array);
	}


	}
	?>
