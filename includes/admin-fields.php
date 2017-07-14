<?php 

function sn_holiday_message_get_field($args, $i) {
	global $sn_holiday_message_options, $post, $heading_i;

	if(isset($args['meta'])) { $option_meta = $args['meta']; } else { $option_meta = 0; }
	if(isset($args['type'])) { $field_type = $args['type']; } else { $field_type = "text"; }
	if(isset($args['name'])) { $field_name = $args['name']; } else { $field_name = ""; }
	if(isset($args['label'])) { $field_label = $args['label']; } else { $field_label = ""; }
	if(isset($args['default'])) { $field_default = $args['default']; } else { $field_default = ""; }
	if(isset($args['description'])) { $field_description = $args['description']; } else { $field_description = ""; }
	if(isset($args['choices'])) { $field_choices = $args['choices']; } else { $field_choices = ""; }
	if(isset($args['posttype'])) { $field_posttype = $args['posttype']; } else { $field_posttype = "post"; }
	if(isset($args['taxonomy'])) { $field_taxonomy = $args['taxonomy']; } else { $field_taxonomy = "category"; }
	if(isset($args['button_label'])) { $field_button_label = $args['button_label']; } else { $field_button_label = "Upload Image"; }
	
	if($option_meta) {
		$option_type = "meta";
		if(get_post_meta($post->ID, $field_name, true)) { $field_value = get_post_meta($post->ID, $field_name, true); } else { $field_value = ""; }
		$field_id = $field_name;
	} else {
		$option_type = "option";
		if(isset($sn_holiday_message_options[$field_name])) { $field_value = $sn_holiday_message_options[$field_name]; } else { $field_value = $field_default; }
		$field_id = 'sn_holiday_message_options['.$field_name.']';
	}
	
	/* HEADING */  if($field_type == "heading") { $heading_i++; ?>
					
					<?php if($i != 1) { ?></table></div><!-- end tabpane --><?php } ?>
					<div class="tabpane">
					<table class="form-table">
						
						<!-- <div class="tabpane_heading">
							<h2 id="options_tab_<?php echo $heading_i; ?>"><?php echo $field_label; ?></h2>
							<p class="tabpane_description"><?php echo $field_description; ?></p>
						</div> -->
						<tr>
							<th></th>
							<td></td>
						</tr>
		
	<?php /* SUB HEADING */  } else if($field_type == "subheading") { ?>
					
					</table>
					
						<h2 class="subheading"><?php echo $field_label; ?></h2>
					
					<table class="form-table">
						<tr>
							<th></th>
							<td></td>
						</tr>
					
	<?php /* SPACE */   } else if($field_type == "space") { ?>
				
					<tr valign="top"><th scope="row" style="padding:0;font-size:1px;line-height:24px;">&nbsp;</th>
						<td style="padding:0;font-size:1px;line-height:24px">&nbsp;</td>
					</tr>
					
	<?php /* Date field open */   } else if($field_type == "date_field_open") { ?>
				
					<tr valign="top">
						<th scope="row"><?php echo $field_label; ?></th>
						<td>
						
							<div class="date-fields">
					
	<?php /* Date field select */   } else if($field_type == "date_field_select") { ?>
				
								<div class="date-field">
									<select name="<?php echo $field_id; ?>">
										<?php foreach ( $field_choices as $option ) {
											$label = $option['label']; ?>
												<option <?php if($field_value == $option['value']) { ?>selected='selected'<?php } ?> 
												value='<?php echo  esc_attr( $option['value'] ); ?>'><?php echo $label; ?></option>
										<?php } ?>
									</select>
									<label class="<?php echo $field_type.'_description '; ?>description" for="<?php echo $field_id; ?>"><?php echo $field_label; ?></label>
								</div>
						
					
	<?php /* Date field text */   } else if($field_type == "date_field_text") { ?>
						
								<div class="date-field">
									<input id="<?php echo $field_id; ?>" class="regular-text" type="text" 
									name="<?php echo $field_id; ?>" value="<?php echo esc_attr_e($field_value); ?>" />
									<label class="<?php echo $field_type.'_description '; ?>description" for="<?php echo $field_id; ?>"><?php echo $field_label; ?></label>
								</div>
						
					
	<?php /* Date field checkbox */   } else if($field_type == "date_field_checkbox") { ?>
						
								<div class="date-field date-field-checkbox">
									<input id="<?php echo $field_id; ?>" type="checkbox" value="1" 
									name="<?php echo $field_id; ?>" <?php if(isset($field_value)) { checked( '1', $field_value ); } ?> />
									<label style="display:inline-block;" class="<?php echo $field_type.'_description '; ?>description" for="<?php echo $field_id; ?>"><?php echo $field_description; ?></label>
								</div>
								
	<?php /* Date field close */   } else if($field_type == "date_field_close") { ?>
							
							</div>
							
						</td>
					</tr>
					
			
	<?php /* CHARACTER */ } else if($field_type == "character") { ?>
					
					</table>
					
						<div class="sn_holiday_message-characters">
						
							<div class="credit-link"><a href="https://deanbarrett.wordpress.com" target="_blank">Graphics by Dean Barrett</a> or upload your own via the "Graphic Options" tab.</div>
			
							<input id="<?php echo $field_id; ?>" class="regular-text" type="text" 
							name="<?php echo $field_id; ?>" value="<?php if($field_value) { echo esc_attr_e($field_value); } else { echo 'santa'; } ?>" style="display:none" />
						
							<?php global $sn_holiday_message_directory; ?>
							<ul>
								<li<?php if($field_value == "" || $field_value == "santa") { echo ' class="active"'; } ?>><a href="#"><img src="<?php echo $sn_holiday_message_directory; ?>/images/santa.png" alt="santa" /></a></li>
								<li<?php if($field_value == "snowman") { echo ' class="active"'; } ?>><a href="#"><img src="<?php echo $sn_holiday_message_directory; ?>/images/snowman.png" alt="snowman" /></a></li>
								<li<?php if($field_value == "elf") { echo ' class="active"'; } ?>><a href="#"><img src="<?php echo $sn_holiday_message_directory; ?>/images/elf.png" alt="elf" /></a></li>
								<li<?php if($field_value == "christmas-tree") { echo ' class="active"'; } ?>><a href="#"><img src="<?php echo $sn_holiday_message_directory; ?>/images/christmas-tree.png" alt="christmas-tree" /></a></li>
								<li<?php if($field_value == "snow-globe") { echo ' class="active"'; } ?>><a href="#"><img src="<?php echo $sn_holiday_message_directory; ?>/images/snow-globe.png" alt="snow-globe" /></a></li>
								<li<?php if($field_value == "menorah") { echo ' class="active"'; } ?>><a href="#"><img src="<?php echo $sn_holiday_message_directory; ?>/images/menorah.png" alt="menorah" /></a></li>
								<li<?php if($field_value == "carol-singers") { echo ' class="active"'; } ?>><a href="#"><img src="<?php echo $sn_holiday_message_directory; ?>/images/carol-singers.png" alt="carol-singers" /></a></li>
							</ul>
						</div>
							
					<table class="form-table">
					
	<?php /* ACTUAL FIELDS */  } else { ?>
	
					<tr valign="top" class="<?php echo 'field_'.$field_name; ?>">
					<?php if($field_label == "&nbsp;" || $field_type == "export" || $field_type == "import") { ?>
						<td colspan="2">
					<?php } else { ?>
						<th scope="row"><?php echo $field_label; ?></th>
						<td>
					<?php } ?>
			
			<?php /* TEXT */ if($field_type == "text") { ?>
					
						<input id="<?php echo $field_id; ?>" class="regular-text" type="<?php echo $field_type; ?>" 
						name="<?php echo $field_id; ?>" value="<?php echo esc_attr_e($field_value); ?>" />
						
			
			<?php /* TEXTAREA */ } else if($field_type == "textarea") { ?>
			
						<textarea id="<?php echo $field_id; ?>" class="large-text" cols="50" rows="10" 
						name="<?php echo $field_id; ?>"><?php echo esc_textarea($field_value); ?></textarea><br/>
			
			<?php /* TEXTAREA */ } else if($field_type == "wpeditor") { ?>
						
						<div class="sn_plugin_options_wp_editor">
						<?php $settings = array(
							'wpautop' => true, 
							'media_buttons' => true, 
							'quicktags' => false, 
							'textarea_rows' => '20'
						);
						wp_editor(esc_textarea($field_value), $field_id, $settings); ?>
						</div>
									
			<?php /* CHECKBOX */ } else if($field_type == "checkbox") { ?>
				
						<input id="<?php echo $field_id; ?>" type="checkbox" value="1" 
						name="<?php echo $field_id; ?>" <?php if(isset($field_value)) { checked( '1', $field_value ); } ?> />
			
			<?php /* FILE UPLOAD */ } else if($field_type == "file") { ?>
			
						<input style="padding:5px 7px;" id="<?php echo $field_id; ?>" class="regular-text upload_url" type="text" 
						name="<?php echo $field_id; ?>" value="<?php esc_attr_e($field_value); ?>" />
						<div class="upload_buttons">
							<input type="button" 
							value="<?php if($field_button_label) { echo $field_button_label; } else { echo 'Upload Image'; } ?>" 
							class="button upload_button" rel="<?php if($post) { echo $post->ID; } else { echo '0'; } ?>" />
							<a href="#" class="remove_image">Remove</a>
						</div>
						<?php if($field_value) { ?>
						<div class="show-image"><img src="<?php echo $field_value; ?>" alt="" /></div>
						<?php } ?>
			
			<?php /* COLOUR PICKER */ } else if($field_type == "colorpicker") { ?>
					
						<div class="color-picker-container" style="position: relative;">
							<input id="<?php echo $field_id; ?>" class="regular-text color-picker-text" type="text" name="<?php echo $field_id; ?>" value="<?php echo esc_attr_e($field_value); ?>" />
							<div style="position: absolute;" class="color-picker-selector"></div>
					    </div>
						
			<?php /* RADIO BUTTONS */ } else if($field_type == "radio") { ?>
				
						<fieldset>
							<legend class="screen-reader-text"><span><?php echo $field_label; ?></span></legend>
							<?php
								if ( ! isset( $checked ) ) { $checked = ''; }
								foreach($field_choices as $option) {
									if ( '' != $field_value ) {
										if ( $field_value == $option['value'] ) {
											$checked = "checked=\"checked\"";
										} else {
											$checked = '';
										}
									}
									?>
									<label class="radio_description description">
										<input type="radio" value="<?php esc_attr_e( $option['value'] ); ?>" 
										name="<?php echo $field_id; ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?>
									</label><br />
									<?php
								}
							?>
						</fieldset>
			
			<?php /* SELECT */ } else if($field_type == "select") { ?>
				
						<select name="<?php echo $field_id; ?>">
							<?php foreach ( $field_choices as $option ) {
								$label = $option['label']; ?>
									<option <?php if($field_value == $option['value']) { ?>selected='selected'<?php } ?> 
									value='<?php echo  esc_attr( $option['value'] ); ?>'><?php echo $label; ?></option>
							<?php } ?>
						</select>
						
					
			<?php /* SELECT TAXONOMY */ } else if($field_type == "select_taxonomy") { ?>
				
						<select name="<?php echo $field_id; ?>">
							<option value=""></option>
							<?php $list_terms = get_terms($field_taxonomy); 
								foreach ($list_terms as $list_term) { ?>
									<option <?php if($field_value == $list_term->term_id) { ?>selected='selected'<?php } ?> 
									value='<?php echo  esc_attr( $list_term->term_id ); ?>'><?php echo $list_term->name; ?></option>
							<?php } ?>
						</select>
			
			<?php /* SELECT POST */ } else if($field_type == "select_post") { ?>
				
						<select name="<?php echo $field_id; ?>">
							<option value=""></option>
							<?php $list_posts = get_posts('post_type='.$field_posttype.'&numberposts=-1&orderby=title&order=ASC'); 
								foreach ($list_posts as $list_post) { ?>
									<option <?php if($field_value == $list_post->ID) { ?>selected='selected'<?php } ?> 
									value='<?php echo  esc_attr( $list_post->ID ); ?>'><?php echo $list_post->post_title; ?></option>
							<?php } ?>
						</select>
			
			<?php } ?>
				
						<label class="<?php echo $field_type.'_description '; ?>description" for="<?php echo $field_id; ?>"><?php echo $field_description; ?></label>
						
					</td>
				</tr>
				
	<?php } /* End field checks */
	
}