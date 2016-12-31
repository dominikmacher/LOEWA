function roundResult(v) {
	return Math.round(v * 100) / 100;
}

function parseVal(v) {
  return parseFloat((v + "").replace(/,/g, "."));
}


function calcBrandflaecheWOP() {
	brandflaeche = new Array(
		document.loewa_form.options_brandflaeche1.checked,
		document.loewa_form.options_brandflaeche2.checked,
		document.loewa_form.options_brandflaeche3.checked,
		document.loewa_form.options_brandflaeche4.checked,
		document.loewa_form.options_brandflaeche5.checked
	);
	$('#ab_out').val(calcBrandflaeche($('#ab_in').val(), brandflaeche));
}

/**
 * Call parameters:
  abIn = $('#abIn').val();
  brandflaecheOptions = new Array(
		document.loewa_form.options_brandflaeche1.checked,
		document.loewa_form.options_brandflaeche2.checked,
		document.loewa_form.options_brandflaeche3.checked,
		document.loewa_form.options_brandflaeche4.checked,
		document.loewa_form.options_brandflaeche5.checked
	);
 *
 * return: 
  $('#ab_out').val(abOut);
 */
function calcBrandflaeche(abIn, brandflaecheOptions) {
	var abOut = abIn;

	// Check checkboxes:
	var lowestAb=0;
	if (brandflaecheOptions[4]) {
		lowestAb = 750;
	}
	else if (brandflaecheOptions[3]) {
		lowestAb = 1200;
	}
	else if (brandflaecheOptions[2]) {
		lowestAb = 2000;
	}
	
	if (lowestAb!=0) {
		if (lowestAb < abOut || abOut==0 || abOut=="") {
			abOut = lowestAb;
		}
	}

	if (abOut!="") {
		$('#label_ab').hide();
	}
	else {
		$('#label_ab').show();
	}

	return abOut;
}



/**
  qlwi = $("input[name='options_brandbelastung']:checked").val()
  qlwm = $('#qlwm').val()
  ab = $('#ab_out').val()
  hL = $('#hl').val()
 */
function calcLwo(qLwi, qLwm, ab, hL) {
  var qLwo = "";

  if (ab != "" && qLwm != "") {
    qLwi = parseVal(qLwi);
    qLwm = parseVal(qLwm);
    ab = parseVal(ab);
    hL = parseVal(hL);

    qLwo = (qLwi + qLwm);
    if (hL !="" && hL>2.5) {
      // extended formula:
      qLwo *= (ab + 4*(hL-2.5) * Math.sqrt(ab)); 
    }
    else {
      qLwo *= ab;
    }

    qLwo = roundResult(qLwo);
  }
  return qLwo;
}


/**
 qLwg = $('#qlwg').val()
 */
function calcLw(qLwg, qLwo) {
  var lw = 0, lwVorrat = 0;
  if (qLwg != "" && qLwo != "") {
    qlwg = parseVal(qLwg);
    qLwo = parseVal(qLwo);
    lw = ((qLwo-qLwg)>=0 ? (qLwo-qLwg) : 0); 
    // Bereitstellung:
    lwVorrat = lw*90/1000;
  }
  return [roundResult(lw), roundResult(lwVorrat)];
}


function calcResult(ab, qLwm, qLwg, hL) {
	ab = $('#ab_out').val();
	qLwm = $('#qlwm').val();
	qLwg = $('#qlwg').val();
	qLwi = $("input[name='options_brandbelastung']:checked").val();
	hL = $('#hl').val();
	if (ab != "" && qLwm != "" && qLwg != "") {
    var qLwo = calcLwo(qLwi, qLwm, ab, hL);
    var lw = calcLw(qLwg, qLwo);

    $('#qlwo').val(qLwo);
		$('#lw_bereitstellung').val(lw[0]);
		$('#lw_vorrat').val(lw[1]);
		$('#btnDialog').show();
	}
	else {
		$('#qlwo').val('');
		$('#lw_bereitstellung').val('');
		$('#lw_vorrat').val('');
		$('#btnDialog').hide();
	}
}


// for testing with mocha and node.js
if (typeof exports !== 'undefined') { 
	exports.calcBrandflaeche = calcBrandflaeche
	exports.calcLwo = calcLwo
	exports.calcLw = calcLw
}