<!DOCTYPE html>
<?php 
//This page is connecting to the database and getting the session ID of the logged in user 
include '../database/db_connect.php';
session_start();

//This statement is an SQL Join statement as its selecting from the rental note table and the products table. This is so we can populated the rental histroy information.
$rentalquery = "SELECT rental_note.Rental_ID, products.Product_ID, products.Title, products.Category,products.Type, rental_note.Duration, rental_note.Date_Rented,customer.id,customer.custFirstName,customer.custLastName,customer.address,customer.country,customer.county, sum(rental_note.Duration * products.Price) AS Price, sum(rental_note.Duration * products.Price * 1.17) AS ePrice
FROM rental_note
INNER JOIN products
ON rental_note.Product_ID=products.Product_ID
JOIN customer
ON rental_note.id=customer.id";
$RentalResult = $conn->query($rentalquery);



include '../includes/DeliverHeader.php';
?>
	<div class="container">

		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8">
					<img src="../images/AgriCTitle.jpg" width="210" height="35">
					<p class="lead">Equipment At The Best Price!</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="sponsor">
						<img src="../images/logo.jpg" width="290" height="150">
					</div>
				</div>
			</div>
		</div>
	
<!--- Containers
===========================================-->
<div class="container">
	<div class="bs-docs-section">
		<div class="row">
			<div class="col-lg-12">
				<div class="bs-component">
					<div class="jumbotron">
					  <h1>Delivery Note</h1>					
					</div>
				</div>
		   </div>
	    </div>
    </div>
		<div class="row">
			  <div class="col-lg-12">
				<div class="page-header">
				  
				</div>
			  </div>
			</div>
			
			<div class="bs-component">
				<table class="table table-striped table-hover ">
					<thead>
					<tr>
						<th>Reference No:</th>
						<th>First Name:</th>
						<th>Surname:</th>
						<th>Address:</th>
						<th>Country:</th>
						<th>County:</th>
						<th>Title</th>
						<th>Product Category</th>		
						<th>Date Rented:</th>
						<th>Duration:</th>
						<th>Sterling Price</th>
						<th>Euro Price</th>
						
						<th></th>
					</tr>
					
					<?php
			
			if ($RentalResult->num_rows > 0) {
				while($row = $RentalResult->fetch_assoc()) {
					?>  
					
					</thead>
					<tbody>
					<tr>
						<td><b>AgriConstruct-<?php echo $row["Type"].  $row["Product_ID"]; ?></b></td>
						<td><?php echo $row["custFirstName"]; ?></td>
						<td><?php echo $row["custLastName"]; ?></td>
						<td><?php echo $row["address"]; ?></td>
						<td><?php echo $row["country"]; ?></td>
						<td><?php echo $row["county"]; ?></td>
						<td><?php echo $row["Title"]; ?></td>
						<td><?php echo $row["Category"]; ?></td>
						<td><?php echo $row["Date_Rented"]; ?></td>
						<td><?php echo $row["Duration"]; ?> days</td>
						<td> <?php echo $row["Price"]; ?> </td>
						<td> <?php echo "€". $row["ePrice"]; ?> </td>
						



					</tr>
					<?php
			}
			} else{
				echo "You have no rental history yet. After you rent a product it will appear in the table below:<br>";
}
$conn->close();
?> 
					
                </tbody>
              </table> 
            </div>
		
		
		
		
			

		</div>
		<footer>
			<div class="row">
			  <div class="col-lg-md">
				<p align="center">&copy; 2017 AgriConstruct, Designer: Gary McShane (B00656764)</p>
			  </div>
			</div>
		</footer> 	  
	</div>
	
    <script src="../jquery/n4.min.js"></script>
    <script src="../jquery/n4_1.min.js"></script>

	
	<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
</html>