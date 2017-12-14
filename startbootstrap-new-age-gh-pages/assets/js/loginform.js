$(function() {

	$( document ).ready(function() {
    	$('#login-form-link').addClass('active');
	});
	
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(1000).fadeIn(1000);
 		$("#register-form").fadeOut(1000);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(1000).fadeIn(1000);
 		$("#login-form").fadeOut(1000);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});