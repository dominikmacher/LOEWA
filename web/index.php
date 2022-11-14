<?php
  $sites = array(
    0=>array('loewa.php','L&ouml;Wa Berechnung',true),
    1=>array('loeschhilfe.php','L&ouml;schhilfe',false),
    2=>array('hydranten.php','Digitaler Hydrantenplan',true),
    3=>array('about.php','Info',true)
  );
 
  $topic = $sites[0][0];
  if (isset($_GET['id'])) {
    $topic = $sites[$_GET['id']][0];
  }
?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>140 Jahre Freiwillige Feuerwehr Karlstetten</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <link rel="icon" type="image/png" href="favicon-128x128.png" sizes="128x128">
  <link rel="apple-touch-icon" href="favicon-128x128.png"/>
  <link rel="stylesheet" href="css/w3.css" type="text/css" media="screen" />
  <link rel='stylesheet' href='css/simplelightbox.css' type='text/css'>
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/simplelightbox.js"></script>
  <script src="js/navigation.js" type="text/javascript"></script>
  <script type="text/javascript">
  <!--
    var baseUrl = "http://www.feuerwehr-karlstetten.at";
  //-->
  </script> 
</head>

<body>

<div>
  <!-- Sidebar Navigation -->
  <nav class="w3-sidebar w3-top w3-right " style="width: 250px;" id="SidebarNavigation">
    <div class="w3-container w3-display-container w3-padding-16 HomeLink" title="Zur Hauptseite">
      <img class="w3-image" src="logo.png" alt="Logo" width="120px">
      <div class="" style="font-weight:700; padding-top: 15px; font-size: 18px !important; padding-bottom:15px; border-bottom: 1px solid #ccc">VB Berechnungs-App</div>
    </div>
    <div class="w3-bar-block w3-large" style="padding-top:0px; ">
      <?
      foreach ($sites as $id => $site) {
        if ($site[2]) {
          echo '<a target="" href="index.php?id='.$id.'" title="'.$site[1].'" class="w3-bar-item w3-button ';
          echo '">'.$site[1].'</a>';
        }
      }
      ?>
    </div>
    
  </nav>

  <div id="NavigationBarSticky" class="w3-card-4 w3-top">
    <div class="w3-bar sub-bar w3-large " style="padding-top: 0px; height: 100%;">
      <div class="w3-bar-content">
        <div class="w3-right">
          <div class="w3-bar w3-hide-medium w3-hide-small">
            <?
            foreach ($sites as $id => $site) {
              if ($site[2]) {
                echo '<a target="" href="index.php?id='.$id.'" title="'.$site[1].'" class="w3-bar-item w3-button w3-mobile ';
                if ($site[0]==$topic) {
                  echo 'w3-strong';
                }
                echo '">'.$site[1].'</a>';
              }
            }
            ?>
          </div>
          <div class="w3-bar w3-hide-large" style="padding-right: 5px; ">
            <a href="#" class="MobileNavButton w3-bar-item w3-hover-text-white w3-button w3-mobile" style="height: 43px; width: 43px;"><!--Menü --><i class="fa fa-bars"></i></a>
          </div>
        </div>
        <div class="w3-left" style="padding-top: 4px; padding-left: 15px; padding-bottom:0px; display: inline-block;">
          <div class="w3-left HomeLink" title="Startseite">
            <div class="w3-left" style="padding-right: 10px">
                <img class="w3-image" src="logo.png" style="height:34px" alt="Logo">
            </div>
            <div class="w3-right w3-large" style="padding-top: 3px; font-weight: 700"><a target="_blank" href="http://feuerwehr-karlstetten.org" title="Zur Hauptseite" style="text-decoration:none">VB Berechnungs-App</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay" style="cursor:pointer" title="close side menu" id="SiteOverlay"></div>

</div>

<div class="w3-content">

<?php
  if (file_exists($topic)) {
    include($topic);
  }
?>

</div>

<script type="text/javascript" src="js/effects.js"></script>

<footer class="w3-container w3-padding-16 w3-center w3-xlarge w3-text-white" style="margin-top:100px; background-color: #333"> 
  <p class="w3-medium">
    <a href="http://www.feuerwehr-karlstetten.org" class="w3-hover-text-grey w3-text-white">Hauptseite</a>
    &nbsp;&nbsp; | 
    &nbsp;&nbsp;
    <a href="http://feuerwehr-karlstetten.org/cms/impressum" class="w3-hover-text-grey w3-text-white">Impressum</a>
    &nbsp;&nbsp; |  
    &nbsp;&nbsp;
    Finde uns auch hier: 
    &nbsp;&nbsp;
    <a href="https://www.facebook.com/ffkarlstetten" title="Facebook" target="_blank" class="w3-large w3-hover-text-grey w3-text-white"><i class="fa fa-facebook w3-hover-opacity"></i></a>
    &nbsp;&nbsp;
  <a href="https://www.youtube.com/channel/UC5WQdBqssNLan9ryVytKQuQ" title="YouTube" target="_blank" class="w3-large w3-hover-text-grey w3-text-white"><i class="fa fa-youtube w3-hover-opacity"></i></a>  
  &nbsp;&nbsp; |  
  &nbsp;&nbsp; Copyright © Freiwillige Feuerwehr Karlstetten 2021</p>
  
</footer>
</body>
</html>
