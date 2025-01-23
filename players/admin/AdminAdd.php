<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adding data</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <div class="wrapper">
    <form action="AdminAdd.php" method="post" enctype="multipart/form-data">
        <h3>first name</h3><input class="fname" pattern="[A-Za-z]+" required type="text" name="fname" ><br>
        <h3>last name </h3><input class="lname" pattern="[A-Za-z]+" required type="text" name="lname" ><br>
        <h3>age </h3><input class="age" required type="number" name="age" min="17" max="50" ><br>
        <h3>description </h3><textarea class="description" name="about"  cols="30" rows="10"></textarea><br>
        <h3>image</h3><input class="images" required type="file" name="image" ><br>
         <h3>status</h3><select  name="status" >
        <option value="goalkeeper">GOAl KEEPER</option>
        <option value="defender" >DEFENDER</option>
        <option value="midfilder">MIDFILDER</option>
        <option value="forward">FORWARD</option>
    </select><br>

        <input class="submit" type="submit" name=" submit" value="send">
    </form>
    </div>
</body>
</html>


<?php
include('../../connect.php');
$conn = new connect;
$connection = $conn->getConn();
if(!$conn){
    die('error'.mysqli_connect_error());
}
 if(isset($_POST['submit'])){
    $image=$_FILES['image']['name'];
    $fname=$_POST['fname']; 
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $description=$_POST['about'];
    $stat=$_POST['status'];

    $query="INSERT into team values('','$fname','$lname','$image','$description','$age','$stat')";
    if($query==true){
        move_uploaded_file($_FILES['image']['tmp_name'],"../images/$image");
        echo' <script>alert("successfully added")</script>';
        //header('location:../admin');
    }
    $result=$connection->query($query);
    if(!$result){
        die('error'.mysqli_connect_error());
    }else{
        //echo 'data sucessfully added';
    }

 }
?>

