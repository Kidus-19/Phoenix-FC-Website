<?php
$id=$_REQUEST['id'];
$name=$_GET['name'];
include('../connect.php');
$conn=new Connect;
$connect2=$conn->getConnection();
$sql="delete from merch where id='$id'";
$result=$connect2->query($sql);
if($result)
{
    header('location:admin.php');
}

?>