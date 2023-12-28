<?php 
include 'connection.php';
?>
		<table  border="">		
           <tr bgcolor="">
            <th>Application tracking number</th>
			<th>User</th>
			<th>Loan Facility</th>
            <th>SALARY</th>
            <th>LOAN AMOUNT REQUESTED</th>
			<th>PROPERTY DESCRIPTION</th>
			<th>EQUITY CONTRIBUTION</th>
			<th>INTEREST RATE</th> 
			<th>ORIGINATING FEE</th>
			<th>REPAYMENT SOURCE</th> 
            </tr>
            <?php
	// 	
            $query="SELECT * FROM application";
            $result=  mysqli_query($conn,$query);
            while /*($row= mysqli_fetch_array($result)&&*/
			($row = mysqli_fetch_array($result)){  
            ?>
            <tr bgcolor="">
				<td><?php echo $row["appid"];?></td>			
                <td><?php echo $row["userid"];?></td>
				<td><?php echo $row["loanFacility "];?></td>
                <td><?php echo $row["propertydesc"];?></td>
                <td><?php echo $row["equityContribution"];  ?></td>
				<td><?php echo $row["interestrate"]; ?></td>
				<td><?php echo $row["originationFee"]; ?></td>
				<td><?php echo $row["repaymentSource"]; ?></td>
            </tr>
			 <?php 
			}
			 ?>
		 </table>
				   
                    