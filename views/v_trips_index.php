<!-- Comment -->

<div class="container-fluid span8 offset3">

	<h3 id="upcomingTitle">My upcoming trips:</h3><br/>


	<?php
	if(isset($added)){

		?>
		<div class="row-fluid">
			<div class="span5">

				<!-- <?php if(isset($added)){ ?> -->

				<!-- Display information message if trip has been created: -->
				<div class='alert alert-success'>	
					<strong>Trip has been added</strong>
				</div>
				<!-- <?php } ?> -->
			</div>	
		</div>
		<?php } ?>


		<?php if(count($upcoming) > 0){ ?>

<div id="tripsIndex">
		<table class="table table-bordered">

			<thead>  
				<tr> 
					<th>Trip ID</th> 
					<th>Date</th>  
					<th>Airport</th>  
					<th>From</th>  
					<th>To</th>
					<th>Timezone</th>
				</tr>  
			</thead> 
			<tbody>

				<?php foreach($upcoming as $trip): ?>
				<tr>  
					<td><?=$trip['trip_id']?></td>  
					<td><?=$trip['date']?></td>
					<td><?=$trip['airport']?></td>  
					<td><?=$trip['begin_time']?></td>  
					<td><?=$trip['end_time']?></td>
					<td><?=$trip['tTimezone']?></td> 
				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

	<br/>
	<?php

}else{ ?>

<div class="span3 offset3">

	<?php

	echo "no trips"
	?>


</div>

<br/><br/>

<?php } ?>
<div class="span3">
	<?php
	$add = new Form();
	$add->open('form', "/trips/add", NULL, 'POST');
	?>
		<button class="btn" type="submit">Add new trip</button>
	</form>
</div>

<!-- 	<?php
	$history = new Form();
	$history->open('form', "/trips/history", NULL, 'POST');
	?>
	<button class="btn" type="submit">Show history</button> -->
</form>
</div>
