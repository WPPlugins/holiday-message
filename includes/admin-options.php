<?php
/* Select and Radios Arrays */ 
$sn_holiday_message_options_positions = array(
	'center_popup' => array(
		'value' => 'center_popup',
		'label' => __( 'Center Popup (appears over the top of your site)', 'snplugin' )
	),
	'bottom_left' => array(
		'value' => 'bottom_left',
		'label' => __( 'Bottom Left', 'snplugin' )
	),
	'bottom_right' => array(
		'value' => 'bottom_right',
		'label' => __( 'Bottom Right', 'snplugin' )
	),
	'bottom_fullwidth' => array(
		'value' => 'bottom_fullwidth',
		'label' => __( 'Bottom Full Width', 'snplugin' )
	)
); 

$months = array(
	'01' => array(
		'value' => '01',
		'label' => __( '01 - January', 'snplugin' )
	),
	'02' => array(
		'value' => '02',
		'label' => __( '02 - February', 'snplugin' )
	),
	'03' => array(
		'value' => '03',
		'label' => __( '03 - March', 'snplugin' )
	),
	'04' => array(
		'value' => '04',
		'label' => __( '04 - April', 'snplugin' )
	),
	'05' => array(
		'value' => '05',
		'label' => __( '05 - May', 'snplugin' )
	),
	'06' => array(
		'value' => '06',
		'label' => __( '06 - June', 'snplugin' )
	),
	'07' => array(
		'value' => '07',
		'label' => __( '07 - July', 'snplugin' )
	),
	'08' => array(
		'value' => '08',
		'label' => __( '08 - August', 'snplugin' )
	),
	'09' => array(
		'value' => '09',
		'label' => __( '09 - September', 'snplugin' )
	),
	'10' => array(
		'value' => '10',
		'label' => __( '10 - October', 'snplugin' )
	),
	'11' => array(
		'value' => '11',
		'label' => __( '11 - November', 'snplugin' )
	),
	'12' => array(
		'value' => '12',
		'label' => __( '12 - December', 'snplugin' )
	)
); 


/* Options Fields Array */
$sn_holiday_message_options_fields = array(

array(	"label" => 				__( "General", 'snplugin' ), 
		"description" => 		"",
		"field" => 				"heading" ),

array(	"label" => 				__( "1) Choose a Graphic", 'snplugin' ), 
		"field" => 				"subheading" ),	

array(	"label" => 				__( "", 'snplugin' ), 
		"name" => 				"sn_holiday_message_character", 
		"default" =>			"",
		"description" => 		"",
		"field" => 				"character" ),
		
array(	"field" => 				"space" ),		

array(	"label" => 				__( "2) Add your message", 'snplugin' ), 
		"field" => 				"subheading" ),	

array(	"label" => 				__( "Heading", 'snplugin' ), 
		"name" => 				"sn_holiday_message_heading", 
		"default" => 			"",
		"description" => 		"",
		"field" => 				"text" ),

array(	"label" => 				__( "Message", 'snplugin' ), 
		"name" => 				"sn_holiday_message_message", 
		"default" => 			"",
		"description" => 		"",
		"field" => 				"textarea" ),

array(	"label" => 				__( "Add Countdown to:", 'snplugin' ), 
		"field" => 				"date_field_open" ),

array(	"label" => 				__( "Month", 'snplugin' ), 
		"name" => 				"sn_holiday_message_countdown_date_month", 
		"choices" => 			$months,
		"description" => 		"",
		"field" => 				"date_field_select" ),

array(	"label" => 				__( "Day", 'snplugin' ), 
		"name" => 				"sn_holiday_message_countdown_date_day", 
		"default" => 			"25",
		"description" => 		"",
		"field" => 				"date_field_text" ),

array(	"label" => 				__( "Year", 'snplugin' ), 
		"name" => 				"sn_holiday_message_countdown_date_year", 
		"default" => 			date('Y'),
		"description" => 		"",
		"field" => 				"date_field_text" ),

array(	"label" => 				__( "Enable", 'snplugin' ), 
		"name" => 				"sn_holiday_message_countdown_enable", 
		"default" => 			"",
		"description" => 		"Enable Countdown",
		"field" => 				"date_field_checkbox" ),

array(	"field" => 				"date_field_close" ),

array(	"field" => 				"space" ),	
array(	"field" => 				"space" ),	

array(	"label" => 				__( "3) Choose some options", 'snplugin' ), 
		"field" => 				"subheading" ),	

array(	"label" => 				__( "Background Colour", 'snplugin' ), 
		"name" => 				"sn_holiday_message_background_colour", 
		"default" => 			"#a20505",
		"description" => 		"",
		"field" => 				"colorpicker" ),

array(	"label" => 				__( "Text Colour", 'snplugin' ), 
		"name" => 				"sn_holiday_message_text_colour", 
		"default" => 			"#FFFFFF",
		"description" => 		"",
		"field" => 				"colorpicker" ),

array(	"label" => 				__( "Position", 'snplugin' ), 
		"name" => 				"sn_holiday_message_position", 
		"choices" => 			$sn_holiday_message_options_positions,
		"description" => 		"",
		"field" => 				"select" ),	

array(	"label" => 				__( "Snowfall Effect", 'snplugin' ), 
		"name" => 				"sn_holiday_message_enable_snowfall", 
		"description" => 		"Tick to Enable (uses <a href='http://code.google.com/p/jsnowfall/' target='_blank'>jSnowfall</a>)",
		"field" => 				"checkbox" ),

array(	"label" => 				__( "Graphic Options", 'snplugin' ), 
		"description" => 		"",
		"field" => 				"heading" ),

array(	"field" => 				"space" ),

array(	"label" => 				__( "&nbsp;&nbsp;", 'snplugin' ), 
		"name" => 				"sn_holiday_message_disable_graphic", 
		"default" => 			"",
		"description" => 		"Disable graphic entirely, just show the message",
		"field" => 				"checkbox" ),

array(	"field" => 				"space" ),

array(	"label" => 				__( "Upload Graphic", 'snplugin' ), 
		"name" => 				"sn_holiday_message_own_graphic", 
		"default" => 			"",
		"description" => 		"Upload your own graphic here (recommended size 150px x 240px)",
		"field" => 				"file" ),

array(	"label" => 				__( "Advanced", 'snplugin' ), 
		"description" => 		"",
		"field" => 				"heading" ),

array(	"field" => 				"space" ),

array(	"label" => 				__( "&nbsp;&nbsp;", 'snplugin' ), 
		"name" => 				"sn_holiday_message_disable", 
		"default" => 			"",
		"description" => 		"Disable Holiday Message completely",
		"field" => 				"checkbox" ),

array(	"label" => 				__( "&nbsp;&nbsp;", 'snplugin' ), 
		"name" => 				"sn_holiday_message_disable_cookie", 
		"default" => 			"",
		"description" => 		"Always show Holiday Message (disable cookie that stops showing after first visit)",
		"field" => 				"checkbox" ),

array(	"label" => 				__( "&nbsp;&nbsp;", 'snplugin' ), 
		"name" => 				"sn_holiday_message_snowfall_on_site", 
		"default" => 			"",
		"description" => 		"Snowfall over entire site not just on message",
		"field" => 				"checkbox" ),
		
array(	"field" => 				"space" ),

array(	"label" => 				__( "Days Label", 'snplugin' ), 
		"name" => 				"sn_holiday_message_countdown_date_days_label", 
		"default" => 			"Days",
		"description" => 		"",
		"field" => 				"text" ),

array(	"label" => 				__( "House Label", 'snplugin' ), 
		"name" => 				"sn_holiday_message_countdown_date_hours_label", 
		"default" => 			"Hours",
		"description" => 		"",
		"field" => 				"text" ),

array(	"label" => 				__( "Minutes Label", 'snplugin' ), 
		"name" => 				"sn_holiday_message_countdown_date_minutes_label", 
		"default" => 			"Minutes",
		"description" => 		"",
		"field" => 				"text" ),

array(	"label" => 				__( "Seconds Label", 'snplugin' ), 
		"name" => 				"sn_holiday_message_countdown_date_seconds_label", 
		"default" => 			"Seconds",
		"description" => 		"",
		"field" => 				"text" ),

array(	"field" => 				"space" ),

array(	"label" => 				__( "Custom CSS", 'snplugin' ), 
		"name" => 				"sn_holiday_message_custom_css", 
		"default" => 			"",
		"description" => 		"Few classes for you:<br/>
.sn-holiday-message-holder (Main Holder)<br/>
.sn-holiday-message-character (Image Holder)<br/>
.sn-holiday-message-content (Actual Content Area)<br/>
.sn-holiday-message-heading (Heading)<br/>
.sn-holiday-message-message (Text)<br/>",
		"field" => 				"textarea" ),
		
		
	
);