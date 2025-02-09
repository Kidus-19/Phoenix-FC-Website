<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/news.css" />
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-png" />
</head>
<body>
    <div class="wrapper container mt-5">
        <?php
        include ('../common/adminMenu.php');
        ?>
        <main>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            include ("../connect.php");
            $conn = new connect;
            $conn = $conn->getConn();
            if ($conn) {
                $sql = "SELECT * FROM news ORDER BY Date DESC";
                $allNews = $conn->query($sql);
                if (isset($_GET['id'])) {
                    $latest = $conn->query("SELECT * FROM news WHERE id = " . $id . ";")->fetch_assoc();
                } else {
                    $latest = $allNews->fetch_assoc();
                }
                echo "<figure class='pic'><img src='" . htmlspecialchars($latest['PicLocation']) . "' alt='' class='img-fluid' /></figure>";
                echo "<h1 class='title'>" . htmlspecialchars($latest['Title']) . "</h1>";
                echo "<img class='share' title='Copy Link' id='share' src='img/share.png' />";
                echo "<p class='date'>" . htmlspecialchars($latest['Date']) . "</p>";
                echo "<article class='text'><p>" . htmlspecialchars($latest['Description']) . "</p></article>";
            }
            ?>
        </main>
        <div class="empty"></div>
        <aside class="other mt-4">
            <h2>Other News</h2>
            <section>
                <?php
                while ($other = $allNews->fetch_assoc()) {
                    if (isset($id) && $other['id'] == $id) {
                        continue;
                    }
                    echo "<a href='news.php?id=" . $other['id'] . "'>
                            <figure class='pic' style='background-image:url(" . $other['PicLocation'] . ")'>
                                <img src='' alt='' class='img-fluid' />
                                <figcaption>
                                    <h3>" . htmlspecialchars($other['Title']) . "</h3>
                                    <p>" . htmlspecialchars($other['Description']) . "</p>
                                </figcaption>
                            </figure>
                          </a>";
                }
                ?>
            </section>
        </aside>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="script/news.js"></script>
</body>
</html>
