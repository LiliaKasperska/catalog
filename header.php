<?php
    require_once("connect_db.php");
?>
<html>
    <head>
    <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,500,400,600' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/strock-icon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <header class="row header navbar-static-top" id="main_navbar">
            <div class="container">
                <div class="row m0 social-info">
                    <ul class="social-icon">
                    </ul>
                </div>
            </div>
           <div class="logo_part">
                <div class="logo">
                    <h1><a href="index.php" class="brand_logo" style="color: white;">
                        <img src="images/pngwing.com.png" alt="logo image" width="23%">
                        ANIMAL WORLD
                    </a></h1>x
                </div>
            </div>
            <div class="main-menu" >
                <div style="height: 40px;"></div>
                <nav class="navbar navbar-default">
                    <div class="menu row m0" style="background-color: #383838; opacity: 70%;">                
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;">Головна</a>
                                </li>
                                <li class="dropdown">
                                    <a href="catalog.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;">Каталог</a>
                                </li>
                                <li class="dropdown">
                                    <a href="exclusive.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;">Ексклюзив</a>
                                </li>
                                 <li class="dropdown">
                                    <a href="help.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;">Допомога</a>
                                </li>
                                <li class="dropdown">
                                    <a <?php if(empty($_SESSION['user'])){ echo 'href="log_in.php"';} else if(!empty($_SESSION['user']) and $_SESSION['user']['login']!='admin'){echo 'href="profile_user.php"';} ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;">Профіль</a>
                                    <?php 
                                        if(!empty($_SESSION['user']) and $_SESSION['user']['login']=='admin'){ 
                                            echo '<ul class="dropdown-menu" style="background-color: #383838; opacity: 70%;"><li><a href="categories_admin.php" style="color: white;">Категорії</a></li><li><a href="message_admin.php" style="color: white;">Повідомлення</a></li></ul> ';
                                        } else if(!empty($_SESSION['user']) and $_SESSION['user']['login']!='admin') {
                                            echo '<ul class="dropdown-menu" style="background-color: #383838; opacity: 70%;"><li><a href="favorites.php" style="color: white;">Вподобання</a></li><li><a href="my_product.php" style="color: white;">Мої вироби</a></li><li><a href="settings_user.php" style="color: white;">Налаштування</a></li></ul>';
                                        } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </body>
</html>