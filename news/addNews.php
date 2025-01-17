<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News</title>
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="style/addNews.css">
</head>
<body>

    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data" >
            <div class="ball"></div>
            <h1>Add News</h1>

                <input type="text" placeholder="Title of the News"  id="title" class="title" name="title" value=""  required>
          
                
                <label for="myImage"><figure class="image"><h2>Add Image</h2>  <input type="file" name="myImage" id="myImage" accept="image/x-png,image/gif,image/jpeg" required/>  <img src="" alt=""> </figure></label>
            <textarea name="description" id="description" placeholder="Description of the news" cols="30" rows="10" name="desc" required></textarea>
            <div class="other"><input type="reset" value="clear"> <input type="submit" value="submit" name ="submit"></div>
        </form>
        
        <?php
        include ('../connect.php');
        
            if(isset($_POST['submit'])){
                $conn = new connect;
                $conn = $conn->getConn();
                IF($conn){
                    $title = mysqli_real_escape_string($conn,$_POST["title"]);
                    $desc = mysqli_real_escape_string($conn,$_POST["description"]);
                    $picLocation ='img/news';
                    if(isset($_FILES["myImage"])){
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
                        }
                        //echo $picLocation;
                        $sql = "insert into news values (default,'".$title."','".$picLocation."','".$desc."','".date('Y-m-d H:i:s')."');";
                    
                    
                    if( $conn->query($sql)){
                        echo '<script>alert("added successfully!") </script>';
                        header("Refresh: 1; URL=managenews.php");
                    }
                    else{
                        echo '<script>alert("'.$conn->error.'!") </script>';
                    }
                    }
                    else{
                        echo "<script>alert('Files is not set ')</script>";
                        
                    }
                    
                }
                
            }     
        ?>

    </div>
</body>
</html>
<script src="script/addNews.js"></script>