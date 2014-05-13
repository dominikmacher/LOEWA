<?php
if (!isset($_SESSION['LOEWA_USER'])) {
    echo '<p class="text-error" style="font-weight:bold">Bitte melden Sie sich an!</p>';
}
else {
    $dir = "data/".$_SESSION['LOEWA_USER']."/";
    if (isset($_GET['delete'])) {
    	if (file_exists($dir.$_GET['delete'].".json")) {
    		unlink($dir.$_GET['delete'].".json");
    	}
    }

    if (is_dir($dir) && $handle = opendir($dir)) {
        echo '<br>';
        echo '<table>';

        /* Das ist der korrekte Weg, ein Verzeichnis zu durchlaufen. */
        while (false !== ($file = readdir($handle))) {
        	if ($file==".." || $file=="." || $file==".gitignore")
        		continue;

        	echo '<tr>';
        	echo '<td><div class="btn-group">
    	     		<a class="btn" title="Show" href="?json='.str_replace(".json", "", $file).'"><i class="icon-list-alt"></i></a>
    	    		<a class="btn" title="Remove" href="javascript: if(confirm(\'Wirklich löschen?\')==true) {window.location.href=\'?id=1&delete='.str_replace(".json", "", $file).'\';}"><i class="icon-remove"></i></a>
    	    	</div></td>';

            echo '<td style="padding-left:10px; font-weight:bold">'.str_replace(".json", "", $file).'</td>';
            echo '</tr>';
        }

        closedir($handle);
        echo '</table>';
    }
}
?>