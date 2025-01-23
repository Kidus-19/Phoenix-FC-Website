<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once('../connect.php');
        $conn = new Connect;
        $conn = $conn->getConnection();
        $curl = curl_init();
        $other = mysqli_query($conn,'select * from merch where id ='.$_GET['id'])->fetch_assoc();
        $tx_ref = "guest".date('U');
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
        "amount":"'.$other['Price'].'",
        "currency": "ETB",
        "email": "example@gmail.com",
        "first_name": "Enter your first name",
        "last_name": "Enter your last name",
        "tx_ref": "'.$tx_ref.'",
        "callback_url": "http://localhost/Football-Club-Website/merch/Purchase/callback.php",
        "return_url": "http://localhost/Football-Club-Website/merch/userstore.php"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer CHASECK_TEST-OYesYFy0RMJp309o2vuMOlV3GhDHQx9U',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response,true);

        print_r($response);
        header('Location: '.$response['data']['checkout_url']);
        curl_close($curl);

    ?>
</body>
</html>