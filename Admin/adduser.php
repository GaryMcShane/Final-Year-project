<?php 
include '../database/db_connect.php';

include '../includes/AdminHeader.php';
?>
<div class="container">
		<div class="bs-docs-section">
		
			
				<div class="col-lg-8 col-md-8">
					<div class="well bs-component">
						<form action="insertCustDetails.php" method="get" name="custRegistration" onsubmit="return validateRegistration()" class="form-horizontal">
							<h4><b>Customer Registration:</b></h4>
							<p>If you are adding a new customer to AgriConstruct, please register below by entering in a few details… <br></p>
							<p><font color="red">Fields marked with a * are required</font></p>
							<fieldset>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label for="inputFName" class="col-lg-2 control-label">Firstname:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="custFirstName" placeholder="Firstname">
										</div>
									</div>
								  
									<div class="form-group">
										<label for="inputLName" class="col-lg-2 control-label">Lastname:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="custLastName" placeholder="Lastname">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputDOB" class="col-lg-2 control-label">DOB:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="date" class="form-control" name="DOB" placeholder="dd/mm/yyyy">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">Email:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="email" class="form-control" name="email" placeholder="Email">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputPassword1" class="col-lg-2 control-label">Password:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="password" class="form-control" name="pword" placeholder="Password">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputPassword2" class="col-lg-2 control-label">Confirm password:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="password" class="form-control" name="cPword" placeholder="Re-enter Password">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label for="inputAddress" class="col-lg-2 control-label">Address:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="address" placeholder="Address">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputTown" class="col-lg-2 control-label">Town/City:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="town" placeholder="Town/City">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputCounty" class="col-lg-2 control-label">County:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="county" placeholder="County">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputPCode" class="col-lg-2 control-label">Postcode:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="pcode" placeholder="Postcode">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputCountry" class="col-lg-2 control-label">Country:<font color="red">*</font></label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="country" placeholder="Country">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-4 col-lg-offset-2" align="right">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

					
                </tbody>
              </table> 
            </div>
		</div>

<?php include '../includes/AdminFooter.php'; ?>
<script>
<!--The code below validates the customer login and registration forms. If any field is left blank then it will not submit the form and output an error message-->
function validateCustLogin() {
	var x = document.forms["custLogin"]["custEmail"].value;
	if (x == null || x == "") {
		alert("Please enter your registered email address to login");
		custLogin.custEmail.focus();
		return false;
	}
	
	var x = document.forms["custLogin"]["custPassword"].value;
	if (x == null || x == "") {
		alert("Please enter your password to login");
		custLogin.custPassword.focus();
		return false;
	}
}


function validateRegistration() {
	var x = document.forms["custRegistration"]["custFirstName"].value;
	if (x == null || x == "") {
		alert("Please enter a your firstname");
		custRegistration.custFirstName.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["custLastName"].value;
	if (x == null || x == "") {
		alert("Please enter a your lastname");
		custRegistration.custLastName.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["DOB"].value;
	if (x == null || x == "") {
		alert("Please enter a your date of birth");
		custRegistration.DOB.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["email"].value;
	if (x == null || x == "") {
		alert("Please enter a your email address");
		custRegistration.email.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["pword"].value;
	if (x == null || x == "") {
		alert("Please enter a password");
		custRegistration.pword.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["cPword"].value;
	if (x == null || x == "") {
		alert("Please enter confirm your password");
		custRegistration.cPword.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["address"].value;
	if (x == null || x == "") {
		alert("Please enter the first line of your address");
		custRegistration.address.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["town"].value;
	if (x == null || x == "") {
		alert("Please enter your Town/City");
		custRegistration.town.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["county"].value;
	if (x == null || x == "") {
		alert("Please enter your County");
		custRegistration.county.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["pcode"].value;
	if (x == null || x == "") {
		alert("Please enter your Postcode");
		custRegistration.pcode.focus();
		return false;
	}
	
	var x = document.forms["custRegistration"]["country"].value;
	if (x == null || x == "") {
		alert("Please enter your Country");
		custRegistration.country.focus();
		return false;
	}
		
	var pass1 = document.forms["custRegistration"]["pword"].value;
	var pass2 = document.forms["custRegistration"]["cPword"].value;
	if (pass1 != pass2){
		alert("Passwords do not match! Please enter these are the same");
		custRegistration.pword.focus();
		return false;
	}
	
	<!-- We can also apply the password policy here making sure that the password must have at least 1 uppercase and lowercase value, must have at least-->
	<!-- one numerical value and must be at least 6 characters. We are using regular expressions to achieve this-->
	<!-- Again if these are not met then the form will not submit and an error message will appear.-->
	if(custRegistration.pword.value != "" && custRegistration.pword.value == custRegistration.cPword.value) {
      if(custRegistration.pword.value.length < 6) {
        alert("Password must contain at least six characters!");
        custRegistration.pword.focus();
        return false;
      }

      if(custRegistration.pword.value == custRegistration.email.value) {
        alert("Password must be different from your email!");
        custRegistration.pword.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(custRegistration.pword.value)) {
        alert("Password must contain at least one number (0-9)!");
        custRegistration.pword.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(custRegistration.pword.value)) {
        alert("Password must contain at least one lowercase letter (a-z)!");
        custRegistration.pword.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(custRegistration.pword.value)) {
        alert("Password must contain at least one uppercase letter (A-Z)!");
        custRegistration.pword.focus();
        return false;
      }
	  alert("You have created a user! You can now login");
    }	
}	
</script>
	
