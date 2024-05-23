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
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/header.css" type="text/css">
    <link rel="stylesheet" href="../../css/championship.css" type="text/css">
    <link rel="stylesheet" href="../../css/footer.css" type="text/css">
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
        <div class="content row">
            <!-- часть с новостями-->
            <div class="content-schedule col-8">
                <h4>Формула 1, сезон 2023: Календарь чемпионата</h4>
                <div class="championship-image">
                    <img src="../../images/f1_logo_big.jpg">
                </div>
                <div class="schedule-table-сontainer">
                    <table class="schedule-table">
                        <thead>
                            <th>Дата</th>
                            <th colspan="2">Гран При</th>
                            <th>Трасса</th>
                            <th>Длина</th>
                            <th>Круги</th>
                            <th>Дистанция</th>
                            <th>Победитель</th>
                            <th>Команда</th>
                        </thead>
                        <tr> 
                            <td>05/03</td>
                            <td><img alt="Гран При Бахрейна" height="16"
                                    src="//cdn.f1ne.ws/userfiles/BAH.gif" title="Гран При Бахрейна" width="26"></td>
                            <td>Бахрейн</td>
                            <td>Сахир</a></td>
                            <td>5412 м</td>
                            <td>57</td>
                            <td>308,238</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>19/03</td>
                            <td><img alt="Гран При Саудовской Аравии" height="16"
                                    src="//cdn.f1ne.ws/userfiles/Flag_of_Saudi_Arabia-2.gif"
                                    title="Гран При Саудовской Аравии" width="26"></td>
                            <td>Cаудовская Аравия</a></td>
                            <td>Джидда</a></td>
                            <td>6174 м</td>
                            <td>50</td>
                            <td>308,450</td>
                            <td>С.Перес</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>02/04</td>
                            <td><img alt="" height="16" src="//cdn.f1ne.ws/userfiles/AUS(1).gif"
                                    title="" width="26"></td>
                            <td>Австралия</a></td>
                            <td>Мельбурн</a></td>
                            <td>5278 м</td>
                            <td>58</td>
                            <td>306,124</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>30/04</td>
                            <td><img alt="Гран При Азербайджана" height="16"
                                    src="//cdn.f1ne.ws/userfiles/AZB(2).gif" title="Гран При Азербайджана"
                                    width="26"></td>
                            <td>Азербайджан</a></td>
                            <td>Баку</a></td>
                            <td>6003 м</td>
                            <td>51</td>
                            <td>306.049</td>
                            <td>С.Перес</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td >07/05</td>
                            <td ><img alt="Гран При США" height="16"
                                    src="//cdn.f1ne.ws/userfiles/USA(1).gif" title="Гран При США" width="26"></td>
                            <td>Майами</a></td>
                            <td>Майами</a></td>
                            <td>5412 м</td>
                            <td>57</td>
                            <td>308,326</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>28/05</td>
                            <td><img alt="Гран При Монако" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/MON.gif" title="Гран При Монако" width="26"></td>
                            <td>Монако</a></td>
                            <td>Монако</a></td>
                            <td>3337 м</td>
                            <td>78</td>
                            <td>260.286</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>04/06</td>
                            <td><img alt="Гран При Испании" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/ESP.gif" title="Гран При Испании" width="26"></td>
                            <td>Испания</a></td>
                            <td>Барселона</a></td>
                            <td>4657 м</td>
                            <td>66</td>
                            <td>307.362</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>18/06</td>
                            <td><img alt="" height="16" src="//cdn.f1ne.ws/userfiles/CAN.gif"
                                    title="" width="26"></td>
                            <td>Канада</a></td>
                            <td>Монреаль</a></td>
                            <td>4361 м</td>
                            <td>70</td>
                            <td>305.270</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>02/07</td>
                            <td><img alt="Гран При Австрии" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/ATR.gif" title="Гран При Австрии" width="26"></td>
                            <td>Австрия</a></td>
                            <td>Шпильберг</a></td>
                            <td>4318 м</td>
                            <td>71</td>
                            <td>306.452</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>09/07</td>
                            <td><img alt="Гран При Великобритании" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/GBR.gif" title="Гран При Великобритании"
                                    width="26"></td>
                            <td>Великобритания</a></td>
                            <td>Сильверстоун</a></td>
                            <td>5891 м</td>
                            <td>52</td>
                            <td>306.198</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>23/07</td>
                            <td><img alt="Гран При Венгрии" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/HUN(1).gif" title="Гран При Венгрии" width="26">
                            </td>
                            <td>Венгрия</a></td>
                            <td>Хунгароринг</a></td>
                            <td>4381 м</td>
                            <td>70</td>
                            <td>306.630</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>30/07</td>
                            <td><img alt="Гран При Бельгии" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/BEL.gif" title="Гран При Бельгии" width="26"></td>
                            <td>Бельгия</a></td>
                            <td>Спа</a></td>
                            <td>7004 м</td>
                            <td>44</td>
                            <td>308.052</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>27/08</td>
                            <td><img alt="" height="16" src="//cdn.f1ne.ws/userfiles/NDL.gif"
                                    title="" width="26"></td>
                            <td>Нидерланды</a></td>
                            <td>Зандфорт</a></td>
                            <td>4259 м</td>
                            <td>72</td>
                            <td>306.587</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>03/09</td>
                            <td><img alt="Гран При Италии" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/ITA.gif" title="Гран При Италии" width="26"></td>
                            <td>Италия</a></td>
                            <td>Монца</a></td>
                            <td>5793 м</td>
                            <td>51</td>
                            <td>295.134</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>17/09</td>
                            <td><img alt="" height="16" src="//cdn.f1ne.ws/userfiles/SGP.gif"
                                    title="" width="26"></td>
                            <td>Сингапур</a></td>
                            <td>Марина-Бэй</a></td>
                            <td>4940 м</td>
                            <td>62</td>
                            <td>306,143</td>
                            <td>К.Сайнс</td>
                            <td>Ferrari</td>
                        </tr>
                        <tr>
                            <td>24/09</td>
                            <td><img alt="" height="16" src="//cdn.f1ne.ws/userfiles/JPN.gif"
                                    title="" width="26"></td>
                            <td>Япония</a></td>
                            <td>Сузука</a></td>
                            <td>5807 м</td>
                            <td>53</td>
                            <td>307.471</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>&nbsp;08/10</td>
                            <td><img alt="Флаг Катара" height="16"
                                    src="//cdn.f1ne.ws/userfiles/qatar.png" title="Флаг Катара" width="26"></td>
                            <td>Катар</a></td>
                            <td>Лосаил</a></td>
                            <td>5419 м</td>
                            <td>57</td>
                            <td>308.611</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>22/10</td>
                            <td><img alt="Гран При США" height="16"
                                    src="//cdn.f1ne.ws/userfiles/USA(1).gif" title="Гран При США" width="26"></td>
                            <td>США</td>
                            <td>Остин</td>
                            <td>5513 м</td>
                            <td>56</td>
                            <td>308.405</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>&nbsp;29/10</td>
                            <td><img alt="Гран При Мексики" height="16"
                                    src="//cdn.f1ne.ws/userfiles/MEX(2).gif" title="Гран При Мексики" width="26">
                            </td>
                            <td><a>Мехико</a></td>
                            <td><a>Мехико</a></td>
                            <td>4304 м</td>
                            <td>71</td>
                            <td>305.354</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>&nbsp;05/11</td>
                            <td><img alt="Гран При Бразилии" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/BRA.gif" title="Гран При Бразилии" width="26"></td>
                            <td><a>Сан-Паулу</a></td>
                            <td><a">Сан-Паулу</a></td>
                            <td>4309 м</td>
                            <td>71</td>
                            <td>305.879</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>18/11</td>
                            <td><img alt="Гран При США" height="16"
                                    src="//cdn.f1ne.ws/userfiles/USA(1).gif" title="Гран При США" width="26"></td>
                            <td>Лас-Вегас</a></td>
                            <td>Лас-Вегас</a></td>
                            <td>6201 м</td>
                            <td>0</td>
                            <td>310.050</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                        <tr>
                            <td>&nbsp;26/11</td>
                            <td><img alt="Гран При Абу-Даби" border="0" height="16"
                                    src="//cdn.f1ne.ws/userfiles/UAE.gif" title="Гран При Абу-Даби" width="26"></td>
                            <td><a href="/Championship/2023/abudhabi/race.shtml">Абу-Даби</a></td>
                            <td>Яс-Марина</td>
                            <td>5281 м</td>
                            <td>58</td>
                            <td>306.183</td>
                            <td>М.Ферстаппен</td>
                            <td>Red Bull</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- часть с важными новостями-->
            <div class="content-important col-4">
                <h4>Важные новости</h4>
                <?php
                require('../utils/connection.php');
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
    require('../utils/  footer.php')
    ?>


</body>

</html>