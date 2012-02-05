$(function () {
    $('#search-filters input').change(function(){
	$('form#search-filters').submit();
    });
});