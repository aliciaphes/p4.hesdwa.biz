
<!-- This is the view where the user will access the application -->
<input type="hidden" id="appPath" value="<?php if(defined('APP_PATH')) echo APP_PATH; ?>">

<div class="container-fluid">

	<div class="row-fluid">

		<div class="span3 offset2 justified"><br/>Loren ipsum<br/>Carpe Diem<br/><br/>
		</div> 


         
		<div class="span3">

			<h3>Please sign in</h3>

			<?php
			$login = new Form();

			$login->open('loginform', "/users/p_login", NULL, 'POST');
			?>
			<input type="text" class="clearfix input-block-level form-control" name="email" placeholder="Email" required/><br/>
			<input type="password" class="clearfix input-block-level form-control" name="password" placeholder="Password" required/><br/>
			<button id="loginButton" class="btn" type="submit">Log in</button><br/>
			</form>  

			<!-- Show error messages in case of incorrect login: -->
			
			<?php if(isset($error) && $error=='error'): ?>
				<div class='alert alert-error'>	
					<strong>The specified combination email/password does not exist. Please try again.</strong>
				<br/>
				</div>
				
			<?php endif;

			if(isset($error) && $error=='wrong_email'): ?>
				<div class='alert alert-error'>	
					<strong>Wrong format in email address. Please correct.</strong>
				<br/>
				</div>
			<?php endif; ?>

			<br/><br/>
			<?php
			$signup = new Form();

			$signup->open('signupform', "/users/signup", NULL, 'POST');
			?>
			New member?<br/>
			<button class="btn" type="submit">Create profile</button>
			</form>
		</div>
	</div>
</div>


