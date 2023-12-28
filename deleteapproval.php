<?php 
			  
				include 'connection.php';
				if(isset($_POST['submit'])){
				$approvid=$_POST['approvid'];
				$del=mysqli_query($conn,"DELETE FROM approvals WHERE aprvid='$approvid'");
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
				<td>Approval Id</td>
				<td><input type="text" name="approvid"  ></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" name="submit"  value="REMOVE RECORD"></td>
				</tr>
				</table>
				</center>
				</form>