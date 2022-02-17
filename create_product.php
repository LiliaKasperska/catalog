<!--- продукт --->
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
            <div class="col-sm-4"></div>
            <div class="col-sm-6">
                <form method="POST" action="create_product.php" enctype="multipart/form-data">
                <h4><select name="productList" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #282828; color: white;"> 
                    <option value="zero" selected>-</option>
                    <option value="create" <?php if(!empty($_POST['productList']) && $_POST['productList']=="create"){echo "selected";} ?>>Створити новий</option>
                    <?php 
                        $id=$_SESSION['user']['id'];
                        $sql="SELECT id, name FROM product WHERE id_user='$id'";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            $i=$result['id'];
                            echo '<option value="'.$i.'" ';
                            if(!empty($_POST['productList']) and $_POST['productList']=="$i"){
                                echo "selected";
                            }
                            echo '>'.$result['name'].'</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="select" value="Вибрати" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 20px;"></h4>
            </div>
            <div class="col-sm-2"></div>
        </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    <?php 
                        if(isset($_POST['select'])){
                            $result=[];
                            if($_POST['productList']!="create" and $_POST['productList']!="zero"){
                                $id_p=$_POST['productList'];
                                $sql="SELECT * FROM product WHERE id='$id_p'";
                                $res=mysqli_query($connect,$sql);
                                $result_main=mysqli_fetch_array($res);
                            }
                        }
                    ?>
                    <hr style="border-color: #282828;" align="left" width="50%">
                    <h3 style="color: #ffffff;">Назва: <input type="text" name="name" value="<?php if(!empty($result_main)){echo $result_main['name'];} ?>" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>
                    <h3 style="color: #ffffff;">Опис: <textarea name="discription" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"><?php if(!empty($result_main)){echo $result_main['discription'];} ?></textarea></h3>
					<h3 style="color: #ffffff;">Характеристика: <textarea  name="characteristic" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"><?php if(!empty($result_main)){echo $result_main['characteristic'];} ?></textarea></h3>
                    <h3 style="color: #ffffff;">Категорія:
                        <select name="c_list" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"> 
                            <?php 
                                $sql="SELECT * FROM category";
                                $res=mysqli_query($connect,$sql);
                                while($result=mysqli_fetch_array($res)){
                                    echo '<option value="'.$result['id'].'"';
                                    if(!empty($result_main) and $result['id']==$result_main['id_category']){
                                        echo " selected";
                                    }
                                    echo '>'.$result['name'].'</option>';
                                }
                            ?>
                        </select>
                    </h3> 
                    <h3 style="color: #ffffff;">Підкатегорія:
                        <select name="s_list" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"> 
                            <?php 
                                $sql="SELECT * FROM subcategory";
                                $res=mysqli_query($connect,$sql);
                                while($result=mysqli_fetch_array($res)){
                                    echo '<option value="'.$result['id'].'"';
                                    if(!empty($result_main) and $result['id']==$result_main['id_subcategory']){
                                        echo " selected";
                                    }
                                    echo '>'.$result['name'].'</option>';
                                }
                            ?>
                        </select>
                    </h3>
                    <h3 style="color: #ffffff;">Ціна: <input type="text" name="price" value="<?php if(!empty($result_main)){echo $result_main['price'];} ?>"  style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>                   
                    <h3 style="color: #ffffff;">Ексклюзив:
                        <select name="e_list" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"> 
                            <option value="0" selected>Ні<option>
                            <option value="1" selected>Так<option>
                        </select>
                    </h3>
                    <?php 
                        if(!empty($_POST['productList']) && $_POST['productList']!="create"){
                            echo '<input type="submit" name="save1" value="Зберегти" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 20px;"><br><br>';
                        }
                    ?>
                    <h3 style="color: #ffffff;">Фото (головне): <input type="file" name="foto" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>
                    <h3 style="color: #ffffff;">Фотографії: <input type="file" name="fotos[]" multiple="true" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3><br>
                    <input type="submit" name="save2" value="Зберегти" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 20px;"><br><br>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
        <?php 
            if($_POST['productList']=="create"){
                if(isset($_POST['save2'])){
                    $name=$_POST['name'];
                    $description=$_POST['discription'];
					$characteristic=$_POST['characteristic'];
                    $c_list=$_POST['c_list'];
                    $price=$_POST['price'];
                    $s_list=$_POST['s_list'];
                    $e_list=$_POST['e_list'];
                    $id_u=$_SESSION['user']['id'];
                    $file = "images/".$_FILES['foto']['name'];
                    $file1 = "images/".$_FILES['foto']['name'];
                    move_uploaded_file($_FILES['foto']['tmp_name'], $file);
                    $img="";
                    for($i=0;$i<count($_FILES['fotos']['name']);$i++){
                        $file0 = "images/".$_FILES['fotos']['name'][$i];
                        $file01 = "images/".$_FILES['fotos']['name'][$i];
                        move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $file0);
                        $img=$img.$file01."*";
                    }
                    $sql="INSERT INTO product (name, price, discription, characteristic, main_photo, photos, id_category, id_subcategory, id_user, exclusive) VALUES ('$name', '$price', '$description', '$characteristic', '$file1', '$img', '$c_list', '$s_list', '$id_u', '$e_list') ";
                    $res=mysqli_query($connect,$sql);
                }
            } else {
                if(isset($_POST['save1'])){
                    $name=$_POST['name'];
                    $description=$_POST['description'];
					$characteristic=$_POST['characteristic'];
                    $c_list=$_POST['c_list'];
                    $price=$_POST['price'];
                    $s_list=$_POST['s_list'];
					$e_list=$_POST['e_list'];
                    $id=$_POST['productList'];
                    $sql="UPDATE product SET name='$name', price='$price', description='$description', characteristic='$characteristic', id_category='$c_list', id_subcategory='$s_list', exclusive='$e_list' WHERE id='$id'";
                    $res=mysqli_query($connect,$sql);
                }
                if(isset($_POST['save2'])){
                    $id=$_POST['productList'];
                    $file = "images/".$_FILES['foto']['name'];
                    $file1 = "images/".$_FILES['foto']['name'];
                    move_uploaded_file($_FILES['foto']['tmp_name'], $file);
                    $img="";
                    for($i=0;$i<count($_FILES['fotos']['name']);$i++){
                        $file0 = "images/".$_FILES['fotos']['name'][$i];
                        $file01 = "images/".$_FILES['fotos']['name'][$i];
                        move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $file0);
                        $img=$img.$file01."*";
                    }
                    $sql="UPDATE product SET main_photo='$file1', photos='$img' WHERE id='$id' ";
                    $res=mysqli_query($connect,$sql);
                }
            }
        ?>
    </body>
</html>