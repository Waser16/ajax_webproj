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

$post_id = intval($_POST['post_id']);
$post_title = $_POST['post-title'];
$post_text = $_POST['post-text'];
$important = intval($_POST['important']);
$author_id = intval($_POST['author_id']);
$date = date("Y-m-d");

$path = '../../images/' . $_FILES['pic-path']['name'];
$pic_name = $_FILES['pic-path']['name'];
$pic_name = substr($pic_name, 0, strlen($pic_name) - 4);
move_uploaded_file($_FILES['pic-path']['tmp_name'], $path);
$short_path = substr($path, 0, strlen($path) - 4);

$update_post_q_text = "UPDATE `posts`
                        SET  `title`='$post_title', `post_date`='$date',
                        `image_path`='$short_path', `post_text`='$post_text',
                        `author`='$author_id',  `important`='$important' 
                        WHERE `id`='$post_id'";

$update_post_q = mysqli_query($db, $update_post_q_text);

if ($update_post_q) {
    $image = imagecreatefromjpeg($path);
    $preview_image = imagescale($image, 120, 80);
    $big_image = imagescale($image, 855);
    imagejpeg($preview_image, $short_path . "_rr.jpg");
    imagejpeg($big_image, $short_path . "_big.jpg");
//    header("Location: admin.php");

    $upd_time = date("Y-m-d H:i");
    $res = [
        'status_code'=> 1,
        'status'=> 'Обновление статьи прошло успешно',
        'post_title'=> $post_title,
        'upd_time'=> $upd_time
    ];
    echo json_encode($res);
} else {
    $upd_time = date("Y-m-d H:i");
    $res = [
        'status_code'=> 0,
        'status'=> 'При обновлении статьи произошла ошибка',
        'post_title'=> $post_title,
        'upd_time'=> $upd_time
    ];
    echo json_encode($res);
}
