<!--- акаунт адміна, зміна категорій--->
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
                <form method="POST" action="categories_admin.php">
                    <h2 style="color: #ffffff;">Категорія</h2>
                    <hr style="border-color: #282828;" align="left" width="50%">
                    <h4><input type="text" name="new_c" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;">
                    <input type="submit" name="add_c" value="Додати" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 20px;"></h4>
                    <hr style="border-color: #282828;" align="left" width="30%">
                    <?php 
                        $sql="SELECT * FROM category";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            echo '<h4 style="color: #ffffff;">'.$result['name'].'</h4><hr style="border-color: #282828;" align="left" width="30%">';
                        }
                    ?>
                    <div style="height: 50px;"></div>
                    <h2 style="color: #ffffff;">Підкатегорія</h2>
                    <hr style="border-color: #282828;" align="left" width="50%">
                    <h4><input type="text" name="new_s" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;">
                    <input type="submit" name="add_s" value="Додати" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 20px;"></h4>
                    <hr style="border-color: #282828;" align="left" width="30%">
                    <?php 
                        $sql="SELECT * FROM subcategory";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            echo '<h4 style="color: #ffffff;">'.$result['name'].'</h4><hr style="border-color: #282828;" align="left" width="30%">';
                        }
                    ?>
                </form>
                <?php 
                    if(isset($_POST['add_c'])){
                        $name_c=$_POST['new_c'];
                        $sql4="INSERT INTO category (name) VALUES ('$name_c')";
                        $res4=mysqli_query($connect,$sql4);
                    }
                    if(isset($_POST['add_s'])){
                        $name_s=$_POST['new_s'];
                        $sql4="INSERT INTO subcategory (name) VALUES ('$name_s')";
                        $res4=mysqli_query($connect,$sql4);
                    }
                ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>