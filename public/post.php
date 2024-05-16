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
    <link rel="stylesheet" href="../css/header.css" type="text/css">
    <link rel="stylesheet" href="../css/post.css" type="text/css">
    <link rel="stylesheet" href="../css/footer.css" type="text/css">
    <title>Post</title>
</head>

<body>

    <!-- ХЕДЕР -->
    <?php
    require('header.php')
    ?>

    <!-- Основная часть сайта-->
    <div class="main-fluid container-fluid">
        <div class="main-container container">
            <div class="content row">
                <!-- часть с новостями-->
                <div class="content-post col-8">
                <?php
                    require('connection.php');
                    $post_id = $_GET['post_id'];
                    $post_q_text = "SELECT * 
                                FROM posts p
                                    JOIN staff s on p.author = s.id
                                WHERE p.id = '{$post_id}'";
                    $post_q = mysqli_query($db, $post_q_text);
                    $mas = mysqli_fetch_array($post_q);
                    #$vd = var_dump($mas);
                    #echo "<pre> . {$vd} . </pre>";
                    printf("<h4>%s</h4>
                    <p> %s %s | %s</p>
                    <div class='post row'>
                        <div class='post-image img-fluid'>
                            <img src='%s_big.jpg'>
                        </div>
                        <div class='post-text'>
                            %s
                        </div>
                    </div>
                ", $mas['title'], $mas['first_name'], $mas['last_name'], $mas['post_date'], 
                        '../'.$mas['image_path'], $mas['post_text']);
                ?>
                </div>
                <!-- часть с ВАЖНЫМИ новостями-->
                <div class="content-important col-4">
                    <h4>Важные новости</h4>
                    <?php
                        require('connection.php');
                        $important_posts_q_text = "SELECT * 
                                                    FROM posts p
                                                    WHERE important = 1
                                                    ORDER BY post_date DESC 
                                                    LIMIT 3";
                        $important_posts_q = mysqli_query($db, $important_posts_q_text);
                        while ($mas = mysqli_fetch_array($important_posts_q)) {
                            printf(
                                "<div class='important row'>
                                        <a href='post.php?post_id=%s'>
                                            %s
                                        </a>
                                </div>    
                                ", $mas['id'], $mas['title']);
                            }
                    ?>
            </div>
        </div>
    </div>

    <?php
    require('footer.php')
    ?>

</body>

</html>