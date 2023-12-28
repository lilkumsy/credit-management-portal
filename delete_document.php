<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 'yes') {
    // Redirect to the login page if not logged in
    header('Location: index.php');
    exit;
}

// Include the database connection
include 'connection.php';

// Access user details from session variables
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];

// Handle document deletion
if (isset($_GET['did'])) {
    $documentID = $_GET['did'];

    // Verify ownership of the document (optional, adjust as needed)
    $verifyQuery = "SELECT * FROM docunments WHERE did = ? AND userid = ?";
    $verifyStmt = mysqli_prepare($conn, $verifyQuery);
    mysqli_stmt_bind_param($verifyStmt, "ss", $documentID, $userid);
    mysqli_stmt_execute($verifyStmt);
    $verifyResult = mysqli_stmt_get_result($verifyStmt);

    if ($verifyRow = mysqli_fetch_array($verifyResult)) {
        // Document ownership verified, perform deletion
        $deleteQuery = "DELETE FROM docunments WHERE did = ?";
        $deleteStmt = mysqli_prepare($conn, $deleteQuery);
        mysqli_stmt_bind_param($deleteStmt, "s", $documentID);

        if (mysqli_stmt_execute($deleteStmt)) {
            echo "<script>alert('Document deleted successfully.')</script>";
        } else {
            echo "<script>alert('Unable to delete document: " . mysqli_error($conn) . "')</script>";
        }

        // Close the statement
        mysqli_stmt_close($deleteStmt);
    } else {
        echo "<script>alert('You do not have permission to delete this document.')</script>";
    }

    // Redirect to the document list page or any other page after deletion
    header('Location: viwalldocunments.php');
    exit;
}
?>
