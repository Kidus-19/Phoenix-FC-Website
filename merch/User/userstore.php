<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="userstore.css">
</head>
<body>
    <div class="main-section container mt-5">
        <div class="row">
            <div class="col-md-4 right">
                <a href="\Football-Club-Website\merch\Admin\admin.php">
                    <img src="Pictures/user.png" alt="" class="image2 img-fluid">
                </a>   
            </div>

            <div class="col-md-4 left text-center">
                <div class="logos">
                    <a href="http://localhost/Football-Club-Website/Home%20Page">
                        <img src="Pictures/trylogo.png" alt="" class="image4 img-fluid">
                    </a>
                    <p class="lbl1">PHOENIX F.C.</p>
                    <p class="lbl2">OFFICIAL ONLINE STORE</p>
                </div>
                <div class="dream">WE ARE PHOENIX. MORE THAN JUST A FOOTBALL CLUB</div>
            </div>

            <div class="col-md-4 get-your-merch text-center">
                <h3>GET YOUR MERCH NOW</h3>
            </div>
        </div>

        <div class="toolbox mt-4">
            <a href="\Football-Club-Website\fixtures\fixtures.php">
                <button class="seller btn btn-primary">Next Fixtures</button>
            </a>
            <br><br>
            <div class="fmenu">
                <img src="Pictures/next.png" alt="" class="nextpic img-fluid">
                <table>
                    <br>
                    <img src="Pictures/stad2.jpg" alt="" class="sidepic img-fluid" style="width: 37%;">
                </table>
            </div>
        </div>

        <div class="merches row mt-4">
            <?php
            include_once('../connect.php');
            $conn = new Connect;
            $connect = $conn->getConnection();
            $sql = "SELECT * FROM merch";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    echo '<div class="col-md-4 m1 text-center">';
                    echo '<img src="Pictures/' . $row['PicLocation'] . '" class="shirt img-fluid">';
                    echo '<p class="d1">' . htmlspecialchars($row['name']) . '</p>';
                    echo '<p class="p1">' . htmlspecialchars($row['Price']) . '<span class="s1" style="margin-left:10px">ETB</span></p>';
                    echo "<a href='../Purchase/purchase.php?id=$id' style='text-decoration:none'><button class='purchase btn btn-success'>Purchase</button></a>";
                    echo '</div>';
                }
            }
            if (!$result) {
                die('error' . mysqli_error($connect));
            }
            ?>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
