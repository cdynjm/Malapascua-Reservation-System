<?php

class Database {

    public function conn() {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "ccsit_mvillanueva";

        // Create connection
        return new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    }
    
}


?>