(function($)
{

	$.ajax({
		type: 'POST',
		url: 'index.php?option=com_poster&view=register&task=ajaxGenerateAuthKey',
		success: function(msg)
		{
			var msg = JSON.parse(msg);
			$('#authkey').val(msg['authKey']);
		}
	});

})(jQuery);

function validate(form)
{

	var errors = false;
	if (!errors) {
		jQuery(form).removeAttr('onsubmit');
        setTimeout(function() {
            jQuery( form ).submit(function(form) {
            	submit(form);
            	return false;
            });        	
            jQuery( form ).find('button[type=submit]').click();
        }, 500 );		
	}
	return false;

}

function submit(form)
{
	var task = jQuery('[name=task]', form).val();
	$.ajax({
		type: 'POST',
		url: 'index.php?option=com_poster&view=register&task='+task,
		success: function(msg)
		{

		}
	});	

}