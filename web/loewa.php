<?php 
	include("anhang.php"); 
	ksort($nutzungsfaktoren, SORT_REGULAR);
	echo '<script type="text/javascript">var nutzungsfaktoren = jQuery.parseJSON(\''.json_encode($nutzungsfaktoren).'\'); </script>';
?>

<h1>Objektbezogene Löschwasserbedarfsermittlung <small>(gemäß TRVB F 137)</small></h1>

<!--<p>Objekt: .................</p>

<p>Brandabschnitt: .........</p>-->

<br><br>

<form name="loewa_form">

<!-- Grundschutz -->
<div class="row-fluid">
	<div class="span12">
		<h4>1. Tatsächlich vorhandener Löschwasserbedarf für den Grundschutz</h4>
	</div>
	<div class="row-fluid">
		<div class="span8">
			<p>Löschwasserrate Q<sub>LWG</sub> für eine Lieferdauer von 90min gemäß beiliegender Angabe des kommunalen Wasserversorgungsunternehmes bzw. der Erhebung entsprechend der ÖBF-Rl. VB01:<p>
		</div>
		<div class="span4" style="font-weight:bold">
			Q<sub>LWG</sub> = <input id="qlwg" type="text" style="width:100px"> l/min
			<div id="label_lwg"><span class="label label-warning">Bitte geben Sie Q<sub>LWG</sub> an...</span></div>
		</div>
	</div>
</div>

<br><br>

<!-- Objektschutz -->
<div class="row-fluid">
	<div class="span12">
		<h4>2. Löschwasserbedarf für den Objektschutz</h4>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<strong>2.1. Spezifische Löschwasserrate für die immobile Brandbelastung</strong>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span11 offset1">
			<label class="radio">
				<input type="radio" value="0" id="options_brandbelastung1" name="options_brandbelastung" checked> Wände und Decke nichtbrennbar (q<sub>LWi</sub> = 0 l/(m²min))
			</label>
			<label class="radio">
				<input type="radio" value="0.5" id="options_brandbelastung2" name="options_brandbelastung"> Wände oder Decke nichtbrennbar (q<sub>LWi</sub> = 0,5 l/(m²min))
			</label>
			<label class="radio">
				<input type="radio" value="1" id="options_brandbelastung3" name="options_brandbelastung"> Wände und Decke brennbar (q<sub>LWi</sub> = 1,0 l/(m²min))
			</label>
		</div>
	</div>
	
	<div class="span12">
	</div>

	<div class="row-fluid">
		<div class="span12">
			<strong>2.2. Spezifische Löschwasserrate für die mobile Brandbelastung</strong> (erst 40 Daten vorhanden...)
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
			<div id="label_nutzung"><span class="label label-warning">Bitte wählen Sie einen Nutzungsfaktor...</span></div>
		</div>
		<div class="span4" style="font-weight:bold">
			Q<sub>LWM</sub> = <input type="text" id="qlwm" readonly style="width:100px"> l/min
		</div>
	</div>

	<div class="span12">
	</div>

	<div class="row-fluid">
		<div class="span12">
			<strong>2.3. Rechnerische Brandfläche</strong>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6 offset1">
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche1" name="options_brandflaeche1"> Keine Brandschutzeinrichtung vorhanden
			</label>
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche2" name="options_brandflaeche2"> LöWa-Grundschutz vorhanden
			</label>
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche3" name="options_brandflaeche3"> Automatische Brandmeldeanlage gemäß TRVB S 123 mit automatischer Alarmweiterleitung gemäß TRVB S 114
			</label>
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche4" name="options_brandflaeche4"> Betriebsfeuerwehr mit ständigem Bereitschaftsdienst S2 gemäß TRVB 100 und automatischer Brandmeldeanlage gemäß TRVB S 123
			</label>
			<label class="checkbox">
				<input type="checkbox" id="options_brandflaeche5" name="options_brandflaeche5"> Betriebsfeuerwehr mit ständigem Bereitschaftsdienst S2 gemäß TRVB 100 und automatischer Brandmeldeanlage gemäß TRVB S 123
			</label>
		</div>
		<div class="span5">
			<div style="margin-left:-20px;">Brandabschnittsfläche A<sub>B</sub> = <input type="text" id="ab_in" style="width:100px"> m²</div>
			<div id="label_ab"><span class="label label-warning">Bitte geben Sie A<sub>B</sub> ein...</span></div>
			<div style="margin-top:100px; padding-left:20px; font-weight:bold">Resultierende A<sub>B</sub> = <input type="text" readonly id="ab_out" style="width:100px"> m²</div>
		</div>
	</div>
	
	<div class="span12">
	</div>

	<div class="row-fluid">
		<div class="span12">
			<strong>2.4. Löschwasserrate für den Objektschutz</strong>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span7 offset1">
			Wenn Lagerhöhe h<sub>L</sub> von Lager oder Lagerungen in Kundenbereichen von Verkaufsstätten > 2,5m:
		</div>
		<div class="span4" style="padding-left:20px">
			h<sub>L</sub> = <input type="text" id="hl" style="width:100px"> m
			<div style="display:none" id="label_hl"><span class="label label-warning">Bitte geben Sie h<sub>L</sub> >2,5m (!!) ein...</span><br><br></div>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span4 offset8" style="font-weight:bold">
			Q<sub>LWO</sub> = <input type="text" id="qlwo" readonly style="width:100px"> l/min
		</div>
	</div>
</div>


<br><br>

<!-- Löschwasserbereitstellung -->
<div class="row-fluid">
	<div class="span8">
		<h4>3. Löschwasserbereitstellung</h4>
	</div>
	<div class="span4">
		<!-- Button to trigger modal -->
		<a href="#myModal" role="button" id="btnDialog" class="btn btn-success" data-toggle="modal">Berechnung speichern</a>
	</div>
	<div class="row-fluid">
		<div class="span5 offset1" style="font-weight:bold">
			Löschwasserbereitstellung = <input type="text" id="lw_bereitstellung" readonly style="width:100px"> l/min
		</div>
		<div class="span6" style="font-weight:bold">
			Löschwasservorrat (für 90min) = <input type="text" id="lw_vorrat" readonly style="width:100px"> m³
		</div>
	</div>
</div>


<script type="text/javascript" src="js/calculation.js"></script>


     
    <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Berechnung abspeichern</h3>
    </div>
    <div class="modal-body">
		<div class="row-fluid">
			<div class="span4">Objekt: </div>
			<div class="span8"><input type="text" id="object" style="width:300px" /></div>
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
