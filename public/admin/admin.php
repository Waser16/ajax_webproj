<?php
    session_start();
    require('../utils/connection.php');
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
        <link rel="stylesheet" href="../../css/admin.css" type="text/css">
        <link rel="stylesheet" href="../../css/footer.css" type="text/css">
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
                <div class="content-post col-8">
                    <h4>Панель для администрации</h4>
                    <?php
                        // require('connection.php');

                        if ($_SESSION['user']['position'] == 'админ') {
                            $posts_q_text = "SELECT p.image_path, p.id, p.title,
                                                    p.post_date, s.first_name,
                                                    s.last_name 
                                            FROM posts p
                                                    JOIN staff s on p.author = s.id 
                                            ORDER BY post_date DESC
                                        ";    
                        }
                        else {
                            $posts_q_text = "SELECT p.image_path, p.id, p.title,
                                                p.post_date, s.first_name,
                                                s.last_name 
                                        FROM posts p
                                                JOIN staff s on p.author = s.id 
                                        WHERE p.author = '{$_SESSION['user']['id']}' 
                                        ORDER BY post_date DESC 
                                        ";    
                        }
                        $posts_q = mysqli_query($db, $posts_q_text);

                        while ($mas = mysqli_fetch_array($posts_q)) {
                            printf("<div class='post row'>
                                <div class='post-image col-2'>
                                    <img class='mx-auto d-block' src='../../images/%s_rr.jpg'}'>
                                </div>
                                <div class='post-text col-10'>
                                    <h5>
                                        <a href='../main/post.php?post_id=%s'>
                                            %s
                                        </a>
                                    </h5>
                                    <p>%s | <a href='admin_update.php?post_id=%s'>Изменить</a> | <a href='admin_delete.php?post_id=%s'>Удалить</a></p>
                                </div>
                            </div>
                        ", $mas['image_path'], $mas['id'], $mas['title'], $mas['post_date'], $mas['id'], $mas['id']);
                        }

                    ?>
                </div>
                <!-- профиль автора-->
                <div class="content-important col-4">
                    <h4>Профиль</h4>
                    <?php
                        //require('connection.php');
                        $author_profile_q_text = "SELECT COUNT(*) AS cnt,
                                                    MAX(post_date) as latest_post,
                                                    s.last_name, s.first_name
                                                    FROM posts p
                                                        JOIN staff s on p.author = s.id
                                                    WHERE author = '{$_SESSION['user']['id']}'
                                                    ";
                        $author_profile_q = mysqli_query($db, $author_profile_q_text);
                        $mas = mysqli_fetch_array($author_profile_q);
                        if ($_SESSION['user']['position'] != 'админ') {
                            printf(
                                "<div class='important row'>
                                    <p>
                                        %s %s <br>
                                        Статей: %s <br>
                                        Дата последней статьи: %s <br>
                                        <a href='admin_create2.php'><b>Добавить статью</b></a>
                                    </p>
                                </div>    
                                ", $mas['last_name'], $mas['first_name'], $mas['cnt'], $mas['latest_post']);
                        }
                        else {
                            printf(
                                "<div class='important row'>
                                    <p>
                                        %s %s <br>
                                        Статей: %s <br>
                                        Дата последней статьи: %s <br>
                                        <a href='admin_create2.php'><b>Добавить статью</b></a><br>
                                        <a href='admin_staff.php'><b>Аккаунты сотрудников</b></a><br>
                                    </p>
                                </div>    
                                ", $mas['last_name'], $mas['first_name'], $mas['cnt'], $mas['latest_post']);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        require('../utils/footer.php');
    ?>

</body>

</html>