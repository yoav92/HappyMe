jQuery(function($){
	$.datepicker.setDefaults($.datepicker.regional['fr']);
	$('#datepicker').datepicker({
		dateFormat : 'dd/mm/yy',
		minDate:0
	});
});