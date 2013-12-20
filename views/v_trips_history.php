<!-- Comment -->

<div class="container-fluid span8 offset3">

	<h3 id="historyTitle">My history:</h3><br/>

	<?php if(count($history) > 0){ ?>

	<div id="tripsHistory">
		<table class="table table-bordered">

			<thead>  
				<tr>
					<th></th> 
					<!-- <th>Trip ID</th> --> 
					<th>Date</th>  
					<th>Airport</th>  
					<th>From</th>  
					<th>To</th>
					<th>Timezone</th>
				</tr>  
			</thead> 
			<tbody>

				<?php foreach($history as $item): ?>
				<tr>
					<form method="POST" action="/trips/p_delete/">
						<td><button class="btn" type="submit" name="row<?= $item['trip_id'] ?>" value="<?= $item['trip_id'] ?>">Delete</button></td>  
						<td class="hidden"><?=$item['trip_id']?></td>
						<td><?=$item['date']?></td>
						<td><?=$item['airport']?></td>  
						<td><?=$item['begin_time']?></td>  
						<td><?=$item['end_time']?></td>
						<td><?=$item['tTimezone']?></td>
					</form>
				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

<br/>
<?php

}else{ ?>

<div class="span3 offset2 alert alert-danger">	
		<strong>There is no history to show</strong>
		<br/>
	</div>

<?php } /*end else*/?>


</div>
