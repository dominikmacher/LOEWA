<?php 
include("anhang.php"); 
ksort($nutzungsfaktoren, SORT_REGULAR);
echo '<script type="text/javascript"> nutzungsfaktoren = jQuery.parseJSON(\''.json_encode($nutzungsfaktoren).'\'); </script>';
?>

<script type="text/javascript" src="js/calculation.js"></script>



<div class="w3-container">

<h1>Objektbezogene L&ouml;schwasserbedarfsermittlung <small>(gem&auml;ß TRVB F 137)</small></h1>

<br><br>

<div class="w3-panel w3-border w3-light-grey w3-round-large">
  <p>Info: Die Berechnung erfolgt automatisch mit Eingabe der jeweiligen Werte in die vorgesehenen Eingabefelder.</p>
</div> 

<br><br>


<form name="loewa_form" id="loewa_form" onsubmit="saveCalc()">

<!-- Objektschutz -->
<h2>1. L&ouml;schwasserbedarf f&uuml;r den Objektschutz</h2>


<h3>1.1. Spezifische L&ouml;schwasserrate f&uuml;r die immobile Brandbelastung</h3>

<?php
$waende = array(
	array("Wände einschließlich Dämmung Klasse A2","0",0),
	array("Wände aus Sandwichpaneelen Gesamtsystem Klasse B","0,25",0.25),
	array("Wände aus Baustoffen der Klasse A2 mit Dämmstoffen der Klasse D","0,25",0.25),
	array("Wände aus Holz u. Holzwerkstoffen d. Klasse D mit Dämmstoffen Klasse A2","0,35",0.35),
	array("Wände aus Sandwichpaneelen Gesamtsystem Klasse C","0,35",0.35),
	array("Außenwandbekleidungen sowie die Komponenten bzw. Gesamtsystem von nichttragenden Außenwänden der Klasse C","0,35",0.35),
	array("Wände aus Holz und Holzwerkstoffen der Klasse D","0,50",0.5)
);

echo '<b>Wände:</b>';
$i=0;
echo '<div class="w3-responsive"><table class="w3-table w3-striped">';
foreach ($waende as $wand) {
	echo '<tr>
			<td><input class="w3-radio" type="radio" name="options_brandbelastung_wand" value="'.$wand[2].'" id="options_brandbelastung_wand'.$i.'" '.($i==0 ? 'checked' : '').'></td>
			<td>'.$wand[0].'</td>
			<td style="width: 200px">(q<sub>LWi-Wand</sub> = '.$wand[1].' l/(m²min))</td>
		 </tr>';
	$i++;
}
echo '</table></div>';


$decken = array(
	array("Decken/Dächer und Dämmung Klasse A2","0",0),
	array("Decken/Dächer aus Sandwichpaneelen Gesamtsystem Klasse B","0,25",0.25),
	array("Dächer, welche als Gesamtsystem die Brandschutzanforderungen Broof (t1) erfüllen und deren Untersicht mindestens in Klasse A2 ausgeführt ist","0,25",0.25),
	array("Decken/Dächer aus Holz und Holzwerkstoffen der Klasse D mit Dämmstoffen Klasse A2","0,35",0.35),
	array("Decken/Dächer aus Sandwichpaneelen Gesamtsystem Klasse C","0,35",0.35),
	array("Decken/Dächer aus Holz und Holzwerkstoffen der Klasse D","0,50",0.5)
);

echo '<br>';

echo '<b>Decken / Dächer:</b>';
$i=0;
echo '<div class="w3-responsive"><table class="w3-table w3-striped">';
foreach ($decken as $decke) {
	echo '<tr>
			<td><input class="w3-radio" type="radio" name="options_brandbelastung_decke" value="'.$decke[2].'" id="options_brandbelastung_decke'.$i.'" '.($i==0 ? 'checked' : '').'></td>
			<td>'.$decke[0].'</td>
			<td style="width: 200px">(q<sub>LWi-Decke</sub> = '.$decke[1].' l/(m²min))</td>
		 </tr>';
	$i++;
}
echo '</table></div>';
?>

<p style="font-weight:bold">Q<sub>LWi</sub> = Q<sub>LWi-Wand</sub> + Q<sub>LWi-Decke</sub> = <input type="text" id="qlwi" readonly style="width:100px"> l/min</p>




<br/><br/>
<h3>1.2. Spezifische L&ouml;schwasserrate f&uuml;r die mobile Brandbelastung</h3>

<div class="w3-row">
	<!--<div class="w3-third">
		laufende Nr.: <input type="text" id="lfd_nr" style="width:50px" readonly>
	</div>-->
	<div class="w3-twothird">
		Nutzung: <select id="nutzung" class="w3-select w3-border" style="width:300px">
			<option value=""> </option>
			<?php
				foreach ($nutzungsfaktoren as $key=>$faktor) {
					echo "<option value='".$key."'>".$faktor[0]."</option>";
				}
			?>
		</select>
		
		<div id="label_nutzung" class="w3-panel w3-pale-red w3-leftbar w3-border-red"><span class="label label-important">Bitte w&auml;hlen Sie einen Nutzungsfaktor...</span></div>
	</div>
	<div class="w3-third" style="font-weight:bold">
		Q<sub>LWM</sub> = <input type="text" id="qlwm" readonly style="width:100px"> l/min
	</div>
</div>


<br/><br/>
<h3>1.3. Rechnerische Brandfl&auml;che</h3>

<div class="w3-row">
	<div class="w3-twothird" style="padding-right:20px;">
		Brandabschnittsfl&auml;che A<sub>B</sub> = <input id="ab_in" style="width:100px" type="number" min="0"> m²
		<div id="label_ab" class="w3-panel w3-pale-red w3-leftbar w3-border-red" style="font-weight: 400;">Bitte geben Sie A<sub>B</sub> ein...</div>
	</div>
	<div class="w3-third">
		<strong>Resultierende A<sub>B</sub> = <input type="text" readonly id="ab_out" style="width:100px"> m²</strong>
	</div>
</div>

<div class="w3-responsive">
	<table class="w3-table w3-striped">
		<tr>
			<td><input class="w3-radio" type="radio" name="options_brandflaeche" value="" id="options_brandflaeche1" checked></td>
			<td>Keine Brandschutzeinrichtung vorhanden</td>
		</tr>
		<tr>
			<td><input class="w3-radio" type="radio" name="options_brandflaeche" value="2000" id="options_brandflaeche2"></td>
			<td>Brandmeldeanlage (TRVB 123 S) mit Alarmweiterleitung (TRVB 114 S)</td>
		</tr>
		<tr>
			<td><input class="w3-radio" type="radio" name="options_brandflaeche" value="1200" id="options_brandflaeche3"></td>
			<td>Betriebsfeuerwehr (K3.2 gem. OIB-RL) und Brandmeldeanlage (TRVB 123 S) mit Alarmweiterleitung zur Betriebsfeuerwehr</td>
		</tr>
		<tr>
			<td><input class="w3-radio" type="radio" name="options_brandflaeche" value="750" id="options_brandflaeche4"></td>
			<td>Automatische Feuerlöschanlage (TRVB 127 S) oder Sauerstoffreduktionsanlage (TRVB S 155) jeweils mit Alarmweiterleitung (TRVB 114 S)</td>
		</tr>
	</table>
</div>

	
<br/><br/>
<h3>1.4. L&ouml;schwasserrate f&uuml;r den Objektschutz</h3>
<div class="w3-row">
	<div class="w3-twothird">
		Eingabe nur relevant, wenn Lagerh&ouml;he h<sub>L</sub> von Lager oder Lagerungen > 2,5m:
		<br>
		h<sub>L</sub> = <input type="number" value="" min="2.5" id="hl" style="width:100px"> m
	</div>
	<div class="w3-third" style="font-weight:bold">
		Q<sub>LWO</sub> = <input type="text" id="qlwo" readonly style="width:100px"> l/min
	</div>
</div>



<br/><br/>
<br/><br/>

<!-- L&ouml;schwasserbereitstellung -->
<h2>2. L&ouml;schwasserbereitstellung</h2>

<!-- Grundschutz -->
<h3>2.1. Tats&auml;chlich vorhandener L&ouml;schwasserbedarf f&uuml;r den Grundschutz</h3>
<div class="w3-row">
	<div class="w3-twothird" style="padding-right:10px;">
		L&ouml;schwasserrate Q<sub>LWG</sub> f&uuml;r eine Lieferdauer von 90min gem&auml;ß beiliegender Angabe des kommunalen Wasserversorgungsunternehmes bzw. der Erhebung entsprechend der &Ouml;BF-Rl. VB01:
	</div>
	<div class="w3-third" style="font-weight:bold">
		Q<sub>LWG</sub> = <input id="qlwg" type="number" min="0" value="0" style="width:100px"> l/min
		<div id="label_lwg" class="w3-panel w3-pale-red w3-leftbar w3-border-red" style="font-weight: 400;">Bitte geben Sie Q<sub>LWG</sub> an...</div> 
	</div>
</div>

<br/><br/>
<h3>2.2. Resultierender Löschwasservorrat</h3>
<div class="w3-row">
	<div class="w3-half" style="font-weight:bold">
		L&ouml;schwasserbereitstellung = <input type="text" id="lw_bereitstellung" readonly style="width:100px"> l/min
	</div>
	<div class="w3-half" style="font-weight:bold">
		L&ouml;schwasservorrat (f&uuml;r 90min) = <input type="text" id="lw_vorrat" readonly style="width:100px"> m³
	</div>
</div>


<br class="vertical_sep"><br class="vertical_sep">
<hr>


<!-- Bearbeiter, Datum -->
<div class="w3-row">
	<div class="w3-half" style="font-weight:bold">
		Bearbeiter: <input type="text" id="bearbeiter" style="width:200px"> am <input type="text" id="datum" value="<?php echo date("d.m.Y"); ?>" style="width:75px">
	</div>
	<div class="w3-half">
		<!-- Button to print form -->
		<button class="w3-button w3-green w3-large" href="#" role="button" id="btnPrint"><i class="fa fa-print w3-hover-opacity"></i> Drucken</button>
	</div>
</div>
</div>
     
	 
</form>


</div>