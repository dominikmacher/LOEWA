<?php
	$data = json_encode($_POST);
	$filename = "data/".$_POST['object'].".json";
	
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