<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title) and defined('APP_NAME')) echo $title.' | '.APP_NAME; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<header>
		<h3>KALT // Kill Airport Layover Time</h3>
	</header>


	<?php if($user): ?>

	<!-- Create the user user -->
	<div class="container-fluid">

		<div class="row-fluid">

			<div class="span5 offset1">	
				<ul class="nav nav-tabs">
					<li class="dropdown">
						<a class="dropdown-toggle"
						data-toggle="dropdown" href="#">
						<?php if(defined('APP_NAME')) echo APP_NAME.' - '.$user->first_name.' '.$user->last_name;?>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href='/users/profile'>My profile</a></li>	
						<li><a href='/trips/index'>Upcoming trips</a></li>
						<li><a href='/trips/history'>Trips history</a></li>
						<li><a href='/'>Find fellow travelers</a></li>
						<li><a href='/users/logout'>Log out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php endif; ?>



<?php if(isset($content)) echo $content; ?>

<br/>
<footer>
	<p>&#169; Project 4 - 2013 - ALicia Perez</p>
</footer>


<?php if(isset($client_files_body)) echo $client_files_body; ?>

	
</body>
</html>