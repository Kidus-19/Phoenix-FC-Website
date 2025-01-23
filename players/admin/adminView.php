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
        // Include the database connection file
        include('../../connect.php');

        // Create an instance of the connection class and establish a connection
        $conn = new connect;
        $connection = $conn->getConn();

        // Check if the connection was successful
        if (!$conn) {
            die('Error: ' . mysqli_connect_error()); // Display error if the connection fails
        }

        // Query to fetch all records from the "team" table
        $query = "SELECT * from team";
        $result = $connection->query($query);

        // Check if the query execution was successful
        if (!$result) {
            die('Error: ' . mysqli_connect_error()); // Display error if query fails
        } else {
            // Check if any records were returned
            if ($result->num_rows > 0) {
                // Start generating the table with appropriate headers
                echo '<table border="1" cellspacing="1" cellpadding="5">';
                echo '<th class="id">ID</th>'; // Table header for ID
                echo '<th class="fname">First Name</th>'; // Table header for First Name
                echo '<th class="lname">Last Name</th>'; // Table header for Last Name
                echo '<th class="imag">Photo</th>'; // Table header for Photo
                echo '<th class="desc" colspan="1">Description</th>'; // Table header for Description
                echo '<th class="age">Age</th>'; // Table header for Age
                echo '<th class="status">Status</th>'; // Table header for Status
                echo '<th class="operation" colspan="2">Operation</th>'; // Table header for Edit/Delete Operations

                // Loop through each record and display it as a row in the table
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>'; // Start a new table row

                    // Display data for each column
                    echo '<td>' . $row['id'] . '</td>'; // ID
                    echo '<td>' . $row['FName'] . '</td>'; // First Name
                    echo '<td>' . $row['LName'] . '</td>'; // Last Name

                    // Display photo with dynamic path
                    echo '<td class="imag">' . '<img src=" ../images/' . $row['PicLocation'] . '"</td>';

                    // Display description in a disabled textarea
                    echo '<td class="desc"><textarea disabled name="" id="" cols="10" rows="5">' . $row['About'] . '</textarea></td>';

                    echo '<td>' . $row['Age'] . '</td>'; // Age
                    echo '<td>' . $row['Status'] . '</td>'; // Status

                    // Edit and Delete operations with dynamic links
                    echo "<td class='edit'><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
                    echo "<td class='delete'><a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";

                    echo '</tr>'; // End table row
                }

                echo '</table>'; // End table
            } else {
                // Display message if no records were found
                echo "No data found.";
            }
        }
        ?>
    </div>
</body>

</html>
