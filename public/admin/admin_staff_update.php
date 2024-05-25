<?php
    session_start();
    #unset($_SESSION['user']);
    require('../utils/connection.php');
    #echo print_r($_SESSION['user']);

    $id = $_GET['id'];
    $q_text = "SELECT * FROM staff WHERE id = '{$id}'";
    $q = mysqli_query($db, $q_text);
    
    $mas = mysqli_fetch_array($q);

    $last_name = $mas['last_name'];
    $first_name = $mas['first_name'];
    $login = $mas['login'];
    $password = $mas['password'];
    $email = $mas['email'];
    $position = $mas['position'];

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
        <link rel="stylesheet" href="../../css/admin_staff_update.css" type="text/css">
        <link rel="stylesheet" href="../../css/footer.css" type="text/css">
    <script type="text/javascript" src="../ajax/jq.js"></script>
    <script type="text/javascript" src="../ajax/admin_staff_update.js"></script>
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
                    <h4>Изменение данных сотрудника</h4>
                    <form>
                        <input type="hidden" name="staff-id" value="<?php echo $id ?>">
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Фамилия:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input name="last-name" type="text" value='<?php echo $last_name?>'></input>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Имя:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="first-name" value='<?php echo $first_name?>'>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Логин:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="login" value='<?php echo $login?>'>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Пароль:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="password" value='<?php echo $password?>'>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Email:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="email" value='<?php echo $email?>'>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Должность:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="text" name="position" value='<?php echo $position?>'>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class="left-part col-2"></div>
                            <div class="input-part col-10">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input class="post-submit" type="button" value="Обновить данные сотрудника">
                            </div>
                        </div>
                    </form>

                    <!-- СРАВНЕНИЕ ДАННЫХ АЯКС -->
                    <div class="ajax-hidden-div col-12">
                        <!-- ФАМИЛИИ -->
                        <div class="old-last-name old row">
                            <div class="left-part col-2">
                                <p>Старая фамилия:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <div class="new-last-name new row">
                            <div class="left-part col-2">
                                <p>Новая фамилия:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>

                        <!-- ИМЯ -->
                        <div class="old-first-name old row">
                            <div class="left-part col-2">
                                <p>Старое имя:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <div class="new-first-name new row">
                            <div class="left-part col-2">
                                <p>Новое имя:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <!-- ЛОГИН -->
                        <div class="old-login old row">
                            <div class="left-part col-2">
                                <p>Старый логин:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <div class="new-login new row">
                            <div class="left-part col-2">
                                <p>Новый логин:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <!-- ПАРОЛЬ -->
                        <div class="old-password old row">
                            <div class="left-part col-2">
                                <p>Старый пароль:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <div class="new-password new row">
                            <div class="left-part col-2">
                                <p>Новый пароль</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <!-- ИМЕЙЛ -->
                        <div class="old-email old row">
                            <div class="left-part col-2">
                                <p>Старое имя:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <div class="new-email new row">
                            <div class="left-part col-2">
                                <p>Новый Email:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <!-- ДОЛЖНОСТЬ -->
                        <div class="old-position old row">
                            <div class="left-part col-2">
                                <p>Старая должность:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>
                        <div class="new-position new row">
                            <div class="left-part col-2">
                                <p>Новая должность:</p>
                            </div>
                            <div class="input-part col-10">

                            </div>
                        </div>

                        <a href="admin_staff.php">
                            <button class="post-submit">Назад в админ-панель сотрудников</button>
                        </a>
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
                        $mas = mysqli_fetch_array($author_profile_q);
                        if ($_SESSION['user']['position'] != 'админ') {
                            printf(
                                "<div class='important row'>
                                    <p>
                                        %s %s <br>
                                        Статей: %s <br>
                                        Дата последней статьи: %s <br>
                                        <a href='admin_create.php'><b>Добавить статью</b></a>
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
                                    </p>
                                </div>    
                                ", $mas['last_name'], $mas['first_name'], $mas['cnt'], $mas['latest_post']);
                        }
                    ?>
                    <div class='important row' id="ajax-status">

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