<?php 

class Room {

    public function add($room, $description, $price, $maxguest) {

        $objDB = new Database;

        $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/mrs/assets/images/'; 

        $date = date('Y-m-d-H-i-s');

        $fileName = basename($date.'-'.$_FILES["file"]["name"]); 
        $targetFilePath = $uploadDir . $fileName; 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 

        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath); 
        $uploadedFile = $fileName; 

        $room = "INSERT INTO rooms (room, description, price, status, maxguest, picture) VALUES ('$room', '$description', '$price', 1, '$maxguest', '$uploadedFile')";
        $objDB->conn()->query($room);

        header('Location: '.$_SERVER['name'].'/mrs/rooms');
    }

    public function edit($room, $description, $price, $maxguest, $oldpicture, $roomid) {

        $objDB = new Database;

        if(!empty(basename($_FILES["file"]["name"]))) {

            $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/mrs/assets/images/'; 

            $date = date('Y-m-d-H-i-s');

            $fileName = basename($date.'-'.$_FILES["file"]["name"]); 
            $targetFilePath = $uploadDir . $fileName; 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 

            move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath); 
            $uploadedFile = $fileName; 

            $room = "UPDATE rooms SET room='$room', description='$description', price='$price', status=1, maxguest='$maxguest', picture='$uploadedFile' WHERE id='$roomid'";
        }
        else {
            $room = "UPDATE rooms SET room='$room', description='$description', price='$price', status=1, maxguest='$maxguest', picture='$oldpicture' WHERE id='$roomid'";
        }

        $objDB->conn()->query($room);

        header('Location: '.$_SERVER['name'].'/mrs/rooms');
    }

    public function delete($roomid) {

        $objDB = new Database;

        $room = "DELETE from rooms WHERE id='$roomid'";
        $objDB->conn()->query($room);

        $reservation = "DELETE from reservation WHERE roomid='$roomid' AND status=0";
        $objDB->conn()->query($reservation);

        header('Location: '.$_SERVER['name'].'/mrs/rooms');
    }

}