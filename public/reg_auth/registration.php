<?php
    session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/header.css" type="text/css">
    <link rel="stylesheet" href="../../css/registration.css" type="text/css">
    <link rel="stylesheet" href="../../css/footer.css" type="text/css">
    <title>Регистрация</title>
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
                    <form class="registration-form" method="POST" action="registration_check.php">
                        <label>Фамилия</label><br>
                        <input id="register-input" name='last-name' type="text  " placeholder="Иванов" required><br>
                        <label>Имя</label><br>
                        <input id="register-input" name='first-name' type="text" placeholder="Иван" required><br>
                        <label>Логин</label><br>
                        <input id="register-input" name='login' type="text" placeholder="Никнейм" required><br>
                        <label>Электронная почта</label><br>
                        <input id="register-input" name='email' type="text" placeholder="example@mail.ru" required><br>
                        <label>Пароль</label><br>
                        <input id="register-input" name='password' type="password" placeholder="Введите пароль" required><br>
                        <label>Подтверждение пароля</label><br>
                        <input id="register-input" name='password-check' type="password" placeholder="Подтвердите пароль" required><br>
                        <input id="submit-input" type="submit" value="Зарегистрироваться">
                        <?php 
                            if ($_SESSION['error_msg']) {
                                echo "<p id='error-msg-p'>" . $_SESSION['error_msg'] . "</p>";
                            }
                            unset($_SESSION["error_msg"]);
                        ?>
                    </form>
                </div>
                <div class="right-space col-4">
                </div>
            </div>
        </div>
    </div>

    <?php
        require('../utils/footer.php');
    ?>

</body>

</html>