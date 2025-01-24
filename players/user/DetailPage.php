<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="store.css"> <!-- Link to store-specific CSS -->
  <link rel="stylesheet" href="profile.css"> <!-- Link to profile-specific CSS -->
  <link rel="stylesheet" href="styles.css"> <!-- Link to general styles -->
</head>
<body>
<?php
  // Include the database connection file
  include('../../connect.php');
  $conn = new connect; // Create a new connection object
  $connection = $conn->getConn(); // Get the connection
  
  // Check if the connection is successful
  if(!$conn){
    die('error' . mysqli_connect_error()); // Terminate script on error
  }

  // Get the ID from the URL
  $id = $_GET['id'];
  
  // Prepare the SQL query to fetch team member details
  $query = "SELECT * from team where `id`='$id'";
  $result = $connection->query($query); // Execute the query
  $data = [];

  // Check if any results were returned
  if($result->num_rows > 0){
      // Fetch all rows into the data array
      while($row = $result->fetch_assoc()){
          $data[] = $row;
      } 
  }

  // Check if data exists and iterate through it
  if(isset($data)){
      foreach($data as $item){
          echo '<div class="main">'; // Start main div for player details
          echo '<div class="player">'; // Start player details div
          echo '<img class="player_img" src="../images/'.$item['PicLocation']. '" />'; // Display player image
          echo '<h3>'.$item['FName'].' '.$item['LName'].'</h3>'; // Display player name
          echo '</div>'; // End player details div

          echo '<div class="para">'; // Start biography section
          echo '<h1>'.'BIOGRAPHY'.'</h1>'; // Section heading
          echo '<p>'.$item['About'].'</p>'; // Display player biography
          echo '</div>'; // End biography section
          echo '</div>'; // End main div

          // Promotion section for the official store
          echo '<div class="promotion">';
          echo '<section class="store-section">';
          echo '<h2 class="store-heading">'.'Official Store'.'</h2>';
          echo '<div class="store-carousel">'; // Start store carousel
          
          // Merchandise items
          echo '<div class="store-item active">';
          echo '<img src="pics/shirt.png" alt="Merchandise 1">'; // Merchandise image
          echo '<h3 class="store-item-title">'.'Shirt'.'</h3>'; // Title
          echo '<p class="store-item-desc">'.'Description of Merchandise 1'.'</p>'; // Description
          echo '</div>';

          echo '<div class="store-item">';
          echo '<img src="pics/hoodie.png" alt="Merchandise 2">';
          echo '<h3 class="store-item-title">'.'Hoodie'.'</h3>';
          echo '<p class="store-item-desc">'.'Description of Merchandise 2'.'</p>';
          echo '</div>';

          echo '<div class="store-item">';
          echo '<img src="pics/boot.png" alt="Merchandise 3">';
          echo '<h3 class="store-item-title">'.'Boots'.'</h3>';
          echo '<p class="store-item-desc">'.'Description of Merchandise 3'.'</p>';
          echo '</div>';

          echo '</div>'; // End store carousel
          echo '<a href="../../merch/user/userstore.php"><button class="store-button">'.'Shop Now'.'</button></a>'; // Shop now button
          echo '</section>'; // End store section
          echo '</div>'; // End promotion div

          // Sponsor section
          echo '<section class="footer">';
          echo '<h2>SponsorShip</h2>';
          echo '<div class="wrapper">';
          echo '<div class="main-sponsors">'; // Start main sponsors section
          
          // Main sponsors links
          echo '<a class="img1" href="https://astropay.com">';
          echo '<img class="img1" alt="" src="pics/AstroPay.jpg">';
          echo '</a>';
          echo '<a class="img2" href="https://www.castore.com">';
          echo '<img class="img2" alt="" src="pics/logo.svg">';
          echo '</a>';
          echo '<a class="img3" href="https://tradenation.com">';
          echo '<img class="img3" alt="" src="pics/TradeNation.gif">';
          echo '</a>';
          echo '</div>'; // End main sponsors section

          // Secondary sponsors links
          echo '<div class="secondary-sponsors">';
          echo '<a class="img4" href="https://arcticwolf.com/uk/">';
          echo '<img class="img4" alt="" src="pics/arcticWolf.webp">';
          echo '</a>';
          echo '<a class="img5" href="https://asphaltlegends.com/">';
          echo '<img class="img5" alt="" src="pics/a9-logo.png">';
          echo '</a>';
          echo '<a class="img6" href="https://www.royalcaribbean.com">';
          echo '<img class="img6" alt="" src="pics/royalcaribbean.webp">';
          echo '</a>';
          echo '<a class="img7" href="https://www.12bet.uk">';
          echo '<img class="img7" alt="" src="pics/12bet.webp">';
          echo '</a>';
          echo '<a class="img8" href="https://asphaltlegends.com/">';
          echo '<img class="img8" alt="" src="pics/a9-logo.png">';
          echo '</a>';
          echo '<a class="img9" href="https://www.footballco.com">';
          echo '<img class="img9" alt="" src="pics/footbaleco.png">';
          echo '</a>';
          echo '</div>'; // End secondary sponsors section

          echo '<div class="social-links">'; // Social links section (currently empty)
          echo '</div>';
          echo '</div>'; // End wrapper div
          echo '</section>'; // End footer section
      }
  } else {
      echo 'not set'; // Message if no data is found
  }
?>
</body>
</html>
<script src="../store.js"></script> <!-- Link to external JavaScript -->
