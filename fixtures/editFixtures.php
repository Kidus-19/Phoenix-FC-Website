<?php
    include ('../connect.php');
    // include ('../common/adminMenu.php');
    $conn = new connect;
    $conn = $conn->getConn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fixture</title>
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="style/managefixtures.css">
    <link rel="stylesheet" href="style/editfixtures.css">
</head>
<body>
    <div class="wrapper">
        <?php
            $id = $_GET['id'];
            if(isset( $id)){
                $result = mysqli_query($conn,"select * from fixtures where id =".$id);
                $result = $result->fetch_assoc();
                // echo "select * from merch where name ='"."Phoenix vs ".$result['Name']." on ".$result['DATE'];
                $resultTicket = mysqli_query($conn,"select * from merch where name ='"."Phoenix vs ".$result['Name']." on ".$result['DATE']."'");
                $resultTicket = $resultTicket->fetch_assoc();
                // print_r($resultTicket);
            }
            else{
                header("Refresh: 1; URL=managefixtures.php");
             }
        ?>
        <div class="cover" style = "display:flex">
            <div class="addFixture">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>Edit Fixture</h1>    
                    <label for="name"><h2>Team Name</h2></label>
                    <!-- <input type="select" id="name" name='name'> -->
                    <select name="name" placeholder="--select --" required>
                        <option <?php if($result['Name']=='Man Utd'){echo 'selected =\'selected\' ' ;} ?> >Man Utd</option>
                        <option <?php if($result['Name']=='Man City'){echo 'selected =\'selected\' ' ;} ?> >Man City</option>
                        <option <?php if($result['Name']=='Arsenal'){echo 'selected =\'selected\' ' ;} ?> >Arsenal</option>
                        <option <?php if($result['Name']=='Chelsea'){echo 'selected =\'selected\' ' ;} ?> >Chelsea</option>
                        <option <?php if($result['Name']=='Liverpool'){echo 'selected =\'selected\' ' ;} ?> >Liverpool</option>
                        <option <?php if($result['Name']=='Crystal Palace'){echo 'selected =\'selected\' ' ;} ?> >Crystal Palace</option>
                        <option <?php if($result['Name']=='Swansea'){echo 'selected =\'selected\' ' ;} ?> >Swansea</option>
                        <option <?php if($result['Name']=='Everton'){echo 'selected =\'selected\' ' ;} ?> >Everton</option>
                    </select>
                    <label for="date"><h2>Date</h2></label>
                    <?php  echo "<input required type='date' id='date' name='date' value=".$result['DATE'].">";?>
                    <label for="date"><h2>Ticket Price</h2></label>
                    <?php  echo "<input required type='number' id='price' name ='price' value=".$resultTicket['Price'].">";?>
                    <label for="date"><h2>Location</h2></label>
                    <?php  echo "<input required type='text' id='location' name ='location' value=".$result['location'].">";?>
                    <label for="tickets"><h2>Ticket Price</h2></label>
                    <?php  echo "<input required type='number' id='tickets' name='tickets' value=".$resultTicket['Amount'].">";?>
                    <input type="submit" value="Update" id="submit" name="submit">
                </form>
            </div>
        </div>
        <?php
            if(isset($_POST['submit'])){
                // echo "update fixtures set name='".$_POST['name']."',date='".$_POST['date']."',location='".$_POST['location']."' where id =".$id . "<br>";
                // echo "update merch set name ='"."Phoenix vs ".$_POST['name']." on ".$_POST['date']."' where name = '".$resultTicket['name']. "'";
                $result = mysqli_query($conn,"update fixtures set name='".$_POST['name']."',date='".$_POST['date']."',location='".$_POST['location']."',ticketPrice="$_POST['tickets']" where id =".$id);
                // $resultTicket = mysqli_query($conn,"update merch set name ='"."Phoenix vs ".$_POST['name']." on ".$_POST['date']."' where name = '".$resultTicket['name']. "'");

                if($result){
                    echo "<script>alert('updated successfully!')</script>";
                    header("Refresh: 1; URL=managefixtures.php");
                }
            }
        ?>
    </div>
</body>
</html>