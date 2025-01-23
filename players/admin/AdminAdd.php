<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Data</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <div class="wrapper">
        <!-- Form for adding new team members -->
        <form action="AdminAdd.php" method="post" enctype="multipart/form-data">
            <h3>First Name</h3>
            <input class="fname" pattern="[A-Za-z]+" required type="text" name="fname"><br>
            
            <h3>Last Name</h3>
            <input class="lname" pattern="[A-Za-z]+" required type="text" name="lname"><br>
            
            <h3>Age</h3>
            <input class="age" required type="number" name="age" min="17" max="50"><br>
            
            <h3>Description</h3>
            <textarea class="description" name="about" cols="30" rows="10"></textarea><br>
            
            <h3>Image</h3>
            <input class="images" required type="file" name="image"><br>
            
            <h3>Status</h3>
            <select name="status">
                <option value="goalkeeper">GOAL KEEPER</option>
                <option value="defender">DEFENDER</option>
                <option value="midfilder">MIDFIELDER</option>
                <option value="forward">FORWARD</option>
            </select><br>

            <input class="submit" type="submit" name="submit" value="Send">
        </form>
    </div>
</body>
</html>

<?php
// Include database connection file
include('../../connect.php');

// Instantiate connection class
$conn = new connect;
$connection = $conn->getConn();

// Check for a successful connection
if(!$conn) {
    die('error' . mysqli_connect_error());
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Collect form data and file upload
    $image = $_FILES['image']['name'];
    $fname = $_POST['fname']; 
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $description = $_POST['about'];
    $stat = $_POST['status'];

    // Prepare SQL query to insert data into the team table
    $query = "INSERT INTO team VALUES('', '$fname', '$lname', '$image', '$description', '$age', '$stat')";
    
    // Check if the query is well-formed (not true, but checking if it runs)
    if($query) {
        // Move uploaded file to the specified directory
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/$image");
        echo '<script>alert("Successfully added")</script>';
        // Optionally redirect to admin page after successful addition
        // header('location:../admin');
    }

    // Execute the query and check for errors
    $result = $connection->query($query);
    if(!$result) {
        die('error' . mysqli_connect_error());
    } else {
        // Optionally confirm successful data addition
        // echo 'Data successfully added';
    }
}
?>
