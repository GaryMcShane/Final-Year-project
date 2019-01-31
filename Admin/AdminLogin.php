<!--This page will allow the admin to log in-->
<!--This just contains one simply form that asks for a username and password-->
<!--It will then submit to a logincheck form which will check if the login details are correct-->
<!--There is validation on this page to ensure both feilds are populated before submitting-->


<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AgriConstruct</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../css/n4Rentals.css" media="screen">
  </head>
 
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../index.php" class="navbar-brand"><img src="../images/AgriCTitle.jpg" width="130" height="20"></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
          <li>
              <a href="../index.php">Home</a>
            </li>
            <li>
              <a href="../agri.php">Agriculture</a>
            </li>
			<li>
              <a href="../construct.php">Construction</a>
            </li>
			<li>
              <a href="../about.php">About</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" >Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../Customer/customerLogin.php">Customer Login</a></li>
                <li class="dropdown-menu"></li>
                <li><a href="../Admin/AdminLogin.php">Admin Login</a></li>
				<li><a href="../Delivery/DeliveryLogin.php">Deliver Login</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
	<br><br><br>
	
	<div class="container">
		<div class="bs-docs-section">
			
			<div class="row">
			  <div class="col-lg-12">
				<div class="page-header">
				  <h1 id="forms">Administrator Login:</h1>
				</div>
			  </div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-12">
				
					<div class="col-lg-3 col-md-3">
					</div>
					
					<div class="col-lg-5 col-md-5">
						<div class="well bs-component">
							<form action="login_check.php" method="POST" name="adminLogin" onsubmit="return validateAdminLogin()" class="form-horizontal">
								<h4>Enter your Admin username and password to login:</h4>
								<fieldset>
									<div class="form-group">
										<label for="inputAdminUname" class="col-lg-2 control-label">Username:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="adminUsername" placeholder="Admin Username">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword" class="col-lg-2 control-label">Password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" name="adminPassword" placeholder="Password">
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-10 col-lg-offset-2" align="right">
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-3">
					</div>
					
				</div>
			</div>
		</div>
		
	
<script>
function validateAdminLogin() {
	var x = document.forms["adminLogin"]["adminUsername"].value;
	if (x == null || x == "") {
		alert("Please enter your admin username to login");
		return false;
	}
	
	var x = document.forms["adminLogin"]["adminPassword"].value;
	if (x == null || x == "") {
		alert("Please enter your admin password to login");
		return false;
	}
}
</script>
<?php include '../includes/AdminFooter.php'; ?>