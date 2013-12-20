<!-- This is the view where the user can change his profile -->


<?php if(isset($user->token)){ ?>

<div class="container-fluid">

	<div class="row-fluid">

		<div class="span5 offset3">

			<form method='POST' action="/users/p_edit" class="form-horizontal" id="userEdit">			

				<h3><?php echo "Edit your profile"; ?></h3><br/>

				<label for="inputFirstName">First name</label>
				<?php $info = $user->first_name; ?>
				<input type="text" class="input-block-level form-control" name="first_name" id="inputFirstName" value="<?php echo $info; ?>" placeholder="First name">

				<br/>
				<label for="inputLastName">Last name</label>
				<?php $info = $user->last_name; ?>
				<input type="text" class="input-block-level form-control" name="last_name" id="inputLastName" value="<?php echo $info; ?>" placeholder="Last name">

				<br/>
				<label for="inputTimezone">Time zone <?php if(!empty($user->uTimezone)) echo "(previously ".$user->uTimezone.")"; ?></label>
				<div class="bfh-selectbox bfh-countries" id="inputUserCountry" data-flags="true">
				</div>
				<!-- data-timezone="<?php echo $user->timezone; ?>"> -->
				<div class="bfh-selectbox bfh-timezones" data-country="inputUserCountry" data-name="uTimezone">
				</div>				

				<br/>
				<label for="inputInterests">Interests</label>
				<textarea placeholder='Share what you like' class="form-control" name='interests' id="inputInterests" maxlength='255' cols='50' rows='10' value=""><?php echo $user->interests; ?></textarea>


				<br/><br/>
				<div class="row-fluid">
					<button class="btn" type="submit" name="update">Update</button>

					<button class="btn" type="submit" name="cancel">Cancel</button>

					<!-- <button class="btn btn-primary offset1" name="clear" id="clearForm">Clear all</button> -->
				</div>

			</form>
			<br/>
			<button class="btn btn-primary" name="clear" id="clearForm">Clear all</button>

		</div>
	</div>
</div>
<?php }

else
	echo "No user logged";
?>
