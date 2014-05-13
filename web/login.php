<?php
	include("users.php");
	
?>


<div class="row">
	<div class="span4 offset4">

		<form role="form" class="form-signin">
			<h2 class="form-signin-heading">Login</h2>
			<input type="email" autofocus="" required="" placeholder="Email address" class="form-control">
			<input type="password" required="" placeholder="Password" class="form-control">
			<br />
			<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
		</form>

	</div>
</div>

<?php
	$_SESSION['LOEWA_USER'] = "d.macher@feuerwehr-karlstetten.org";
?>