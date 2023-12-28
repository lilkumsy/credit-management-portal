				<?php 			  
				include 'connection.php';
				if(isset($_POST['submit'])){
				$userid=$_POST['userid'];
				$del=mysqli_query($conn,"DELETE FROM users WHERE userid='$userid'");
				if($del){
				echo "<script>alert('records removed successful');</script>";	
				}
				else{
					echo "unsucessful removal of records, try again".mysqli_error($conn);
				}
				}
				?>
				<center>
				<form method="post" action=''>
				<table>
				<tr>
				<td>User Id</td>
				<td><input type="text" name="userid"  ></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" name="submit"  value="REMOVE RECORD"></td>
				</tr>
				</table>
				</form>
				</center>