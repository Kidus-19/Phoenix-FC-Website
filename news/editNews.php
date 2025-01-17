<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="style/editNews.css">
</head>
<body>
    <div class="wrapper">  
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Edit News</h1>
            <?php
                 $id = $_GET['id'];
                 include ("../connect.php");
                 $conn = new connect;
                 $conn = $conn->getConn();
                 if($conn){
                   $sql = "select * from news where id =".$id;
                   $News = $conn->query($sql)->fetch_assoc();
                   echo "<input type='text' placeholder='Title of the News' name='title' id='title' class='title' value='".$News['Title']."'>";
                   echo "<label for='myImage'><figure class='image' style='background-image: url(".$News['PicLocation'].")'><h2>Change Image</h2>  <input type='file' name='myImage' id='myImage' value=".$News['PicLocation']." accept='image/x-png,image/gif,image/jpeg' />  <img src=''> </figure></label>";
                   echo "<textarea name='Description' id='description' placeholder='Description of the news' cols='30' rows='10'>".$News['Description']."</textarea>";
                }

            ?>
                <div class="other"><input type="reset" value="clear"> <input type="submit" value="submit" name="submit"></div>
            </form>
        <?php
            if(isset($_POST['submit']))
            {
                if(isset($_FILES['myImage'])){
                    $start = "img/news";
                    if(chmod($start, 0777)){
                        echo '<script>console.log("Ch mode !")</script>';
                    }
                    if(file_exists($_FILES['myImage']["tmp_name"])){
                        echo '<script>console.log("File Exists!")</script>';
                    }
                    else{
                        echo '<script>console.log("File does not exist!")</script>';
                    }
                    $picLocation = $start."/".basename($_FILES['myImage']["name"]);
                    //echo $picLocation."<br>";
                    //print_r($_FILES);
                    if(move_uploaded_file($_FILES["myImage"]['tmp_name'],$picLocation)){
                        echo '<script>console.log("Uploaded successfully!")</script>';
                    }
                    else{
                        echo '<script>console.log("Not Uploaded!")</script>';
                        $picLocation = $News['PicLocation'];
                    }
                }
                $sql = "update news set title='".mysqli_real_escape_string($conn,$_POST['title'])."', Description = '".mysqli_real_escape_string($conn,$_POST['Description'])."', PicLocation='".mysqli_real_escape_string($conn,$picLocation)."'  where id =".$id;
                //echo "<br>".$sql."<br>";
                if($conn->query($sql)){
                    echo "<script> console.log('Changed')</script>";
                    echo "<script>alert('updated successfully!')</script>";
                    // header('Location: http://localhost/Football-Club-Website/news/manageNews.php');
                 }
                else{
                    echo "<script>alert('Changed') console.log('Not Changed')</script>";
                }
            }
        ?>
        
    </div>
</body>
</html>
<script src="script/editNews.js"></script>