<?php 
include 'connection.php';
?>
		<table  border="">		
           <tr>
            <th>USER ID</th>
			<th>FULL NAME</th>
			<th>PHONE NUMBER</th>
            <th>EMAIL</th>
            <th>BVN</th>
			<th>PERMANENT ADDRESS</th>
			<th>PASSWORD</th> 
			<th>ROLE</th>
			<th>DATE ADDED</th>
            </tr>
            <?php
	//userid 	fullname 	
	//pheno 	mail 	bvn 	permaddress 	pass 	darted 	role 		
            $query="SELECT * FROM users";
            $result=  mysqli_query($conn,$query);
            while /*($row= mysqli_fetch_array($result)&&*/
			($row = mysqli_fetch_array($result)){  
            ?>
            <tr bgcolor="">
				<td><?php echo $row["userid"];?></td>			
                <td><?php echo $row["fullname"];?></td>
				<td><?php echo $row["pheno"];?></td>
                <td><?php echo $row["mail"];?></td>
                <td><?php echo $row["bvn"];  ?></td>
				<td><?php echo $row["permaddress"]; ?></td>
				<td><?php echo $row["pass"]; ?></td>
				<td><?php echo $row["role"]; ?></td>
				<th><?php echo $row["darted"]; ?></th>
            </tr>
			 <?php 
			}
			 ?>
		 </table>
				   
                    