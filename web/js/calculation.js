var nutzungsfaktoren;


function roundResult(v) {
	return Math.round(v * 100) / 100;
}

function parseVal(v) {
  return parseFloat((v + "").replace(/,/g, "."));
}



function calcBrandflaeche() {
	var abIn = $('#ab_in').val();
	var abOut = abIn;
	var brandflaeche = parseInt($("input[name='options_brandflaeche']:checked").val());

	if (abIn!="") {
		if (brandflaeche>0) {
			if (brandflaeche < parseInt(abOut)) {
				abOut = brandflaeche;
			}
		}
		$('#label_ab').hide();
	}
	else {
		$('#label_ab').show();
	}

	$('#ab_out').val(abOut);
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


function calcResult() {
	calcBrandflaeche();

	ab = $('#ab_out').val();
	qLwm = $('#qlwm').val();
	qLwg = $('#qlwg').val();
	qLwiWand = parseFloat($("input[name='options_brandbelastung_wand']:checked").val());
	console.log(parseFloat($("input[name='options_brandbelastung_wand']:checked").val()));
	qLwiDecke = parseFloat($("input[name='options_brandbelastung_decke']:checked").val());
	qLwi = qLwiWand + qLwiDecke;
	$('#qlwi').val(qLwi);
	
	hL = $('#hl').val();
	if (ab != "" && qLwm != "" && qLwg != "") {
	    var qLwo = calcLwo(qLwi, qLwm, ab, hL);
	    var lw = calcLw(qLwg, qLwo);

	    $('#qlwo').val(qLwo);
		$('#lw_bereitstellung').val(lw[0]);
		$('#lw_vorrat').val(lw[1]);
	}
	else {
		$('#qlwo').val('');
		$('#lw_bereitstellung').val('');
		$('#lw_vorrat').val('');
	}
}







$(document).ready(function() {
	
	$('input[type=text][readonly]').hover(function() {
		$( this ).addClass( "not-allowed" );
	}, function() {
		$( this ).removeClass( "not-allowed" );
	});
	
	
	$('#qlwg').keyup(function() {
		$(this).val($(this).val().replace(/,/,"."));

		/*if ($(this).val()!="") {
			$('#label_lwg').hide();
		}
		else {
			$('#label_lwg').show();
		}*/
		calcResult();
	});
	$('#label_lwg').hide();

	$('#hl').keyup(function() {
		$(this).val($(this).val().replace(/,/,"."));
		calcResult();
	});
	$('#hl').change(function() {
		$(this).val($(this).val().replace(/,/,"."));
		calcResult();
	});

	$('#hl').blur(function() {
		$(this).val($(this).val().replace(/,/,"."));

		if ($(this).val()=="") {
			$(this).val("0");
			//$('#label_hl').hide();
		}
		/*else if ($(this).val()<=2.5) {
			$('#label_hl').show();
		}*/
		calcResult();
	});

	$('#nutzung').change(function() {
		nutzung = $(this).val();
		if (nutzung != "") {
			$('#lfd_nr').val(nutzung);
			$('#qlwm').val(nutzungsfaktoren[nutzung][2]);
			$('#label_nutzung').hide();
		}
		else {
			$('#lfd_nr').val("");
			$('#qlwm').val("");
			$('#label_nutzung').show();
		}
		calcResult();
	});

	$("input[type='radio'][name='options_brandbelastung_decke']").click(function() {
	    calcResult();
	});
	$("input[type='radio'][name='options_brandbelastung_wand']").click(function() {
	    calcResult();
	});
	$("input[type='radio'][name='options_brandflaeche']").click(function() {
	    calcResult();
	});


	$('#ab_in').keyup(function() {
		$(this).val($(this).val().replace(/,/,"."));
		calcResult();
	});
	$('#ab_in').change(function() {
		$(this).val($(this).val().replace(/,/,"."));
		calcResult();
	});

	calcResult();

});

