<?php 
			  
				include 'connection.php';
				if(isset($_POST['submit'])){
				$appidd=$_POST['appid'];
				$del=mysqli_query($conn,"DELETE FROM application WHERE appid='$appidd'");
				if($del){
				echo "records removed successful";	
				}
				else{
					echo "unsucessful removal of records, try again".mysqli_error($conn);
				}
				}
				?>
				<center>
				<form method="post">
				<table>
				<tr>
				<td>Application Tracking Number</td>
				<td><input type="text" name="appid"  ></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" name="submit"  value="DELETE APPLICATION"></td>
				</tr>
				</table>
				</center>
				</form>