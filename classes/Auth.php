<?php
/**
 * Auth Class
 */

include 'classes/db.php';


class Auth
{
	private $email;
	private $pass;

	public $status = false;
	
	public function __construct($email, $pass = null)
	{
		$this->email = $email;
		$this->pass = md5($pass);
	}

	public function login(){

		$user = $this->checkUser();

			if($user > 0){
				$_SESSION['login'] = array(
					'name' => $user['name'],
					'email' => $user['email'],
				);
				return true;
			}else{
				return false;
			}
		}

	private function checkUser()
	{
		$sql = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':password', $this->pass);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function haveEmail()
	{
		$user = $this->checkEmail();

			if($user > 0){
				return true;
			}else{
				return false;
			}
		
	}

	private function checkEmail()
	{
		$sql = "SELECT * FROM users WHERE email = :email LIMIT 1";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(':email', $this->email);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function register($name, $email, $password)
	{
		if($this->createUser($name, $email, $password)) {
			$_SESSION['login'] = array(
				'name' => $name,
				'email' => $email
			);

			header('location: index.php');
		} else {
			return false;
		}
	}

	private function createUser($name, $email, $password)
	{
		$sql = "INSERT INTO users (name, email, password) VALUES ('".$name."', '".$email."', '".md5($password)."')";

		$stmt = DB::prepare($sql);

		return $stmt->execute();
	}

}

?>