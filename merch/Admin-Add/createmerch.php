
<?php
include('../connect.php');
$conn=new Connect;
if (isset($_POST['Submit'])) {

    $name = $_POST['txtName'];

    $price = $_POST['txtPrice'];

    $image = $_POST['filename'];


    $sql = "INSERT INTO `merch`(`name`, `price`, `PicLocation`) VALUES ('$name','$price','$image')";
    $connect2=$conn->getConnection();
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            if (!preg_match ("/^([a-zA-Z' ]+)$/", $name) ) {  
                        echo '<script type="text/javascript">';
                        echo 'alert("Only alphabets and whitespace are allowed at Name.");';  
                        echo 'window.location.href = "../Admin-Add/add.html";';
                        echo '</script>';

            }
            else if (!preg_match ("/^[0-9]*$/", $price) ) {  
                $ErrMsg = "Only numeric value is allowed at Price.";  
                        echo '<script type="text/javascript">';
                        echo 'alert("'.$ErrMsg.'");';
                        echo 'window.location.href = "../Admin-Add/add.html";';
                        echo '</script>';

            }
            else{
              $result = $connect2->query($sql);
              echo '<script type="text/javascript">'; 
              echo 'alert("New Merch Created Successfully!");'; 
              echo 'window.location.href = "../Admin/admin.php";';
              echo '</script>';
            }
    }

    $connect2->close(); 

  }
?>