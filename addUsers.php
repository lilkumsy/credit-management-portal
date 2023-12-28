<?php
include 'connection.php';
if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$pheno=$_POST['pheno'];
$mail=$_POST['mail'];
$bvn=$_POST['bvn'];
$pass=$_POST['pass'];
$role=$_POST['approvaltype'];
$adres=$_POST['adres'];
$userid=rand();
$dcrt=date("Y-m-d H:i:s");	
	//userid 	fullname 	pheno 	
	//mail 	bvn 	permaddress 	pass 	darted 	role 			
if( !empty($fname) && !empty($mail)  && !empty($pass)){	
		$query="insert into users values('$userid','$fname','$pheno',
		'$mail','$bvn','$adres','$pass','$dcrt','$role')";
		$result=mysqli_query($conn,$query);
		if($result){
			echo "<script>alert('congrats,USER ADDED successfully')</script>";
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


 <!-- End breadcrumb -->
 <!-- Start gallery  -->
 <section id="mu-gallery">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-gallery-area">
          <!-- start title -->
          
          <!-- end title -->
          <!-- start gallery content -->
          <div class="mu-gallery-content">
            <!-- Start gallery menu -->
            <div class="mu-gallery-top"> 
                <center>
				<form  method='post' action="" >
                <table>
                <tr>
                <td >Full Name</td>
                <td><input type="text" name="fname" required /></td>
                </tr>
                <tr>
                <td >Login Rights</td>
                <td>
				<select id="approvaltype" name="approvaltype" required>
				<option value="applicant">Applicant</option>
				<option value="admin">Admin</option>
				<option value="SMO">SMO</option>
				<option value="GHOPS">GHOPS</option>
				<option value="GHBDU">GHBDU</option>
				<option value="COMPLIANCE">COMPLIANCE</option>
				<option value="RELATIONSHIPOFFICER">RELATIONSHIPOFFICER</option>
				<option value="LEGAL">LEGAL</option>
				<option value="GHLEGAL">GHLEGAL</option>
				<option value="MD-CEO">MD-CEO</option>
				<option value="GHRISK">GHRISK</option>
				<option value="LEGAL">LEGAL</option>
				<option value="CFO">CFO</option>
				<option value="COMMITTEE SECRETARY">COMMITTEE SECRETARY</option>
				</select>
				</td>
                </tr>
				<tr>
                <td >Phone Number</td>
                <td><input type="text" name="pheno" required /></td>
                </tr>
				<tr>
                <td >Email</td>
                <td><input type="text" name="mail" required /></td>
                </tr>
				<tr>
                <td >bvn</td>
                <td><input type="text" name="bvn" required /></td>
                </tr>
				<tr>
                <td >permanent Address</td>
                <td><input type="text" name="adres" required /></td>
                </tr>
				<tr>
                <td >Paasword</td>
                <td><input type="text" name="pass" required /></td>
                </tr>
                <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Add User" ></td>
                </tr>
                </table>
                </form>
                </center>
            </div>
            <!-- End gallery menu -->
            
          </div>
          <!-- end gallery content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 