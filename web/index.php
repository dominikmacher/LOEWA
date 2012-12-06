<?php
  $site = "loewa.php";
  if (isset($_GET['id'])) {
    $site = $_GET['id'].".php";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Freiwillige Feuerwehr Karlstetten</title>
    <link type="image/x-icon" rel="shortcut icon" href="../../templates/feuerwehr-karlstetten/favicon.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	
	  <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <span class="brand" href="#">VB-Berechnungs-App</span>
          <div class="nav-collapse">
            <ul class="nav">
            <?php
              echo '<li '.($site=="loewa.php" ? 'class="active"' : "").'><a href="?id=loewa">Berechnung</a></li>';
              echo '<li '.($site=="list.php" ? 'class="active"' : "").'><a href="?id=list">Abgespeicherte Objekte</a></li>';
              echo '<li '.($site=="about.php" ? 'class="active"' : "").'><a href="#about">About</a></li>';
              echo '<li '.($site=="contact.php" ? 'class="active"' : "").'><a href="#contact">Contact</a></li>';
            ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <?php 
        if (file_exists($site)) {
          include ($site);
        }
      ?>

    </div> <!-- /container -->


  </body>
</html>


