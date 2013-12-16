<!-- This is the view where the user will see a list of oongas -->

<div class="container-fluid">

	<?php
	if(count($trips) > 0){

		foreach($trips as $trip): ?>

		<div class="row-fluid">

			<div class="span4 offset3">
				
				<article>

					<p><?=$trip['date']?></p>
					<p><?=$trip['beginTime']?></p>
					<p><?=$trip['endTime']?></p>
					<p><?=$trip['airport']?></p>

				</article>
			</div>
		</div>

		<?php endforeach;

	}else{ ?>

	<div class="span3 offset3">
		
		<?php echo 'No trips';?>

		<br/><br/>



<!-- 		<?php

		$interact = new Form();
		$interact->open('form', "/posts/users", NULL, 'POST');
		?>
		<button class="btn" type="submit">Create</button>
	</form> -->

</div>

<?php } ?>

</div>
