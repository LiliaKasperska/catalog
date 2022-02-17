<!--- зворотній зв'язок на сайті --->
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
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h2 class="text-center" style="color: #FFFFFF;">Залиште тут повідомлення для адміністратора сайту та очікуйте відповідь на електрону пошту</h2>
                <div style="height: 50px;"></div>
                <form method="POST" action="help.php">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <h3 style="color: #FFFFFF;;">E-mail: <input type="text" size="30" name="email" style="border: 1px solid #FFFFFF; border-radius: 20px; background-color: #282828; color: white;"></h3>
                            <h3 style="color: #FFFFFF;;">Текст: <textarea name="text" style="border: 1px solid #FFFFFF; border-radius: 20px; background-color: #282828; color: white;" rows="5" cols="50"></textarea></h3><br>
                            <input type="submit" name="send" value="Надіслати" style="border: 1px solid #FFFFFF; border-radius: 20px; background-color: #e0e0e0; font-size: 20px;">
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['send'])){
                        $email=$_POST['email'];
                        $text=$_POST['text'];
                        $sql="INSERT INTO message (email, text) VALUES ('$email', '$text')";
                        $res=mysqli_query($connect,$sql);
                    }
                ?>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </body>
</html>