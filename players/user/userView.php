<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include('../../connect.php');
    
    $conn = new connect;
    $connection = $conn->getConn();
    if (!$conn) {
        die('Error: ' . mysqli_connect_error());
    }
    $query = "SELECT `id`, `PicLocation`, `Status`, `FName`, `LName` FROM `team` WHERE `id` > 0";
    $result = $connection->query($query);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    if (isset($data)) {
        echo '<div class="container mt-5">';
        
        // Goalkeepers
        echo '<h1 class="text-center">GOALKEEPERS</h1>';
        echo '<div class="row text-center">';
        foreach ($data as $img) {
            if ($img['Status'] == 'goalkeeper') {
                echo '<div class="col-md-3 mb-4">';
                echo '<a href="DetailPage.php?id=' . $img['id'] . '">';
                echo '<img src="../images/' . htmlspecialchars($img['PicLocation']) . '" class="img-fluid" />';
                echo '<h3>' . htmlspecialchars($img['FName']) . ' ' . htmlspecialchars($img['LName']) . '</h3>';
                echo '</a></div>';
            }
        }
        echo '</div>';

        // Defenders
        echo '<h1 class="text-center">DEFENDERS</h1>';
        echo '<div class="row text-center">';
        foreach ($data as $img) {
            if ($img['Status'] == 'defender') {
                echo '<div class="col-md-3 mb-4">';
                echo '<a href="DetailPage.php?id=' . $img['id'] . '">';
                echo '<img src="../images/' . htmlspecialchars($img['PicLocation']) . '" class="img-fluid" />';
                echo '<h3>' . htmlspecialchars($img['FName']) . ' ' . htmlspecialchars($img['LName']) . '</h3>';
                echo '</a></div>';
            }
        }
        echo '</div>';

        // Midfielders
        echo '<h1 class="text-center">MIDFIELDERS</h1>';
        echo '<div class="row text-center">';
        foreach ($data as $img) {
            if ($img['Status'] == 'midfielder') {
                echo '<div class="col-md-3 mb-4">';
                echo '<a href="DetailPage.php?id=' . $img['id'] . '">';
                echo '<img src="../images/' . htmlspecialchars($img['PicLocation']) . '" class="img-fluid" />';
                echo '<h3>' . htmlspecialchars($img['FName']) . ' ' . htmlspecialchars($img['LName']) . '</h3>';
                echo '</a></div>';
            }
        }
        echo '</div>';

        // Forwards
        echo '<h1 class="text-center">FORWARDS</h1>';
        echo '<div class="row text-center">';
        foreach ($data as $img) {
            if ($img['Status'] == 'forward') {
                echo '<div class="col-md-3 mb-4">';
                echo '<a href="DetailPage.php?id=' . $img['id'] . '">';
                echo '<img src="../images/' . htmlspecialchars($img['PicLocation']) . '" class="img-fluid" />';
                echo '<h3>' . htmlspecialchars($img['FName']) . ' ' . htmlspecialchars($img['LName']) . '</h3>';
                echo '</a></div>';
            }
        }
        echo '</div>';

        echo '</div>'; // Close container
    }
    ?>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
