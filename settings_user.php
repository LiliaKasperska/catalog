<!--- налаштування акаунту користувача --->
<?php 
    session_start();
    if (empty($_SESSION['user'])) {
        header('Location: index.php');
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
        <div style="height: 270px;"> <?php require_once("header.php");?></div>
        <div class="row">
        <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <?php 
                    $id=$_SESSION['user']['id'];
                    $sql="SELECT * FROM user WHERE id='$id'";
                    $res=mysqli_query($connect,$sql);
                    $result=mysqli_fetch_array($res);
                ?>
                <form method="POST" action="settings_user.php">
                    <h3 style="color: #ffffff;">Ім'я: <input type="text" name="name" value="<?php echo $result['name']; ?>" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>
                    <h3 style="color: #ffffff;">Телефон: <input type="text" name="phone" value="<?php echo $result['phone']; ?>" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>
                    <h3 style="color: #ffffff;">Сайт: <input type="text" name="site" value="<?php echo $result['site']; ?>" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3> 
                    <input type="submit" name="save" value="Зберегти" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 20px;">
                </form>
                <?php 
                    if(isset($_POST['save'])){
                        $n=$_POST['name'];
                        $p=$_POST['phone'];
                        $s=$_POST['site'];
                        //$a=$_POST['address'];,address='$a'
                        $sql="UPDATE user SET name='$n', phone='$p', site='$s'  WHERE id='$id'";
                        $res=mysqli_query($connect,$sql);
                    }
                ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>