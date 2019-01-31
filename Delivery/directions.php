 <?php
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
		<h3><p align="justify">To find directions please enter your finish destination</p></h3><br>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d18740.42812324304!2d-6.59070925!3d54.046188550000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2suk!4v1489769672552" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
		 <div class="col-md-4">
<td><form action="http://maps.google.com/maps" method="get" target="_blank">
<input type="text" name="saddr"/>
<input type="hidden" name="daddr" value="[124 Dundalk Road Crossmaglen]" /> 
<input type="submit" value="Get Directions" />
</form></td>
					
                </div>
		
		
		
		<?php include '../includes/AdminFooter.php'; ?>