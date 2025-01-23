<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
            <?php
               include('../../connect.php');
               
               $conn = new connect;
               $connection = $conn->getConn();
                  if(!$conn){
                      die('error'.mysqli_connect_error());
                     }
                 $query="SELECT `id`,`PicLocation`,`Status`,`FName`,`LName` FROM `team` WHERE `id`>0";

                  $result=$connection->query($query);
                   $data = [];
                   if($result->num_rows>0){
    
              while($row=$result->fetch_assoc()){
                      $data[]=$row;
                         } 
                         }

              if(isset($data)){
                        
                        
                         echo '<div class="container">';
                         echo '<h1>'.'GOALKEEPERS'.'</h1>';
                         echo '<div class="gk" >';
                
                   foreach($data as $img){
                            $status = $img['Status'];
                            $id=($img['id']);
                            $class=$status;
                            $class_name="item-".$id;
                           if($status=='goalkeeper'){
                            echo'<div class="'.$class_name.'">';
                            echo'<a href="DetailPage.php?id='.$id.'"><img  src="../images/'.$img['PicLocation']. '" class="' . $class . '" /></a>';
                            echo'<h3>'.$img['FName'].' '.' '.$img['LName'].'</h3>';
                            echo'</div>';
                           
                            
                           }  
                        }
                         
                         echo'</div>';
        
                        echo '<h1>'.'DEFENDERS'.'</h1>';
                         echo '<div class="def">';
                         
                        foreach($data as $img){
                            $status = $img['Status'];
                            $id=$img['id'];
                            $class_name="item-".$id;
                            $class=$status;
                           if($status=='defender'){
                           echo'<div class="'.$class_name.'">';
                            echo'<a href="DetailPage.php?id='.$id.'"><img src="../images/'.$img['PicLocation']. '" class="' . $class . '" /></a>';
                            echo'<h3>'.$img['FName'].' '.' '.$img['LName'].'</h3>';
                            echo'</div>';
                           
                            
                           }  
                        }
            
                        echo '</div>';
                        echo '<h1>'.'MIDFIELDERS'.'</h1>';
                        echo'<div class="mid">';
                        foreach($data as $img){
                            $status = $img['Status'];
                            $id=$img['id'];
                            $class_name="item-".$id;
                            $class=$status;
                           if($status=='midfilder'){
                            echo'<div class="'.$class_name.'">';
                            echo'<a href="DetailPage.php?id='.$id.'"><img  src="../images/'.$img['PicLocation']. '" class="' . $class . '" /></a>';
                            echo'<h3>'.$img['FName'].' '.' '.$img['LName'].'</h3>';
                            echo'</div>';
                           
                            
                           }  
                        }
                        
                        echo '</div>';
                        echo '<h1>'.'FORWARDS'.'</h1>';
                        echo'<div class="forw">';
                        foreach($data as $img){
                            $status = $img['Status'];
                            $id=$img['id'];
                            $class_name="item-".$id;
                            $class=$status;
                           if($status=='forward'){
                              echo'<div class="'.$class_name.'">';
                            echo'<a href="DetailPage.php?id='.$id.'"><img id=" pictures" src="../images/'.$img['PicLocation']. '" class="' . $class . '" /></a>';
                            echo'<h3>'.$img['FName'].' '.' '.$img['LName'].'</h3>';
                            echo'</div>';
                           
                            
                           }  
                        }
                        
                        echo'</div>';
                       

                        
                     } 

            ?>
</body>
</html>







 