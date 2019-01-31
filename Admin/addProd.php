<?php
session_start();
include '../includes/AdminHeader.php';

//This page allows an admin to enter a new product.
//It contains a form which requires information on a product such as the title, category, rental price etc.
//There is validation on this form to ensure all required fields are populated before submitting.
//The form will then submit to another PHP script that will carry out the INSERT of the product. 

?>

	
	<div class="container">
		<div class="bs-docs-section">
			
			<div class="row">
			  <div class="col-lg-12">
				<div class="page-header">
				  <h1 id="forms">Add a Product:</h1>
				</div>
			  </div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-12">
				
					<div class="col-lg-2 col-md-2">
					</div>
					
					<div class="col-lg-8 col-md-8">
					<p align="center">Enter the details of your a product ensuring to include its category and description as well as rental price. <br>Uploading an image of the product helps too! 
					Once you submit this form, users will be able to view the product on the site and book!</p><br><font color="red">Fields marked with a * are required</font>
						<div class="well bs-component">
							<form method="GET" action="insertProduct.php" name="addProduct" onsubmit="return validateAddProduct()" class="form-horizontal">
								
								<fieldset>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label for="inputPTitle" class="col-lg-2 control-label">Product Title:<font color="red">*</font></label>
											<div class="col-lg-10">
												<input type="text" class="form-control" name="title" placeholder="Product Title">
											</div>
										</div>
									  
										<div class="form-group">
											<label for="inputDescription" class="col-lg-2 control-label">Description:<font color="red">*</font></label>
											<div class="col-lg-10">
												<textarea rows="4" cols="50" class="form-control" name="description" placeholder="Description"></textarea>
											</div>
										</div>
										
										<div class="form-group">
											<label for="img" class="col-lg-2 control-label">Image:<font color="red">*</font></label>
											<div class="col-lg-10">
												<input type="file" class="form-control" name="image">
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label for="inputType" class="col-lg-2 control-label">Type:<font color="red">*</font></label>
											<div class="col-lg-10">
												<select name="Category" class="form-control">
													<option value=""> </option>
													<option value="Agriculture" name="agriculture">Agriculture</option>
													<option value="Construction" name="construction">Construction</option>
													
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label for="inputCategory" class="col-lg-2 control-label">Category:<font color="red">*</font></label>
											<div class="col-lg-10">
												<select name="Category" class="form-control">
													<option value=""> </option>
													<option value="Tractor" name="tractor">Tractor</option>
													<option value="Slurry" name="Slurry">Slurry</option>
													<option value="Post-Driver" name="post">Post-Driver</option>
													<option value="Slurry_Tanker" name="tanker">Slurry-Tanker</option>
													<option value="Telehandler" name="telehandler">Telehandler</option>
													<option value="Digger" name="digger">Digger</option>
													<option value="Dumper" name="dumper">Dumper</option>
													<option value="Roller" name="roller">Roller</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label for="inputPrice" class="col-lg-2 control-label">Rental Price(£):<font color="red">*</font></label>
											<div class="col-lg-10">
												<input type="decimal" class="form-control" name="Price" placeholder="Rental Price">
											</div>
										</div>
										
										<div class="form-group">
											<label for="inputePrice" class="col-lg-2 control-label">Rental Price (€):<font color="red">*</font></label>
											<div class="col-lg-10">
												<input type="decimal" class="form-control" name="ePrice" placeholder="Rental Price">
											</div>
										</div>
										
										<div class="form-group">
											<label for="inputRating" class="col-lg-2 control-label">Rating:<font color="red">*</font></label>
											<div class="col-lg-10">
												<select name="Rating" class="form-control">
													<option value=""> </option>
													<option value="1" name="1">1 Star</option>
													<option value="2" name="2">2 Stars</option>
													<option value="3" name="3">3 Stars</option>
													<option value="4" name="4">4 Stars</option>
													<option value="5" name="5">5 Stars</option>
													
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-10 col-lg-offset-2" align="right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
					
					<div class="col-lg-2 col-md-2">
					</div>
					
				</div>
			</div>
		</div>
		

<script>
function validateAddProduct() {
	var x = document.forms["addProduct"]["title"].value;
	if (x == null || x == "") {
		alert("Please enter a product title!");
		addProduct.title.focus();
		return false;
	}
	
	var x = document.forms["addProduct"]["description"].value;
	if (x == null || x == "") {
		alert("Please enter a product description");
		addProduct.description.focus();
		return false;
	}
	
	
	var x = document.forms["addProduct"]["Category"].value;
	if (x == null || x == "") {
		alert("Please select a product category");
		addProduct.Category.focus();
		return false;
	}
	
	var x = document.forms["addProduct"]["Type"].value;
	if (x == null || x == "") {
		alert("Please select a product type");
		addProduct.Type.focus();
		return false;
	}
	var x = document.forms["addProduct"]["Price"].value;
	if (x == null || x == "") {
		alert("Please enter a rental price for this product!");
		addProduct.Price.focus();
		return false;
	}
	var x = document.forms["addProduct"]["ePrice"].value;
	if (x == null || x == "") {
		alert("Please enter a rental price for this product!");
		addProduct.ePrice.focus();
		return false;
	}
	
	var x = document.forms["addProduct"]["Rating"].value;
	if (x == null || x == "") {
		alert("Please select a product viewing rating!");
		addProduct.Rating.focus();
		return false;
	}
	alert("Your product has been added!");
}
</script>

<?php include '../includes/AdminFooter.php'; ?>