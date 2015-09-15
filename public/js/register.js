$(document).ready(function () {
	setUpValidation();
});

function setUpValidation() {

	$.validator.setDefaults({
	  debug: false,

	  success: "valid"
	});

	$('#registerForm').validate({
		rules: {
			firstname: {
				required: true
			},
			lastname: {
				required: true
			},
			email: {
				required: true,
				email: true,
			},
			emailAgain: {
				equalTo: "#email"
			},
			password: {
				required: true,
				minlength: 8
			},
			passwordAgain: {
				equalTo: "#password"
			},
			zipcode: {
				required: true,
				maxlength: 5,
				minlength: 5,
				digits: true
			}
		}
	});

	$('#email').blur(
		function () {
			
			if (IsEmail($('#email').val())) {

				$.when(chkEmail($('#email').val())
				).then(
					function (ret) {
						if (!ret) {
							$('#emailChk').html('In use.').removeClass('emailValid').addClass('error');
							$('#email').removeClass('valid').addClass('error');
							$('input[type="submit"]').prop('disabled', true);
						} else {
							$('#emailChk').html('Available!').removeClass('error').addClass('emailValid');
							$('input[type="submit"]').prop('disabled', false);
						}

						$('#emailCheckGIF').hide();
					},
					function (ret) {
						$('#emailCheckGIF').hide();
					}
				);
			}
		}
	);

	$('#email').keyup(function () {
		$('#emailChk').html('');
	});

	$('#zipcode').keyup(function () {
		$('#repsTable').hide();
		$('#zipChk').hide();
		$('#districtTitle').html('');
		$('#repsBody').html('');

	});

	$('#zipcode').blur(
		function () {
			if (this.value.length === 5 && Math.floor(this.value) == this.value && $.isNumeric(this.value)) {
				$.when(getDistrict(this.value)).then(
					function (ret) {
						var o = $.parseJSON(ret);

						if (o.length < 1) {
							$('#zipChk').show();
							$('#zipcode').removeClass('valid').addClass('error');
							$('input[type="submit"]').prop('disabled', true);
						} else {

							var title = null, html = '';
							$.each(o, function(i, item) {	

								if (item.district !== null && title === null) 
									title = 'State: ' + item.state_name + ' | District: ' + item.district;
								
								html += addRep(item);	
							});

							$('#districtTitle').html(title);
							$('#repsBody').html(html);
							$('#repsTable').show();

							$('input[type="submit"]').prop('disabled', false);
						}
						

						$('.districtGetLoadingGif').hide();						
					},
					function (ret) {
						console.log(ret);
						$('.districtGetLoadingGif').hide();
					}
				);
			}			
		}
	);
}

function addRep(item) {
	return '<tr><td>' + item.title + '</td><td>' + item.last_name + ', ' + item.first_name + '</td><td>' + item.party + '</td></tr>';
}

function chkEmail(email) {
	var prom = $.Deferred();
	var param = 'email=' + email;

	$('#emailCheckGIF').show();
	$('input[type="submit"]').prop('disabled', true);

	$.ajax({
		url: 'emailAvailable',
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

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function getDistrict(zipcode) {
	var prom = $.Deferred();
	var param = 'zip=' + zipcode;

	$('.districtGetLoadingGif').show();
	$('input[type="submit"]').prop('disabled', true);

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