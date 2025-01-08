<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="background_styles.css">
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" type="text/css" href="css/index.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="css/slider.css">
      <title>The Phoenix Football Club</title>
    </head>
    <body>
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
            <li><a href="http://localhost/Football-Club-Website/merch/Login/login.html">Login</a></li>
            <!-- drop down -->
          </ul>
        </div>
      </nav>



      <!-- Hero Section -->
      <section class="hero">
        <h1 class="flaming-text">Phoenix Football Club</h1>
        <p class="flaming-text">Home of the Flames</p>
      </section>

      <!-- News Section -->
      <div class="news-section-wrapper">
      <div class="news-section">

      <section class="news-section">
      <h2>Latest News→</h2>
      <?php
      // echo "swdecsfg";
      include ("../connect.php");
      $conn = new connect;
      $conn = $conn->getConn();
      $sql = "select * from news order by Date desc LIMIT 3; ";
      $allNews = $conn->query($sql);
      $num=1;
      // print_r($allNews);
      while($other = $allNews->fetch_assoc()){
      echo ' 
      <div class="news news-'.$num.'">
        <img src="../news/'.$other['PicLocation'].'" alt="News '.$num++.'">
        <h3>'.$other['Title'].'</h3>
        <p>'.$other['Description'].'.</p>
        <a href="../news/news.php?id='.$other['id'].'" class="btn-readMore">Read More</a>
      </div>';
      }
      ?>
              <!-- <div class="news news-1">
                <img src="pics/celebrate.jpg" alt="News 1">
                <h3>News 1</h3>
                <p>WOW🤌 our stadium is really beautiful..</p>
                <a href="#" class="btn-readMore">Read More</a>
              </div>
              <div class="news news-2">
                <img src="pics/youngsters.jpg" alt="News 2">
                <h3>News 2</h3>
                <p>Player x has Scored Hattrick on his debut</p>
                <a href="#" class="btn-readMore">Read More</a>
              </div>
              <div class="news news-3">
                <img src="pics/product4.jpg" alt="News 3">
                <h3>News 3</h3>
                <p>Our rising stars...</p>
                <a href="#" class="btn-readMore">Read More</a>
              </div> -->
            </section>
            </div>
          </div>
  

  <!-- fixture section -->
  <section class="fix">
    <h2>Fixtures</h2>
    <div class="fixtures">
    <?php
                 $result = mysqli_query($conn,"Select * from fixtures order by date LIMIT 2");
                 $latest = $result->fetch_assoc();
                 $latest2 = $result->fetch_assoc();
               
                //  print_r($latest);

                 echo 
                 ' <div class="team">
                 <img class="firstTeam-pic" src="pics/trylogo.png" alt="Team 1 Logo">
                 <span class="vs">vs</span>
                 <img class="secondTeam-pic" src="img/'.$latest['Name'].'.png" alt="Team 2 Logo">
                 <div class="info">
                   <h3>'.$latest['DATE'].'</h3>
                   <p>The Phoenix vs '.$latest['Name'].'</p>
                   <a href="../fixtures/buyTickets.php?id='.$latest['id'].'" class="team-tik">Ticket info</a>
                 </div>
                 </div>';
                 echo 
                 '   <div class="team">
                 <img class="firstTeam-pic " src="img/'.$latest2['Name'].'.png" alt="Team 3 Logo">
                 <span class="vs">vs</span>
                 <img class="secondTeam-pic " src="pics/trylogo.png" alt="Team 4 Logo">
                 <div class="info">
                   <h3>'.$latest2['DATE'].'</h3>
                   <p>'.$latest2['Name'].' vs The Phoenix</p>
                   <a href="../fixtures/buyTickets.php?id='.$latest2['id'].'" class="team-tik">Ticket info</a>
                 </div>
               </div>
               '
                ?>
               <a href="../fixtures/fixtures.php"><button class="see-moreFixtures">See More</button></a>
               </div>
             </section>
     
     
   
  

  <!-- Player slider -->
  <div class="parent-slider-container">
  <div class="slider-container">
    
    <div class="slider">
      <div class="slide">
        <div class="player">
          <img src="pics/MenPlayers/10 Daniel Podence.png" alt="Player 1">
          <div class="player-info">
            <h2>Most Goals</h2>
            <h3>Daniel Podence</h3>
            <p>Scored <span class="stat">30</span> goals in the season</p>
          </div>
        </div>
      </div>
      <div class="slide">
        <div class="player">
          <img src="pics/MenPlayers/12 Matheus Cunha.png" alt="Player 1">
          <div class="player-info">
            <h2>Most Assists</h2>
            <h3>Matheus Cunha</h3>
            <p>Assisted <span class="stat">15</span> goals in the season</p>
          </div>
        </div>
      </div>
      <div class="slide">
        <div class="player">
          <img src="pics/MenPlayers/15Craig Dawson.png" alt="Player 3">
          <div class="player-info">
            <h2>Most Goals and Assists</h2>
            <h3>Craig Dawson</h3>
            <p>Scored <span class="stat">20</span> goals and provided <span class="stat">15</span> assists in the season</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="http://localhost/Football-Club-Website/team%20members/user/userView.php"><button>All Players</button></a>
  </div>

<!-- Store section -->
<section class="store-section">
    <h2 class="store-heading">Official Store</h2>
    <div class="store-carousel">
<?php
                 $result = mysqli_query($conn,"Select * from merch LIMIT 3");
                 $item1 = $result->fetch_assoc();
                 echo 
                 '<div class="store-item active">
                 <img src="../merch/User/Pictures/'.$item1['PicLocation'].'" alt="Merchandise 1">
                 <h3 class="store-item-title">'.$item1['name'].'</h3>
                 <p class="store-item-desc">'.$item1['Price'].'</p>
               </div>';
               $item2 = $result->fetch_assoc();
               
               echo 
               '<div class="store-item">
                 <img src="../merch/User/Pictures/'.$item2['PicLocation'].'" alt="Merchandise 2">
                 <h3 class="store-item-title">'.$item2['name'].'</h3>
                 <p class="store-item-desc">'.$item2['Price'].'</p>
               </div>';
               $item3 = $result->fetch_assoc();
               echo 
               '<div class="store-item">
                 <img src="../merch/User/Pictures/'.$item3['PicLocation'].'" alt="Merchandise 2">
                 <h3 class="store-item-title">'.$item3['name'].'</h3>
                 <p class="store-item-desc">'.$item3['Price'].'</p>
               </div>';

?>
      <!-- <div class="store-item active">
        <img src="pics/shirt.png" alt="Merchandise 1">
        <h3 class="store-item-title">Shirt</h3>
        <p class="store-item-desc">900 EtB</p>
      </div>
      <div class="store-item">
        <img src="pics/hoodie.png" alt="Merchandise 2">
        <h3 class="store-item-title">Hoodie</h3>
        <p class="store-item-desc">800 EtB</p>
      </div>
      <div class="store-item">
        <img src="pics/boot.png" alt="Merchandise 3">
        <h3 class="store-item-title">Boots</h3>
        <p class="store-item-desc">1000 EtB</p>
      </div> -->


      <button class="prev-button">&#10094;</button>
      <button class="next-button">&#10095;</button>
    </div>
    <?php
    echo
    ' <a class = "store-button-link" href="../merch/User/userstore.php"><button class="store-button">Shop Now</button></a>';
     ?>
    
  </section>
  
  <section class="footer">
    <h2>Sponsorship</h2>
  <div class="wrapper">
    <div class="main-sponsors">
        <a  class="img1" href="https://astropay.com">
            <img class="img1" alt="" src="pics/AstroPay.jpg">
        </a>
        <a  class="img2" href="https://www.castore.com">
            <img class="img2" alt="" src="pics/logo.svg">
        </a>
        <a  class="img3" href="https://tradenation.com">
            <img class="img3" alt="" src="pics/TradeNation.gif">
        </a>
    </div>
    <div class="secondary-sponsors">
        <a class="img4" href="https://arcticwolf.com/uk/">
            <img class="img4" alt="" src="pics/arcticWolf.webp">
        </a>
        <a class="img5" href="https://asphaltlegends.com/">
            <img class="img5" alt="" src="pics/a9-logo.png">
        </a>
        <a class="img6" href="https://www.royalcaribbean.com">
            <img class="img6" alt="" src="pics/royalcaribbean.webp">
        </a>
        <a class="img7" href="https://www.12bet.uk">
            <img class="img7" alt="" src="pics/12bet.webp">
        </a>
        <a class="img8" href="https://asphaltlegends.com/">
            <img class="img8" alt="" src="pics/a9-logo.png">
        </a>
      
        <a class="img9" href="https://www.footballco.com">
            <img class="img9" alt="" src="pics/footbaleco.png">
        </a>
    </div>
    
        <div class="social-links">
            <div class="button">
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
            </div>
            <span>Facebook</span>
            </div>
            <div class="button">
            <div class="icon">
                <i class="fab fa-twitter"></i>
            </div>
            <span>Twitter</span>
            </div>
            <div class="button">
            <div class="icon">
                <i class="fab fa-instagram"></i>
            </div>
            <span>Instagram</span>
            </div>
            <div class="button">
            <div class="icon">
                <i class="fab fa-youtube"></i>
            </div>
            <span>YouTube</span>
            </div>
        </div>
  
</div>
</section>
      <script src="js/index.js"></script>
      <script src="js/script.js" defer></script>
      <script src="js/slider.js"></script>
    </body>
  </html>


    </body>
</html>