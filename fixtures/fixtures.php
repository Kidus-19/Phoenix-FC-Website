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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/fixtures.css">
</head>
<body>
    <div class="wrapper container mt-5">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM fixtures ORDER BY date DESC");
        $latest = $result->fetch_assoc();
        echo "<main class='latestMatch mb-4'>
                <section class='text-center'>
                    <figure class='home Team'>
                        <img src='img/Phoenix.png' alt='Team Logo' class='logo img-fluid'>
                        <figcaption><h2>Phoenix</h2></figcaption>
                    </figure>
                    <p class='vs'>Vs</p>
                    <figure class='opponent'>
                        <img src='img/".$latest['Name'].".png' alt='' class='logo img-fluid'>
                        <figcaption><h2>".$latest['Name']."</h2></figcaption>
                    </figure>
                </section>
                <p class='detail date'>".$latest['DATE']."</p>
                <p class='detail location'>".$latest['location']."</p>
                <a href='buyTickets.php?id=".$latest['id']."'><button id='buy' class='btn btn-primary'>Buy Ticket Now</button></a>
              </main>";  
        ?>
        <aside class="future">
            <?php
            while ($other = $result->fetch_assoc()) {
                echo "<main class='mb-4'>
                        <section class='text-center'>
                            <figure class='home Team'>
                                <img src='img/Phoenix.png' alt='Team Logo' class='logo img-fluid'>
                                <figcaption><h2>Phoenix</h2></figcaption>
                            </figure>
                            <p class='vs'>Vs</p>
                            <figure class='opponent'>
                                <img src='img/".$other['Name'].".png' alt='Team Logo' class='logo img-fluid'>
                                <figcaption><h2>".$other['Name']."</h2></figcaption>
                            </figure>
                        </section>
                        <p class='detail date'>".$other['DATE']."</p>
                        <p class='detail location'>".$other['location']."</p>
                        <a href='buyTickets.php?id=".$other['id']."'><button id='buy' class='btn btn-primary'>Buy Ticket Now</button></a>
                      </main>";
            } 
            ?>
        </aside>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="script/fixtures.js"></script>
</body>
</html>
