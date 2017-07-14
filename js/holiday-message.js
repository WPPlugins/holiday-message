jQuery(window).load(function() {
	
	/* On close click */
	jQuery('.sn-holiday-message-close').click(function() {
		jQuery('.sn-holiday-message-holder').fadeOut();
		jQuery('.sn-holiday-message-holder-snowfall .sn-holiday-message-content').snowfall('clear');
		return false;
	});
	
	jQuery('.sn-holiday-message-holder').css({"opacity":0, "display":"block"});
	
	/* Full Width Correction */
	if(jQuery('.sn-holiday-message-holder-bottom_fullwidth').size() > 0) {	
		function fix_sn_holiday_message_full_width() {
			jQuery('.sn-holiday-message-holder-bottom_fullwidth .sn-holiday-message-content').css({ "width": jQuery(window).width() - parseInt(jQuery('.sn-holiday-message-content').css('paddingLeft')) - parseInt(jQuery('.sn-holiday-message-content').css('paddingRight')) });
		}
		fix_sn_holiday_message_full_width();
		jQuery(window).resize(function() { fix_sn_holiday_message_full_width(); });
	}
	
	jQuery('.sn-holiday-message-holder').animate({"opacity":1});
	
	/* Snowfall */
	if(jQuery('.sn-holiday-message-holder-snowfall').size() > 0) {	
	
		var flake_count = 30;
		var snowfall_on = ".sn-holiday-message-holder-snowfall .sn-holiday-message-content";
		if(jQuery('.sn-holiday-message-holder-bottom_fullwidth').size() > 0) {	
			flake_count = 100;
		}
	
		if(jQuery('.sn-holiday-message-holder-snowfall-over-site').size() > 0) {
			snowfall_on = document;
			flake_count = 250;
		}
	
		jQuery(snowfall_on).snowfall({
			round : true,
			shadow : true,
			minSize: 2,
			maxSize: 4,
			flakeCount: flake_count
		});
	
	}
	
	/* Countdown */
	if(jQuery('.sn-holiday-message-countdown').length > 0) {
	
		var countdown = jQuery('.sn-holiday-message-countdown').attr('id');
		countdown = countdown.replace('sn-holiday-message-countdown-', '');
		countdown = countdown.split('-');
		
		function calc_countdown() {
			var countdown_date = new Date(countdown[0],countdown[1] - 1,countdown[2],countdown[3],countdown[4],'00');
			var current_date = new Date();
			var time_difference = countdown_date.getTime() - current_date.getTime();
			
			var seconds = Math.floor(time_difference/1000);
			var minutes = Math.floor(seconds/60);
			var hours = Math.floor(minutes/60);
			var days = Math.floor(hours/24);
			hours %= 24;
			minutes %= 60;
			seconds %= 60;
			if(seconds < 10) { seconds = 0 + '' + seconds; }
			if(minutes < 10) { minutes = 0 + '' + minutes; }
			if(hours < 10) { hours = 0 + '' + hours; }
			if(days < 10) { days = 0 + '' + days; }
	
			if(time_difference <= 0) {
				jQuery('.sn-holiday-message-countdown').hide();
			} else {
				jQuery('.sn-holiday-message-countdown .sn-holiday-message-countdown-days .sn-holiday-message-countdown-number').text(days);
				jQuery('.sn-holiday-message-countdown .sn-holiday-message-countdown-hours .sn-holiday-message-countdown-number').text(hours);
				jQuery('.sn-holiday-message-countdown .sn-holiday-message-countdown-minutes .sn-holiday-message-countdown-number').text(minutes);
				jQuery('.sn-holiday-message-countdown .sn-holiday-message-countdown-seconds .sn-holiday-message-countdown-number').text(seconds);
				var countdown_timer = setTimeout(function() { calc_countdown() }, 1000);
			}
			
		}
		calc_countdown();
		
	}
	
});