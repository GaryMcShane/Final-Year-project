<!DOCTYPE html>

<?php include 'database/db_connect.php'; 
//The index page is making a connecting to the db using the includes above

//It's then starting the session and taking the session ID which is the customers ID, if the customer lands back to his page while still logged in.
session_start();
$UserID = $_SESSION['userID'];

//A SELECT statement is then carried out here to the customer table based on the session ID - this will get the logged in users details.
$sql = "SELECT * FROM customer WHERE id = ". $UserID;
$custResult = $conn->query($sql);

//A SELECT statement is also carried out here which selects all products from the Products table and orders them according to the Product_ID descending.
$sql = $rentalquery = "SELECT  * FROM products";
$result = $conn->query($sql);

//An includes file containing the nav-bard, header etc. is used here. This enables the header code just to be wrote once and used across multiple pages.
include 'includes/header.php'; 

?>

    <div class="container">

		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8">
					<img src="images/AgriCTitle.jpg" width="210" height="35">
					<p class="lead">Equipment At The Best Price!</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="sponsor">
						<img src="images/logo.jpg" width="290" height="150">
					</div>
				</div>
			</div>
		</div>
		
		<!-- Containers
      ================================================== -->
      <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="jumbotron">
                <h1>WELCOME TO AgriConstruct!</h1>
                <p>We specialise in renting, leasing  any size of equipment for both the construction and agricultural industry. Being a small sized business allows us to be more flexible with rental equipment. Rent the equipment for a while and return it when you are finished. AgriConstruct have a free delivery service which leave and pick up the equipment whenever necessary.</p>
				<p>Our fleet of equipment range from tractors: John Deere, New Holland, CASE, Ford. Post-Drivers, Slurry Tankers, Slurry Mixer. In the construction area Dumpers:JCB. Digger:JCB, Caterpillar, CAT. Jack-Hammer, Generator, Cetment mixer.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
	  <div class="bs-component">
		<table class="table table-home ">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Category</th>
					<th>Rating</th>
					<th>Rental Price (per day)</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			
			<?php
			
			//The product data can be outputted here in the table using the following loop which will continue until all rows in the db are listed.
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?>  
			<tr width="100%">
				<td width="10%"> <a href="bookProduct.php?id=<?php echo$row['Product_ID']; ?>"> <?php echo $row["Title"]; ?> </a></td>
                <td width="50%"> <?php echo $row["Description"]; ?> </td>
				<td width="5%"> <?php echo $row["Category"]; ?> </td>
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

