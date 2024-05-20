<?php
    session_start();
    include('../utils/connection.php');

    $id = $_GET['id'];
    $delete_q_text = "DELETE FROM staff WHERE id='$id'";
    $delete_q = mysqli_query($db, $delete_q_text);
    
    if ($delete_q) {
        header("Location: admin_staff.php");
    }
    else {
        echo "Произошла ошибка";
    }
?>