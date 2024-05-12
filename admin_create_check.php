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

$post_title = $_POST["post-title"];
$post_text = $_POST["post-text"];
$important = $_POST['important'];
$author_id = $_POST['author_id'];
$date = date("Y-m-d");

$path = "images/" . $_FILES['pic-path']['name'];
move_uploaded_file($_FILES['pic-path']['tmp_name'], $path);
$short_path = substr($path, 0, strlen($path) - 4);

$insert_post_q_text = "INSERT INTO `posts`(`title`, `post_date`, `image_path`, `post_text`, `author`, `important`)
     VALUES ('$post_title','$date','$short_path','$post_text','$author_id','$important')";

$insert_post_q = mysqli_query($db, $insert_post_q_text);

if ($insert_post_q) {
    $image = imagecreatefromjpeg($path);
    $preview_image = imagescale($image, 120, 80);
    $big_image = imagescale($image, 855);
    imagejpeg($preview_image, $short_path . "_rr.jpg");
    imagejpeg($big_image, $short_path . "_big.jpg");
    header("Location: admin.php");
}
else {
    echo "Что-то пошло не так";
}



?>
