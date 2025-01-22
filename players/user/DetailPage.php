<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="store.css">
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
  include('../../connect.php');
  $conn = new connect;
  $connection = $conn->getConn();
if(!$conn){
  die('error'.mysqli_connect_error());
}
$id=$_GET['id'];
$query = "SELECT * from team where `id`='$id'";
$result=$connection->query($query);
$data = [];
if($result->num_rows>0){
    
    while($row=$result->fetch_assoc()){
            $data[]=$row;
               } 
               }
    if(isset($data)){
        foreach($data as $item){
            echo '<div class="main">';
            echo'<div class="player">';
            echo'<img class="player_img" src="../images/'.$item['PicLocation']. '" />';
            echo'<h3>'.$item['FName'].' '.' '.$item['LName'].'</h3>';
            echo'</div>';
            echo'<div class="para">';
            echo'<h1>'.'BIOGRAPHY'.'</h1>';
            echo'<p>'.$item['About'].'</p>';
            echo'</div>';
            echo'</div>';


            echo'<div class="promotion">';
           echo '<section class="store-section">';
   echo '<h2 class="store-heading">'.'Official Store'.'</h2>';
   echo' <div class="store-carousel">';
    echo '<div class="store-item active">';
     echo '<img src="pics/shirt.png" alt="Merchandise 1">';
      echo  '<h3 class="store-item-title">'.'Shirt'.'</h3>';
       echo '<p class="store-item-desc">'.'Description of Merchandise 1'.'</p>';
      echo '</div>';
      echo '<div class="store-item">';
      echo  '<img src="pics/hoodie.png" alt="Merchandise 2">';
      echo  '<h3 class="store-item-title">'.'Hoodie'.'</h3>';
       echo '<p class="store-item-desc">'.'Description of Merchandise 2'.'</p>';
      echo '</div>';
      echo'<div class="store-item">';
       echo' <img src="pics/boot.png" alt="Merchandise 3">';
        echo '<h3 class="store-item-title">'.'Boots'.'</h3>';
        echo '<p class="store-item-desc">'.'Description of Merchandise 3'.'</p>';
      echo '</div>';
     echo '</div>';
     echo '<a href="../../merch/user/userstore.php"><button class="store-button">'.'Shop Now'.'</button></a>';
     echo'</section>';
     echo'</div>';
 //comment
 echo'<section class="footer">
 <h2>SponsorShip</h2>
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

     </div>

</div>
</section>';

       


        }
    }else{
        echo'not set';
    }
?>
</body>
</html>
<script src="../store.js"></script>