<li>
	<?php
		echo "<label>".esc_html__(wc_attribute_label($rtwvsmlw_attr_key), 'rtwvsmlw-variation-swatches-lite-for-woocommerce')."</label>";

	?>
	<div class="rtwvsmlw_variation_wrap rtwvsmlw_display_single_page <?php echo esc_attr('rtwvsmlw_display_attr_'.$rtwvsmlw_attr_key) ?>">
    <?php 
    $i = 0;
    $parent_attribute_id = $rtwvsmlw_attr_val->get_id();

    $rtwvsmlw_parent_term_meta = get_term_meta($parent_attribute_id, 'rtwvsmlw_attr_meta');

    $rtwvsmlw_parent_term_meta = isset($rtwvsmlw_parent_term_meta[0])? $rtwvsmlw_parent_term_meta[0] : array();

	foreach($rtwvsmlw_attr_val->get_options() as $rtwvsmlw_variation_key => $rtwvsmlw_variation_val)
	{
		$rtwvsmlw_attr_id = $rtwvsmlw_attr_val->get_id();
		
		if( isset($rtwvsmlw_attr_id) )
		{
			global $wpdb;
			
			$rtwvsmlw_attr_typ_query = "SELECT attribute_type FROM ".$wpdb->prefix."woocommerce_attribute_taxonomies WHERE attribute_id = %s";
			
			if( isset($rtwvsmlw_attr_typ_query) )
			{
				$rtwvsmlw_attr_type = $wpdb->get_var($wpdb->prepare($rtwvsmlw_attr_typ_query,$rtwvsmlw_attr_id));
			}
			
			if( isset($rtwvsmlw_attr_type) && !empty($rtwvsmlw_attr_type) )
			{
				$rtwvsmlw_attr_term = get_term($rtwvsmlw_variation_val);

				if( isset($rtwvsmlw_attr_term) && isset($rtwvsmlw_attr_term->taxonomy) )
				{
					$rtwvsmlw_attr_all_taxonomies[] = $rtwvsmlw_attr_term->taxonomy;

					///// For Type Color
					if( $rtwvsmlw_attr_type == 'color' )
					{
						$rtwvsmlw_attr_term = get_term($rtwvsmlw_variation_val);
						
						$rtwvsmlw_attr_term_meta = get_term_meta($rtwvsmlw_variation_val,'order_'.$rtwvsmlw_attr_key );
						
						$rtwvsmlw_attr_term_meta = isset($rtwvsmlw_attr_term_meta[0])?$rtwvsmlw_attr_term_meta[0]: array();

						if( isset($rtwvsmlw_attr_term) && isset($rtwvsmlw_attr_term_meta) && isset($rtwvsmlw_attr_term->slug) && isset($rtwvsmlw_attr_term->name) )
						{
							// For single colors
							if( isset($rtwvsmlw_attr_term_meta) && !empty($rtwvsmlw_attr_term_meta) && count($rtwvsmlw_attr_term_meta['colors']) != 0)
							{
								/// For display type color
								if(isset($rtwvsmlw_parent_term_meta['display_type']) && $rtwvsmlw_parent_term_meta['display_type'] == 'color')
								{
									/// for swatches profile color
									if(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'color')
									{
										?>
										<div class="rtwvsmlw_tooltip rtw_display_type_color rtwvsmlw_color_type_variation rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?> term_<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?> <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
											<span data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>" class="rtwvsmlw_tooltip rtwvsmlw_click_chng_data rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?>  " style="background: <?php echo esc_attr($rtwvsmlw_attr_term_meta['colors'][0]); ?>"></span>
											<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
										</div>
										
									<?php
									}
									/// for swatches profile image
									elseif(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'image')
									{
										?>
										<div class="rtwvsmlw_tooltip rtwvsmlw_img_type_variation rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?> term_<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?> <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
											<span data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>" class="rtwvsmlw_tooltip rtwvsmlw_click_chng_data rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> <?php echo esc_attr($rtwvsmlw_attr_border_class) ?> " style="background: <?php echo esc_attr($rtwvsmlw_attr_term_meta['colors'][0]); ?>"></span>
											<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
										</div>
									<?php
									}
									/// for swatches profile btton
									elseif(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'button')
									{	
										?>
										<div class="rtwvsmlw_tooltip rtwvsmlw_btn_variation_optn rtwvsmlw_btn_profile rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?> term_<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?> <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
											<span data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>" class="rtwvsmlw_tooltip rtwvsmlw_click_chng_data rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> " style="background: <?php echo esc_attr($rtwvsmlw_attr_term_meta['colors'][0]); ?>"></span>
											<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
										</div>
										<?php
									}
								}
							}
							else{
								?>
								<div class="rtwvsmlw_tooltip rtwvsmlw_color_variation_inner rtwvsmlw_color_type_variation rtwvsmlw_variation_option_wrap  <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?> <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
									<span data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>" class="rtwvsmlw_click_chng_data rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> "></span>
									<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
								</div>
								<?php
							}
						}
					}
					else if( $rtwvsmlw_attr_type == 'button' )
					{
						$rtwvsmlw_attr_term = get_term($rtwvsmlw_variation_val);
						$rtwvsmlw_attr_term_meta = get_term_meta($rtwvsmlw_variation_val,'order_'.$rtwvsmlw_attr_key)[0];
						if( isset($rtwvsmlw_attr_term) && isset($rtwvsmlw_attr_term_meta) && isset($rtwvsmlw_attr_term->slug) && isset($rtwvsmlw_attr_term->name) )
						{
							/// for swatches profile color
							if(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'color')
							{
								?>
								<div class="rtwvsmlw_tooltip rtw_display_type_btn rtwvsmlw_color_type_variation rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
									<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip   <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
									<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
								</div>
								<?php
							}
							/// for swatches profile image
							elseif(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'image')
							{
								?>
								<div class="rtwvsmlw_tooltip rtw_display_type_btn rtwvsmlw_img_type_variation rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
									<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip   <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
									<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
								</div>
								<?php

							}
							/// for swatches profile btton
							elseif(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'button')
							{
								
								?>
								<div class="rtwvsmlw_tooltip rtwvsmlw_btn_variation_optn rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
									<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip   <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
									<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
								</div>
								<?php
							}
						}
					}
					else if( $rtwvsmlw_attr_type == 'radio' )
					{
					
						$rtwvsmlw_attr_term = get_term($rtwvsmlw_variation_val);
						$rtwvsmlw_attr_term_meta = get_term_meta($rtwvsmlw_variation_val,'order_'.$rtwvsmlw_attr_key)[0];
						
						if( isset($rtwvsmlw_attr_term) && isset($rtwvsmlw_attr_term_meta) && isset($rtwvsmlw_attr_term->slug) && isset($rtwvsmlw_attr_term->name) )
						{
							/// For display type radio
							if(isset($rtwvsmlw_parent_term_meta['display_type']) &&  $rtwvsmlw_parent_term_meta['display_type'] == 'radio')
							{
								/// for swatches profile color
								if(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'color')
								{
									?>
									<div class="rtwvsmlw_tooltip rtwvsmlw_color_type_variation rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
										<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip   <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>">
										<input type="radio"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
										<h6 class="rtwvsmlw_tooltiptext"><?php esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
									</div>
									<?php 
								
								}
								/// for swatches profile image
								elseif(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'image')
								{
									?>
										<div class="rtwvsmlw_tooltip rtwvsmlw_img_type_variation rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
										<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip   <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>">
										<input type="radio"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
										<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
									</div>
									<?php
								}
								/// for swatches profile btton
								elseif(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'button')
								{
								?>
									<div class="rtwvsmlw_tooltip rtwvsmlw_btn_variation_optn rtwvsmlw_variation_option_wrap  <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
									<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip  <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>">
										<input type="radio"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>
									</span>
									<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
								</div>
								<?php
								}
							
							}
						}
					}
					else
					{
						$rtwvsmlw_attr_term = get_term($rtwvsmlw_variation_val);
						$rtwvsmlw_attr_term_meta = get_term_meta($rtwvsmlw_variation_val,'order_'.$rtwvsmlw_attr_key)[0];
						if( isset($rtwvsmlw_attr_term) && isset($rtwvsmlw_attr_term_meta) && isset($rtwvsmlw_attr_term->slug) && isset($rtwvsmlw_attr_term->name) )
						{
							/// for swatches profile color
							if(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'color')
							{
								?>
								<div class="rtwvsmlw_tooltip rtw_display_type_btn rtwvsmlw_color_type_variation rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
									<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip   <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
									<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
								</div>
								<?php
							}
							/// for swatches profile image
							elseif(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'image')
							{
								?>
								<div class="rtwvsmlw_tooltip rtw_display_type_btn rtwvsmlw_img_type_variation rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
									<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip   <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
									<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
								</div>
								<?php

							}
							/// for swatches profile btton
							elseif(isset($rtwvsmlw_parent_term_meta['attr_profile']) && $rtwvsmlw_parent_term_meta['attr_profile'] == 'button')
							{
								
								?>
								<div class="rtwvsmlw_tooltip rtwvsmlw_btn_variation_optn rtwvsmlw_variation_option_wrap <?php echo esc_attr($rtwvsmlw_attr_border_class) ?>">
									<span class = 'rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_term->taxonomy) ?> rtwvsmlw_btn_edit rtwvsmlw_tooltip   <?php echo esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_attr_term->slug); ?>"><?php esc_html_e($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
									<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
								</div>
								<?php
							}
						}
					}
				}
			}
			else
			{
				if($rtwvsmlw_attr_key = 'logo')
				{
					if( isset($rtwvsmlw_variation_val) && !empty($rtwvsmlw_variation_val) )
					{
						?>
						<div class="rtwvsmlw_tooltip rtwvsmlw_logo_variation_inner rtwvsmlw_variation_option_wrap term_<?php echo esc_attr($rtwvsmlw_variation_val) .' '.esc_attr($rtwvsmlw_attr_border_class); ?>">
							<span class='rtwvsmlw_single_edit_size rtwvsmlw_click_chng_data_size rtwvsmlw_attr_available_attr <?php echo esc_attr('rtwvsmlw_attr_available_slug_'.$rtwvsmlw_attr_key).' '.esc_attr($rtwvsmlw_attr_tooltip_class); ?>' data-attr-type="<?php echo esc_attr($rtwvsmlw_attr_key); ?>" data-attr-slug="<?php echo esc_attr($rtwvsmlw_variation_val); ?>"> <?php esc_html_e($rtwvsmlw_variation_val, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
							<h6 class="rtwvsmlw_tooltiptext"><?php echo esc_html__($rtwvsmlw_attr_term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></h6>
						</div>
						<?php
					}
				}
			}
		}
	}
    ?>
    </div>
</li>