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
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="style/viewTickets.css">
    
    <title>Tickets</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <input type="search" name="q" id="q">
            <input type="submit" value="search" name='search'>
        </form>
        <?php
        if(isset($_POST['search'])){
            $sql= "Select * from Reciept where txt_ref='".$_POST['q']."'";
            $result = mysqli_query($conn,$sql);
            $latest = $result->fetch_assoc();
            // print_r($result);
            /*    txt_ref VARCHAR(300) PRIMARY KEY,
    description VARCHAR(1000),
    date DATE,
    totalAmount DECIMAL
             */
            if($result->num_rows!=0){
                echo '<h1 style="color:green;"> Valid Ticket  </h1>';
                echo '<p>txt_ref: '.$latest['txt_ref'].' </p>';
                echo '<p>Description: '.$latest['description'].' </p>';
                echo '<p>DATE: '.$latest['date'].' </p>';
                echo '<p>Total: '.$latest['totalAmount'].'Birr </p>';
            }
            else{
                echo '<h1 style="color:red;"> Not a Valid Ticket  </h1>';
            }
        }
        else{
            echo '<h1 style="color:red;"> Not a Valid Ticket  </h1>';
        }
        ?>
    </div>
</body>
</html>