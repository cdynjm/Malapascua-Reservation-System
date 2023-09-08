<?php 

include 'server-config.php';

session_start();

class Auth {

    public function register($name, $username, $password, $type) {

        $objDB = new Database;

        $register = "INSERT INTO users (name, username, password, type) VALUES ('$name', '$username', '$password', '$type')";
        $objDB->conn()->query($register);

        $login = "SELECT * FROM users WHERE name='$name' AND username='$username' AND password='$password' AND type='guest'";
        $query = $objDB->conn()->query($login);

        if($query->num_rows > 0){
			foreach ($query->fetch_array() as $key => $value) {
				$_SESSION[$key] = $value;
			}
		}

        header('Location: '.$_SERVER['name'].'/mrs/dashboard');

    }

    public function login($username, $password) {

        $objDB = new Database;

        $login = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $query = $objDB->conn()->query($login);

        if($query->num_rows > 0){
			foreach ($query->fetch_array() as $key => $value) {
				$_SESSION[$key] = $value;
			}
			header('Location: '.$_SERVER['name'].'/mrs/dashboard');
		}else{
            $_SESSION['error'] = true;
			header('Location: '.$_SERVER['name'].'/mrs/login');
		}

    }

}

?>