<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userstore.css">
    <title>Document</title>
</head>
<body>
    <div class="main-section">
        <div class="right">
            <a href="\Football-Club-Website\merch\Admin\admin.php"><img src="Pictures/user.png" alt="" class="image2"></a>   
     </div>

        <div class="left">
            <div class="logos">
                <a href="http://localhost/Football-Club-Website/Home%20Page"><img src="Pictures/trylogo.png" alt="" class="image4"></a>
                <p class="lbl1">PHOENIX F.C.</p>
                <p class="lbl2">OFFICIAL ONLINE STORE</p>
            </div>
            <div class="dream">WE ARE PHOENIX. MORE THAN JUST A FOOTBALL CLUB</div>
        </div>

        <div class="get-your-merch"><br>
            GET YOUR MERCH NOW
        </div>

        <div class="toolbox">
                <a href="\Football-Club-Website\fixtures\fixtures.php"><button class="seller" style="position: relative; 
                top: 430px;">Next Fixtures</button></a><br><br><br>
            <div class="fmenu">
                <img src="Pictures/next.png" alt="" class="nextpic">
                <table>
                    <br>
                    <img src="Pictures/stad2.jpg" alt="" style="width: 37%;" class="sidepic">
                </table>
            </div>
        </div>
        <div class="merches">
            <?php
            include_once('../connect.php');
            $conn = new Connect;
            $connect = $conn->getConnection();
            $sql = "SELECT * FROM merch";
            $result = $connect->query($sql);
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    $id=$row['id'];
                    echo '<div class="m1">';
                    echo '<img src="Pictures/'.$row['PicLocation'].'" class="shirt">';
                    echo '<p class="d1">'.$row['name'].'</p>';
                    echo '<p class="p1">'.$row['Price'].'<span class="s1" style="margin-left:10px">ETB</span></p>';
                    echo "<a href='../Purchase/purchase.php?id=$id' style='text-decoration:none'><button class='purchase'>Purchase</button></a>";
                    echo '</div><br>';

                }

                    
            }
            if(!$result){
                die('error'.mysqli_error($connect));
            }

        ?>
        </div>
    </div>
    </div>
</body>
</html>
