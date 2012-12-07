<html>
<script src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
<?php
if (file_exists("trvb_137_textual.txt")) {
	$handle = fopen("trvb_137_textual.txt", "rb");
	$content = stream_get_contents($handle);
	fclose($handle);
	echo "var content = jQuery.parseJSON('".json_encode(explode("\n", $content))."');";

/*	$zeichenkette = '15. April 2003';
	$suchmuster = '/(\d+)\. (\w+) (\d+)/i';
	$ersetzung = '${2}1,$3';
	echo preg_replace('/^[0-9]+ [\w]+[\w (),-=]* [0-9]+[,]{0,1}[0-9]* [0-9]+,[0-9]+/', " => ", $content);
*/
}
?>
for (var i=0; i<content.length; i++) {
	var line = jQuery.trim(content[i]);
	var lines = line.split(" "); 

	var rowNr = lines[0];
	var factors = new Array(lines[lines.length-2], lines[lines.length-1]);

	lines.splice(0, 1);
	lines.splice(lines.length-2, 2);
	document.write(rowNr + ' => array("' + lines.join(" ") + '", "' + factors[0] + '", "' + factors[1] + '"),<br>');
		//1 => array("Abstellraum für diverse Waren", "20.1", "1.8"),)
}
</script>
</html>