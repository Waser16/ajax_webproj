<?php
    session_start();
    #unset($_SESSION['user']);
    require('../utils/connection.php');
    #echo print_r($_SESSION['user']);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/header.css" type="text/css">
        <link rel="stylesheet" href="../../css/admin_staff.css" type="text/css">
        <link rel="stylesheet" href="../../css/footer.css" type="text/css">
    <script type="text/javascript" src="../ajax/jq.js"></script>
    <script type="text/javascript" src="../ajax/admin_staff_delete.js"></script>
    <title>Main</title>
</head>

<body>

    <!-- ХЕДЕР -->
    <?php
    require('../utils/header.php')
    ?>

    <!-- Основная часть сайта-->
    <div class="main-fluid container-fluid">
        <div class="main-container container">
            <div class="content row">
                <!-- часть с новостями-->
                <div class="content-staff col-8">
                    <h4>Панель для администрации</h4>
                    <?php
                        // require('connection.php');
                        $staff_q_text = "SELECT * FROM `staff`";
                        $staff_q = mysqli_query($db, $staff_q_text);
                        while ($mas = mysqli_fetch_array($staff_q)) {
                            printf(
                                    "<div class='staff row'>
                                        <div class='staff-data col-4'>
                                            <p>
                                                <span class='staff-name'>%s %s</span><br>
                                                <span class='staff-position'>%s</span>
                                            </p> 
                                        </div>
                                        <div class='staff-data col-4'>
                                            <p>
                                                %s<br>
                                                %s
                                            </p>
                                        </div>
                                        <div class='staff-action col-2'>
                                            <p>
                                                <br><a href='admin_staff_update.php?id=%s'>Изменить</a>
                                            </p>
                                        </div>
                                        <div class='staff-action col-2'>
                                                <br><a class='link-delete' data-id='%s'>Удалить </a>
                                        </div>
                                    </div>    
                                    ", $mas['last_name'], $mas['first_name'], $mas['position'], $mas['login'], 
                                    $mas['email'], $mas['id'], $mas['id']
                            );
                        }
                    ?>
                </div>
                <div class="content-important col-4">
                    <h4>Профиль</h4>
                    <?php
                        // require('connection.php');
                        $author_profile_q_text = "SELECT COUNT(*) AS cnt,
                                                    MAX(post_date) as latest_post,
                                                    s.last_name, s.first_name
                                                    FROM posts p
                                                        JOIN staff s on p.author = s.id
                                                    WHERE author = '{$_SESSION['user']['id']}'
                                                    ";
                        $author_profile_q = mysqli_query($db, $author_profile_q_text);
                        $mas = mysqli_fetch_array($author_profile_q);
                        printf(
                            "<div class='important row'>
                                <p>
                                    %s %s <br>
                                    Статей: %s <br>
                                    Дата последней статьи: %s <br>
                                    <a href='admin_staff_add.php'><b>Добавить сотрудника</b></a>
                                </p>
                            </div>    
                            ", $mas['last_name'], $mas['first_name'], $mas['cnt'], $mas['latest_post']
                        );
                    ?>
                    <div class="important row" id="ajax-status"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('../utils/footer.php')
    ?>

</body>

</html>