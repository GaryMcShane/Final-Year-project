<!DOCTYPE html>

<?php 
//Again this page is connecting to the database and getting the session ID of the logged in user 
include 'database/db_connect.php'; 
session_start();
$UserID = $_SESSION['userID'];

$sql = "SELECT * FROM customer WHERE id = ". $UserID;
$custResult = $conn->query($sql);

//This product data can be SELECTed here according to the category type.. in his case it is for Construction
$sql = "SELECT * FROM Products WHERE Category='construction' ORDER BY Product_ID DESC";
$result = $conn->query($sql);

include 'includes/header.php'; 
?>


    <div class="container">

		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="forms"><img src="images/AgriCTitle.jpg" width="210" height="35"> Construction!</h1>
				</div>
			</div>
		</div>
		
	  
	  <div class="bs-component">
		<table class="table table-home ">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Type</th>
					<th>Rating</th>
					<th>Rental Price (per day)</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			
			<?php
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?>  
			<tr width="100%">
				<td width="10%"> <a href="bookProduct.php?id=<?php echo$row['Product_ID']; ?>"> <?php echo $row["Title"]; ?> </a></td>
                <td width="50%"> <?php echo $row["Description"]; ?> </td>
				<td width="5%"> <?php echo $row["Type"]; ?> </td>
				<td width="10%"> <?php echo $row["Rating"]; ?> </td>
				<td width="20%"> <?php echo "£". $row["Price"]; ?> </td>
				<td width="20%"> <?php echo "€". $row["ePrice"]; ?> </td>
				<td width="5%"> <a href="bookProduct.php?id=<?php echo$row['Product_ID']; ?>"><img src="images/<?php echo $row["Image"]; ?>" alt="<?php echo $row["Title"]; ?>" 
				style="width:120px;height:130px;"></a> </td>
			</tr>
			<tr>
				<td></td>
			</tr>
			</tbody>
			
			<?php
			
			}
			} else{
				echo "0 results";
}
$conn->close();
?> 
		</table> 
	</div>
<?php include 'includes/footer.php'; ?>
