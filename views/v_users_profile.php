
<!-- This is the view where the user can view his information -->


<!-- We do not need to check if the user is logged in because otherwise
	we would have been redirected to the login page -->

	<?php if($user): ?>
	<div class="container-fluid">
		
		<div class="row-fluid">

			<div class="span5 offset2">
				<h3>Your profile</h3>


<!-- 			<label>First name</label>
				<span class="input-xlarge uneditable-input"><?= $user->first_name ?></span><br/>

				<label>Last name</label>
				<span class="input-xlarge uneditable-input"><?= $user->last_name ?></span><br/>

				<label>Email</label>
				<span class="input-xlarge uneditable-input"><?= $user->email ?></span><br/>

				<label>User creation date</label>
				<span class="input-xlarge uneditable-input"><?=Time::display($user->created); ?></span><br/>

				<label>Last modified on</label>
				<span class="input-xlarge uneditable-input"><?=Time::display($user->modified); ?></span><br/>

				<label>Last login on</label>
				<span class="input-xlarge uneditable-input"><?=Time::display($user->last_login); ?></span><br/>

				<label>Time zone</label>
				<span class="input-xlarge uneditable-input"><?= $user->uTimezone ?></span><br/>


				<label>Interests</label>
				<textarea class="form-control" name='interests' id="inputInterests" maxlength='255' cols='50' rows='10' readonly>
					<?=$user->interests?>
				</textarea> -->
				<br/>
<!-- ************************************************************************ -->


				<label for="inputFirstName">First name</label>
				<input type="text" class="input-block-level form-control uneditable-input" id="inputFirstName" value="<?= $user->first_name ?>">

				<br/>
				<label for="inputLastName">Last name</label>
				<input type="text" class="input-block-level form-control uneditable-input" id="inputLastName" value="<?= $user->last_name ?>">

				<br/>
				<label for="inputEmail">Email</label>
				<input type="text" class="input-block-level form-control uneditable-input" id="inputEmail" value="<?= $user->email ?>">

				<br/>
				<label for="inputUcd">User creation date</label>
				<input type="text" class="input-block-level form-control uneditable-input" id="inputUcd" value="<?=Time::display($user->created); ?>">

				<br/>
				<label for="inputLmo">Last modified on</label>
				<input type="text" class="input-block-level form-control uneditable-input" id="inputLmo" value="<?=Time::display($user->modified); ?>">

				<br/>
				<label for="inputLlo">Last login on</label>
				<input type="text" class="input-block-level form-control uneditable-input" id="inputLlo" value="<?=Time::display($user->last_login); ?>">

				<br/>
				<label for="inputTimezone">Time zone</label>
				<input type="text" class="input-block-level form-control uneditable-input" id="inputLastName" value="<?= $user->uTimezone ?>">

				<br/>
				<label for="inputInterests">Interests</label>
				<textarea class="form-control" id="inputInterests" maxlength='255' cols='50' rows='10' readonly><?php echo $user->interests; ?></textarea>


				<br/><br/>

				<form method="POST" action="/users/edit/">
					<button class="btn" type="submit">Edit your profile</button>
				</form>

			</div>

		</div>
	</div>

<?php else : ?>
	<?php echo "No user logged" ?>
<?php endif; ?>