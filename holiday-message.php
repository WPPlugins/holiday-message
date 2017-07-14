<?php
/*
Plugin Name: Holiday Message
Plugin URI: http://simonmakes.com/projects/holiday-message/
Description: Add a holiday message or countdown to your site.
Version: 1.1
Author: Simon North
Author URI: http://simonmakes.com

/* Variables */
$sn_holiday_message_options = get_option('sn_holiday_message_options');
$sn_holiday_message_path = dirname(__FILE__);
$sn_holiday_message_main_file = dirname(__FILE__).'/holday-message.php';
$sn_holiday_message_directory = plugin_dir_url($sn_holiday_message_main_file);

/* Includes */
if(is_admin()) {
	include('includes/admin-page.php');
}

/* Add message */
if(isset($sn_holiday_message_options['sn_holiday_message_disable_cookie'])) {
    $show_sn_add_holiday_message = 1;
} else if(!isset($_COOKIE['sn_holiday_message_dont_show_message'])) {
    setcookie('sn_holiday_message_dont_show_message', 1, time()+3600*24*100);
    $show_sn_add_holiday_message = 1;
}

if(isset($sn_holiday_message_options['sn_holiday_message_disable'])) {
	$show_sn_add_holiday_message = 0;
}
	
/* Add message */
function sn_add_holiday_message() {

   	global $show_sn_add_holiday_message;
	if($show_sn_add_holiday_message == 1 || isset($_GET['preview_sn_holiday_message'])) {
	    
		/* Options */
		global $sn_holiday_message_options, $sn_holiday_message_directory;
		$message_character = "santa";
		if(isset($sn_holiday_message_options['sn_holiday_message_character'])) { 
			$message_character = $sn_holiday_message_options['sn_holiday_message_character'];
		}
		$message_heading = '';
		$message_heading = $sn_holiday_message_options['sn_holiday_message_heading'];
		$message_message = '';
		$message_message = $sn_holiday_message_options['sn_holiday_message_message'];
		$message_background_colour = "#a20505";
		if(isset($sn_holiday_message_options['sn_holiday_message_background_colour'])) {
			$message_background_colour = $sn_holiday_message_options['sn_holiday_message_background_colour'];
		}
		$message_text_colour = "#FFFFFF";
		if(isset($sn_holiday_message_options['sn_holiday_message_text_colour'])) {
			$message_text_colour = $sn_holiday_message_options['sn_holiday_message_text_colour'];
		}
		$message_position = "center_popup";
		if(isset($sn_holiday_message_options['sn_holiday_message_position'])) {
			$message_position = $sn_holiday_message_options['sn_holiday_message_position'];
		}
		$disable_graphic_class = "";
		if(isset($sn_holiday_message_options['sn_holiday_message_disable_graphic'])) {
			$disable_graphic_class = ' sn-holiday-message-disable-graphic ';
		}
		if(isset($sn_holiday_message_options['sn_holiday_message_enable_snowfall'])) {
			if($sn_holiday_message_options['sn_holiday_message_enable_snowfall']) {
				if(isset($sn_holiday_message_options['sn_holiday_message_snowfall_on_site'])) {
					$message_snowfall = "sn-holiday-message-holder-snowfall sn-holiday-message-holder-snowfall-over-site";
				} else {
					$message_snowfall = " sn-holiday-message-holder-snowfall";
				}
			} else {
				$message_snowfall = "";
			}
		} else { $message_snowfall = ""; }
		
		/* Display on site */
		$sn_holiday_message_code = '';
		$sn_holiday_message_code .= '<div class="sn-holiday-message-holder'.$disable_graphic_class.' sn-holiday-message-holder-'.$message_position.' '.$message_snowfall.'">';
			
			if(!isset($sn_holiday_message_options['sn_holiday_message_disable_graphic'])) {
				$sn_holiday_message_code .= '<div class="sn-holiday-message-character sn-holiday-message-character-'.$message_character.'">';
			
				if(isset($sn_holiday_message_options['sn_holiday_message_own_graphic'])) {
					if($sn_holiday_message_options['sn_holiday_message_own_graphic']) {
						$sn_holiday_message_code .= '<img src="'.$sn_holiday_message_options['sn_holiday_message_own_graphic'].'" alt="" />';
					} else {
						$sn_holiday_message_code .= '<img src="'.$sn_holiday_message_directory.'images/'.$message_character.'.png" alt="" />';
					}
				} else {
				$sn_holiday_message_code .= '<img src="'.$sn_holiday_message_directory.'images/'.$message_character.'.png" alt="" />';
				}
			
				$sn_holiday_message_code .= '</div>';
			}
			
			$sn_holiday_message_code .= '<div class="sn-holiday-message-content" style="color:'.$message_text_colour.';background:'.$message_background_colour.';">';
				
				$sn_holiday_message_code .= '<a href="#" class="sn-holiday-message-close">x</a>';
				$sn_holiday_message_code .= '<div class="sn-holiday-message-heading">'.$message_heading.'</div>';
				$sn_holiday_message_code .= '<div class="sn-holiday-message-message">'.$message_message.'</div>';
				
				if(isset($sn_holiday_message_options['sn_holiday_message_countdown_enable'])) {
					$sn_holiday_message_code .= '<div class="sn-holiday-message-countdown" id="sn-holiday-message-countdown-'.$sn_holiday_message_options['sn_holiday_message_countdown_date_year'].'-'.$sn_holiday_message_options['sn_holiday_message_countdown_date_month'].'-'.$sn_holiday_message_options['sn_holiday_message_countdown_date_day'].'-00-00">
						<div class="sn-holiday-message-countdown-days"><span class="sn-holiday-message-countdown-number"></span><span class="sn-holiday-message-countdown-label">'.$sn_holiday_message_options['sn_holiday_message_countdown_date_days_label'].'</span></div>
						<div class="sn-holiday-message-countdown-hours"><span class="sn-holiday-message-countdown-number"></span><span class="sn-holiday-message-countdown-label">'.$sn_holiday_message_options['sn_holiday_message_countdown_date_hours_label'].'</span></div>
						<div class="sn-holiday-message-countdown-minutes"><span class="sn-holiday-message-countdown-number"></span><span class="sn-holiday-message-countdown-label">'.$sn_holiday_message_options['sn_holiday_message_countdown_date_minutes_label'].'</span></div>
						<div class="sn-holiday-message-countdown-seconds"><span class="sn-holiday-message-countdown-number"></span><span class="sn-holiday-message-countdown-label">'.$sn_holiday_message_options['sn_holiday_message_countdown_date_seconds_label'].'</span></div>
					</div>';
				}
								
			$sn_holiday_message_code .= '</div></div>';
			
		$sn_holiday_message_code .= '</div>';
		
		/* Custom CSS */
		$sn_holiday_message_code .= '<style type="text/css">.sn-holiday-message-message a { color: '.$message_text_colour.'!important; } ';
		if(isset($sn_holiday_message_options['sn_holiday_message_custom_css'])) {
			if($sn_holiday_message_options['sn_holiday_message_custom_css'] != "") {
				$sn_holiday_message_code .= $sn_holiday_message_options['sn_holiday_message_custom_css'];
			}
		}		
		$sn_holiday_message_code .= '</style>';
		
		/* Show the message */
		echo $sn_holiday_message_code;
		
		/* Add scripts */
	    wp_enqueue_script('jquery');
		wp_enqueue_style('sn_holiday_message_css', $sn_holiday_message_directory.'holiday-message.css');
		if(isset($sn_holiday_message_options['sn_holiday_message_enable_snowfall'])) {
		    wp_register_script('sn_holiday_snowfall_js', $sn_holiday_message_directory.'js/snowfall.js', 'jquery');
		    wp_enqueue_script('sn_holiday_snowfall_js');
		}
	    wp_register_script('sn_holiday_message_js', $sn_holiday_message_directory.'js/holiday-message.js', 'jquery');
	    wp_enqueue_script('sn_holiday_message_js');
	    
	
	}
	
}
add_action( 'wp_footer', 'sn_add_holiday_message');