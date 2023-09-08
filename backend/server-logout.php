<?php 

include 'server-config.php';

session_start();

$obj = new Logout;
$obj->destroy($_GET['id']);

class Logout {

    public function destroy($id) {
        
        session_destroy();
        session_unset();

        header('Location: '.$_SERVER['name'].'/mrs/login');
    }

}

?>