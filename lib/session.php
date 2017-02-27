<?php
	class Session{

		public static function init(){
			if(version_compare(phpversion(),'5.4.0', '>')){
				if(session_id() == ""){
					session_start();
				}else{
					if(session_status() == PHP_VERSION_NONE){
						session_start();
					}
				}
			}
		}

		public static function set($key, $value){
			$_SESSION[$key] = $value;
			var_dump($_SESSION[$key]);
		}


		public static function get($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key];
			}else{
				return false;
			}
		}

		public static function chechSession(){
			if(self::get("login") == false){
				self::logout();
				header('location: login.php');
			}
		}

		public static function chechLogin(){
			if(self::get("login") == true){
				header('location: index.php');
			}
		}

		public static function logout(){
			session_unset();
			header('location: login.php');
		}
	}		
?>