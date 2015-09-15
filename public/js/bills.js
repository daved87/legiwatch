$(document).ready(function () {

	$.when(getUpcomingBills(null)).then(
		function (ret) {
			console.log(ret);			
			$.when(loadUpcomingBills(ret)).then(function (html) {
				$('#upcomingBillsDiv').html(html).slideDown(500, function () {
					$('#upBillGIF').hide();
					$('#upcomingBillsDiv').show();
				});
			});
		},
		function (ret) {
			$('#upBillGIF').hide();
			console.log(ret);
		}
	);

});

function getUpcomingBills(params) {
	var prom = $.Deferred();
	$('#upBillGIF').show();

	$.ajax({
		url: 'bills/getUpcomingBills',
		data: { 'params': params },
		dataType: 'json',
		success: function (data) {
			prom.resolve(data);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			prom.reject(errorThrown);
		}
	});

	return prom;
}

function loadUpcomingBills(ret) {
	var pr = $.Deferred();
	var html = '';
	var arrBillId = [];

	$.each(ret, function(i, item) {		
		if ($.inArray(item.bill_id, arrBillId) === -1) {
			arrBillId[i] = item.bill_id;
			html += addUpcomingBill(item);
		} 		
	});
	
	pr.resolve(html);

	return pr.promise();
}

function addUpcomingBill(item) {
	var title = item.bill_info[0].short_title; if (title === null) title = item.bill_info[0].official_title;
	title = title.toUpperCase();

	var html = '<div class="pure-u-1">' + 
				 '<div class="pure-g">' +
				   '<div class="pure-u-1"><table style="width:100%"><tr>' +
				   	'<td><a class="outSourceLink" target="_blank" href="' + item.url + '"><h5 class="upcomingBill"><img class="imgLink"  src="public/images/ameriCheck.jpg" />' + title + '</h5></a></td>' +
				   	'<td><a href="#" class="upcomingBillLink" onclick="displayContext(this);" id="' + item.bill_id + '">Summary</a></td>' +
			   	   '</tr></table></div>' +
				   '<div class="pure-u-1">' +
				   	 '<p class="upcomingContext" id="' + item.bill_id + 'context">' + item.context + '</p>' +
				   '</div>' +
				  '</div>' +
				 '</div>';

	return html;
}