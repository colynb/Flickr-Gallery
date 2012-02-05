$(function() {

    $('#login_form').submit(function(e){
	e.preventDefault();
	var action = $(this).attr('action');
	$.ajax({
	    type: 'POST',
	    url: action,
	    data: $(this).serialize(),
	    dataType: 'json',
	    success: function(data) {
		$('.error-container').html('<div class="alert-message success"><a class="close" href="#">×</a><p><strong>Thank you!</strong></p></div>');
	    },
	    error: function() {
		$('.error-container').html('<div class="alert-message error"><a class="close" href="#">×</a><p><strong>Error</strong> There was a problem with the login server. Please try again.</p></div>');
	    }
	});
    });

});