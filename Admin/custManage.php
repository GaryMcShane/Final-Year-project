<?php include '../database/db_connect.php'; 

//This page simply pulls back all the customers from the database and displays them.. The admin can then remove a user if they wish by clicking remove which will launch a different script

$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

include '../includes/AdminHeader.php';
?>
	
	<div class="container">
		<div class="bs-docs-section">
		
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
					  <h1 id="forms">Customer Management</h1>
					  <p align="justify">You can view all registered users below and remove them if you wish by clicking Remove User.</p>
					</div>
				 </div>
			</div>
			
			<div class="bs-component">
				<table class="table table-striped table-hover ">
					<thead>
					<tr>
						<th>ID:</th>
						<th>First name:</th>
						<th>Last name:</th>
						<th>DOB:</th>
						<th>Email:</th>
						<th>Password:</th>
						<th>Address:</th>
						<th>Town:</th>
						<th>County:</th>
						<th>Postcode:</th>
						<th>Country:</th>
					</tr>
					
					<?php
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?>  
					
					</thead>
					<tbody>
					<tr>
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["custFirstName"]; ?></td>
						<td><?php echo $row["custLastName"]; ?></td>
						<td><?php echo $row["DOB"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["pword"]; ?></td>
						<td><?php echo $row["address"]; ?></td>
						<td><?php echo $row["town"]; ?></td>
						<td><?php echo $row["county"]; ?></td>
						<td><?php echo $row["pcode"]; ?></td>
						<td><?php echo $row["country"]; ?></td>
						<td><input type=button onClick="location.href='removeCustomer.php?UserID=<?php echo$row['id']; ?>'" class="btn btn-danger btn-sm" value='Remove'></td>
					</tr>
					<?php
			}
			} else{
				echo "0 results";
}
$conn->close();
?> 
					
                </tbody>
              </table> 
            </div>
		</div>
<?php include '../includes/AdminFooter.php'; ?>