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
    <link rel="stylesheet" href="../../css/admin_staff_add.css" type="text/css">
    <link rel="stylesheet" href="../../css/footer.css" type="text/css">
    <script type="text/javascript" src="../ajax/jq.js"></script>
    <script type="text/javascript" src="../ajax/admin_staff_add.js"></script>
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
                <div class="create col-8">
                    <h4>Добавление сотрудника</h4>
                    <form>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Фамилия:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input name="last-name" type="text" required></input>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Имя:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="first-name" required>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Логин:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="login" required>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Пароль:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="password" required>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Email:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="email" required>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Должность:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="position" required>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class="left-part col-2"></div>
                            <div class="input-part col-10">
                                <input type="button" value="Добавить сотрудника">
                            </div>
                        </div>
                    </form>
                    <div class="hidden-div-ajax col-8" >
                        <a href="admin_staff.php"><button class="post-submit">Назад в админ-панель</button></a>
                    </div>
                </div>
                <!-- профиль автора-->
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
                        while ($mas = mysqli_fetch_array($author_profile_q)) {
                            printf(
                                "<div class='important row'>
                                    <p>
                                        %s %s <br>
                                        Статей: %s <br>
                                        Дата последней статьи: %s <br>
                                    </p>
                                </div>    
                                ", $mas['last_name'], $mas['first_name'], $mas['cnt'], $mas['latest_post']);
                            }
                    ?>
                    <div class="important row" id="ajax-status">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        require('../utils/footer.php');
    ?>


</body>

</html>