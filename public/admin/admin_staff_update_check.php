<?php
session_start();
require('../utils/connection.php');
/*
echo "<pre>";
echo print_r($_POST);
echo "</pre>";
echo "<br>";
*/
/*
echo "<pre>";
echo print_r($_FILES);
echo "</pre>";
*/

$id = $_POST['staff-id'];
$last_name = $_POST['last-name'];
$first_name = $_POST['first-name'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$position = $_POST['position'];


$update_staff_q_text = "UPDATE `staff` 
                        SET `last_name` ='$last_name',
                        `first_name`='$first_name', `login` ='$login',
                        `password` = '$password', `email` ='$email',
                        `position` ='$position' 
                        WHERE `id`='$id'";

$update_staff_q = mysqli_query($db, $update_staff_q_text);

if ($update_staff_q) {
    $time = date("Y-m-d H:i");
    $res = [
      'status_code'=> 1,
      'status'=> 'Обновление данных сотрудника прошло успешно',
      'last_name'=> $last_name,
      'first_name'=> $first_name,
      'login'=> $login,
      'password'=> $password,
      'email'=> $email,
      'position'=> $position,
        'update_time'=> $time
    ];
    echo json_encode($res);
} else {
    $time = date("Y-m-d H:i");
    $res = [
        'status_code'=> 0,
        'status'=> 'При обновлении данных сотрудника произошла ошибка',
        'last_name'=> $last_name,
        'first_name'=> $first_name,
        'login'=> $login,
        'password'=> $password,
        'email'=> $email,
        'position'=> $position,
        'update_time'=> $time
    ];
    echo json_encode($res);
}

?>
