<?php
    session_start();
    #unset($_SESSION['user']);
    require('../utils/connection.php');
    #echo print_r($_SESSION['user']);

    $post_id = $_GET['post_id'];
    $q_text = "SELECT * FROM posts WHERE id = '{$post_id}'";
    $q = mysqli_query($db, $q_text);
    
    $mas = mysqli_fetch_array($q);

    $post_id = $mas['id'];
    $post_title = $mas['title'];
    $post_date = $mas['post_date'];
    $image_path = $mas['image_path'];
    $post_text = $mas['post_text'];
    $author_id = $mas['author'];
    $important = $mas['important'];

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
        <link rel="stylesheet" href="../../css/admin_update.css" type="text/css">
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
                <div class="create col-8">
                    <h4>Добавление статьи</h4>
                    <form method="POST" action="admin_update_check.php" enctype="multipart/form-data">
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Название:</p>
                            </div>
                            <div class='input-part col-10'>
                                <textarea name="post-title" class="post-title-input"><?php echo $post_title;?></textarea>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Картинка:</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="file" name="pic-path">
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Статья важная?</p>
                            </div>
                            <div class='input-part col-10'>
                                <input type="radio" class='post-input-radio' name='important' <?php if ($important == '1') echo "checked";?> value='1'>Да   
                                <input type="radio" class="post-input-radio" name='important' <?php if ($important == '0') echo "checked";?> value='0'>Нет
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class='left-part col-2'>
                                <p>Текст:</p>
                            </div>
                            <div class='input-part col-10'>
                                <textarea class='post-text-input' name="post-text"><?php echo $post_text;?></textarea>
                            </div>
                        </div>
                        <div class='field-name row'>
                            <div class="left-part col-2"></div>
                            <div class="input-part col-10">
                                <input type="hidden" name="author_id" value="<?php echo $_SESSION['user']['id'];?>">
                                <input type="hidden" name="post_id" value='<?php echo $post_id;?>'>
                                <input class="post-submit" type="submit" value="Изменить статью">
                            </div>
                        </div>
                    </form>
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
                </div>
            </div>
        </div>
    </div>
    
    <?php
        require('../utils/footer.php');
    ?>


</body>

</html>