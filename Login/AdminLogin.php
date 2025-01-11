<?php
    $username = "Admin";
    $pwd = "0";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/AdminLogin.css">
    
</head>
<body>
    <div class="wrapper">
        <img src="../img/Phoenix.png" alt="">
        <h1>Login to Phoenix F.C.</h1>
        <form action="" method="post">
            <label for="usrname">Username</label>
            <input type="text" name="usrname">
            <label for="pwd">Password</label>
            <input type="password" name="pwd" id="pwd">
            <div class="btns">
                <input type="reset" value="clear">
                <input type="submit" value="sign in" name="signin">
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST['signin'])){
        if(($_POST['usrname']==$username)&&($_POST['pwd']==$pwd)){
            echo "<script>alert('welcome back!')</script>";
            header('Location: '.'http://localhost/Football-Club-Website/Admin%20Dashboard/AdminDashboard.php');
        }
        else{
            echo "<script>alert('Wrong password or username!')</script>";
        }
    }
    ?>
</body>
</html>