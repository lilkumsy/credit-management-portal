<?php
include 'connection.php';
if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$pheno=$_POST['pheno'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$bvn=$_POST['bvn'];
$addres=$_POST['address'];
$role='applicant';
$userid=rand();
$dcrt=date("Y-m-d H:i:s");
//userid 	
//fullname 	pheno 	mail 	bvn 	permaddress 	pass 	darted 	role 		
if( !empty($fname) && !empty($pheno)  && !empty($mail)  && !empty($pass)){	
		$query="insert into users values('$userid','$fname','$pheno','$mail',
		'$bvn','$addres','$pass','$dcrt','$role')";
		$result=mysqli_query($conn,$query);
		if($result){
			echo "<script>alert('congrats,you can now login using your email and password')</script>";
			//header('Location:index.php');
		}
		else{
			echo "<script>alert('user not added,try again:".mysqli_error($conn).')</script>';
	}
}
else{
	echo "enter required fields";
	}
}
?>


<html lang="en"> 
<head>
    <title>CREDIT MANAGEMENT PORTAL</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="CREDIT MANAGEMENT PORTAL">
    <meta name="author" content="Ayua Kuma Simon">    
    <link rel="shortcut icon" href="logo.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Sign up to CRM</h2>					
	
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" action='' method="post">         
							<div class="email mb-3">
								<label class="sr-only" for="Full Name">Full Name</label>
								<input id="FullName" name="fname" type="text" class="form-control signup-text" placeholder="Full name" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="Phone Number">Phone Number</label>
								<input id="pheno" name="pheno" type="text" class="form-control signup-text" placeholder="Phone Number" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="email">Email</label>
								<input id="mail" name="mail" type="text" class="form-control signup-text" placeholder="Email" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-password">Password</label>
								<input id="signup-password" name="pass" type="text" class="form-control signup-password" placeholder="Password" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="bvn">BVN</label>
								<input id="bvn" name="bvn" type="text" class="form-control signup-text" placeholder="BVN" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="Permanent Address">Permanent Address</label>
								<input id="permadress" name="address" type="text" class="form-control signup-text" placeholder="Permanent Address" required="required">
							</div>
							<div class="text-center">
								<input type="submit" name="submit" value="SIGN UP" class="btn app-btn-primary w-100 theme-btn mx-auto">
								
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="index.php" >Log in</a></div>
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			        <small class="copyright"><span class="sr-only"></span>
			 <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">
			</a></small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">All rights Reserved.Powered by INFINITY TRUST MORTGAGE BANK</h5>
					    <div><a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/"></a></div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

