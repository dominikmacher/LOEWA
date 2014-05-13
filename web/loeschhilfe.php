<style>
a.accordion-toggle {
	font-weight:bold; 
	/*color:#333333;*/
}
</style>

<script type="text/javascript">

/* Tabelle 6a: Zuordnung der tfl-Typen entsprechend ihren Löschmitteleinheiten: */
var tflZuordnung = new Object({
	// Brandklasse => [{TFL => x LE}]
	"A": {
		"G2": 2,
		"N10": 4,
		"S10": 4,
		"G6": 6,
		"G12": 12
	},
	"BC": {
		"K2": 1,
		"P2": 2,
		"K6": 3,
		"P6": 6,
		"P12": 12,
		"S10": 12
	},
	"ABC": {
		"G2": 2,
		"S10": 3,
		"G6": 6,
		"G12": 12
	}
});

var dhAusfuehrungsform = new Array(1, 2, 3);


function fillTfl(obj, tfls, les) {
	obj.empty();
	$.each(tfls, function(tfl, le) {
		var tflLes = Math.ceil(les/le) + " TFL, Typ " + tfl + " (je " + le + " LE)";
		obj.append(
    		$('<option></option>').val(tflLes).html(tflLes)
		);
	});
}

function fillDh(obj, dhs) {
	obj.empty();
	for (i=0; i<dhAusfuehrungsform.length; i++) {
		var dhAusfuerung = Math.ceil(dhs) + " WH; Ausführung " + dhAusfuehrungsform[i];
		obj.append(
    		$('<option></option>').val(dhAusfuerung).html(dhAusfuerung)
		);
	}
}

function evalBrandklassen() {
	$('#label_brandklasse').hide();
	if ($('#brandklasse_a').is(':checked') && $('#brandklasse_bc').is(':checked')) {
		return "ABC";
	}
	else if ($('#brandklasse_a').is(':checked')) {
		return "A";
	}
	else if ($('#brandklasse_bc').is(':checked')) {
		return "BC";
	}
	$('#label_brandklasse').show();
	return false;
}

function calculateTfl() {
	var selectedBrandklassen = evalBrandklassen();
	var ab = parseInt($('#ab_in').val());

	var leNormal4 = Math.ceil(ab/200)*4;
	$('#le_normal_4').val(leNormal4);

	var tflDhNormal = Math.ceil(ab/500);
	$('#tfl_dh_normal').val(tflDhNormal);

	var leHoch12 = Math.ceil(ab/200)*12;
	$('#le_hoch_12').val(leHoch12);

	var leHoch4 = Math.ceil(ab/200)*4;
	$('#le_hoch_4').val(leHoch4);

	var dhHoch = Math.ceil(ab/500);
	$('#dh_hoch_4').val(dhHoch);
	
	if (selectedBrandklassen) {	
		fillTfl($('#tfl_normal_4'), tflZuordnung[selectedBrandklassen], leNormal4);
		fillTfl($('#tfl_normal'), tflZuordnung[selectedBrandklassen], tflDhNormal);
		fillDh($('#dh_normal'), tflDhNormal);

		fillTfl($('#tfl_hoch_12'), tflZuordnung[selectedBrandklassen], leHoch12);
		fillTfl($('#tfl_hoch_4'), tflZuordnung[selectedBrandklassen], leHoch4);
		fillDh($('#dh_hoch'), dhHoch);
	}
}

$(document).ready(function() {

	$('#brandklasse_a').change(function() {
		calculateTfl();
	});
	$('#brandklasse_bc').change(function() {
		calculateTfl();
	});

	$('#ab_in').keyup(function() {
		$('#label_ab').show();
		if ($(this).val() != "") {
			$('#label_ab').hide();
			calculateTfl();
		}
	});

});

</script>

<h1>Erste und erweiterte L&ouml;schhilfe <small>(gem&auml;ß TRVB F 124)</small></h1>

<br><br>

<form name="loeschhilfe_form">

<!-- Grundschutz -->
<div class="row-fluid">
	<div class="span12">
		<div>Firma ...</div>
		<div>Objekt...</div>
		<div>Brandabschnitt...</div>
		<div>Nutzung...2</div>
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

<div class="accordion" id="accordion2">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Normale Brandgef&auml;hrdung</a>
		</div>
		<div id="collapseOne" class="accordion-body collapse in">
			<div class="accordion-inner">
			4 LE / 200m2 => <input type="text" readonly id="le_normal_4" style="width:100px"> LE; d.s. <select id="tfl_normal_4"></select>
			<br />
			oder
			<br />
			(1 TFL + 1 DH) / 500m2 => <input type="text" readonly id="tfl_dh_normal" style="width:100px"> (TFL und DH); 
			d.s. <select id="tfl_normal"></select> und <select id="dh_normal"></select>
			<small>(WH Ausführungen siehe TRVB F 128)</small>
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading" style="font-weight:bold">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Hohe Brandgef&auml;hrdung</a>
		</div>
		<div id="collapseTwo" class="accordion-body collapse">
			<div class="accordion-inner">
			12 LE / 200m2 => <input type="text" readonly id="le_hoch_12" style="width:100px"> LE; d.s. <select id="tfl_hoch_12"></select>
			<br />
			oder
			<br />
			4 LE / 200m2 => <input type="text" readonly id="le_hoch_4" style="width:100px"> LE; d.s. <select id="tfl_hoch_4"></select>
			<br />
			und
			<br />
			1 DH / 500m2 => <input type="text" readonly id="dh_hoch_4" style="width:100px"> DH; 
			d.s. <select id="dh_hoch"></select>
			<small>(WH Ausführungen siehe TRVB F 128)</small>
			</div>
		</div>
	</div>
</div>

</form>