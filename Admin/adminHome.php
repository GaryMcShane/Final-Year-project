<!DOCTYPE html>

<?php include '../database/db_connect.php';
session_start();

//If the admins details are correct then they are redirected to this admin home page.
//From here they can then click several buttons which will allow them to manage customers, manage products or logout again.
//An SQL SELECT is carried out here to select the user that is logged in at the moment. It will output the username of the admin on screen.

$AdminID = $_GET['AdminID'];
$adminquery = "SELECT * FROM admin WHERE id = ".$AdminID;
$result = $conn->query($adminquery);

include '../includes/AdminHeader.php';
?>
	
	<div class="container">
		<div class="bs-docs-section">
			
			<?php
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?> 
					
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
				  <h1 id="forms"><b>Administrator:</b> <?php echo $row["username"];?></h1>
				</div>
			 </div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="col-lg-12 col-md-12">
					<div class="well bs-component" align="center">
					<h3><p align="justify">As an Admin to AgriConstruct, you can perform administration tasks. Click an option below:</p></h3><br>
					<input type=button onClick="location.href='addProd.php'" class="btn btn-primary btn-lg" value='Add Product '>
					<p class="divider"><p>
					<input type=button onClick="location.href='prodUpdate.php'" class="btn btn-primary btn-lg" value='Product Management'>
					<p class="divider"><p>
					<input type=button onClick="location.href='adduser.php'" class="btn btn-primary btn-lg"value='Add New Customer'>
					<p class="divider"><p>
					<input type=button onClick="location.href='logoutfile.php'" class="btn btn-danger btn-lg" value='Logout'>
					</div>
				</div>
			</div>
        </div>
		
		
			<?php
						}
						} else{
							echo "0 results";}
							$conn->close();?>
			

<?php include '../includes/AdminFooter.php'; ?>