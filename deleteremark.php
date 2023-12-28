<?php 
			  
				include 'connection.php';
				if(isset($_POST['submit'])){
				$ridd=$_POST['rid'];
				$del=mysqli_query($conn,"DELETE FROM remarks WHERE rid='$ridd'");
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
				<td>Remark Id</td>
				<td><input type="text" name="rid"  ></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" name="submit"  value="REMOVE RECORD"></td>
				</tr>
				</table>
				</center>
				</form>