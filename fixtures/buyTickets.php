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
    <title>Buy Tickets</title>
    <link rel="stylesheet" href="style/buyTickets.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1 class="title">Personal Information</h1>
            <label for="fname">First Name</label>
            <input type="text" name="fname">
            <label for="lname">Last Name</label>
            <input type="text" name="lname">
            <label for="email" >E-mail</label>
            <input type="email" name="email" id="email" required>
            <label for="pnumber" required>Phone Number</label>
            <input type="tel" name="pnumber" id="pnumber" required>
            <div class="buttons">
                <input type="reset" value="clear" name="">
                <input type="submit" value="submit" name="submit" id='submit'>
            </div>
        </form>
            <?php
            if(isset($_GET['id']))
            {
                $other = mysqli_query($conn,'select * from fixtures where id ='.$_GET['id'])->fetch_assoc();
                 echo "<aside> <section>
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
                    
                            </aside>
                            ";
                // print_r($other);

                # requesting chapa payment
                if(isset($_POST["submit"])){
                    // echo '<script>alert("aaa")</script>';
                    if($other['ticketPrice']==0){
                        $other['ticketPrice']=100;
                    }
                    $curl = curl_init();
                    $tx_ref = $_POST['fname'].date('U');
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.chapa.co/v1/transaction/initialize',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                    "amount":"'.$other['ticketPrice'].'",
                    "currency": "ETB",
                    "email": "'.$_POST['email'].'",
                    "first_name": "'.$_POST['fname'].'",
                    "last_name": "'.$_POST['lname'].'",
                    "phone_number": "'.$_POST['pnumber'].'",
                    "tx_ref": "'.$tx_ref.'",
                    "callback_url": "http://localhost/Football-Club-Website/fixtures/verify.php",
                    "return_url": "http://localhost/Football-Club-Website/fixtures/fixtures.php",
                    "customization[title]": " Phoenix vs '.$other['Name'].'",
                    "customization[description]": " on '.$other['DATE'].' "
                    }',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer CHASECK_TEST-jemo02JnnrUo4NknnTHa3BWCNRnPe9wY',
                        'Content-Type: application/json'
                    ),
                    ));

                    $response = curl_exec($curl);
                    $response = json_decode($response,true);
                    curl_close($curl);
                    
                    if($response['status']=='success'){

                        //Send Email
                        $date = date('dd-mm-yyyy');
                        $id = $tx_ref;
                        $body = "You have successfully bought tickets for Phoenix vs ".$other['Name']. " game in ".$other['location'] ." on ".$other['DATE'];
                        $total = $other['ticketPrice'];
                        // send email
                        ini_set('SMTP','smtp.abc.gmail.cada');
                        ini_set("sendmail_from",'Phoenixdreamteamfc@gmail.com');
                        ini_set("smtp_port","367");
                        ini_set();
                        $to      = $_POST['email'];
                        $subject = 'Ticket Reciept';
                        $message = '<html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Reciept</title>
                            <style>

                            </style>
                            <link rel="stylesheet" href="reciept.css">
                            <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
                        </head>
                        <body>
                            <div class="wrapper" style=" display: grid;">
                              <div class="container" style="max-width: 700px; justify-self: center; display: grid;">
                                <p class="date">'.$date.'</p>
                                <img src="img/Phoenix.png"  alt="" style="justify-self: center;max-width: 100px; ">
                                <h1 class="title" style="justify-self: center;">Reciept for Purchase from Phoenix F.C.</h1>
                                <hr style="width: 100%;">
                                <canvas class="qrcode"></canvas>
                                <h2 class="txt_ref"> Reference Number: <b>'.$txt_ref.'</b> </h2>
                                <p class="narrative" style="color: rgb(63, 63, 63);">'.$body.'</p>
                                
                                <hr style="color: rgb(224, 224, 224);">
                                <h3 class="total">Total: '.$other['ticketPrice'].' Birr</h3>
                        
                              </div>
                            </div>
                        </body>
                        </html>';
                        $headers = 'From: Phoenixdreamteamfc@gmail.com'       . "\r\n" .
                                     'Reply-To: Phoenixdreamteamfc@gmail.com' . "\r\n" .
                                     'X-Mailer: PHP/' . phpversion()."\r\n"." Content-type:text/html;charset =utf-8"."\r\n";
                        echo "<script>alert('your private key is ".$tx_ref." bring this number to take your number')</script>";             
                        mysqli_query($conn,"insert into Reciept values('".$txt_ref."','".$body."','".$date."',".$total." )");
                        $res =  mail($to, $subject, $message, $headers);
                        print_r($res);

                        // \ send email
                        echo '<script>alert("we have sent you an email containing your reciept Enjoy the game!")</script>';
                        header('Location: '.$response['data']['checkout_url']);
                    }
                }
                else{
                    // echo '<script>alert("naaa")</script>';
                }
            
            }
            ?>
    </div>
</body>
</html>