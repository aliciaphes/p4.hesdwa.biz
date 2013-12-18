
<!-- comments -->

<div class="container-fluid">

	
	<?php
	/*if(isset($added)){

		?>
		<div class="row-fluid">
			<div class="span3 offset3">

				<!-- <?php if(isset($added)){ ?> -->

				<!-- Display information message if trip has been created: -->
				<div class='alert alert-success'>	
					<strong>Trip has been added</strong>
				</div>
				<!-- <?php } ?> -->
			</div>	
		</div>
	<?php } */
	?>
	


	<div class="span6 offset2">

		<h3>New trip:</h3>

		<form method="POST" action="/trips/p_add" ><!-- class="form-horizontal" -->

			<div class="row-fluid">
				<div data-name="date" class="span4 bfh-datepicker">
				</div>
			</div>
			<br/>
			<div class="row-fluid">
				<div class="span4 bfh-timepicker" data-name="begin_time">
					<!-- http://stackoverflow.com/questions/18365616/how-to-get-the-time-from-bootstrap-formhelper-timepicker -->
				</div>

				<div class="span4 bfh-timepicker" data-name="end_time">
				</div>	
			</div>
			<br/>

			<!-- countries dropdown needs an ID to be passed to data-country attribute of the timezones dropdown -->
			<div class="bfh-selectbox bfh-countries" id="tripCountry" data-name="country" data-country="US" data-flags="true">
			</div>
			<div class="bfh-selectbox bfh-timezones" data-name="tTimezone" data-country="tripCountry">
			</div>


			<br/>

			<input name="airport" class="form-control airport ui-autocomplete-input" placeholder="Airport name" required>	

			<br/><br/>

			<button id="addTrip" class="btn" type="submit">Save</button>
		</form>
	</div>

</div>