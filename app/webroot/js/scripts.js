jQuery(function($){
	//$('.UserPackId').hide();

	$('#UserType').val(function(){
		if($(this).val() == "pro"){
	        $('.UserPackId').fadeIn();
	    } else{
	        $('.UserPackId').hide();
	    }
		return ($(this).val());
	});

	$('#UserType').change(function(){    
	    if($(this).val() == "pro"){
	        $('.UserPackId').fadeIn();
	    } else{
	    	$('.pack-id-error').hide();
	        $('.UserPackId').hide();
	    }
	    $('.control-form').removeClass('form-error');
	});

	$('#UserPackId').change(function(){    
	    if($(this).val() != "0"){
	        $('.pack-id-error').hide();
	    } else{
	    	$('.pack-id-error').fadeIn();
	    }
	    $('.control-form').removeClass('form-error');
	});
});