<script type="text/javascript" src="js/calculation.js"></script>
<script type="text/javascript" src="js/calculation_lib.js"></script>

<?php 
	include("anhang.php"); 
	ksort($nutzungsfaktoren, SORT_REGULAR);
	echo '<script type="text/javascript"> nutzungsfaktoren = jQuery.parseJSON(\''.json_encode($nutzungsfaktoren).'\'); </script>';

	if (isset($_GET['json']) && isset($_SESSION['LOEWA_USER'])) {
		if (file_exists("data/".$_SESSION['LOEWA_USER']."/".$_GET['json'].".json")) {
			$handle = fopen("data/".$_SESSION['LOEWA_USER']."/".$_GET['json'].".json", "rb");
			echo '<script type="text/javascript">';
			echo ' json_data = jQuery.parseJSON(\''.stream_get_contents($handle).'\');';
			echo '</script>';
			fclose($handle);
		}
	}
?>

<h1>Objektbezogene L&ouml;schwasserbedarfsermittlung <small>(gem&auml;ß TRVB F 137)</small></h1>

 <div class="w3-panel w3-border w3-light-grey w3-round-large">
  <p>Info: Die Berechnung erfolgt automatisch mit Eingabe der jeweiligen Werte in die vorgesehenen Eingabefelder.</p>
</div> 

<br><br>


<form name="loewa_form" id="loewa_form" onsubmit="saveCalc()">

<!-- Grundschutz -->
<h2>1. Tats&auml;chlich vorhandener L&ouml;schwasserbedarf f&uuml;r den Grundschutz</h2>
<div class="w3-row">
	<div class="w3-twothird" style="padding-right:10px;">
		L&ouml;schwasserrate Q<sub>LWG</sub> f&uuml;r eine Lieferdauer von 90min gem&auml;ß beiliegender Angabe des kommunalen Wasserversorgungsunternehmes bzw. der Erhebung entsprechend der &Ouml;BF-Rl. VB01:
	</div>
	<div class="w3-third" style="font-weight:bold">
		Q<sub>LWG</sub> = <input id="qlwg" type="text" style="width:100px"> l/min
		<div id="label_lwg" class="w3-panel w3-pale-red w3-leftbar w3-border-red" style="font-weight: 400;">Bitte geben Sie Q<sub>LWG</sub> an...</div> 
	</div>
</div>

<br class="vertical_sep"><br class="vertical_sep">

<!-- Objektschutz -->
<h2>2. L&ouml;schwasserbedarf f&uuml;r den Objektschutz</h2>
<h3>2.1. Spezifische L&ouml;schwasserrate f&uuml;r die immobile Brandbelastung</h3>

<div class="w3-row">
	<input class="w3-radio" type="radio" name="options_brandbelastung" value="0" id="options_brandbelastung1" checked>
	<label>W&auml;nde und Decke nichtbrennbar (q<sub>LWi</sub> = 0 l/(m²min))</label>
	<br/>
	<input class="w3-radio" type="radio" name="options_brandbelastung" value="0.5" id="options_brandbelastung2" >
	<label>W&auml;nde oder Decke nichtbrennbar (q<sub>LWi</sub> = 0,5 l/(m²min))</label>
	<br/>
	<input class="w3-radio" type="radio" name="options_brandbelastung" value="1" id="options_brandbelastung3" >
	<label>W&auml;nde und Decke brennbar (q<sub>LWi</sub> = 1,0 l/(m²min))</label>
</div>

<br/>	
<h3>2.2. Spezifische L&ouml;schwasserrate f&uuml;r die mobile Brandbelastung</h3>
<div class="w3-row">
	<!--<div class="w3-third">
		laufende Nr.: <input type="text" id="lfd_nr" style="width:50px" readonly>
	</div>-->
	<div class="w3-twothird">
		Nutzung: <select id="nutzung">
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

<br/>
<h3>2.3. Rechnerische Brandfl&auml;che</h3>
<div class="w3-row">
	<div class="w3-twothird" style="padding-right:20px;">
		Brandabschnittsfl&auml;che A<sub>B</sub> = <input type="text" id="ab_in" style="width:100px"> m²
		<div id="label_ab" class="w3-panel w3-pale-red w3-leftbar w3-border-red" style="font-weight: 400;">Bitte geben Sie A<sub>B</sub> ein...</div>
	</div>
	<div class="w3-third">
		<strong>Resultierende A<sub>B</sub> = <input type="text" readonly id="ab_out" style="width:100px"> m²</strong>
	</div>
</div>
<div class="w3-row">
	<input class="w3-check" type="checkbox" id="options_brandflaeche1" name="options_brandflaeche1">
	<label>Keine Brandschutzeinrichtung vorhanden</label>
	<br/>
	<input class="w3-check" type="checkbox" id="options_brandflaeche2" name="options_brandflaeche2">
	<label>L&ouml;Wa-Grundschutz vorhanden</label>
	<br/>
	<input class="w3-check" type="checkbox" id="options_brandflaeche3" name="options_brandflaeche3">
	<label>Automatische Brandmeldeanlage gem&auml;ß TRVB S 123 mit automatischer Alarmweiterleitung gem&auml;ß TRVB S 114</label>
	<br/>
	<input class="w3-check" type="checkbox" id="options_brandflaeche4" name="options_brandflaeche4">
	<label>Betriebsfeuerwehr mit st&auml;ndigem Bereitschaftsdienst S2 gem&auml;ß TRVB 100 und automatischer Brandmeldeanlage gem&auml;ß TRVB S 123</label>
	<br/>
	<input class="w3-check" type="checkbox" id="options_brandflaeche5" name="options_brandflaeche5">
	<label>Automatische L&ouml;schanlage mit automatischer Alarmweiterleitung gem&auml;ß TRVB S 114</label>

</div>
	
<br/>
<h3>2.4. L&ouml;schwasserrate f&uuml;r den Objektschutz</h3>
<div class="w3-row">
	<div class="w3-twothird">
		Eingabe nur relevant, wenn Lagerh&ouml;he h<sub>L</sub> von Lager oder Lagerungen > 2,5m:
		<br>
		h<sub>L</sub> = <input type="text" value="0" id="hl" style="width:100px"> m
	</div>
	<div class="w3-third" style="font-weight:bold">
		Q<sub>LWO</sub> = <input type="text" id="qlwo" readonly style="width:100px"> l/min
	</div>
</div>

<div class="w3-row">
	<div class="w3-third offset8" 
	</div>
</div>


<br class="vertical_sep"><br class="vertical_sep">

<!-- L&ouml;schwasserbereitstellung -->
<h2>3. L&ouml;schwasserbereitstellung</h2>
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
		&nbsp;&nbsp;&nbsp;
		<!-- Button to trigger modal -->
	<?php if (isset($_SESSION['LOEWA_USER'])) { ?>
		<button id="btnDialog" href="#" class="w3-button w3-green w3-large"><i class="fa fa-save w3-hover-opacity"></i> Berechnung speichern</button>
	<?php } ?>
	</div>
</div>
</div>
     
	 
<!-- Modal Dialog -->
<div id="saveModal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
		<div class="w3-center">
			<span id="btnClose" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
			<h2>Berechnung abspeichern</h2>
		</div>
		
		<div class="w3-container">
			<div class="w3-section">
				<label><b>Objekt: </b></label>
				<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Objekt" id="objekt" name="objekt" required>
				<label><b>Brandabschnitt: </b></label>
				<input class="w3-input w3-border" type="text" id="brandabschnitt" placeholder="Brandabschnitt" name="brandabschnitt">

				<button class="w3-button w3-block w3-green w3-section w3-padding" id="btnSave" type="submit" href="#">Speichern</button>
			</div>
		</div>
	</div>
</div>

</form>


<form id="print_form" name="print_form" method="post" action="print.php">
	<input type="hidden" name="printContent" id="printContent" value="" />
</form>