$(document).ready(function () {

	$('#loginDialog').dialog({
        autoOpen: false,
        modal: true,
        show : {
        	effect: "slideDown",
        	duration: 350
        },
        hide : {
        	effect: "slideUp",
        	duration: 250
        },        
        scrollable: true,
        draggable: false,
        resizable: false,
        width: 'auto',
        height: 'auto'
	});	

});

function openLoginDialog(dialogLocation) {
    $('#loginDialog').load(dialogLocation, function () {
        $('#loginDialog').dialog('open');
    });
}

function displayContext(me) {
	if($('#' + me.id + 'context').is(":hidden"))
		$('#' + me.id + 'context').slideDown(250);
	else
		$('#' + me.id + 'context').slideUp(250);
}