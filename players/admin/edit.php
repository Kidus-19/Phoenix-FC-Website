<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="edit.css"> <!-- Link to external CSS file -->
</head>
<body>
<?php
  // Include the database connection file
  include('../../connect.php');
  $conn = new connect; // Create a new connection object
  $connection = $conn->getConn(); // Get the connection
  
  // Check if the connection is successful
  if(!$conn){
    die('error' . mysqli_connect_error()); // Terminate script on error
  }

  // Check if 'id' is set in the URL
  if (isset($_GET['id'])) {
      $id = $_GET['id']; // Get the ID from the URL
      // Prepare the SQL query to fetch team member details
      $query = "SELECT * FROM team WHERE id = $id";
      $result = $connection->query($query); // Execute the query
      $row = $result->fetch_assoc(); // Fetch the result as an associative array

      echo '<div class="wrapper">'; // Start the wrapper div
      echo "<form method='post' action='update.php' enctype='multipart/form-data'>"; // Start the form
      echo "<input type='hidden' name='id' value='" . $row['id'] . "'>"; // Hidden input for ID

      // Input for first name
      echo "<label>First Name</label><br> <input type='text' name='fname' pattern='[A-Za-z]+' value='" . $row['FName'] . "'><br>";
      // Input for last name
      echo "<label>Last Name</label><br><input type='text' name='lname' pattern='[A-Za-z]+' value='" . $row['LName'] . "'><br>";
      // Input for age
      echo "<label>Age</label><br> <input type='number' min='17' max='50' name='age' value='" . $row['Age'] . "'><br>";
      // Textarea for description
      echo "<label>Description</label><br><textarea name='description' cols='30' rows='10'>" . $row['About'] . "</textarea><br>";
      // Input for image upload
      echo "<label>Image:</label>";
      echo "<input type='file' required name='image'><br>";
      // Uncomment to show existing image
      // echo "<img src='../images/" . $row['PicLocation'] . "'><br>";

      // Dropdown for status selection
      echo "<label>Status</label><select name='status'>";
      echo "<option value='goalkeeper'>Goal Keeper</option>";
      echo "<option value='defender'>Defender</option>";
      echo "<option value='midfielder'>Midfielder</option>";
      echo "<option value='forward'>Forward</option>";
      echo "</select><br>"; // Close the select element

      // Submit button
      echo "<input type='submit' name='submit' value='Submit'>";
      echo "</form>"; // End the form
      echo '</div>'; // End the wrapper div
  }
?>
</body>
</html>
