<?php
    $db = mysqli_connect("localhost", "root", ""); 
    mysqli_select_db($db, "web_project"); 
    mysqli_set_charset($db, "utf8");
?>