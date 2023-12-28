<?php 
include 'connection.php';
?>
		<table  border="">		
           <tr bgcolor="">
            <th>APROVAL ID</th>
			<th>STAFF NAME</th>
			<th>POSITION OF STAFF</th>
            <th>APPROVAL TYPE</th>
            <th>COMMENT</th>
			<th>APPLICATION TRACKING NUMBER</th>
			<th>DATE OF APPROVAL</th>
			 
            </tr>
            <?php
	//aprvid 	designation 	
	//dcrtedd 	approvaaltype 	comment 	userid 	appid 	
            $query="SELECT * FROM approvals";
            $result=  mysqli_query($conn,$query);
            while /*($row= mysqli_fetch_array($result)&&*/
			($row = mysqli_fetch_array($result)){  
            ?>
            <tr bgcolor="">
				<td><?php echo $row["aprvid"];?></td>			
                <td><?php echo $row["userid"];?></td>
				<td><?php echo $row["designation"];?></td>
                <td><?php echo $row["approvaaltype"];?></td>
                <td><?php echo $row["comment"];  ?></td>
				<td><?php echo $row["appid"]; ?></td>
				<td><?php echo $row["dcrtedd"]; ?></td>
            </tr>
			 <?php 
			}
			 ?>
		 </table>
				   
                    