$(function() {
    $( "#event-date-container" ).datepicker({
	dateFormat: 'yy-mm-dd',
	defaultDate: $('#event-date').val(),
	onSelect: function(dateText, inst) {
	    $('#event-date').val(dateText);
	    $('form#event-filters').submit();
	}
    });
});