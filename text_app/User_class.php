<?php
	class User
	{
		public function set_username($value){
			$this->username = $value;
		}

		public function set_email($value){
			$this->email = $value;
		}

		public function set_password($value){
			$this->password = $value;
		}

		public function set_id($value){
			$this->id = $value;
		}

		public function get_username(){
			return $this->username;
		}

		public function get_email(){
			return $this->email;	
		}

		public function get_password(){
			return $this->password;	
		}

		public function get_id(){
			return $this->id;
		}

		private $username;
		private $email;
		private $password;
		private $id;
	}
?>