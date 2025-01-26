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
    <title>Manage Fixtures</title>
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="style/managefixtures.css">
    
</head>
<body>
    <div class="wrapper">
        <main>
            <header>
                <input type="text" id= "searchBar">
                <img src="img/search.png" alt="">
                <button id="add" title="add New Fixture"> Add </button>
            </header>
            <div class="cover">
                <div class="addFixture">
                <form action="" method="POST" enctype="multipart/form-data">
                <h1>Add Fixture</h1>    
                <label for="name"><h2>Team Name</h2></label>
                    <!-- <input type="select" id="name" name='name'> -->
                    <select name="name" required>
                        <option value="" disabled selected>--select Team--</option>
                        <option>Man Utd</option>
                        <option>Man City</option>
                        <option>Arsenal</option>
                        <option>Chelsea</option>
                        <option>Liverpool</option>
                        <option>Crystal Palace</option>
                        <option>Swansea</option>
                        <option>Everton</option>
                    </select>
                    <label for="date"><h2>Date</h2></label>
                    <input required type="date" id="date" name='date'>
                    <label for="date"><h2>Ticket Price</h2></label>
                    <input required type="number" id="price" name ='price'>
                    <label for="date"><h2>Location</h2></label>
                    <input required type="text" id="location" name ='location'>
                    <!-- <label for="tickets"><h2>Ticket Price</h2></label>
                    <input required type="number" id="tickets" name='tickets'> -->
                    <input type="submit" value="Add" id="submit" name="submit">
                </form>
                </div>
            </div>
            <?php
                if(isset($_POST['submit'])){
                 if($conn){
                    // $sql = "insert into merch(id,piclocation,name,price,amount) values(default,'img/ticket.png','Phoenix vs ". $_POST['name']." on ".$_POST['date']."',".$_POST['price'].",".$_POST['tickets'].")";
                    // mysqli_query($conn,$sql);
                    $sql = "insert into Fixtures(id,name,location,date,ticketPrice) values(default,'".$_POST['name']."','".$_POST['location']."','".$_POST['date']."',".$_POST['price'].")";
                    mysqli_query($conn,$sql);
                    message( "Phoenix vs ".$_POST['name']." Added Successfully!");
                    // echo $sqlTick;
                //    $sql = "insert into fixtures(name,PicLocation,location,Date) values('$_POST['']')";
                //    $result = mysqli_query($conn,$sql);
                }
                else{
                }
            }

            function message($msg){
                echo "<p class='message'>
                ".$msg."
                <button class='x' onclick=\"this.parentElement.style.display='none'\">X</button>
            </p>";
            }
            // Handle the edit
            if(isset($_GET['id'])){
                $id = $_GET['id'];}
                if(isset($id) && isset($conn))
                {
                    $fix = mysqli_query($conn, "select * from fixtures where id = ".$id)->fetch_assoc();
                    mysqli_query($conn, "delete from fixtures where id = ".$id);
                    // mysqli_query($conn, "delete from merch where name = 'Phoenix vs ".$fix['Name']." on ".$fix['DATE']."'");
                    message("Phoenix vs ".$fix['Name']." Deleted Successfully!");
                }
                else{
                }
            ?>

            <?php
                 if($conn){
                   $sql = "select * from fixtures order by date desc";
                   $result = mysqli_query($conn,$sql);
                   while($fixture = $result->fetch_assoc()){
                        echo "<div class='fixture'>";
                        echo "<img src='img/".$fixture['Name'].".png' alt ='team logo' class= 'logo'>";
                        echo "<h3 class='name'> Team: ".$fixture['Name']."</h3>";
                        echo "<h3 class='date'>Date: ".$fixture['DATE']."</h3>";
                        $sql = "select amount from merch where name ='Phoenix vs ".$fixture['Name']." on ".$fixture['DATE']."'";
                        // $numTicket = mysqli_query($conn,$sql );
                        // $numTicket = $numTicket->fetch_assoc();
                        echo "<h3 class = 'tickets'>Ticket Price: ".$fixture['ticketPrice']."</h3>";
                        echo "<div class='icons'>";
                        echo "<a href='editfixtures.php?id=".$fixture['id']."&type=edit"."'><img id='editFixture' src='img/edit.png' alt='' class='icon edit'></a>";
                        echo "<a href='managefixtures.php?id=".$fixture['id']."&type=delete"."'><img id='deleteFixture' src='img/delete.png' alt='' class='icon delete'></a>";
                        echo "</div> </div>";
                    }
                }

            ?>
            
        </main>
    </div>
</body>
</html>
<script src="script/managefixtures.js"></script>