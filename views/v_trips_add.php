
<!-- comments -->

<div class="container-fluid justified">

	<?php if(isset($added)){ ?>

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
	<?php } ?>


	<div class="row-fluid offset2">

		<h3>New trip:</h3>

		<form method="POST" action="/trips/p_add">

			<div class="row-fluid">
				<div data-name="date" class="span3 bfh-datepicker">
				</div>
			</div>

			<div class="row-fluid">
				<div class="span3 bfh-timepicker" data-name="beginTime">
<!-- http://stackoverflow.com/questions/18365616/how-to-get-the-time-from-bootstrap-formhelper-timepicker -->
				</div>

				<div class="span3 bfh-timepicker" data-name="endTime">
				</div>	
			</div>

<input type='password' name='password'>

			<br/><br/>
			<button id="addTrip" class="btn" type="submit">Save</button>
		</form>
	</div>

</div>