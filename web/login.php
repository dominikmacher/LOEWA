<?php
if (isset($_GET['check'])) {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$hashedUsername = sha1($_POST['username']);
		$hashedPassword = sha1($_POST['password']);
		$fileName = "users/".$hashedUsername.".json";
		if (!file_exists($fileName)) {
			echo "{}";
		}
		else {
			$handle = fopen($fileName, "rb");
			$json = json_decode(stream_get_contents($handle));
			$json->hash1 = $hashedUsername;
			$json->hash2 = $hashedPassword;
			echo json_encode($json);
			fclose($handle);
		}
		exit;
	}
}
else if (isset($_GET['username'])) {
	$fileName = "users/".$_GET['username'].".json";
	if (file_exists($fileName)) {
		$handle = fopen($fileName, "rb");
		$json = json_decode(stream_get_contents($handle));
		fclose($handle);
		$_SESSION['LOEWA_USER'] = $json->username;
		$_SESSION['LOEWA_NAME'] = $json->name;
		?>
		<script type="text/javascript">
			document.location.href="./index.php";
		</script>
		<?
	}
} else {
?>

<script type="text/javascript">
	function signIn() {
		$('#error').hide();
		$.post("login.php?check=", 
			{ username: $('#username').val(), password: $('#password').val() },
			function(data) {
				var successfulLogin = true;
				if (jQuery.isEmptyObject(data)) {
					// ERROR during login
					successfulLogin = false;
				}
				else if(data.hash2 != data.password) {
					// check password
					successfulLogin = false;
				}

				if (successfulLogin) {
					$('#success').show();
					document.location.href = document.location.href + "&username=" + data.hash1;
				}
				else {
					$('#username').val('');
					$('#password').val('');
					$('#error').show();
				}
			}, 
			"json"
		);
	}
</script>

<div class="row">
	<div class="span4 offset4">

		<form role="form" class="form-signin" action="javascript: signIn()">
			<h2 class="form-signin-heading">Login</h2>
			<div id="error" style="display:none">
				<span class="label label-warning">Fehler: Falscher Benutzername oder Passwort!</span>
				<br /><br />
			</div>
			<div id="success" style="display:none">
				<span class="label label-success">Login erfolgreich!</span>
				<br /><br />
			</div>
			<input id="username" type="email" autofocus="" required="" placeholder="Email address" class="form-control">
			<input id="password" type="password" required="" placeholder="Password" class="form-control">
			<br />
			<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
		</form>

	</div>
</div>

<?php
}
?>