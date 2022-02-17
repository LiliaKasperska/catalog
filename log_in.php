<!--- вхід в акаунт --->
<?php 
    session_start();
    if (!empty($_SESSION['user'])) {
        header('Location: profile_user.php');
    }
?>

<html>
    <head>
        <title></title>
        <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,500,400,600' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/strock-icon.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body background="images/bg1.png">
        <div style="height: 150px;"> <?php require_once("header.php");?></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h2 class="text-center" style="color: #ffffff;">Вхід</h2>
                <div style="height: 25px;"></div>
                <form method="POST" action="log_in.php">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <h3 style="color: #ffffff;">Логін: <input type="text" name="login" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>
                            <h3 style="color: #ffffff;">Пароль: <input type="password" name="pass" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3><br>
                            <input type="submit" name="log_in" value="Увійти" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 20px;"><br><br>
                            <h4><a style="color: #ffffff;" href="registration.php">Немає акаунту? Зареєструйтесь</a></h4>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['log_in'])){
                        $login=$_POST['login'];
                        $sql="SELECT id, login, password, name, phone, site, favourites FROM user WHERE login='$login'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                        if(!empty($result['password']) and $result['password']==$_POST['pass']){
                            $_SESSION['user'] = ['id' => $result['id'], 'login' => $result['login']];
                        } else {
                            echo '<h3 style="color: #ffffff;" align="center">Помилка входу!</h3>';
                        }
                    }
                    
                ?>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </body>
</html>