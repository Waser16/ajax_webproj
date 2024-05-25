<?php
session_start();
require('../utils/connection.php');

$last_name = $_POST["last_name"];
$first_name = $_POST["first_name"];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$position = $_POST['position'];

//$time = date("Y-m-d H:i");
//$res = [
//    'status_code' => 1,
//    'status' => 'Добавление прошло успешно',
//    'last_name' => $last_name,
//    'first_name' => $first_name,
//    'login' => $login,
//    'email' => $email,
//    'add_time' => $time,
//];
//echo json_encode($res);



$insert_staff_q_text = "INSERT INTO `staff` (`last_name`, `first_name`, `login`, `password`, `email`, `position`)
                        VALUES ('$last_name','$first_name','$login','$password',
                        '$email','$position')";

$insert_staff_q = mysqli_query($db, $insert_staff_q_text);

if ($insert_staff_q) {
    $time = date("Y-m-d H:i");
    $res = [
        'status_code' => 1,
        'status' => 'Добавление прошло успешно',
        'last_name' => $last_name,
        'first_name' => $first_name,
        'login' => $login,
        'email' => $email,
        'position' => $position,
        'add_time' => $time,
    ];
    echo json_encode($res);
}
else {
    $time = date("Y-m-d H:i");
    $res = [
        'status_code' => 0,
        'status' => 'При добавлении произошла ошибка',
        'last_name' => $last_name,
        'first_name' => $first_name,
        'login' => $login,
        'email' => $email,
        'position' => $position,
        'add_time' => $time,
    ];
    echo json_encode($res);
}



?>
