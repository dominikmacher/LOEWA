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

function fillAdditionalTfl(obj, tfls, anzahlTfl, minimumLe) {
	obj.empty();
	$.each(tfls, function(tfl, le) {
		if (le >= minimumLe) {
			var tflLes = anzahlTfl + " TFL, Typ " + tfl;
			obj.append(
	    		$('<option></option>').val(tflLes).html(tflLes)
			);
		}
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

	if ($('#ab_in').val() != "") {
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
}

function calculateLaborTfl() {
	if ($('#labors').val() != "") {
		fillAdditionalTfl($('#tfl_labor'), tflZuordnung["BC"], $('#labors').val(), 3);
	}
	else {
		$('#tfl_labor').empty();
	}
}

function calculateZapfsauleTfl() {
	if ($('#zapfsaulen').val() != "") {
		fillAdditionalTfl($('#tfl_zapfsaule'), tflZuordnung["BC"], $('#zapfsaulen').val(), 6);
	}
	else {
		$('#tfl_zapfsaule').empty();
	}
}

$(document).ready(function() {

	$('#brandklasse_a').change(function() {
		calculateTfl();
	});
	$('#brandklasse_bc').change(function() {
		$('#accordion2').hide();
		if ($(this).is(':checked')) {
			$('#accordion2').show();
		}
		calculateTfl();
	});

	$('#ab_in').keyup(function() {
		$('#label_ab').show();
		if ($(this).val() != "") {
			$('#label_ab').hide();
			calculateTfl();
		}
	});

	$('#labors').keyup(function() {
		calculateLaborTfl();
	});

	$('#zapfsaulen').keyup(function() {
		calculateZapfsauleTfl();
	});

});
