<?php
    include ('../connect.php');
    include ('../common/adminMenu.php');
    $conn = new connect;
    $conn = $conn->getConn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixtures</title>
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="style/fixtures.css">
</head>
<body >
    <div class="wrapper" >

                <?php
                 $result = mysqli_query($conn,"Select * from fixtures order by date desc");
                 $latest = $result->fetch_assoc();
                echo "<main class='latestMatch'>
                            <section>
                        <figure class='home Team'>";
                 echo "<img src='img/Phoenix.png' alt='Team Logo' class='logo'>";
                 echo "<figcaption><h2>Phoenix</h2></figcaption>";
                 echo "</figure>";
                //  $ticket = mysqli_query($conn,"select id from fixtures where name ='Phoenix vs ".$latest['Name']." on ".$latest['DATE']."'")->fetch_assoc();
                 echo "<p class='vs'>
                            Vs
                        </p>                 
                            <figure class='opponent'>
                                <img src='img/".$latest['Name'].".png' alt='' class='logo'>
                                <figcaption>
                                    <h2>".$latest['Name']."</h2>
                                </figcaption>
                            </figure>
                        </section>
                        
                            <p class='detail date'>".$latest['DATE']."</p>
                            <p class='detail location'>".$latest['location']."</p>
                            <a href='buyTickets.php?id=".$latest['id']."'><button id='buy' >Buy Ticket Now</button></a>
                    
                        </main>";  
                ?>
        <aside class="future">
                <?php
                    while($other=$result->fetch_assoc()){
                        echo "<main> <section>
                        <figure class='home Team'>
                            <img src='img/Phoenix.png' alt='Team Logo' class='logo'>
                            <figcaption>
                                <h2>Phoenix</h2>
                            </figcaption>
                            </figure>
                                <p class='vs'>
                                    Vs
                                </p>
                        
                            <figure class='opponent'>
                            <img src='img/".$other['Name'].".png' alt='Team Logo' class='logo'>
                                <figcaption>
                                    <h2>".$other['Name']."</h2>
                                </figcaption>
                            </figure>
                            
                            </section>
                            <p class='detail date'>".$other['DATE']."</p>
                            <p class='detail location'>".$other['location']."</p>
                            <a href='buyTickets.php?id=".$other['id']."'><button id='buy' >Buy Ticket Now</button></a>
                    
                            </main>";
                    } 
                ?>
                <?php
                    
                    ?>
               
        </aside>
    </div>
</body>
</html>
<script src="script/fixtures.js"></script>