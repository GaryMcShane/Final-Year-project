<?php include '../database/db_connect.php'; 

//This page will simply pull back all the products from the database and display these on the page. The admin can then go ahead and update or delete the product which will run another script

$sql = "SELECT * FROM Products ORDER BY Product_ID DESC";

$result = $conn->query($sql);

include '../includes/AdminHeader.php';
?>
	
	<div class="container">
		<div class="bs-docs-section">
		
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
					  <h1 id="forms">Update Products:</h1>
					  <p align="justify">You can update rental price of products by changing below and clicking Update!</p>
					  <p align="justify">Products can also be removed from the system by clicking Remove.</p>
					</div>
				 </div>
			</div>
			
			<div class="bs-component">
				<table class="table table-striped table-hover ">
					<thead>
					<tr>
						<th>ID:</th>
						<th>Title</th>
						<th>Description</th>
						<th>Type</th>
						<th>Rating</th>
						<th>Price (&pound;)</th>
						<th>Price (&euro;)</th>
						<th>Image</th>
					</tr>
					
					<?php
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?>  
					
					</thead>
					<tbody>
					<form action="prodUpdateProc.php?ProductID=<?php echo$row['Product_ID']; ?>" method="POST">
						<tr width="100%">
							<td width="10%"><?php echo $row["Product_ID"]; ?></td>
							<td width="20%"><?php echo $row["Title"]; ?></td>
							<td width="30%"><?php echo $row["Description"]; ?></td>
							<td width="10%"><?php echo $row["Type"]; ?></td>
							<td width="10%"><?php echo $row["Rating"]; ?></td>
							<td width="10%"><input type="decimal" class="form-control" value="<?php echo $row["Price"]; ?>" name="Price"></td>
							<td width="10%"><input type="decimal" class="form-control" value="<?php echo $row["ePrice"]; ?>" name="ePrice"></td>
							<td width="10%"><img src="../images/<?php echo $row["Image"]; ?>" alt="<?php echo $row["Title"]; ?>" 
							style="width:120px;height:130px;"></td>
							<td>
								<button type="submit" class="btn btn-primary btn-sm">Update</button>
								<p class="divider"><p>
								<input type=button onClick="location.href='removeProduct.php?ProdID=<?php echo$row['Product_ID']; ?>'" class="btn btn-danger btn-sm" value='Delete'>
							</td>
						</tr>
					</form>
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