<?php
    session_start();
    include('../utils/connection.php');

    $post_id = $_GET['post_id'];
    $delete_q_text = "DELETE FROM posts WHERE id ='{$post_id}'";
    $delete_q_text = mysqli_query($db, $delete_q_text);
    
    if ($delete_q_text) {
        header("Location: admin.php");
    }
    else {
        echo "Произошла ошибка";
    }
?>