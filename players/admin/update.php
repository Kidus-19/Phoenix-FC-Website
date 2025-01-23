<?php
  include('../../connect.php');
  $conn = new connect;
  $connection = $conn->getConn();
if(!$conn){
  die('error'.mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $id=$_POST['id'];
    $fname=$_POST['fname']; 
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $description=$_POST['description'];
    $stat=$_POST['status'];
    $image=$_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
  
    move_uploaded_file($row['PicLocation'],"../images/$image"); 
    $query=" UPDATE team SET `FName`='$fname',`LName`='$lname',`PicLocation`='$image',`About`='$description',`Age`='$age',`Status` ='$stat' WHERE `id`='$id'";
    $result=$connection->query($query);
    header('location:adminView.php');
  }
?>