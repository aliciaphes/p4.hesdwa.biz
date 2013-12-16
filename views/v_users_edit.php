<!-- This is the view where the user can change his profile -->


<?php if(isset($user->token)){ ?>

	<div class="container-fluid">

		<div class="row-fluid">

			<div class="span3 offset3 oongabox">

				<?php

				$profile = new Form();
				$profile->open('form', "/users/p_edit", NULL, 'POST');
				?>

				<h3><?php echo "Edit your profile"; ?></h3><br/>
				<label for="inputFirstName">First name</label>
				<?php $info = $user->first_name; ?>
				<input type="text" class="input-block-level" name="first_name" id="inputFirstName" value="<?php echo $info; ?>" placeholder="First name">

				<br/>
				<label for="inputLastName">Last name</label>
				<?php $info = $user->last_name; ?>
				<input type="text" class="input-block-level" name="last_name" id="inputLastName" value="<?php echo $info; ?>" placeholder="Last name">

				<br/>
				<label for="inputTimezone">Time zone</label>
				<?php $info = $user->timezone; ?>
				<input type="text" class="input-block-level" name="timezone" id="inputTimezone" value="<?php echo $info; ?>" placeholder="Time zone">				
				
				<br/>
				<label for="inputInterests">Interests</label>
				<textarea placeholder='Share what you like' name='interests' id="inputInterests" maxlength='255' cols='50' rows='10'></textarea>

				<br/><br/>
				<button class="btn" type="submit">Update</button>
				</form>
				
			</div>
		</div>
	</div>
<?php } ?>