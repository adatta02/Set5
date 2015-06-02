	<?php
	include('text_app_connect/mysql_connect.php');
	
	post_data();

	function post_data(){

		if(isset($_POST['submit'])){

			$datamissing = array();

			if(empty($_POST['user'])){
				$datamissing[] = 'user';
			}
			else{
				$user = trim($_POST['user']);
			}

			if(empty($_POST['email'])){
				$datamissing[] = 'email';
			}
			else{
				$email = trim($_POST['email']);
			}

			if(empty($_POST['password'])){
				$datamissing[] = 'password';
			}
			else{
				$password = trim($_POST['password']);
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
			echo'Please input all required submit fields';
		}
	}
	?>
