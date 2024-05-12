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

$post_id = $_POST['post_id'];
$post_title = $_POST['post-title'];
$post_text = $_POST['post-text'];
$important = $_POST['important'];
$author_id = $_POST['author_id'];

$path = "images/" . $_FILES['pic-path']['name'];
move_uploaded_file($_FILES['pic-path']['tmp_name'], $path);
$short_path = substr($path, 0, strlen($path) - 4);

#$insert_post_q_text = "INSERT INTO `posts`(`title`, `post_date`, `image_path`, `post_text`, `author`, `important`)
#     VALUES ('$post_title','2023-12-09','$short_path','$post_text','$author_id','$important')";

$update_post_q_text = "UPDATE posts 
                        SET  title ='{$post_title}', post_date ='2023-12-09',
                        image_path ='$short_path', post_text ='{$post_text}',
                        author ='$author_id',  important='$important' 
                        WHERE id = '{$post_id}'";

$update_post_q = mysqli_query($db, $update_post_q_text);

if ($update_post_q) {
    $image = imagecreatefromjpeg($path);
    $preview_image = imagescale($image, 120, 80);
    $big_image = imagescale($image, 855);
    imagejpeg($preview_image, $short_path . "_rr.jpg");
    imagejpeg($big_image, $short_path . "_big.jpg");
    header("Location: admin.php");
} else {
    echo "Что-то пошло не так";
}
