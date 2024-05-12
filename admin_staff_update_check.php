<?php
session_start();
require('connection.php');
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

$id = $_POST['id'];
$post_id = $_POST['post_id'];
$last_name = $_POST['last-name'];
$first_name = $_POST['first-name'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$position = $_POST['position'];


$update_staff_q_text = "UPDATE staff 
                        SET last_name ='$last_name',
                        first_name='$first_name', login ='$login',
                        password = '$password', email ='$email',
                        position ='$position' 
                        WHERE id='$id'";

$update_staff_q = mysqli_query($db, $update_staff_q_text);

if ($update_staff_q) {
    header("Location: admin_staff.php");
} else {
    echo "Что-то пошло не так";
}

?>
