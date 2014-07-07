<style>
a.accordion-toggle {
	font-weight:bold; 
}
</style>

<script type="text/javascript" src="js/calculation2.js"></script>

<h1>Erste und erweiterte L&ouml;schhilfe <small>(gem&auml;ß TRVB F 124)</small></h1>

<br><br>

<form name="loeschhilfe_form">

<!-- Grundschutz -->
<div class="row-fluid">
	<div class="span12">
		<!--<div>Objekt...</div>
		<div>Brandabschnitt...</div>-->
		<div>Brandabschnittsfl&auml;che A<sub>B</sub> = <input type="text" id="ab_in" style="width:100px"> m²</div>
		<div id="label_ab"><span class="label label-important">Bitte geben Sie A<sub>B</sub> ein...</span></div>
		<br />
		<label class="checkbox">
			<input type="checkbox" id="brandklasse_a" name="brandklasse_a"> Brandklasse(n) A
		</label>
		<label class="checkbox">
			<input type="checkbox" id="brandklasse_bc" name="brandklasse_bc"> Brandklasse(n) B/C
		</label>
		<div id="label_brandklasse"><span class="label label-important">Bitte w&auml;hlen Sie zumindest eine Brandklasse aus...</span></div>
	</div>

	<div class="span12">
	</div>
</div>

<div class="accordion" id="accordion1">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">Normale Brandgef&auml;hrdung</a>
		</div>
		<div id="collapseOne" class="accordion-body collapse in">
			<div class="accordion-inner">
			4 LE / 200m² => <input type="text" readonly id="le_normal_4" style="width:100px"> LE; d.s. <select id="tfl_normal_4"></select>
			<br />
			oder
			<br />
			(1 TFL + 1 DH) / 500m² => <input type="text" readonly id="tfl_dh_normal" style="width:100px"> (TFL und DH); 
			d.s. <select id="tfl_normal"></select> und <select id="dh_normal"></select>
			<small>(WH Ausführungen siehe TRVB F 128)</small>
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading" style="font-weight:bold">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">Hohe Brandgef&auml;hrdung</a>
		</div>
		<div id="collapseTwo" class="accordion-body collapse">
			<div class="accordion-inner">
			12 LE / 200m² => <input type="text" readonly id="le_hoch_12" style="width:100px"> LE; d.s. <select id="tfl_hoch_12"></select>
			<br />
			oder
			<br />
			4 LE / 200m² => <input type="text" readonly id="le_hoch_4" style="width:100px"> LE; d.s. <select id="tfl_hoch_4"></select>
			<br />
			und
			<br />
			1 DH / 500m² => <input type="text" readonly id="dh_hoch_4" style="width:100px"> DH; 
			d.s. <select id="dh_hoch"></select>
			<small>(WH Ausführungen siehe TRVB F 128)</small>
			</div>
		</div>
	</div>
</div>
<div class="accordion" id="accordion2" style="display:none">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">Zus&auml;tzlich (f&uuml;r Brandklasse B)</a>
		</div>
		<div id="collapseNot" class="accordion-body collapse in">
			<div class="accordion-inner">
			Anzahl Labor-Räume > 20m² = <input type="text" id="labors" style="width:100px"> => je Labor > 20m²: 1 TFL (3 LE); d.s. <select id="tfl_labor"></select>
			<br />
			Anzahl Zapfs&auml;uleninseln = <input type="text" id="zapfsaulen" style="width:100px"> => je Zapfs&auml;uleninsel: 1 TFL (6 LE); d.s. <select id="tfl_zapfsaule"></select>
			</div>
		</div>
	</div>
</div>

</form>