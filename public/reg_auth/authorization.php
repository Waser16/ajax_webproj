<?php
    session_start();
    require('../utils/connection.php');
    if ($_SESSION['user']) {
        header("Location: index.php");
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/autherization.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <title>Чемпионат</title>
</head>

<body>

    <!-- ХЕДЕР -->
    <?php
    require('../utils/header.php')
    ?>

    <!-- Основная часть сайта-->
    <div class="main-fluid container-fluid">
        <div class="main-container container">
            <div class="row"> 
                <div class="left-space col-4">
                </div>
                <div class="registration-form-containter col-4">
                    <form class="registration-form" method="POST" action="authorization_check.php">
                        <label>Логин</label><br>
                        <input id="register-input" name='email' type="text" placeholder="example@mail.ru"><br>
                        <label>Пароль</label><br>
                        <input id="register-input" name='password' type="password" placeholder="Ваш пароль"><br>
                        <input id="submit-input" type="submit" value="Войти">
                        <p>
                            Нет аккаунта? <a href="registration.php">Регистрация</a>
                        </p>
                        <?php
                            echo $_SESSION['user'];
                        ?>
                    </form>
                </div>
                <div class="right-space col-4">
                </div>
            </div>
        </div>
    </div>

    <?php
    require('../utils/footer.php')
    ?>


</body>

</html>