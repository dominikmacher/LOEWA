<?php
  session_start();

  $sites = array(
	0=>array('loewa.php','L&ouml;Wa',true),
	1=>array('loeschhilfe.php','L&ouml;schhilfe',true),
	2=>array('list.php','Abgespeicherte Objekte',true),
	3=>array('hydranten.php','Digitaler Hydrantenplan',true),
	4=>array('about.php','Info',true),
	5=>array('logout.php','Logout',false),
	6=>array('settings.php','Einstellungen',false),
	7=>array('login.php','Login',false)
  );
 
  $topic = $sites[0][0];
  if (isset($_GET['id'])) {
    $topic = $sites[$_GET['id']][0];
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Freiwillige Feuerwehr Karlstetten</title>
    <link type="image/x-icon" rel="shortcut icon" href="http://www.feuerwehr-karlstetten.org//cms/templates/feuerwehr-karlstetten/favicon.ico">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
	.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
	.fa-anchor,.fa-coffee {font-size:200px}
	</style>
	<link href="css/print.css" rel="stylesheet" media="print">
    <link href="css/print-preview.css" rel="stylesheet" type="text/css" media="screen">
	
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
	
	<!-- <span class="brand" href="#"><img src="img/logo.png" style="height:19px;margin-top:-5px" alt="FFK Logo">&nbsp;&nbsp;VB-Berechnungs-App</span>
	-->
	
	<!--<a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>-->
	<?
	foreach ($sites as $id => $site) {
		if ($site[2]) {
			echo '<a href="?id='.$id.'" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white ';
			if ($site[0]==$topic) {
				echo 'w3-white';
			}
			echo '">'.$site[1].'</a>';
		}
	}
	?>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>

<!-- Header -->
<!--<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">START PAGE</h1>
  <p class="w3-xlarge">Template by w3.css</p>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started</button>
</header>-->

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
  <?php 
	if (file_exists($topic)) {
	  include($topic);
	}
  ?>
  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>