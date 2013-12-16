
 <!-- comments -->

<div class="container-fluid justified">

	<div class="row-fluid">
		<div class="span3 offset3">

			<?php if(isset($added)){ ?>

				<!-- Display information message if trip has been created: -->
				<div class='alert alert-success'>	
					<strong>Trip has been added</strong>
				</div>

			<?php } ?>
		</div>	
	</div>

	<div class="row-fluid">
		<div class="span3 offset3 oongabox">
			
			<form method="POST" action="/posts/p_add">
				<h3>New trip:</h3>

				<div class="bfh-datepicker">
				</div>

				<div class="bfh-timepicker" id="tpFrom">
				</div>

				<div class="bfh-timepicker" id="tpTo">
				</div>				

				<br><br>
				<button class="btn" type="submit">Save</button>
			</form>

		</div>

	</div>

</div>