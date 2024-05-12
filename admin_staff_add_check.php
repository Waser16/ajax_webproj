<?php
session_start();
require('connection.php');

echo "<pre>";
echo print_r($_POST);
echo "</pre>";
echo "<br>";

/*
echo "<pre>";
echo print_r($_FILES);
echo "</pre>";
*/

$last_name = $_POST["last-name"];
$first_name = $_POST["first-name"];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$position = $_POST['position'];


$insert_staff_q_text = "INSERT INTO staff (last_name, first_name, login, password, email, position) 
                        VALUES ('$last_name','$first_name','$login','$password',
                        '$email','$position')";

$insert_staff_q = mysqli_query($db, $insert_staff_q_text);

if ($insert_staff_q) {
    header("Location: admin_staff.php");
}
else {
    echo "Что-то пошло не так";
}



?>
