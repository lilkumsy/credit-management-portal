<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 'yes') {
    // Redirect to the login page if not logged in
    header('viwalldocunments: index.php');
    exit;
}

// Include the database connection
include 'connection.php';

// Access user details from session variables
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];

// Retrieve document ID from the query parameter
$documentID = isset($_GET['did']) ? $_GET['did'] : null;

// Fetch document details based on the document ID
$query = "delete from  docunments WHERE did = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $documentID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_array($result)) {
    // Document details
    $title = $row["title"];
    $description = $row["description"];
    $filename = $row["filename"];
    $appid = $row["appid"];
    $name = $row["staffname"];
    // Add more fields as needed

    // Check if the user has permission to edit this document
    // You may implement additional checks based on your application logic

} else {
    echo "Document not found.";
    exit;
}

// Handle form submission for updating the document
if (isset($_POST['submit'])) {
    // Sanitize and validate data
    $newTitle = mysqli_real_escape_string($conn, $_POST['title']);
    $newDescription = mysqli_real_escape_string($conn, $_POST['description']);
    // Add more fields as needed

    // Update the document in the database
    $updateQuery = "UPDATE docunments SET title = ?, description = ?, filename = ?, appid = ?, staffname = ? WHERE did = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "ssssss", $newTitle, $newDescription, $filename, $appid, $name, $documentID);

    if (mysqli_stmt_execute($updateStmt)) {
        echo "<script>alert('Document updated successfully.')</script>";
        // Redirect to the document list page or any other page after updating
        header('Location: viwalldocunments.php');
        exit;
    } else {
        echo "<script>alert('Unable to update document: " . mysqli_error($conn) . "')</script>";
    }

    // Close the statement
    mysqli_stmt_close($updateStmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete Document</title>
</head>
<body>

<h2>delete Document</h2>

<form method="post" action="">
    <label for="title">Document id:</label>
    <input type="text" name="did" value="<?php echo $title; ?>" required>
    <br>

    <!-- Add more fields as needed -->

    <input type="submit" name="submit" value="delete Document">
</form>

</body>
</html>
