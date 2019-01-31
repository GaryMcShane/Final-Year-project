<!DOCTYPE html>

<?php

//Again this page is connecting to the database and getting the session ID of the logged in user 
include 'database/db_connect.php'; 
session_start();
$UserID = $_SESSION['userID'];

$sql = "SELECT * FROM customer WHERE id = ". $UserID;
$custResult = $conn->query($sql);

$productID = $_GET['id'];//This line is getting the product_id from the previous page
$productquery = "SELECT * FROM Products WHERE Product_ID=".$productID;//A SELECT statement can then pull the product in according to what product the user clicked on the previous page.
$result = $conn->query($productquery);

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AgriConstruct</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/n4Rentals.css" media="screen">
  </head>
 
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><img src="images/AgriCTitle.jpg" width="130" height="20"></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
          <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="agri.php">Agriculture</a>
            </li>
			<li>
              <a href="construct.php">Construction</a>
            </li>
			<li>
              <a href="about.php">About</a>
            </li>
          </ul>
          		  <?php 
			//The product data can be outputted here using the loop that will carry on until all rows are displayed - in this case it is only one.	  
			if ($UserID){ 
			if ($custResult->num_rows > 0) {
				while($row = $custResult->fetch_assoc()) {
?>
    <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><?php echo $row['custFirstName'] ." " . $row['custLastName']; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="Customer/custHome.php?id=<?php echo$row['id']; ?>">Customer Home</a></li>
                <li><a href="Customer/updateCustDetails.php?CustID=<?php echo$row['id']; ?>">Update Contact Information</a></li>
                <li><a href="Customer/updatePassword.php?CustID=<?php echo$row['id']; ?>">Change Passowrd</a></li>
                <li class="divider"></li>
                <li><a href="Customer/logoutCust.php">Logout</a></li>
              </ul>
            </li>
          </ul>

<?php
			}
			} else{
				echo "0 results";
}

 } else { ?>
    <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" >Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="Customer/customerLogin.php">Customer Login</a></li>
                <li class="divider"></li>
                <li><a href="Admin/AdminLogin.php">Admin Login</a></li>
              </ul>
            </li>
          </ul>
<?php }
?>	
        </div>
      </div>
    </div>
	<br><br><br>
	
	<div class="container">
		<div class="bs-docs-section">
			<?php
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?> 
					
			<div class="row">
			  <div class="col-lg-12">
				<div class="page-header">
				  <h1> Rent <u><?php echo $row["Title"]; ?></u> Now! </h1>
				</div>
			  </div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-12">
				
					<div class="col-lg-3 col-md-3">
						<div class="well bs-component">
							<img src="images/<?php echo $row["Image"]; ?>" style="width:150px;height:250px;">
							<h1> <b><?php echo $row["Title"]; ?></b></h1>
						</div>
					</div>
					
					<div class="col-lg-9 col-md-9">
						<div class="well bs-component">
							<h2>Description:</h2>
							<p> <?php echo $row["Description"]; ?> </p>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-3">
						<div class="well bs-component">
							<h3>Type:</h3>
							<p> <?php echo $row["Type"]; ?> </p>
						</div>
					</div>
						
					<div class="col-lg-3 col-md-3">
						<div class="well bs-component">
							<h3>Rating:</h3>
							<p> <?php echo $row["Rating"]; ?> </p>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-3">
						<div class="well bs-component">
							<h3>Rental Price Per Day:</h3>
							<p> <?php echo "£". $row["Price"]."€". $row["ePrice"]; ?> </p>
							
						</div>
					</div>
					
					<div class="col-lg-6 col-md-6">
						<form action="Customer/confirmBooking.php?ProductID=<?php echo$row['Product_ID']; ?>"  method="POST" name="bookProduct" onsubmit="return validateBooking()">
							<div class="well bs-component">
								<p>Please enter the amount of days you wish to rent <?php echo $row["Title"]; ?> for:<font color="red">*</font>  </p>
								<div class="col-lg-4 col-md-4">
									<input type="number" class="form-control size=10px" name="duration" placeholder="Days"><br>
								</div>
								<div class="col-lg-2 col-md-2">
									<button type="submit" class="btn btn-primary">Book!</button>
								</div><br><br>
							</div>
						</form>
					</div>
				</div>
					
					<?php
						}
						} else{
							echo "0 results";}
							$conn->close();?>
							
				</div>
			</div>
		</div>
	</div>

		
		<footer>
        <div class="row">
          <div class="col-lg-md">
            <p align="center">&copy; 2016 COM409 Group 3</p>
          </div>
        </div>
      </footer> 	  
	</div>

<script>
function validateBooking() {
	var x = document.forms["bookProduct"]["duration"].value;
	if (x == null || x == "") {
		alert("Please enter the duration you wish to rent this product for!");
		bookProduct.duration.focus();
		return false;
	}
		
	var x = document.forms["bookProduct"]["duration"].value;
	if (x > 7) {
		alert("You can only book this product for a maximum of 7 days!");
		bookProduct.duration.focus();
		return false;
	}
	
	var x = document.forms["bookProduct"]["duration"].value;
	if (x <= 0) {
		alert("You need to book this product for at least 1 day!");
		bookProduct.duration.focus();
		return false;
	}
}

</script>


<script src="jquery/n4.min.js"></script>
<script src="jquery/n4_1.min.js"></script>
    
  <script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
</html>