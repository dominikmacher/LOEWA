var qlwg, qlwi, qlwm, nutzung, ab_in, qlwo, hl, lw, lw_vorrat, brandflaeche;
var json_data = "";

$(document).ready(function() {
	
	$('#btnSave').hide();
	$('#btnDialog').hide();
	calcResult();

	if (json_data != "") {
		//assign values:
		$('#qlwg').val(json_data.qlwg);
		$('#label_lwg').hide();

		$("input[name='options_brandbelastung'][value='"+json_data.qlwi+"']").attr('checked',true);

		$('#nutzung').val(json_data.nutzung);
		nutzung = json_data.nutzung;
		if (json_data.nutzung != "") {
			$('#lfd_nr').val(json_data.nutzung);
			$('#qlwm').val(nutzungsfaktoren[json_data.nutzung][2]);
			$('#label_nutzung').hide();
		}
		else {
			$('#lfd_nr').val("");
			$('#qlwm').val("");
			$('#label_nutzung').show();
		}

		$('#ab_in').val(json_data.ab_in);
		$('#options_brandflaeche1').attr('checked',json_data.brandflaeche[0]=="true");
		$('#options_brandflaeche2').attr('checked',json_data.brandflaeche[1]=="true");
		$('#options_brandflaeche3').attr('checked',json_data.brandflaeche[2]=="true");
		$('#options_brandflaeche4').attr('checked',json_data.brandflaeche[3]=="true");
		$('#options_brandflaeche5').attr('checked',json_data.brandflaeche[4]=="true");

		$('#hl').val(json_data.hl);
		
		calcBrandflaeche();
		calcResult();

		$('#bearbeiter').val(json_data.bearbeiter);
		$('#datum').val(json_data.datum);

		$('#objekt').val(json_data.objekt);
		$('#brandabschnitt').val(json_data.brandabschnitt);
		$('#btnSave').show();
	}

	$('#btnSave').click(function() {
		$.post("save.php", 
			{ objekt: $('#objekt').val(), brandabschnitt: $('#brandabschnitt').val(), qlwg: qlwg, qlwi: qlwi, nutzung: nutzung, ab_in: ab_in, hl: hl, brandflaeche: brandflaeche, datum: $('#datum').val(), bearbeiter: $('#bearbeiter').val() },
			function(data) {
				if (data=="saved") {
					$('#btnClose').click();
					window.location.href="?id=1";
				}
			}
		);
		return false;
	});

	var printCallBack = function() {
		$('#print-modal-content').contents().find(':input').prop("readonly",true);
		$('#print-modal-content').contents().find('#nutzung').val(nutzung);
		$('#print-modal-content').contents().find('.btn').hide();
		$('#print-modal-content').contents().find('h1').html("<h1>Objektbezogene L&ouml;schwasser-bedarfsermittlung <small>(gem&auml;ß TRVB F 137)</small></h1>");
	}
	$('#btnPrint').printPreview(printCallBack);

	$('#objekt').keyup(function() {
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
		if (lw<0)
			lw=0;

		lw = Math.round(lw * 100) / 100;
		$('#lw_bereitstellung').val(lw);
		lw_vorrat = lw*90/1000;
		lw_vorrat = Math.round(lw_vorrat * 100) / 100;
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