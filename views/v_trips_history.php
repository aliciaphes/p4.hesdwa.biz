<!-- Comment -->

<div class="container-fluid span8 offset3">

	<h3>My history:</h3><br/>

		<?php if(count($history) > 0){ ?>

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

				<?php foreach($history as $item): ?>
				<tr>  
					<td><?=$item['trip_id']?></td>  
					<td><?=$item['date']?></td>
					<td><?=$item['airport']?></td>  
					<td><?=$item['begin_time']?></td>  
					<td><?=$item['end_time']?></td>
					<td><?=$item['tTimezone']?></td> 
				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>

	<br/>
	<?php

}else{ ?>

<div class="span3 offset3">

	<?php

	echo "no history"
	?>

</div>

<?php } /*end else*/?>


</div>
