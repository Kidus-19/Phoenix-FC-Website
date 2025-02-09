<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Phoenix Football Club</title>
    <link rel="stylesheet" href="background_styles.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="logo">
            <img src="pics/trylogo.png" alt="">
        </div>
        <a href="#" class="toggle-button navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="http://localhost/Football-Club-Website/Home%20Page">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/Football-Club-Website/merch/User/userstore.php">SHOP</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/Football-Club-Website/news/news.php">NEWS</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/Football-Club-Website/fixtures/fixtures.php">FIXTURES</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/Football-Club-Website/team%20members/user/userView.php">TEAM</a></li>
                <li class="nav-item"><a class="nav-link" href="#">CLUB</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/Football-Club-Website/merch/Login/login.html">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-center">
        <h1 class="flaming-text">Phoenix Football Club</h1>
        <p class="flaming-text">Home of the Flames</p>
    </section>

    <!-- News Section -->
    <div class="news-section-wrapper">
        <div class="news-section">
            <h2>Latest News→</h2>
            <?php
            include ("../connect.php");
            $conn = new connect;
            $conn = $conn->getConn();
            $sql = "SELECT * FROM news ORDER BY Date DESC LIMIT 3;";
            $allNews = $conn->query($sql);
            $num = 1;

            while ($other = $allNews->fetch_assoc()) {
                echo ' 
                <div class="news news-'.$num.'">
                    <img src="../news/'.$other['PicLocation'].'" alt="News '.$num++.'">
                    <h3>'.$other['Title'].'</h3>
                    <p>'.$other['Description'].'.</p>
                    <a href="../news/news.php?id='.$other['id'].'" class="btn btn-primary">Read More</a>
                </div>';
            }
            ?>
        </div>
    </div>

    <!-- Fixture Section -->
    <section class="fix">
        <h2>Fixtures</h2>
        <div class="fixtures">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM fixtures ORDER BY date LIMIT 2");
            $latest = $result->fetch_assoc();
            $latest2 = $result->fetch_assoc();

            echo 
            '<div class="team">
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
            '<div class="team">
                <img class="firstTeam-pic" src="img/'.$latest2['Name'].'.png" alt="Team 3 Logo">
                <span class="vs">vs</span>
                <img class="secondTeam-pic" src="pics/trylogo.png" alt="Team 4 Logo">
                <div class="info">
                    <h3>'.$latest2['DATE'].'</h3>
                    <p>'.$latest2['Name'].' vs The Phoenix</p>
                    <a href="../fixtures/buyTickets.php?id='.$latest2['id'].'" class="team-tik">Ticket info</a>
                </div>
            </div>';
            ?>
            <a href="../fixtures/fixtures.php"><button class="btn btn-secondary">See More</button></a>
        </div>
    </section>

    <!-- Player Slider -->
    <div class="parent-slider-container">
        <div class="slider-container">
            <div class="slider">
                <div class="slide">
                    <div class="player">
                        <img src="pics/MenPlayers/10 Daniel Podence.png" alt="Player 1" class="img-fluid">
                        <div class="player-info">
                            <h2>Most Goals</h2>
                            <h3>Daniel Podence</h3>
                            <p>Scored <span class="stat">30</span> goals in the season</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="player">
                        <img src="pics/MenPlayers/12 Matheus Cunha.png" alt="Player 2" class="img-fluid">
                        <div class="player-info">
                            <h2>Most Assists</h2>
                            <h3>Matheus Cunha</h3>
                            <p>Assisted <span class="stat">15</span> goals in the season</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="player">
                        <img src="pics/MenPlayers/15Craig Dawson.png" alt="Player 3" class="img-fluid">
                        <div class="player-info">
                            <h2>Most Goals and Assists</h2>
                            <h3>Craig Dawson</h3>
                            <p>Scored <span class="stat">20</span> goals and provided <span class="stat">15</span> assists in the season</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="http://localhost/Football-Club-Website/team%20members/user/userView.php"><button class="btn btn-primary">All Players</button></a>
    </div>

    <!-- Store Section -->
    <section class="store-section">
        <h2 class="store-heading">Official Store</h2>
        <div class="store-carousel">
            <?php
            $result = mysqli_query($conn,"SELECT * FROM merch LIMIT 3");
            while ($item = $result->fetch_assoc()) {
                echo 
                '<div class="store-item">
                    <img src="../merch/User/Pictures/'.$item['PicLocation'].'" alt="Merchandise">
                    <h3 class="store-item-title">'.$item['name'].'</h3>
                    <p class="store-item-desc">'.$item['Price'].'</p>
                </div>';
            }
            ?>
            <button class="prev-button">&#10094;</button>
            <button class="next-button">&#10095;</button>
        </div>
        <a class="store-button-link" href="../merch/User/userstore.php"><button class="store-button btn btn-success">Shop Now</button></a>
    </section>

    <!-- Footer Section -->
    <section class="footer">
        <h2>Sponsorship</h2>
        <div class="wrapper">
            <div class="main-sponsors">
                <a class="img1" href="https://astropay.com">
                    <img class="img1" alt="" src="pics/AstroPay.jpg">
                </a>
                <a class="img2" href="https://www.castore.com">
                    <img class="img2" alt="" src="pics/logo.svg">
                </a>
                <a class="img3" href="https://tradenation.com">
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
                <a class="img8" href="https://www.footballco.com">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/script.js" defer></script>
    <script src="js/slider.js"></script>
</body>
</html>
