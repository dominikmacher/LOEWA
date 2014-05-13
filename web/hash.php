<?php

if (isset($_GET['password'])) {
	echo sha1($_GET['password']);
}
else {
	echo "<strong>Please specify 'password' as GET-parameter</strong>";
}

?>