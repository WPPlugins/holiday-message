<?php

add_action( 'admin_init', 'sn_holiday_message_options_init' );
add_action( 'admin_menu', 'sn_holiday_message_options_add_page' );

/* Initialise the options */
function sn_holiday_message_options_init(){
	register_setting( 'sn_holiday_message_options_group', 'sn_holiday_message_options', '' );
}

/* Add options page to Settings Menu */
function sn_holiday_message_options_add_page() {
	add_options_page( __( 'Holiday Message', 'snplugin' ), __( 'Holiday Message', 'snplugin' ), 'manage_options', 'holiday_message_options', 'sn_holiday_message_options_do_page' );
}

/* Bring in the theme options fields */
require_once (dirname(__FILE__).'/admin-options.php');

/* Create the options page */
function sn_holiday_message_options_do_page() {
	global $sn_holiday_message_options_fields;
	
	/* Include the fields file */
	require_once (dirname(__FILE__).'/admin-fields.php');
	
	/* Enqueue some scripts */
	global $sn_holiday_message_directory;
	wp_enqueue_style('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
    wp_enqueue_style('farbtastic');
    wp_enqueue_script('farbtastic');
	wp_enqueue_style('admin_css', $sn_holiday_message_directory.'/includes/scripts/admin.css');
    wp_register_script('admin_js', $sn_holiday_message_directory.'/includes/scripts/admin.js');
	wp_enqueue_script('admin_js');
	
	
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	/* Now make the options form */
	?>
	<div class="wrap sn_plugin_options_wrap">
	
		<?php
		/* Theme Options Tabs and Heading */
		screen_icon(); ?><h2 class="nav-tab-wrapper">Holiday Message&nbsp;
		<?php /* Loop through options array to get the heading tabs */
		$heading_i = 0; $i = 0; foreach($sn_holiday_message_options_fields as $options_field) {
			if($options_field['field'] == "heading") { $i++;
				if($i == 1) { $nav_tab_classes = "nav-tab nav-tab-active"; } else { $nav_tab_classes = "nav-tab"; }
				echo '<a href="#options_tab_'.$i.'" class="' . $nav_tab_classes . '">' . $options_field['label'] . "</a>";
		} } ?>
		</h2>
		
		<a href="<?php bloginfo('url'); ?>?preview_sn_holiday_message=1" target="_blank" class="preview-message-link">Preview Message on site</a>
		
		<input type="hidden" class="sn_holiday_message_themes_dir" value="<?php echo $sn_holiday_message_directory.'/includes/themes/'; ?>" />
		
		<form method="post" action="options.php" class="sn_plugin_options_form">
			<?php settings_fields( 'sn_holiday_message_options_group' ); ?>
			<?php $options = get_option( 'sn_holiday_message_options' ); ?>
			
			<?php 
			/* Loop through the options array */
			$i = 0; foreach($sn_holiday_message_options_fields as $options_field) { $i++;
			
				/* Get field settings from array */
				$field_args = array();
				
				if(isset($options_field['field'])) { $field_args['type'] = $options_field['field']; }
				if(isset($options_field['label'])) { $field_args['label'] = $options_field['label']; }
				if(isset($options_field['name'])) { $field_args['name'] = $options_field['name']; }
				if(isset($options_field['default'])) { $field_args['default'] = $options_field['default']; }
				if(isset($options_field['description'])) { $field_args['description'] = $options_field['description']; }
				if(isset($options_field['choices'])) { $field_args['choices'] = $options_field['choices']; }
				if(isset($options_field['taxonomy'])) { $field_args['taxonomy'] = $options_field['taxonomy']; }
				if(isset($options_field['posttype'])) { $field_args['posttype'] = $options_field['posttype']; }
				if(isset($options_field['taxonomy'])) { $field_args['taxonomy'] = $options_field['taxonomy']; }
				if(isset($options_field['button_label'])) { $field_args['button_label'] = $options_field['button_label']; }
				
				/* Get the field (includes/admin/fields.php) */
				sn_holiday_message_get_field($field_args, $i); 
			
			} ?>
			
			</table></div><!-- end tabpane -->
					
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'snplugin' ); ?>" />
			</p>
		</form>
		</div>
			
	
	<?php
}