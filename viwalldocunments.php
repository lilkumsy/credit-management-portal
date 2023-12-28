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
?>

<table border="1">
    <tr>
        <th>DOCUMENT ID</th>
        <th>DOCUMENT TITLE</th>
        <th>DESCRIPTION</th>
        <th>UPLOADED BY</th>
        <th>USER ID</th>
        <th>DATE DOCUMENT UPLOADED</th>
        <th>APPLICATION TRACKING NUMBER</th>
        <th>FILE</th>
        <th>ACTIONS</th> <!-- New column for actions -->
    </tr>
    <?php
    // Fetch data from the "documents" table
    $query = "SELECT * FROM docunments";
    $result = mysqli_query($conn, $query);

    // Display data in the HTML table
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["did"]; ?></td>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["staffname"]; ?></td>
            <td><?php echo $row["userid"]; ?></td>
            <td><?php echo $row["dcrted"]; ?></td>
            <td><?php echo $row["appid"]; ?></td>
            <td><a href="upload_documents/<?php echo $row["filename"]; ?>" target="_blank">View</a></td>
            <td>
                <a href="edit_document.php?did=<?php echo $row["did"]; ?>">Edit</a> |
                <a href="deletedocument.php?did=<?php echo $row["did"]; ?>" onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
            </td> <!-- Edit and Delete links -->
        </tr>
        <?php
    }
    ?>
</table>
