
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News</title>
    <link rel="stylesheet" href="style/news.css" />
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-png" />
  </head>
  <body>
    <div class="wrapper">
    <?php
    include ('../common/adminMenu.php');
    // echo $header;
    ?>
      <main>
        <?php
        if(isset($_get['id']))
          {$id = $_GET['id'];
          }
          include ("../connect.php");
          $conn = new connect;
          $conn = $conn->getConn();
          if($conn){
            $sql = "select * from news order by Date desc";
            $allNews = $conn->query($sql);
            if(isset($_GET['id'])){
              $id=$_GET['id'];
              $latest = $conn->query("select * from news where id = ".$id .";")->fetch_assoc();
              echo "<script>console.log(".$id.")</script>";
            }
            else{
              $latest = $allNews->fetch_assoc();
            }
            echo "<figure class='pic'> <img src=".$latest['PicLocation']." alt='' /> </figure>";
            echo "<h1 class='title'>".$latest['Title']."</h1>";
            echo "<img class='share' title='Copy Link' id='share' src='img/share.png' >";
            echo "<p class='date'>".$latest['Date']."</p>";
            echo "<article class='text'><p>".$latest['Description']."</p></article>";
          }
        ?>
      </main>
      <div class="empty"></div>
      <aside class="other">
        
        <h2>Other News</h2>
        <br>
        <section>
        <?php
            while($other = $allNews->fetch_assoc()){
              if(isset($id) && $other['id']==$id){
                continue;
              }
              echo "<a href = 'news.php?id=".$other['id']."'> <figure class='pic' style='background-image:url(".$other['PicLocation'].")'>
              <img src= />
              <figcaption>
                <h3>".$other['Title']."</h3>
                <p>".$other['Description']."</p>
              </figcaption>
            </figure>";
            }
        ?>
      </section>
        <!-- <button class="more" type ="submit"><img src="img/more.png" alt=""/> more</button> -->
    </aside>
    </div>
  </body>
  
</html>
<script src="script/news.js"></script>

