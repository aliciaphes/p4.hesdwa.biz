<!-- View wher the user can see his upcoming trips -->

<div class="container-fluid span8 offset3">

	<h3 id="upcomingTitle">My upcoming trips:</h3><br/>


	<?php
	if(isset($added)){ ?>
		
		<div class="row-fluid">
			<div class="span5">
				<!-- Display information message if trip has been created: -->
				<div class='alert alert-success'>	
					<strong>Trip has been added</strong>
				</div>
			</div>	
		</div>
	<?php } ?>


	<?php if(count($upcoming) > 0){ ?>

			<div id="tripsIndex">
				<table class="table">

					<thead>  
						<tr> 
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
						<td class="hidden"><?=$item['trip_id']?></td>
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

<div class="row-fluid">
	<div class="span4 alert alert-danger">
		<strong>You have no upcoming trips</strong>
	</div>
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

</form>
</div>
