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

if(isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
	$appidd = mysqli_real_escape_string($conn, $_POST['appid']);
	$doc=$_FILES['docunment']['name'];
    $userid=$_SESSION['userid'];
    $did = rand();
    $dcrt = date("Y-m-d H:i:s");
	
    // File Upload Logic
    $target = "upload_docunments/".$doc;
	move_uploaded_file($_FILES['docunment']['tmp_name'], $target);
	
    if (!empty($title) && !empty($desc) && !empty($name)) {
            //  did 	title 	description 	
			//filename 	staffname 	userid 	dcrted 	appid 	
            $query = "INSERT INTO docunments VALUES ('$did','$title','$desc','$doc','$name','$userid','$dcrt','$appidd')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>alert('docunment Successfully Uploaded.')</script>";
		}else{
			echo "<script>alert('cannot Upload document due to:".mysqli_error($conn).')</script>';
	}
}
else{
	echo "enter required fields";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>docunment Upload</title>
</head>
<body>

<section id="mu-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-gallery-area">
                    <div class="mu-gallery-content">
                        <div class="mu-gallery-top"> 
                            <center>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <table>
                                        <tr>
                                            <td>TITLE OF DOCUMENT</td>
                                            <td><input type="text" name="title" required /></td>
                                        </tr>
                                        <tr>
                                            <td>DESCRIPTION</td>
                                            <td><input type="text" name="desc" required /></td>
                                        </tr>
                                        <tr>
                                            <td>UPLOAD DOCUMENT</td>
                                            <td><input type="file" name="docunment" required /></td>
                                        </tr>
                                        <tr>
                                            <td>NAME</td>
                                            <td><input type="text" name="name" required /></td>
                                        </tr>
										<tr>
                                            <td>APPLICATION TRACKIN NUMBER</td>
                                            <td><input type="text" name="appid" required /></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="submit" name="submit" value="Upload Document"></td>
                                        </tr>
                                    </table>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
