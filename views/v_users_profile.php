
<!-- This is the view where the user can view his information -->


<!-- We do not need to check if the user is logged in because otherwise
	we would have been redirected to the login page -->

<?php if($user): ?>
<div class="container-fluid">
		
	<div class="row-fluid">

		<div class="span4 offset1">
			<h3>Your profile</h3>

			First name: <?= $user->first_name ?><br/><br/>
			Last name:  <?= $user->last_name ?><br/><br/>
			Email:      <?= $user->email ?><br/><br/>

			User creation date: <?=Time::display($user->created); ?><br/><br/>
			Last modified on:   <?=Time::display($user->modified); ?><br/><br/>
			Last login on:      <?=Time::display($user->last_login); ?><br/><br/>
			Time zone:          <?=$user->uTimezone?><br/><br/>

			Interests:          <?=$user->interests?><br/><br/>

			<form method="POST" action="/users/edit/">
				<button class="btn" type="submit">Edit your profile</button>     
			</form>

		</div>

	</div>
</div>

<?php else : ?>
<?php echo "No user logged" ?>
<?php endif; ?>