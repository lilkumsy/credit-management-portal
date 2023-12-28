<?php 
include 'connection.php';
?>
		<table  border="">		
           <tr bgcolor="">
            <th>remark id</th>
			<th>userid</th>
			<th>remark</th>
            <th>application Id </th>
            <th>date created</th>
            </tr>
            <?php
	// 	
            $query="SELECT * FROM remarks";
            $result=  mysqli_query($conn,$query);
            while /*($row= mysqli_fetch_array($result)&&*/
			($row = mysqli_fetch_array($result)){  
            ?>
            <tr bgcolor="">
				<td><?php echo $row["rid"];?></td>			
                <td><?php echo $row["userid"];?></td>
				<td><?php echo $row["remark"];?></td>
                <td><?php echo $row["appid"];?></td>
                <td><?php echo $row["dcrted"];  ?></td>
				
            </tr>
			 <?php 
			}
			 ?>
		 </table>
				   
                    