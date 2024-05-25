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

$post_title = $_POST["post-title"];
$post_text = $_POST["post-text"];
$post_len = strlen($post_text);
$important = $_POST['important'];
//$author_id = $_POST['author_id'];
$author_id = $_SESSION['user']['id'];
$add_datetime = date("d.m.Y H:i");

//// оффсет для того, чтобы были разные даты статей
//$current_date = date('Y-m-d');
//$random_date_offset = rand(0, 100);
//$date = date("Y-m-d", strtotime(`$current_date - $random_date_offset days`));
$date = date("Y-m-d");

$path = '../../images/'.$_FILES['pic-path']['name']; // ../../images/example.jpg
$pic_name = $_FILES['pic-path']['name']; // example.jpg
$pic_name = substr($pic_name, 0, strlen($pic_name)-4); // example
move_uploaded_file($_FILES['pic-path']['tmp_name'], $path);
$short_path = substr($path, 0, strlen($path) - 4); // ../../images/example

$insert_post_q_text = "INSERT INTO `posts`(`title`, `post_date`, `image_path`, `post_text`, `author`, `important`)
     VALUES ('$post_title','$date','$pic_name','$post_text','$author_id','$important')";

$insert_post_q = mysqli_query($db, $insert_post_q_text);

if ($insert_post_q) {
    $image = imagecreatefromjpeg($path);
    $preview_image = imagescale($image, 120, 80);
    $big_image = imagescale($image, 855);
//    imagejpeg($preview_image, '../../images/'.substr($pic_name, 0, strlen($pic_name) - 4) . "_rr.jpg");
    imagejpeg($preview_image, $short_path. "_rr.jpg");
    imagejpeg($big_image, $short_path . "_big.jpg");
    //header("Location: admin.php");

    $post_len = strlen($post_text);
    $res = [
        'status_code'=> 1,
        'status' => 'Статья успешно добавлена',
        'post_title' => $post_title,
        'add_datetime' => $add_datetime,
        'post_len' => $post_len
    ];
    echo json_encode($res);
}
else {
    $res = [
        'status_code'=> 0,
        'status' => 'Произошла ошибка при добавлении',
        'post_title' => $post_title,
        'add_datetime' => $add_datetime,
    ];
    echo json_encode($res);
}



?>
