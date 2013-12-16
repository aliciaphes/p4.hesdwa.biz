<!-- Comment -->

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
		
<?php

		$interact = new Form();
		$interact->open('form', "/trips/add", NULL, 'POST');
		?>
		<button class="btn" type="submit">Add</button>
	</form>		

		<br/><br/>

</div>

<?php } ?>

</div>
