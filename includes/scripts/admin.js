jQuery(document).ready(function() {

/* Options Panel Tabs */
var tabtoshow = 0;
if(jQuery('.sn_plugin_options_wrap').hasClass('sn_plugin_options_wrap')) {
	jQuery('.sn_plugin_options_wrap .tabpane').hide();
	jQuery('.sn_plugin_options_wrap .tabpane').eq(0).show();
	jQuery('.sn_plugin_options_wrap h2.nav-tab-wrapper a').click(function() {
		tabtoshow = jQuery(this).parent('h2.nav-tab-wrapper').find('a').index(jQuery(this));
		jQuery('.sn_plugin_options_wrap h2.nav-tab-wrapper a').removeClass('nav-tab-active');
		jQuery('.sn_plugin_options_wrap h2.nav-tab-wrapper a').eq(tabtoshow).addClass('nav-tab-active');
		jQuery('.sn_plugin_options_wrap .tabpane').hide();
		jQuery('.sn_plugin_options_wrap .tabpane').eq(tabtoshow).show();
		return false;
	});
}

/* Colour Picker */
	if(jQuery('.color-picker-selector').hasClass('color-picker-selector')) {
		jQuery('.color-picker-selector').hide();
		jQuery('.color-picker-selector').each(function() {
			jQuery(this).farbtastic(jQuery(this).parent('div').find('input.color-picker-text'));
		});
		jQuery('input.color-picker-text').focus(function() {
			jQuery(this).parent('div').find('.color-picker-selector').fadeIn();
		});
		jQuery(document).mousedown(function() { jQuery('.color-picker-selector').fadeOut(); });
	}


/* Upload Field */
	jQuery('.upload_url').blur(function() {
		jQuery(this).parent('td').find('.show-image').remove();
		jQuery(this).parent('td').append('<div class="show-image"><img src="'+jQuery(this).val()+'" alt="" /></div>');
	});
	jQuery('.upload_button').click(function() {
	
		var field_id    = jQuery(this).parent('div').parent('td').find('.upload_url').attr('name'),
		    post_id     = jQuery(this).attr('rel'),
		    backup      = window.send_to_editor,
		    showImageHTML  = '',
		    intval      = window.setInterval(function() {
		                    jQuery('#TB_iframeContent').contents().find('.savesend .button').val('Use this image'); 
		                    jQuery('#TB_iframeContent').contents().find('.savesend .button').addClass('button-primary'); 
		                    jQuery('#TB_iframeContent').contents().find('.savesend .button').css({"marginTop":"10px", "marginBottom":"20px"}); 
		                  }, 50);
		tb_show('', 'media-upload.php?post_id='+post_id+'&field_id='+field_id+'&type=image&TB_iframe=1');
		window.send_to_editor = function(html) {
		  var href = jQuery(html).attr('href');
		  var href_filename = href.substr( (href.lastIndexOf('.') +1) );
		  switch(href_filename) {
			case 'jpeg':
			case 'jpg':
			case 'png':
			case 'gif':
				showImageHTML += '<div class="show-image"><img src="'+href+'" alt="" /></div>';
			break;
		  }
		  jQuery('input[name="'+field_id+'"]').val(href);
		  jQuery('input[name="'+field_id+'"]').parent('td').find('.show-image').remove();
		  jQuery('input[name="'+field_id+'"]').parent('td').append(showImageHTML);
		  tb_remove();
		  window.clearInterval(intval);
		  window.send_to_editor = backup;
		    };
		return false;
	
	});
		      
	jQuery('.upload_buttons .remove_image').click(function() {
		jQuery(this).parent('div').parent('td').find('.upload_url').attr({'value':''})
		jQuery(this).parent('div').parent('td').find('.show-image').remove();
		return false;
	});

/* Character */
	var character = jQuery('.sn_holiday_message-characters input').val();
	jQuery('.sn_holiday_message-characters ul li a').click(function() {
		character = jQuery(this).find('img').attr('alt');
		jQuery('.sn_holiday_message-characters input').val(character);
		jQuery('.sn_holiday_message-characters li').removeClass('active');
		jQuery(this).parent('li').addClass('active');
		return false;
	});
	
});