<?php
  session_start();

  $sites = array("loewa.php", "list.php", "about.php", "loeschhilfe.php", "login.php", "logout.php", "settings.php");
  $site = $sites[0];
  if (isset($_GET['id'])) {
    $site = $sites[$_GET['id']];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Freiwillige Feuerwehr Karlstetten</title>
    <link type="image/x-icon" rel="shortcut icon" href="http://www.feuerwehr-karlstetten.org//cms/templates/feuerwehr-karlstetten/favicon.ico">

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
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/bootstrap-print.css" rel="stylesheet" media="print">
    <link href="css/print.css" rel="stylesheet" media="print">
    <link href="css/print-preview.css" rel="stylesheet" type="text/css" media="screen">
	
	  <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>
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
          <div class="nav-search" style="float:right">
            <ul class="nav">
            <?php 
              if (!isset($_SESSION['LOEWA_USER'])) {
                echo '<li><a href="?id=4"><i class="icon-user"></i> Login</a></li>';
              }
              else {
                //echo '<li><a href="?id=4"><i class="icon-user"></i> Logout</a></li>';
              ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['LOEWA_NAME']; ?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="?id=6"><i class="icon-wrench"></i> Passwort ändern</a></li>
                    <li><a href="?id=5"><i class="icon-off"></i> Abmelden</a></li>
                  </ul>
                </li>
              <?
              }
            ?>
            </ul>

          </div>
          <span class="brand" href="#"><img src="img/logo.png" style="height:19px;margin-top:-5px" alt="FFK Logo">&nbsp;&nbsp;VB-Berechnungs-App</span>
          <div class="nav-collapse">
            <ul class="nav">
            <?php
              echo '<li '.($site=="loewa.php" ? 'class="active"' : "").'><a href="?id=0">L&ouml;Wa</a></li>';
              echo '<li '.($site=="loeschhilfe.php" ? 'class="active"' : "").'><a href="?id=3">L&ouml;schhilfe</a></li>';
              echo '<li '.($site=="list.php" ? 'class="active"' : "").'><a href="?id=1">Abgespeicherte Objekte</a></li>';
              echo '<li '.($site=="about.php" ? 'class="active"' : "").'><a href="?id=2">Info</a></li>';
            ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div id="content" class="container">
      <?php 
        if (file_exists($site)) {
          include($site);
        }
      ?>
    </div>

  </body>
</html>


