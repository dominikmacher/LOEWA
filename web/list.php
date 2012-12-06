<?php
if ($handle = opendir('data')) {
    
    /* Das ist der korrekte Weg, ein Verzeichnis zu durchlaufen. */
    while (false !== ($file = readdir($handle))) {
    	if ($file==".." || $file==".")
    		continue;

        echo "<li>$file</li>";
    }

    closedir($handle);
}
?>