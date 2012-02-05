$(function () {
    $('#event-filters input[type="radio"]').click(function(){
	$('form#event-filters').submit();
    });
});