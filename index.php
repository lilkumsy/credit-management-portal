<?php
session_start();
include 'connection.php';
//$roleA="admin";$roleB="applicant";
if(isset($_POST['submit'])){
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$query="select * from users where mail='".$mail."' and pass='".$pass."'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
if(mysqli_num_rows($result)==1){
$_SESSION['role']=$row['role'];
$_SESSION['userid']=$row['userid'];
$role=$row['role'];
   if($role=='admin'){
    $_SESSION['role']=$role;
	$_SESSION['loggedin']='yes';
	$_SESSION['mail']=$mail;
	$_SESSION['userid']=$row['userid'];
    header('Location:dashboard.php');
	exit;      
}
    else{
	if($role=='applicant'){
    $_SESSION['role']=$role;
	$_SESSION['loggedin']='yes';
	$_SESSION['mail']=$mail;
	$_SESSION['userid']=$row['userid'];
    header('Location:dashboard.php');
	exit;
}
    
}
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

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to CMS</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" action="" method="post">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="mail" name="mail" type="email" class="form-control signin-email" placeholder="Email address" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="pass" name="pass" type="password" class="form-control signin-password" placeholder="Password" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" name="submit">Log In</button>
								
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">No Account? Sign up 
						<a class="text-link" href="register.php" >here</a>.</div>
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

