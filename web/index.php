<?php
  session_start();

  $sites = array(
	0=>array('loewa.php','L&ouml;Wa',true),
	1=>array('loeschhilfe.php','L&ouml;schhilfe',false),
	2=>array('list.php','Abgespeicherte Objekte',true),
	3=>array('hydranten.php','Digitaler Hydrantenplan',true),
	4=>array('about.php','Info',true),
	5=>array('login.php','Login',(isset($_SESSION['LOEWA_USER']) ? false : true)),
	//7=>array('settings.php','Einstellungen',(isset($_SESSION['LOEWA_USER']) ? true : false)),
	7=>array('logout.php','Logout',(isset($_SESSION['LOEWA_USER']) ? true : false))
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
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
	.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
	.fa-anchor,.fa-coffee {font-size:200px}
	.not-allowed { cursor: not-allowed; }
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
    <a class="w3-bar-item w3-button w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
	
	<img src="img/logo.png" class="w3-bar-item" style="padding:5px; height:50px;" alt="FF Logo" />
	<span class="w3-bar-item w3-padding-large w3-text-black" style="padding-left:10px !important;">VB-Berechnungs-App</span>
	<?
	foreach ($sites as $id => $site) {
		if ($site[2]) {
			echo '<a href="?id='.$id.'" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-padding-large w3-hover-white ';
			if ($site[0]==$topic) {
				echo 'w3-white';
			}
			echo '">'.$site[1].'</a>';
		}
	}
	?>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-light-grey w3-hide w3-hide-large w3-large">
    <?
	foreach ($sites as $id => $site) {
		if ($site[2]) {
			echo '<a href="?id='.$id.'" class="w3-bar-item w3-button w3-padding-large ';
			if ($site[0]==$topic) {
				echo 'w3-white strong';
			}
			echo '">'.$site[1].'</a>';
		}
	}
	?>
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


<!-- Footer -->
<footer class="w3-container w3-black w3-center w3-opacity w3-padding">  
  <div class="w3-xlarge">
    <a href="http://www.feuerwehr-karlstetten.org" target="_blank"><i class="fa fa-home w3-hover-opacity"></i></a>
    <a href="http://github.com/dominikmacher/LOEWA" target="_blank"><i class="fa fa-github w3-hover-opacity"></i></a>
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