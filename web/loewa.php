<script type="text/javascript" src="js/calculation.js"></script>

<?php 
	include("anhang.php"); 
	ksort($nutzungsfaktoren, SORT_REGULAR);
	echo '<script type="text/javascript"> nutzungsfaktoren = jQuery.parseJSON(\''.json_encode($nutzungsfaktoren).'\'); </script>';

	if (isset($_GET['json'])) {
		if (file_exists("data/".$_GET['json'].".json")) {
			$handle = fopen("data/".$_GET['json'].".json", "rb");
			echo '<script type="text/javascript">';
			echo ' json_data = jQuery.parseJSON(\''.stream_get_contents($handle).'\');';
			echo '</script>';
			fclose($handle);
		}
	}
?>

<h1>Objektbezogene L&ouml;schwasserbedarfsermittlung <small>(gem&auml;ß TRVB F 137)</small></h1>

<br><br>

<form name="loewa_form">

<!-- Grundschutz -->
<div class="row-fluid">
	<div class="span12">
		<h4>1. Tats&auml;chlich vorhandener L&ouml;schwasserbedarf f&uuml;r den Grundschutz</h4>
	</div>
	<div class="row-fluid">
		<div class="span8">
			<p>L&ouml;schwasserrate Q<sub>LWG</sub> f&uuml;r eine Lieferdauer von 90min gem&auml;ß beiliegender Angabe des kommunalen Wasserversorgungsunternehmes bzw. der Erhebung entsprechend der &Ouml;BF-Rl. VB01:<p>
		</div>
		<div class="span4" style="font-weight:bold">
			Q<sub>LWG</sub> = <input id="qlwg" type="text" style="width:100px"> l/min
			<div id="label_lwg"><span class="label label-important">Bitte geben Sie Q<sub>LWG</sub> an...</span></div>
		</div>
	</div>
</div>

<br class="vertical_sep"><br class="vertical_sep">

<!-- Objektschutz -->
<div class="row-fluid">
	<div class="span12">
		<h4>2. L&ouml;schwasserbedarf f&uuml;r den Objektschutz</h4>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<strong>2.1. Spezifische L&ouml;schwasserrate f&uuml;r die immobile Brandbelastung</strong>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span11 offset1">
			<label class="radio">
				<input type="radio" value="0" id="options_brandbelastung1" name="options_brandbelastung" checked> W&auml;nde und Decke nichtbrennbar (q<sub>LWi</sub> = 0 l/(m²min))
			</label>
			<label class="radio">
				<input type="radio" value="0.5" id="options_brandbelastung2" name="options_brandbelastung"> W&auml;nde oder Decke nichtbrennbar (q<sub>LWi</sub> = 0,5 l/(m²min))
			</label>
			<label class="radio">
				<input type="radio" value="1" id="options_brandbelastung3" name="options_brandbelastung"> W&auml;nde und Decke brennbar (q<sub>LWi</sub> = 1,0 l/(m²min))
			</label>
		</div>
	</div>
	
	<div class="span12">
	</div>

	<div class="row-fluid">
		<div class="span12">
			<strong>2.2. Spezifische L&ouml;schwasserrate f&uuml;r die mobile Brandbelastung</strong>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3 offset1">
			laufende Nr.: <input type="text" id="lfd_nr" style="width:50px" readonly>
		</div>
		<div class="span4">
			Nutzung: <select id="nutzung">
				<option value=""> </option>
				<?php
					foreach ($nutzungsfaktoren as $key=>$faktor) {
						echo "<option value='".$key."'>".$faktor[0]."</option>";
					}
				?>
			</select>
			<!--<input type="text" id="bootstrap_test" data-provide="typeahead">-->
			<div id="label_nutzung"><span class="label label-important">Bitte w&auml;hlen Sie einen Nutzungsfaktor...</span></div>
		</div>
		<div class="span4" style="font-weight:bold">
			Q<sub>LWM</sub> = <input type="text" id="qlwm" readonly style="width:100px"> l/min
		</div>
	</div>

	<div class="span12">
	</div>

	<div class="row-fluid">
		<div class="span12">
			<strong>2.3. Rechnerische Brandfl&auml;che</strong>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6 offset1">
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche1" name="options_brandflaeche1"> Keine Brandschutzeinrichtung vorhanden
			</label>
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche2" name="options_brandflaeche2"> L&ouml;Wa-Grundschutz vorhanden
			</label>
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche3" name="options_brandflaeche3"> Automatische Brandmeldeanlage gem&auml;ß TRVB S 123 mit automatischer Alarmweiterleitung gem&auml;ß TRVB S 114
			</label>
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche4" name="options_brandflaeche4"> Betriebsfeuerwehr mit st&auml;ndigem Bereitschaftsdienst S2 gem&auml;ß TRVB 100 und automatischer Brandmeldeanlage gem&auml;ß TRVB S 123
			</label>
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche5" name="options_brandflaeche5"> Automatische L&ouml;schanlage mit automatischer Alarmweiterleitung gem&auml;ß TRVB S 114
			</label>
		</div>
		<div class="span5">
			<div style="margin-left:-20px;">Brandabschnittsfl&auml;che A<sub>B</sub> = <input type="text" id="ab_in" style="width:100px"> m²</div>
			<div id="label_ab"><span class="label label-important">Bitte geben Sie A<sub>B</sub> ein...</span></div>
			<div style="margin-top:100px; padding-left:20px; font-weight:bold">Resultierende A<sub>B</sub> = <input type="text" readonly id="ab_out" style="width:100px"> m²</div>
		</div>
	</div>
	
	<div class="span12">
	</div>

	<div class="row-fluid">
		<div class="span12">
			<strong>2.4. L&ouml;schwasserrate f&uuml;r den Objektschutz</strong>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span7 offset1">
			Wenn Lagerh&ouml;he h<sub>L</sub> von Lager oder Lagerungen in Kundenbereichen von Verkaufsst&auml;tten > 2,5m:
		</div>
		<div class="span4" style="padding-left:20px">
			h<sub>L</sub> = <input type="text" id="hl" style="width:100px"> m
			<div style="display:none" id="label_hl"><span class="label label-important">Bitte geben Sie h<sub>L</sub> >2,5m (!!) ein...</span><br><br></div>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span4 offset8" style="font-weight:bold">
			Q<sub>LWO</sub> = <input type="text" id="qlwo" readonly style="width:100px"> l/min
		</div>
	</div>
</div>


<br class="vertical_sep"><br class="vertical_sep">

<!-- L&ouml;schwasserbereitstellung -->
<div class="row-fluid">
	<div class="span8">
		<h4>3. L&ouml;schwasserbereitstellung</h4>
	</div>
	<div class="row-fluid">
		<div class="span5 offset1" style="font-weight:bold">
			L&ouml;schwasserbereitstellung = <input type="text" id="lw_bereitstellung" readonly style="width:100px"> l/min
		</div>
		<div class="span6" style="font-weight:bold">
			L&ouml;schwasservorrat (f&uuml;r 90min) = <input type="text" id="lw_vorrat" readonly style="width:100px"> m³
		</div>
	</div>
</div>


<br class="vertical_sep"><br class="vertical_sep">
<hr>


<!-- Bearbeiter, Datum -->
<div class="row-fluid">
	<div class="row-fluid">
		<div class="span7" style="font-weight:bold">
			Bearbeiter: <input type="text" id="bearbeiter" style="width:200px"> am <input type="text" id="datum" value="<?php echo date("d.m.Y"); ?>" style="width:75px">
		</div>
		<div class="span5">
			<!-- Button to print form -->
			<a href="#" role="button" id="btnPrint" class="btn btn-primary"><i class="icon-print icon-white"></i> Drucken</a>
			&nbsp;&nbsp;&nbsp;
			<!-- Button to trigger modal -->
			<a href="#saveModal" role="button" id="btnDialog" class="btn btn-success" data-toggle="modal"><i class="icon-ok icon-white"></i> Berechnung speichern</a>
		</div>
	</div>
</div>
     


<!--<p>Objekt: .................</p>

<p>Brandabschnitt: .........</p>-->



<!-- Modal Dialog -->
<div id="saveModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="saveModalLabel" aria-hidden="true">
    <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="saveModalLabel">Berechnung abspeichern</h3>
    </div>
    <div class="modal-body">
		<div class="row-fluid">
			<div class="span4">Objekt: </div>
			<div class="span8"><input type="text" id="objekt" style="width:300px" /></div>
		</div>
		<div class="row-fluid">
			<div class="span4">Brandabschnitt: </div>
			<div class="span8"><input type="text" id="brandabschnitt" style="width:300px" /></div>
		</div>
    </div>
    <div class="modal-footer">
	    <button class="btn" id="btnClose" data-dismiss="modal" aria-hidden="true">Close</button>
	    <button id="btnSave" class="btn btn-primary">Save changes</button>
 	</div>
</div>

</form>


<form id="print_form" name="print_form" method="post" action="print.php">
	<input type="hidden" name="printContent" id="printContent" value="" />
</form>