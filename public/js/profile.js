function addZip() {
	$('#dialogZip').dialog('open');
}

function getDistrict(zipcode) {
	var prom = $.Deferred();
	var param = 'zip=' + zipcode;

	$('.LoadingGif').show();

	$.ajax({
		url: 'getUserRepresentatives',
		data: param,
		type: "post",
		success: function (data) {
			prom.resolve(data);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			prom.reject(errorThrown);
		}
	});

	return prom.promise();
}

$(document).ready(function () {

	$('#dialogZip').dialog({
        autoOpen: false,
        modal: true,       
        scrollable: true,
        draggable: false,
        resizable: false,
        width: 'auto',
        height: 'auto'
	});	


	$('.ui-dialog-titlebar-close').click(function () {
		$('#zipChk').hide();
	});


	$('#AddZipButton').click(function () {
		if ($('#zipText').val().length === 5 && Math.floor($('#zipText').val()) == $('#zipText').val() && $.isNumeric($('#zipText').val())) {
			$('.LoadingGif').show();

			$.when(getDistrict($('#zipText').val())).then(
				function (ret) {
					var o = $.parseJSON(ret);

					if (o.length < 1) {
						return false;
					} else {
						return true;
					}					
				},
				function (ret) {
					console.log(ret);
					$('.LoadingGif').hide();
				}
			);
		} else {
			$('#zipChk').show();
			return false;
		}			
	});

});