<?php
include 'connection.php';
if(isset($_POST['submit'])){
$userid=$_POST['userid'];
$rmk=$_POST['rmk'];
$appid=$_POST['appid'];
$rid=rand();
$dcrt=date("Y-m-d H:i:s");	
	//			
if( !empty($userid) && !empty($rmk)  && !empty($appid)){	
		$query="insert into remarks values('$rid','$userid','$rmk',
		'$appid','$dcrt')";
		$result=mysqli_query($conn,$query);
		if($result){
			echo "<script>alert('thanks for passing your comment about this mortgage loan application')</script>";
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
                <td >User Id</td>
                <td><input type="text" name="userid" required /></td>
                </tr>
				<tr>
                <td >Remark</td>
                <td><input type="text" name="rmk" required /></td>
                </tr>
				<tr>
                <td >Application Tracking Number</td>
                <td><input type="text" name="appid" required /></td>
                </tr>
                <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Add Remark" ></td>
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
 