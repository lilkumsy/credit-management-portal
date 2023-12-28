<?php
$dbname = "cms";
$dbhost = "127.0.0.1";  // Remove the port number
$dbuser = "root";
$dbpass = "";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the connection is successful, you can select the database
$sel = mysqli_select_db($conn, $dbname);

if (!$sel) {
    die("Database selection failed: " . mysqli_error($conn));
}

// If you reach here, the connection and database selection were successful
// You can perform your database operations here

// Close the connection when done
// mysqli_close($conn);
?>
