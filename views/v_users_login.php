
<!-- This is the view where the user will access the application -->

<div class="container-fluid">

	<div class="row-fluid">

		<div class="span3 offset2 justified">
			<br/><br/>
			<p>'Kalt' means 'cold' in German. But we want you to feel as warm as possible (for an airport) with this trip management application.
			</p>
			<br/>
			<p>
			You can display your past and upcoming trips as well as create new ones to help you be more organized. Also more animated.
			</p>
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
				<div class='alert alert-danger'>	
					<strong>The specified combination email/password does not exist. Please try again.</strong>
				<br/>
				</div>
				
			<?php endif;

			if(isset($error) && $error=='wrong_email'): ?>
				<div class='alert alert-danger'>	
					<strong>Wrong format in email address. Please correct.</strong>
				<br/>
				</div>
			<?php endif; ?>

			<br/><br/>


			<!-- Form to sign up a user -->
			<?php
			$signup = new Form();

			$signup->open('signupform', "/users/signup", NULL, 'POST');
			?>
			New member?<br/>
			<button class="btn" type="submit">Create profile</button>
			</form>
		</div>

		<div class="span3 thanks">
			<h3 class="finger">Thanks to (click me!):</h3>
			<ul>
				<li><a href="http://www.flickr.com/photos/miltoncorrea/4678723185/sizes/l/" title="Click for the original Flickr image" target="_blank"><u>Flickr and Milton CJ</u></a> for the background image.</li>
				<li><a href="https://gist.github.com/tdreyno/4278655" title="Click for the file" target="_blank"><u>Thomas Reynolds</u></a> for the airport list</li>
				<li><a href="http://www.bootstrapformhelpers.com" title="Click to discover" target="_blank"><u>Bootstrap Form Helper</u></a> for the nice form elements (time zone, date and time).</li>

			</ul>
		</div>

	</div>
</div>


