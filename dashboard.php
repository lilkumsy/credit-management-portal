<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 'yes') {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit;
}

// Include the database connection
include 'connection.php';

// Access user details from session variables
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];

// Fetch additional details from the database
$query = "SELECT * FROM users WHERE userid = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $userid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if a user is found
if ($row = mysqli_fetch_assoc($result)) {
    // Access additional details
    $fullname = $row['fullname'];
    $address = $row['permaddress'];
    $bvn = $row['bvn'];
} else {
    // Handle the case where the user is not found
    echo "User not found.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<!-- Your dashboard HTML content here -->
<center>
<h1>Welcome to your Dashboard, <?php echo $fullname; ?>!</h1>

<a href='application.php'>apply for mortgage loan</a>|<a href='upload_docunment.php'>upload docunments</a>|<a href='searchquery.php'>search loan status</a>
<a href='logout.php'>Logout</a>
</center>
</body>
</html>
