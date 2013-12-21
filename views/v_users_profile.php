
<!-- This is the view where the user can view his information -->


<!-- We do not need to check if the user is logged in because otherwise
	we would have been redirected to the login page -->

	<div class="container-fluid">
		
		<div class="row-fluid">

			<div class="span5 offset3">
				<h3>Your profile</h3>

				<br/>

				<label for="inputFirstName">First name</label>
				<!-- add class uneditable-input seems to do nothing -->
				<input type="text" class="input-block-level form-control" id="inputFirstName" value="<?= $user->first_name ?>" readonly>

				<br/>
				<label for="inputLastName">Last name</label>
				<input type="text" class="input-block-level form-control" id="inputLastName" value="<?= $user->last_name ?>" readonly>

				<br/>
				<label for="inputEmail">Email</label>
				<input type="text" class="input-block-level form-control" id="inputEmail" value="<?= $user->email ?>" readonly>

				<br/>
				<label for="inputUcd">User creation date</label>
				<input type="text" class="input-block-level form-control" id="inputUcd" value="<?=Time::display($user->created); ?>" readonly>

				<br/>
				<label for="inputLmo">Last modified on</label>
				<input type="text" class="input-block-level form-control" id="inputLmo" value="<?=Time::display($user->modified); ?>" readonly>

				<br/>
				<label for="inputLlo">Last login on</label>
				<input type="text" class="input-block-level form-control" id="inputLlo" value="<?=Time::display($user->last_login); ?>" readonly>

				<br/>
				<label for="inputTimezone">Time zone</label>
				<input type="text" class="input-block-level form-control" id="inputTimezone" value="<?= $user->uTimezone ?>" readonly>

				<br/>


<?php 

?>

				<?php $intext = nl2br($user->interests, false); ?>
				<label for="inputInterests">Interests</label>
				<textarea class="form-control" id="inputInterests" maxlength='255' cols='50' rows='10' readonly><?php echo $user->interests; ?></textarea>
				


				<br/><br/>

				<form method="POST" action="/users/edit/">
					<button class="btn" type="submit">Edit your profile</button>
				</form>

			</div>

		</div>
	</div>
