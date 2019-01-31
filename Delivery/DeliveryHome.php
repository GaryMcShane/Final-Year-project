<!DOCTYPE html>

<?php include '../database/db_connect.php';
session_start();

//If the delivery persons details are correct then they are redirected to this delivery home page.
//From here they can then click several buttons which will allow them to manage customers, manage products or logout again.
//An SQL SELECT is carried out here to select the user that is logged in at the moment. It will output the username of the admin on screen.

$DeliveryID = $_GET['DeliveryID'];
$deliverquery = "SELECT * FROM deliver WHERE id = ".$DeliveryID;
$result = $conn->query($deliverquery);

include '../includes/DeliverHeader.php';
?>
	
	<div class="container">
		<div class="bs-docs-section">
			
		<!--
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?> 
					
		
			<div class="col-lg-12">
				<div class="page-header">
				  <h1 id="forms"><b>Deliver:</b> <?php echo $row["username"];?></h1>
				</div>
			 </div>
		</div-->
		
		<div class="col-lg-12 col-md-12">
				<div class="col-lg-12 col-md-12">
					<div class="well bs-component" align="center">
					<h3><p align="justify">As an Delivery person for AgriConstruct, you can see what items have to be delievered. Click an option below:</p></h3><br>
					<input type=button onClick="location.href='deliver_note.php'" class="btn btn-primary btn-lg" value='Delivery '>
					<p class="divider"><p>
					<input type=button onClick="location.href='directions.php'" class="btn btn-primary btn-lg" value='Directions'>
					<p class="divider"><p>
					
				</div>
			</div>
        </div>
		
		
			<?php
						/*}
						} else{
							echo "0 results";}
							$conn->close();*/?>
			

<?php include '../includes/AdminFooter.php'; ?>