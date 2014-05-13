<?php
	session_start();

	$data = json_encode($_POST);
	$dir = "data/".$_SESSION['LOEWA_USER']."/";
	if (!is_dir($dir)) {
		mkdir($dir);
	}

	$filename = $dir.$_POST['objekt'];
	if (!empty($_POST['brandabschnitt']))
		$filename.= "__".$_POST['brandabschnitt'];
	$filename.= ".json";
	
	if (!file_exists($filename)) {
		touch($filename);
	}

	if (!$handle = fopen($filename, "w")) {
     	print "Kann die Datei $filename nicht öffnen";
     	exit;
    }

    if (!fwrite($handle, $data)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }
    fclose($handle);	

	echo "saved";
?>