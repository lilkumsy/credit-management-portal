<?php
include 'connection.php';
if(isset($_POST['submit'])){
$designation=$_POST['designation'];
$approvaltype=$_POST['approvaltype'];
$coment=$_POST['comment'];
$apprvid=rand();
$userid='';//autogenerated from session login
$appid='';//autogenerated from session login
$dcrt=date("Y-m-d H:i:s");	
// 	aprvid 	designation 	dcrtedd 	approvaaltype 	comment 	userid 			
if( !empty($designation) && !empty($approvaltype)  && !empty($coment)){	
		$query="insert into approvals values('$apprvid','$designation','$dcrt',
		'$approvaltype','$coment','$userid','$appid')";
		$result=mysqli_query($conn,$query);
		if($result){
			echo "<script>alert('congrats,your status uploaded successfully')</script>";
			//header('Location:index.php');
		}
		else{
			echo "<script>alert('cant add approval,try again:".mysqli_error($conn).')</script>';
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
                <td >Designation</td>
                <td><input type="text" name="designation" required /></td>
                </tr>
                <tr>
                <td >Approval type(MCC OR BCC)</td>
                <td>
				<select id="approvaltype" name="approvaltype" required>
				<option value="MCC">MCC</option>
				<option value="BCC">BCC</option>
				</select>
				</td>
                </tr>
				<tr>
                <td >Comment</td>
                <td><input type="text" name="comment" required /></td>
                </tr>
                <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Add Approval" ></td>
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
 