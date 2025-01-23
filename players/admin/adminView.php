<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminView.css">
</head>
<body>
<div class="cont">
<?php
    include('../../connect.php');
    $conn = new connect;
    $connection = $conn->getConn();
if(!$conn){
    die('error'.mysqli_connect_error());
}
$query = "SELECT * from team";
$result=$connection->query($query);

    if(!$result){
        die('error'.mysqli_connect_error());
    }
    else{
        if($result->num_rows > 0) 
        {
             echo '<table  border="1", cellspacing="1", cellpadding="5">';
             echo '<th class="id">'.'id'.'</th>';
             echo '<th class="fname">'.'first name'.'</th>';
             echo '<th class="lname">'.'last name'.'</th>';
             echo '<th class="imag">'.'photo'.'</th>';
             echo '<th class="desc"colspan="1">'.'description'.'</th>';
             echo '<th class="age">'.'age'.'</th>';
             echo '<th class="status">'.'status'.'</th>';
             echo '<th class="operation" colspan="2">'.'operation'.'</th>';


            while($row =$result->fetch_assoc()){
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['FName'].'</td>';
                echo '<td>'.$row['LName'].'</td>';
                echo '<td class="imag">'.'<img src=" ../images/'.$row['PicLocation'].'"</td>';
                echo '<td class="desc"><textarea disabled name="" id="" cols="10" rows="5">'.$row['About'].'</textarea></td>';
                echo '<td>'.$row['Age'].'</td>';
                echo '<td>'.$row['Status'].'</td>';

                echo "<td class='edit'><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "<td class='delete'><a href='delete.php?id=" . $row['id'] . "' 
                          onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";
             echo "</tr>";
                
               
            
            }
            echo '</table>';
            
        } else {
            echo "No data found.";
        }
    }
    ?>
</div>


</body>
</html>
