<?php
    session_start();
    include('../utils/connection.php');

    $post_id = $_POST['post_id'];
    $delete_q_text = "DELETE FROM posts WHERE id ='{$post_id}'";
    $delete_q_text = mysqli_query($db, $delete_q_text);

    $post_title = $_POST['post_title'];

    if ($delete_q_text) {
        $current_time = date("d.m.Y H:i");
        $res = [
            "status_code" => 1,
            "status" => "Удаление прошло успешно",
            "post_title" => $post_title,
            "delete_time" => $current_time
        ];
        echo json_encode($res);
    }
    else {
        $current_time = date("Y-m-d H:i");
        $res = [
            "status_code" => 0,
            "status" => "Произошла ошибка при удалении статьи",
            "post_title" => $post_title,
            "delete_time" => $current_time
        ];
        echo json_encode($res);
    }
?>