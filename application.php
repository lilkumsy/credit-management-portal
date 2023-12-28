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


if(isset($_POST['submit'])) {
    $bvn = mysqli_real_escape_string($conn, $_POST['bvn']);
    $loanamount = mysqli_real_escape_string($conn, $_POST['loanamount']);
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
	$loanfacility = mysqli_real_escape_string($conn, $_POST['loantype']);
    $accountofficer = mysqli_real_escape_string($conn, $_POST['accountofficer']);
    $unitname = mysqli_real_escape_string($conn, $_POST['unitname']);
	$empname = mysqli_real_escape_string($conn, $_POST['emname']);
    $empdate = mysqli_real_escape_string($conn, $_POST['empdate']);
    $jobdesc = mysqli_real_escape_string($conn, $_POST['jobdesc']);
	$salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $oincome = mysqli_real_escape_string($conn, $_POST['oincome']);
    $tenor = mysqli_real_escape_string($conn, $_POST['tenor']);
	$pdesc = mysqli_real_escape_string($conn, $_POST['pdesc']);
    $cprop = mysqli_real_escape_string($conn, $_POST['cprop']);
    $plocation = mysqli_real_escape_string($conn, $_POST['ploc']);
	$econtr = mysqli_real_escape_string($conn, $_POST['econtr']);
    $pequity = mysqli_real_escape_string($conn, $_POST['pequity']);
    $irates = mysqli_real_escape_string($conn, $_POST['irates']);
	$pduration = mysqli_real_escape_string($conn, $_POST['pduration']);
	$rpsource = mysqli_real_escape_string($conn, $_POST['rpsouce']);
	$ofee = mysqli_real_escape_string($conn, $_POST['ofee']);
    $appid = rand();
    $dcrt = date("Y-m-d H:i:s");
	$userid=$_SESSION['userid'];
    if (!empty($bvn) && !empty($loanamount) && !empty($purpose)) {
			 	
            $query = "INSERT INTO application VALUES ('$appid','$userid','$bvn',
			'$loanamount','$purpose','$accountofficer','$unitname',
			'$loanfacility','$empname','$empdate','$jobdesc','$salary',
			'$oincome','$tenor','$pduration','$pdesc','$cprop','$plocation',
			'$econtr','$pequity','$irates','$ofee','$rpsource','$dcrt','',
			'$ofee','','')";
            $result = mysqli_query($conn, $query);
			
			if($result){
			echo "<script>alert('congrats,application recieved successfully with application tracking number:$appid')</script>";
			echo "<script>alert('proceed to next step by clicking on upload and uploading supporting docunments.thank you')</script>";
			//header('location:dashboard.php');
			//header('Location:index.php');
			}
			else{
			echo "<script>alert('cant add USER,try again:".mysqli_error($conn).')</script>';
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
    <title>APPLICATION</title>
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
                                <form method="post" action="" >
                                    <table>
                                        <tr>
                                            <td>BVN</td>
                                            <td><input type="text" name="bvn" ></td>
                                        </tr>
                                        <tr>
                                            <td>LOAN AMOUNT REQUESTED</td>
                                            <td><input type="text" name="loanamount" ></td>
                                        </tr>
                                        <tr>
                                            <td>PURPOSE FOR LOAN</td>
											<td>
                                            <select id="" name="purpose" >
											<option value="Real Estate Development">Real Estate Development</option>
											<option value="Hotel/Resort Development">Hotel/Resort Development</option>
											<option value="Shopping Center Development">Shopping Center Development</option>
											<option value="Factory Development">Factory Development</option>
											<option value="Resource Development">Resource Development</option>
											<option value="Refinancing Existing Debt">Refinancing Existing Debt</option>
											<option value="Others">Others</option>
											</select>
											</td>
                                        </tr>
                                        <tr>
                                            <td>LOAN FACILITY/TYPE</td>
                                            <td>
											<select id="" name="loantype" >
											<option value="MORTGAGE">MORTGAGE</option>
											<option value="EQUITY">EQUITY</option>
											<option value="JOINT VENTURE">JOINT VENTURE</option>
											<option value="BANK GUARANTEE">BANK GUARANTEE</option>
											<option value="OTHERS">OTHERS</option>
											</select>
											</td>
                                        </tr>
										<tr>
                                            <td>ACCOUNT OFFICER</td>
                                            <td>
											<select id="" name='accountofficer' >
											<option value="ERIC OKAFOR">ERIC OKAFOR</option>
											<option value="WOLESIMI J.">WOLESIMI J.</option>
											<option value="EMMANUEL SLYVESTER">EMMANUEL SLYVESTER</option>
											<option value="DIKE LOVELYN">DIKE LOVELYN</option>
											<option value="OMONIGHO CELESTINE">OMONIGHO CELESTINE</option>
											</select>
											</td>
                                        </tr>
										<tr>
                                            <td>UNIT NAME</td>
                                            <td>
											<select id="" name="unitname" >
											<option value="HEAD OFFICE">HEAD OFFICE</option>
											<option value="SBU 1">SBU 1</option>
											<option value="SBU 2">SBU 2</option>
											<option value="SUNCITY">SUNCITY</option>
											<option value="MARARABA">MARARABA</option>
											<option value="ILUPEJU SBU 1">ILUPEJU SBU 1</option>
											<option value="ILUPEJU SBU 2">ILUPEJU SBU 2</option>
											</select>
											</td>
                                        </tr>
										<tr>
                                            <td>EMPLOYER NAME</td>
                                            <td><input type="text" name="emname" ></td>
                                        </tr>
										<tr>
                                            <td>EMPLOYMENT DATE</td>
                                            <td><input type="date" name="empdate" ></td>
                                        </tr>
										<tr>
                                            <td>JOB DESCRIPTION</td>
                                            <td><input type="text" name="jobdesc" ></td>
                                        </tr>
										<tr>
                                            <td>SALARY(MONTHLY)</td>
                                            <td><input type="text" name="salary" ></td>
                                        </tr>
										<tr>
                                            <td>OTHER INCOME</td>
                                            <td><input type="text" name="oincome" ></td>
                                        </tr>
										<tr>
                                            <td>TENOR</td>
                                            <td><input type="text" name="tenor" ></td>
                                        </tr>
										<tr>
                                            <td>PROJECT DURATION</td>
                                            <td><input type="text" name="pduration" ></td>
                                        </tr>
										<tr>
                                            <td>PROPERTY DESCRIPTION</td>
                                            <td><input type="text" name="pdesc" ></td>
                                        </tr>
										<tr>
                                            <td>COST OF PROPERTY</td>
                                            <td><input type="text" name="cprop" ></td>
                                        </tr>
										<tr>
                                            <td>PROPERTY LOCATION</td>
                                            <td><input type="text" name="ploc" ></td>
                                        </tr>
										<tr>
                                            <td>EQUITY CONTRIBUTION</td>
                                            <td><input type="text" name="econtr" ></td>
                                        </tr>
										<tr>
                                            <td>PERCENT EQUITY</td>
                                            <td><input type="text" name="pequity" ></td>
                                        </tr>
										<tr>
                                            <td>INTEREST RATES</td>
                                            <td><input type="text" name="irates" ></td>
                                        </tr>
										<tr>
                                            <td>REPAYMENT SOURCE</td>
                                            <td><input type="text" name="rpsouce" ></td>
                                        </tr>
										<tr>
                                            <td>ORIGINATING FEE</td>
                                            <td><input type="text" name="ofee" ></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="submit" name="submit" value="APPLY FOR LOAN">
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
