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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/teams.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Чемпионат</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

    <!-- ХЕДЕР -->
    <?php
    require('header.php')
    ?>

    <!-- Основная часть сайта-->
    <div class="main-fluid container-fluid">
        <div class="main-container container">
            <div class="content row">
                <!-- часть с командами-->
                <div class="team-container col-8">
                    <h4>Формула 1, сезон 2023: Составы команд</h4>
                    <div class="championship-image img-fluid">
                        <img src="../images/championship_2_rr.jpg">
                    </div>
                    <div class="team row">
                        <p>ORACLE RED BULL RACING</p>
                        <div class="driver col-6">
                            <p>Макс Ферстаппен</p>
                            <img src="../images/maxverstappen.png">
                        </div>
                        <div class="driver col-6">
                            <p>Серхио Перес</p>
                            <img src="../images/sergioperez.png">
                        </div>
                    </div>
                    <div class="team row">
                        <p>SCUDERIA FERRARI</p>
                        <div class="driver col-6">
                            <p>Шарль Леклер</p>
                            <img src="../images/charlesleclerc.png">
                        </div>
                        <div class="driver col-6">
                            <p>Карлос Саинц </p>
                            <img src="../images/carlossainz.png">
                        </div>
                    </div>
                    <div class="team row">
                        <p>MERCEDES-AMG PETRONAS FORMULA ONE TEAM</p>
                        <div class="driver col-6">
                            <p>Льюис Хэмильтон</p>
                            <img src="../images/lewishamilton.png">
                        </div>
                        <div class="driver col-6">
                            <p>Джордж Расселл</p>
                            <img src="../images/georgerussell.png">
                        </div>
                    </div>
                    <div class="team row">
                        <p>ALPINE F1 TEAM</p>
                        <div class="driver col-6">
                            <p>Пьер Гасли</p>
                            <img src="../images/pierregasly.png">
                        </div>
                        <div class="driver col-6">
                            <p>Эстебан Окон</p>
                            <img src="../images/estebanocon.png">
                        </div>
                    </div>
                    <div class="team row">
                        <p>MCLAREN FORMULA 1 TEAM</p>
                        <div class="driver col-6">
                            <p>Ландо Норрис</p>
                            <img src="../images/landonorris.png">
                        </div>
                        <div class="driver col-6">
                            <p>Оскар Пиастри</p>
                            <img src="../images/oscarpiastri.webp">
                        </div>
                    </div>
                    <div class="team row">
                        <p>ALFA ROMEO F1 TEAM STAKE</p>
                        <div class="driver col-6">
                            <p>Вальттери Боттас</p>
                            <img src="../images/valterribottas.png">
                        </div>
                        <div class="driver col-6">
                            <p>Чжоу Гуаньюй</p>
                            <img src="../images/zhouguanyu.png">
                        </div>
                    </div>
                    <div class="team row">
                        <p>HAAS F1 TEAM</p>
                        <div class="driver col-6">
                            <p>Кевин Магнуссен</p>
                            <img src="../images/kevinmagnussen.png">
                        </div>
                        <div class="driver col-6">
                            <p>Нико Хюлкенберг</p>
                            <img src="../images/nicohulkenberg.png">
                        </div>
                    </div>
                    <div class="team row">
                        <p>ASTON MARTIN ARAMCO COGNIZANT F1 TEAM</p>
                        <div class="driver col-6">
                            <p>Лэнс Стролл</p>
                            <img src="../images/lancestroll.png">
                        </div>
                        <div class="driver col-6">
                            <p>Фернандо Алонсо</p>
                            <img src="../images/fernandoalonso.png">
                        </div>
                    </div>
                    <div class="team row">
                        <p>SCUDERIA ALPHATAURI</p>
                        <div class="driver col-6">
                            <p>Юки Цунода</p>
                            <img src="../images/yukitsunoda.png">
                        </div>
                        <div class="driver col-6">
                            <p>Даниэль Риккьярдо</p>
                            <img src="../images/danielricciardo.png">
                        </div>
                    </div>
                    <div class="team row">
                        <p>WILLIAMS RACING</p>
                        <div class="driver col-6">
                            <p>Алекс Албон</p>
                            <img src="../images/alexanderalbon.png">
                        </div>
                        <div class="driver col-6">
                            <p>Логан Сарджент</p>
                            <img src="../images/logansargeant.webp">
                        </div>
                    </div>
                </div>
            
                <!-- часть с важными новостями-->
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
    </div>

    <?php
    require('footer.php')
    ?>

</body>

</html>