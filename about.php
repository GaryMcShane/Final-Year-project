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
$sql = "SELECT * FROM Products ORDER BY Product_ID DESC";
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
		<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="jumbotron">
			   <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact Us </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2341.6370919699384!2d-6.591744633990857!3d54.0624443829557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4860b7be274a6c9d%3A0x91493a634af67e1!2s124+Dundalk+Rd%2C+Crossmaglen%2C+Newry+BT35+9HW!5e0!3m2!1sen!2suk!4v1490346924923" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4">
                    <p>Phone:
                        <strong>(ROI) 048 3086 745 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (NI) 028 3086 745</strong>
                    </p>
                    <p>Email:
                        <strong><a href="mailto:garymcshane2010@hotmail.co.uk">garymcshane2010@hotmail.co.uk</a></strong>
                    </p>
                    <p>Address:
                        <strong>124 Dundalk Road
                            <br>Crossmaglen, Newry, Co.Down, BT35 9HW</strong>
                    </p>
					<br></br>
					
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

                <h1>Opening Hours:</h1>
            <p><span>Monday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>9:00am - 5:00pm</p>
            <p><span>Tuesday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>9:00am - 5:00pm</p>
            <p><span>Wednesday:&nbsp;&nbsp;&nbsp;</span>9:00am - 5:00pm</p>
            <p><span>Thursday:&nbsp;&nbsp;</span>9:00am - 5:00pm</p>
            <p><span>Friday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>9:00am - 5:00pm</p>
            <p><span>Saturday:&nbsp;&nbsp;&nbsp;&nbsp;</span>9:00am - 1:00pm</p>
            <p><span>Sunday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>CLOSED</p></center>
			<p>Note:All deliveries need to be booked before 3:00pm the previous in order for the product to be delivered the next day</p> 
              </div>
            </div>
          </div>
        </div>
      </div>
	  </div>
		<?php include 'includes/footer.php'; ?>