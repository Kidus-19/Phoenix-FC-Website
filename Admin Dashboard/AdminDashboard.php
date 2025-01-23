<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    
    <div class="wrapper">
        <div class="header">
        <nav class="navbar">
        <div class="logo">
          <img src="pics/trylogo.png" alt="">
        </div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
            <li><a href="http://localhost/Football-Club-Website/Home%20Page">HOME</a></li>
            <li><a href="http://localhost/Football-Club-Website/merch/User/userstore.php">SHOP</a>
             <!-- drop down -->
             <!-- <ul>
              <li><a href="">Merch</a></li>
              <li><a href="">Tickets</a></li>
             </ul> -->
            </li>
            <li><a href="http://localhost/Football-Club-Website/news/news.php">NEWS</a></li>
            <li><a href="http://localhost/Football-Club-Website/fixtures/fixtures.php">FIXTURES</a></li>
            <li><a href="http://localhost/Football-Club-Website/team%20members/user/userView.php">TEAM</a></li>
            <li><a href="#">CLUB </a></li>
            <li><a href="http://localhost/Football-Club-Website/Admin%20Dashboard/AdminDashboard.php">Admin</a></li>
            <!-- drop down -->
          </ul>
        </div>
      </nav>

      <?php
      include ("../connect.php");
      $conn = new connect;
      $conn = $conn->getConn();

      
      $sql = "select * from News;";
      $allNews = $conn->query($sql);
      $num_news = mysqli_num_rows($allNews);
      if(empty($num_news)){
        $num_news=0;
      }

  
      $sql2 = "select * from Merch;";
      $allMerchs = $conn->query($sql2);
      $num_merchs = mysqli_num_rows($allMerchs);
      if(empty($num_merchs)){
        $num_merchs=0;
      }

     
      $sql3 = "select * from Fixtures;";
      $allFixtures = $conn->query($sql3);
      $num_fixtures = mysqli_num_rows($allFixtures);
      if(empty($num_fixtures)){
        $num_fixtures=0;
      }

      $sql4 = "select * from Team;";
      $allTeam = $conn->query($sql4);
      $num_team = mysqli_num_rows($allTeam);
      if(empty($num_team)){
        $num_team=0;
      }

      echo '
        <div class="dashboard">
            <div class="item"><a href="http://localhost/Football-Club-Website/team%20members/admin/adminView.php">
              <img src="pics/soccer-player.png" alt=""></a> <a href="http://localhost/Football-Club-Website/team%20members/admin/AdminAdd.php">
              <button class="btn-manage"><img class="plus-img" src="pics/plus.png" alt=""></button></a><p>'.$num_team.'</p></div>
            <div class="item"><a href="http://localhost/Football-Club-Website/fixtures/managefixtures.php">
              <img src="pics/soccer-game.png" alt=""><button class="btn-manage">Fixtures</button></a><p>'.$num_fixtures.'</p></div>
            <div class="item"><a href="http://localhost/Football-Club-Website/merch/Admin/admin.php">
              <img src="pics/shopping-cart.png" alt=""><button class="btn-manage">Merch</button></a><p>'.$num_merchs.'</p></div>
            <div class="item"><a href="http://localhost/Football-Club-Website/news/manageNews.php"><img src="pics/news.png" alt="">
            <button class="btn-manage">News</button></a><p>'.$num_news.'</p></div>
           
        </div>
        <div class="main-section">
           
        </div>
    </div>';
    ?>
</body>
</html>