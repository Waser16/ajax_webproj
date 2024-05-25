<?php
    session_start();
    include('../utils/connection.php');

    $id = $_POST['staff_id'];
    $name = $_POST['staff_name'];
    $position = $_POST['staff_position'];
    $time = date("Y-m-d H:i");

    $delete_q_text = "DELETE FROM `staff` WHERE `id`='$id'";
    $delete_q = mysqli_query($db, $delete_q_text);

    if ($delete_q) {
        $res = [
            'status_code' => 1,
            'status'=> 'Удаление прошло успешно',
            'staff_id' => $id,
            'staff_name' => $name,
            'staff_position' => $position,
            'delete_time' => $time,
        ];

        echo  json_encode($res);
    }
    else {
        $res = [
            'status_code' => 0,
            'status'=> 'При удалении произошла ошибка',
            'staff_id' => $id,
            'staff_name' => $name,
            'staff_position' => $position,
            'delete_time' => $time,
        ];

        echo  json_encode($res);
    }
?>