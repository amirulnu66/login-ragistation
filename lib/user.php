<?php
	include_once 'session.php';
	include 'database.php';
			
	class User{
		private $db;
		public function __construct(){
			$this->db = new Database();
		}

	    public function useregister($data){
			$name     = $data['name'];
			$username = $data['username'];
			$email    = $data['email'];
			$password = md5($data['password']);

			$che_email = $this->emailChake($email);

			if($name == "" OR $username == "" OR $email == "" OR $password == ""){	
				$message = "<div class='alert alert-danger'><strong>!ERROR</strong>Fild must not be Emty</div";
				return $message;
			} 
			if(strlen($username) <3){
				$message = "<div class='alert alert-danger'><strong>User Name is too Small</strong></div";
				return $message;
			}
			elseif(preg_match('/[^a-z0-9_-]+/i',$username)){
				$message = "<div class='alert alert-danger'><strong>user name is too small</strong></div";
				return $message;
			}
			if(filter_var($email, FILTER_VALIDATE_EMAIL)===false){
				$message = "<div class='alert alert-danger'>Envalide email number</div>";
				return $message;
			}
			if($che_email== true){
				$message = "<div class='alert alert-danger'>Email allready exites</div>";
				return $message;
			}

			$sql = "INSERT INTO tbl_user (name,username,email,password) VALUES(:name, :username, :email, :password)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':name',$name);
			$query->bindValue(':username',$username);
			$query->bindValue(':email',$email);
			$query->bindValue(':password',$password);
			$result = $query->execute();

			if($result){
				$message = "<div class='alert alert-success'><strong>Success..!</strong>You have been registed</div>";
				return $message;
			}else{
				$message = "<div class='alert alert-danger'><strong>Srrry..!</strong>You are registed faild</div>";
				return $message;
			}
		}
	/*Login SELECT session start..................*/	

		public function getLoginUser($email, $password){
			$Sql = "SELECT * FROM tbl_user WHERE email= :email AND password= :password LIMIT 1";
			$query = $this->db->pdo->prepare($Sql);
			$query->bindValue(':email',$email);
			$query->bindValue(':password',$password);
		    $query->execute();
		    $result = $query->fetch(PDO::FETCH_OBJ);
		    return $result;

		}
	/*Login SELECT session END..................*/	

		public function emailChake($email){
			$sql = "SELECT email FROM tbl_user WHERE email = :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->execute();
			if($query->rowCount() >0){
				return true;
			}else
			{
				return false;
			}
		}

      /*Login session start..................*/
		public function loginUser($data){
		$email    = $data['email'];
		$password =	md5($data['password']);

		$che_email = $this->emailChake($email);

			if($email == "" OR $password == ""){	
				$message = "<div class='alert alert-danger'><strong>!ERROR</strong>Fild must not be Emty</div";
				return $message;
			} 
			if(filter_var($email, FILTER_VALIDATE_EMAIL)===false){
				$message = "<div class='alert alert-danger'>Envalide email number</div>";
				return $message;
			}
			if($che_email== false){
				$message = "<div class='alert alert-danger'>Email not exite</div>";
				return $message;
			}

			$UserResult = $this->getLoginUser($email, $password);
			if($UserResult) {
				Session::init();
				Session::set("login", true);
				Session::set("gara_id", $UserResult->id);
				Session::set("suer_name", $UserResult->name);
				Session::set("tomas", $UserResult->username);

				$_SESSION['user_nameassing']=$UserResult->username;
				$_SESSION['pass']=$UserResult->password;

				Session::set("LoginMsg", "<div class='alert alert-success'><strong>Success..!</strong>You are LoggedIn</div>");
				//Session::set("user_type", $UserResult->user_type);

				header("Location: index.php");

			}else{
				$message = "<div class='alert alert-danger'>Data not Fount</div>";
				return $message;
			}


		}

		public function logout(){
			$session->destroy();
			header('location:login.php');
			exit();
		}
		public function getUserdata(){
			$Sql = "SELECT * FROM tbl_user ORDER BY id asc";
			$query = $this->db->pdo->prepare($Sql);
		    $query->execute();
		    $result = $query->fetchAll();
		    return $result;
		}

		public function getUserByid($id){
			$Sql = "SELECT * FROM tbl_user WHERE id=:id LIMIT 1";
			$query = $this->db->pdo->prepare($Sql);
			$query->bindValue(':id', $id);
		    $query->execute();
		    $result = $query->fetch(PDO::FETCH_OBJ);
		    return $result;
		}

		//public function updateUserData($userid ,$_POST){}
	}
?>
