<pre>
    <?php
        session_start();
        require('../utils/connection.php');
        #print_r($_POST);

        $last_name = $_POST['last-name'];
        $first_name = $_POST['first-name'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_check = $_POST['password-check'];

        if ($password == $password_check) {
            $q_text = "INSERT INTO  users ( last_name, first_name, login, email, password) 
                       VALUES ('{$last_name}', '{$first_name}','{$login}','{$email}','{$password}')";
            echo $q_text;
            $q_ins = mysqli_query($db, $q_text);
            echo $q_ins;
            if ($q_ins) {
                $_SESSION['error_msg'] = "Регистрация прошла успешно";
                header("Location: authorization.php");
            }
        }
        else {
            $_SESSION['error_msg'] = "Пароли не совпадают";
            header("Location: registration.php");
        }
    ?>
</pre>