<!--- продукт --->
<?php 
    session_start();
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
                <div class="row">
                    <?php 
                        $id=$_GET['q'];
                        $sql="SELECT product.name AS name, product.discription AS description, product.characteristic AS characteristic, category.name AS category, subcategory.name AS subcategory, product.price AS price, product.exclusive AS exclusive, product.main_photo AS main_photo, product.photos AS photos, user.name AS user, user.phone AS phone, user.site AS site FROM product INNER JOIN category ON product.id_category = category.id  INNER JOIN subcategory ON product.id_subcategory = subcategory.id INNER JOIN user ON product.id_user = user.id WHERE product.id='$id'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                    ?>
                    <div class="col-sm-5">
                        <img src="<?php echo $result['main_photo']; ?>" width="100%" style="border-radius: 40px;">
                    </div>
                    <div class="col-sm-7">
                        <h2 style="color: #ffffff;"><?php echo $result['name']; ?></h2><br>
                        <h4 style="color: #ffffff;">Категорія - <?php echo $result['category']; ?></h4>
                        <h4 style="color: #ffffff;">Підкатегорія - <?php echo $result['subcategory']; ?></h4>
                        <h4 style="color: #ffffff;">Характеристика - <?php echo $result['characteristic']; ?></h4>
                        <h4 style="color: #ffffff;">Автор - <?php echo $result['user']; ?>, <?php echo $result['phone']; ?><?php if(!empty($result['site'])){echo ', <a href="'.$result["site"].' ">'.$result["site"].'</a>';} ?></h4>
                    </div>                    
                </div><br>
                <form method="GET" action="product.php">
                    <input type="submit" name="f" value="Вподобати" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 17px;"><br><br>
                    <input type="hidden" name="q" value="<?php echo $id; ?>">
                </form>
                <?php 
                if(isset($_GET['f'])){
                    $i=$_GET['q'];
                    if (!empty($_SESSION['user']) && $_SESSION['user']['login']!='admin') {
                        $id_user=$_SESSION['user']['id'];
                        $sq="SELECT favourites FROM user WHERE id='$id_user'";
                        $res=mysqli_query($connect,$sq);
                        $resul=mysqli_fetch_array($res);
                        $f=$resul['favourites'];
                        $ar=0;
                        for($j=0;$j<strlen($f);$j++){
                            if($f[$j]!="*" and $f[$j]==$id){
                                $ar=1;
                            }
                        }
                        if($ar==0){
                            $f=$f.$id."*";
                            $sql="UPDATE user SET favourites='$f' WHERE id='$id_user'";
                            $res=mysqli_query($connect,$sql);
                        }                       
                    }
                }
                ?> 
                <div style="color: #ffffff;">
                    <h3>Опис</h3>
                    <h4><?php echo $result['description']; ?></h4><br><br>
                    <?php
                        $ar_img=array();
                        $a=$result['photos'];
                        $q="";
                        for($i=0;$i<strlen($a);$i++){
                            if($a[$i]=="*"){
                                $ar_img[]=$q;
                                $q="";
                            } else {
                                $q=$q.$a[$i];
                            }
                        }
                        for($i=0;$i<count($ar_img);$i++){
                            $a=$ar_img[$i];
                            echo "<img src='$a' height='400px'><br><br>";
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>