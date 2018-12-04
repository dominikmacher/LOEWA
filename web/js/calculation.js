var json_data = "";
var nutzungsfaktoren;


function saveCalc() {
	if ($('#loewa_form').checkValidity()) {
		var qlwg = $('#qlwg').val(), 
		qlwi = $('#qlwi').val(), 
		qlwm = $('#qlwm').val(), 
		nutzung = $('#nutzung').val(), 
		ab_in = $('#ab_in').val(), 
		hl = $('#hl').val(), 
		brandflaeche = [document.loewa_form.options_brandflaeche1.checked,
			document.loewa_form.options_brandflaeche2.checked,
			document.loewa_form.options_brandflaeche3.checked,
			document.loewa_form.options_brandflaeche4.checked,
			document.loewa_form.options_brandflaeche5.checked];


		$.post("save.php", 
			{ objekt: $('#objekt').val(), brandabschnitt: $('#brandabschnitt').val(), qlwg: qlwg, qlwi: qlwi, nutzung: nutzung, ab_in: ab_in, hl: hl, brandflaeche: brandflaeche, datum: $('#datum').val(), bearbeiter: $('#bearbeiter').val() },
			function(data) {
				if (data=="SUCCESS") {
					$('#btnClose').click();
					window.location.href="?id=0";
				}
			}
		);
	}
	return false;
}

$(document).ready(function() {
	
	$('input[type=text][readonly]').hover(function() {
		$( this ).addClass( "not-allowed" );
	}, function() {
		$( this ).removeClass( "not-allowed" );
	});
	
	$('#btnDialog').click(function() {
		$("#saveModal").show();
		return false;
	});
	
	
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
		
		calcBrandflaecheWOP();
		calcResult();

		$('#bearbeiter').val(json_data.bearbeiter);
		$('#datum').val(json_data.datum);

		$('#objekt').val(json_data.objekt);
		$('#brandabschnitt').val(json_data.brandabschnitt);
		$('#btnSave').show();
	}

	
	
	$('#btnSave').click(function() {
		saveCalc();
	});

	var printCallBack = function() {
		$('#print-modal-content').contents().find(':input').prop("readonly",true);
		$('#print-modal-content').contents().find('#nutzung').val(nutzung);
		$('#print-modal-content').contents().find('.btn').hide();
		$('#print-modal-content').contents().find('h1').html("<h1>Objektbezogene L&ouml;schwasser-bedarfsermittlung <small>(gem&auml;ß TRVB F 137)</small></h1>");
	}
	$('#btnPrint').printPreview(printCallBack);


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

	$('#options_brandbelastung1').click(function() {
		calcBrandflaecheWOP();
	});
	$('#options_brandbelastung2').click(function() {
		calcBrandflaecheWOP();
	});
	$('#options_brandbelastung3').click(function() {
		calcBrandflaecheWOP();
	});


	$('#options_brandflaeche1').click(function() {
		calcBrandflaecheWOP();
	});
	$('#options_brandflaeche2').click(function() {
		calcBrandflaecheWOP();
	});
	$('#options_brandflaeche3').click(function() {
		calcBrandflaecheWOP();
	});
	$('#options_brandflaeche4').click(function() {
		calcBrandflaecheWOP();
	});
	$('#options_brandflaeche5').click(function() {
		calcBrandflaecheWOP();
	});
	$('#ab_in').keyup(function() {
		$(this).val($(this).val().replace(/,/,"."));
		calcBrandflaecheWOP();
	});

});

