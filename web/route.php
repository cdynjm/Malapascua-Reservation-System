<?php 

include($_SERVER['DOCUMENT_ROOT'].'/mrs/backend/server-auth.php');
include($_SERVER['DOCUMENT_ROOT'].'/mrs/backend/server-room.php');
include($_SERVER['DOCUMENT_ROOT'].'/mrs/backend/server-transaction.php');

if(isset($_POST['signup'])) {
    $obj = new Auth;
    $obj->register($_POST['name'], $_POST['username'], $_POST['password'], 'guest');
}
if(isset($_POST['login'])) {
    $obj = new Auth;
    $obj->login($_POST['username'], $_POST['password']);
}
if(isset($_POST['addroom'])) {
    $obj = new Room;
    $obj->add($_POST['room'], $_POST['description'], $_POST['price'], $_POST['maxguest']);
}
if(isset($_POST['editroom'])) {
    $obj = new Room;
    $obj->edit($_POST['room'], $_POST['description'], $_POST['price'], $_POST['maxguest'], $_POST['oldpicture'], $_POST['roomid']);
}
if(isset($_POST['deleteroom'])) {
    $obj = new Room;
    $obj->delete($_POST['roomid']);
}
if(isset($_POST['confirm'])) {
    $obj = new Transaction;
    $obj->add($_POST['name'], $_POST['address'], $_POST['contactnumber'], $_POST['checkin'], $_POST['checkout'], $_POST['roomid']);
}
if(isset($_POST['checkoutroom'])) {
    $obj = new Transaction;
    $obj->checkout($_POST['reservationid'], $_POST['roomid']);
}
if(isset($_POST['cancel'])) {
    $obj = new Transaction;
    $obj->cancel($_POST['reservationid'], $_POST['roomid']);
}
if(isset($_POST['complete'])) {
    $obj = new Transaction;
    $obj->complete($_POST['reservationid'], $_POST['roomid']);
}

?>