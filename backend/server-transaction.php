<?php 

class Transaction {

    public function add($name, $address, $phone, $checkin, $checkout, $roomid) {

        $objDB = new Database;

        $userid = $_SESSION['id'];

        $total_payment = 0;

        $payment = "SELECT * FROM rooms WHERE id='$roomid'";
        $query = $objDB->conn()->query($payment);

        while($row = $query->fetch_array()) {

            $date1=date_create($checkin);
            $date2=date_create($checkout);

            $diff=date_diff($date1, $date2);

            $total_payment = $row['price'] * $diff->format('%a');
        }

        $reservation = "INSERT INTO reservation (userid, name, address, phone, checkin, checkout, roomid, total_payment, status) 
        VALUES ('$userid', '$name', '$address', '$phone', '$checkin', '$checkout', '$roomid', '$total_payment', 0)";
        $objDB->conn()->query($reservation);

        $updateroom = "UPDATE rooms SET status=0, checkout='$checkout' WHERE id='$roomid'";
        $objDB->conn()->query($updateroom);

        header('Location: '.$_SERVER['name'].'/mrs/myreservation');
    }

    public function cancel($reservationid, $roomid) {

        $objDB = new Database;
        
        $delete = "DELETE FROM reservation WHERE id='$reservationid'";
        $objDB->conn()->query($delete);

        $update = "UPDATE rooms SET status=1, checkout=null WHERE id='$roomid'";
        $objDB->conn()->query($update);

        if($_SESSION['type'] == 'admin') {
            header('Location: '.$_SERVER['name'].'/mrs/pending-reservation');
        }
        if($_SESSION['type'] == 'guest') {
            header('Location: '.$_SERVER['name'].'/mrs/myreservation');
        }

    }

    public function checkout($reservationid, $roomid) {

        $objDB = new Database;

        $update = "UPDATE reservation SET status=1 WHERE id='$reservationid' AND roomid='$roomid'";
        $objDB->conn()->query($update);

        header('Location: '.$_SERVER['name'].'/mrs/approved-reservation');

    }

    public function complete($reservationid, $roomid) {

        $objDB = new Database;
        
        $updatereservation = "UPDATE reservation SET status=2 WHERE id='$reservationid'";
        $objDB->conn()->query($updatereservation);

        $updateroom = "UPDATE rooms SET status=1, checkout=null WHERE id='$roomid'";
        $objDB->conn()->query($updateroom);

        header('Location: '.$_SERVER['name'].'/mrs/history');
      
    }

}