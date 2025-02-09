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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/AdminLogin.css">
</head>
<body class="bg-light">
    <div class="wrapper container mt-5">
        <div class="card p-4 shadow-sm">
            <img src="../img/Phoenix.png" alt="Phoenix Logo" class="img-fluid mb-3" style="max-width: 150px;">
            <h1 class="text-center">Login to Phoenix F.C.</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="usrname">Username</label>
                    <input type="text" name="usrname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" name="pwd" id="pwd" class="form-control" required>
                </div>
                <div class="btns text-center">
                    <input type="reset" value="Clear" class="btn btn-secondary">
                    <input type="submit" value="Sign In" name="signin" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['signin'])){
        if(($_POST['usrname'] == $username) && ($_POST['pwd'] == $pwd)){
            echo "<script>alert('Welcome back!')</script>";
            header('Location: http://localhost/Football-Club-Website/Admin%20Dashboard/AdminDashboard.php');
            exit();
        } else {
            echo "<script>alert('Wrong password or username!')</script>";
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
