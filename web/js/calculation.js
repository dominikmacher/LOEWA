var qlwg, qlwi, qlwm, nutzung, ab_in, qlwo, hl, lw, lw_vorrat, brandflaeche;

$(function() {
	
	$('#btnSave').hide();
	$('#btnDialog').hide();
	calcResult();

	$('#btnSave').click(function() {
		$.post("save.php", 
			{ object: $('#object').val(), qlwg: qlwg, qlwi: qlwi, nutzung: nutzung, ab_in: ab_in, hl: hl, brandflaeche: brandflaeche },
			function(data) {
				if (data=="saved") {
					$('#btnClose').click();
				}
			}
		);
		return false;
	});

	$('#object').keyup(function() {
		if ($(this).val()=="") {
			$('#btnSave').hide();
		}
		else {
			$('#btnSave').show();
		}
	});

	$('#qlwg').keyup(function() {
		$(this).val($(this).val().replace(/,/,"."));

		if ($(this).val()!="") {
			$('#label_lwg').hide();
		}
		else {
			$('#label_lwg').show();
		}
		calcResult();
	});

	$('#hl').keyup(function() {
		$(this).val($(this).val().replace(/,/,"."));

		if ($(this).val()=="") {
			$('#label_hl').hide();
		}
		else if ($(this).val()<=2.5) {
			$('#label_hl').show();
		}
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

	$('#options_brandbelastung1').click(function() {
		calcBrandflaeche();
	});
	$('#options_brandbelastung2').click(function() {
		calcBrandflaeche();
	});
	$('#options_brandbelastung3').click(function() {
		calcBrandflaeche();
	});


	$('#options_brandflaeche1').click(function() {
		calcBrandflaeche();
	});
	$('#options_brandflaeche2').click(function() {
		calcBrandflaeche();
	});
	$('#options_brandflaeche3').click(function() {
		calcBrandflaeche();
	});
	$('#options_brandflaeche4').click(function() {
		calcBrandflaeche();
	});
	$('#options_brandflaeche5').click(function() {
		calcBrandflaeche();
	});
	$('#ab_in').keyup(function() {
		$(this).val($(this).val().replace(/,/,"."));
		calcBrandflaeche();
	});

});

function calcBrandflaeche() {
	// Prinzipiell in => out value:
	ab_in = $('#ab_in').val();
	$('#ab_out').val(ab_in);

	brandflaeche = new Array(
		document.loewa_form.options_brandflaeche1.checked,
		document.loewa_form.options_brandflaeche2.checked,
		document.loewa_form.options_brandflaeche3.checked,
		document.loewa_form.options_brandflaeche4.checked,
		document.loewa_form.options_brandflaeche5.checked
	);

	// Check checkboxes:
	var lowestAb=0;
	if (document.loewa_form.options_brandflaeche5.checked) {
		lowestAb = 750;
	}
	else if (document.loewa_form.options_brandflaeche4.checked) {
		lowestAb = 1200;
	}
	else if (document.loewa_form.options_brandflaeche3.checked) {
		lowestAb = 2000;
	}
	
	if (lowestAb!=0) {
		if (lowestAb < $('#ab_out').val() || $('#ab_out').val()==0 || $('#ab_out').val()=="") {
			$('#ab_out').val(lowestAb);
		}
	}

	if ($('#ab_out').val()!="") {
		$('#label_ab').hide();
	}
	else {
		$('#label_ab').show();
	}
	calcResult();
}

function calcResult() {
	if ($('#ab_out').val()!="" && $('#qlwm').val()!="" && $('#qlwg').val()!="") {
		
		qlwi = parseFloat($("input[name='options_brandbelastung']:checked").val());
		qlwm = parseFloat($('#qlwm').val());
		var ab = parseFloat($('#ab_out').val());

		qlwo = (qlwi + qlwm);

		hl = $('#hl').val();
		if (hl !="" && hl>2.5) {
			// extended formula:
			qlwo *= (ab + 4*(hl-2.5) * Math.sqrt(ab));
		}
		else {
			qlwo *= ab;
		}
		
		$('#qlwo').val(qlwo);

		// Bereitstellung:
		qlwg = parseFloat($('#qlwg').val());
		lw = qlwo - qlwg;
		$('#lw_bereitstellung').val(lw);
		lw_vorrat = lw*90/1000;
		$('#lw_vorrat').val(lw_vorrat);

		$('#btnDialog').show();
	}
	else {
		$('#qlwo').val('');
		$('#lw_bereitstellung').val('');
		$('#lw_vorrat').val('');
		$('#btnDialog').hide();
	}
}