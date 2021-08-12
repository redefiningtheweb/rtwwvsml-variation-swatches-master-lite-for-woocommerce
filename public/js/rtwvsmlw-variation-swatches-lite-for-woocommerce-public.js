(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).ready(function(){

		if($(document).find('#rtwvsmlw_enable_variation_on_single').val() == 'yes')
		{
			$(document).find('.variations_form table.variations tbody').css('display', 'none');
		}
		
		if($(document).find('#rtwvsmlw_display_border').val() != '' && $(document).find('#rtwvsmlw_display_border').val() == 'yes')
		{
			var rtwvsmlw_display_border = 'done';
		}else{
			var rtwvsmlw_display_border = '';
		}

		if($(document).find('.single_add_to_cart_button').val() == '')
		{
			$(document).find('.single_add_to_cart_button').attr('disabled', 'disabled');
		}
		
		if( $(document).find('.rtwvsmlw_attribute_to_show').val() != '' && $(document).find('.rtwvsmlw_attribute_to_show').val() != 'undefined' && $(document).find('.rtwvsmlw_attribute_to_show').val() != undefined )
		{
			var rtwvsmlw_attribute_to_show = $.parseJSON($(document).find('.rtwvsmlw_attribute_to_show').val());
			
			$.each(rtwvsmlw_attribute_to_show,function(rtwvsmlw_attr_no, attribute){
				
			});
		}

		$(document).on('click','.rtwvsmlw_clear_on_reselect',function(){
			$(this).removeClass('rtwvsmlw_single_page_after_effect');
			$(this).removeClass('rtwvsmlw_clear_on_reselect');
		});

		 $(document).on('click','.rtwvsmlw_click_chng_data_size',function(){

			if( rtwvsmlw_display_border != '' && rtwvsmlw_display_border != 'undefined' && rtwvsmlw_display_border != undefined && rtwvsmlw_display_border == 'done' )
			{
				$(document).find('.rtwvsmlw_click_chng_data_size').removeClass('rtwvsmlw_single_page_after_effect');
			}
			else
			{
				$(document).find('.rtwvsmlw_click_chng_data_size').removeClass('rtwvsmlw_single_page_after_effect');
				$(this).addClass('rtwvsmlw_single_page_after_effect');

			}
			var rtwvsmlw_attr_type = $(this).attr('data-attr-type');
			var rtwvsmlw_attr_val = $(this).attr('data-attr-slug');
			$(document).find('#'+rtwvsmlw_attr_type).val(rtwvsmlw_attr_val);
			$(document).find('#'+rtwvsmlw_attr_type).trigger('change');

			if($(document).find('#rtwvsmlw_clear_on_reselect').val() != '' && $(document).find('#rtwvsmlw_clear_on_reselect').val() == 'yes')
			{
				$(this).addClass('rtwvsmlw_clear_on_reselect');
			}
		})

		$(document).on('click','.rtwvsmlw_click_chng_data_radio',function(){

			if( rtwvsmlw_display_border != '' && rtwvsmlw_display_border != 'undefined' && rtwvsmlw_display_border != undefined && rtwvsmlw_display_border == 'done' )
			{
				$(document).find('.rtwvsmlw_click_chng_data_radio').removeClass('rtwvsmlw_single_page_after_effect');
			}
			else
			{
				$(document).find('.rtwvsmlw_click_chng_data_radio').removeClass('rtwvsmlw_single_page_after_effect');
				$(this).addClass('rtwvsmlw_single_page_after_effect');

			}
			var rtwvsmlw_attr_type = $(this).attr('data-attr-type');
			var rtwvsmlw_attr_val = $(this).attr('data-attr-slug');
			$(document).find('#'+rtwvsmlw_attr_type).val(rtwvsmlw_attr_val);
			$(document).find('#'+rtwvsmlw_attr_type).trigger('change');

			if($(document).find('#rtwvsmlw_clear_on_reselect').val() != '' && $(document).find('#rtwvsmlw_clear_on_reselect').val() == 'yes')
			{
				$(this).addClass('rtwvsmlw_clear_on_reselect');
			}
		})


		$(document).on('click','.rtwvsmlw_click_chng_data_img',function(){

			if( rtwvsmlw_display_border != '' && rtwvsmlw_display_border != 'undefined' && rtwvsmlw_display_border != undefined && rtwvsmlw_display_border == 'done' )
			{
				$(document).find('.rtwvsmlw_click_chng_data_img').removeClass('rtwvsmlw_single_page_after_effect');
			}
			else
			{
				$(document).find('.rtwvsmlw_click_chng_data_img').removeClass('rtwvsmlw_single_page_after_effect');
				$(this).addClass('rtwvsmlw_single_page_after_effect');

			}
			var rtwvsmlw_attr_type = $(this).attr('data-attr-type');
			var rtwvsmlw_attr_val = $(this).attr('data-attr-slug');
			$(document).find('#'+rtwvsmlw_attr_type).val(rtwvsmlw_attr_val);
			$(document).find('#'+rtwvsmlw_attr_type).trigger('change');

			if($(document).find('#rtwvsmlw_clear_on_reselect').val() != '' && $(document).find('#rtwvsmlw_clear_on_reselect').val() == 'yes')
			{
				$(this).addClass('rtwvsmlw_clear_on_reselect');
			}
		})

		if( $(document).find('#rtwvsmlw_advance_variation_width').val() != '' && $(document).find('#rtwvsmlw_advance_variation_width').val() != undefined )
		{
			$(document).find('.rtwvsmlw_attr_available_slug_Yes').css('width',$(document).find('#rtwvsmlw_advance_variation_width').val());		
			$(document).find('.rtwvsmlw_attr_available_slug_No').css('width',$(document).find('#rtwvsmlw_advance_variation_width').val());
		}
		if( $(document).find('#rtwvsmlw_advance_variation_height').val() != '' && $(document).find('#rtwvsmlw_advance_variation_height').val() != undefined )
		{
			$(document).find('.rtwvsmlw_attr_available_slug_Yes').css('height',$(document).find('#rtwvsmlw_advance_variation_height').val());		
			$(document).find('.rtwvsmlw_attr_available_slug_No').css('height',$(document).find('#rtwvsmlw_advance_variation_height').val());
		}
		if( $(document).find('#rtwvsmlw_advance_font_size').val() != '' && $(document).find('#rtwvsmlw_advance_font_size').val() != undefined )
		{
			$(document).find('.rtwvsmlw_attr_available_slug_Yes').css('font-size',$(document).find('#rtwvsmlw_advance_font_size').val());			
			$(document).find('.rtwvsmlw_attr_available_slug_No').css('font-size',$(document).find('#rtwvsmlw_advance_font_size').val());
		}
		if( $(document).find('#rtwvsmlw_advance_shop_width').val() != '' && $(document).find('#rtwvsmlw_advance_shop_width').val() != undefined )
		{
			$(document).find('.rtwvsmlw_attr_available_slug_Yes').css('width',$(document).find('#rtwvsmlw_advance_shop_width').val());		
			$(document).find('.rtwvsmlw_attr_available_slug_No').css('width',$(document).find('#rtwvsmlw_advance_shop_width').val());
		}
		if( $(document).find('#rtwvsmlw_advance_shop_height').val() != '' && $(document).find('#rtwvsmlw_advance_shop_height').val() != undefined )
		{
			$(document).find('.rtwvsmlw_attr_available_slug_Yes').css('height',$(document).find('#rtwvsmlw_advance_shop_height').val());		
			$(document).find('.rtwvsmlw_attr_available_slug_No').css('height',$(document).find('#rtwvsmlw_advance_shop_height').val());
		}
		if( $(document).find('#rtwvsmlw_shop_font_size').val() != '' && $(document).find('#rtwvsmlw_shop_font_size').val() != undefined )
		{
			$(document).find('.rtwvsmlw_attr_available_slug_Yes').css('font-size',$(document).find('#rtwvsmlw_shop_font_size').val());			
			$(document).find('.rtwvsmlw_attr_available_slug_No').css('font-size',$(document).find('#rtwvsmlw_shop_font_size').val());
		}
		
		var rtwvsmlw_woo_avial_check_array = [];

		$(document).find('.rtwvsmlw_shop_page_main_wrapper').each(function()
		{
			var $thiss = $(this).parents('li.product');
			if( $(this).find('#rtwvsmlw_attr_all_taxonomies').val() != '' && $(this).find('#rtwvsmlw_attr_all_taxonomies').val() != 'undefined' && $(this).find('#rtwvsmlw_attr_all_taxonomies').val() != undefined )
			{
				
				var rtwvsmlw_attr_all_taxonomies = JSON.parse($(this).find('#rtwvsmlw_attr_all_taxonomies').val());
				$.each(rtwvsmlw_attr_all_taxonomies,function(rtwvsmlw_attr_taxonomy_no,rtwvsmlw_attr_taxonomy_name){
				
					$(document).find('#'+rtwvsmlw_attr_taxonomy_name+  ' option').each(function(){
						var rtwvsmlw_woo_avial = $(this).val();
						var rtwvsmlw_woo_avial_check = rtwvsmlw_attr_taxonomy_name+'_'+rtwvsmlw_woo_avial;
						rtwvsmlw_woo_avial_check_array.push(rtwvsmlw_woo_avial_check);
					})
					
					$thiss.find('.rtwvsmlw_attr_available_slug_'+rtwvsmlw_attr_taxonomy_name).each(function(){
						var $rtwvsmlw_parent = $(this);
						
						if( $thiss.find('#rtwvsmlw_advance_shop_width').val() != '' && $thiss.find('#rtwvsmlw_advance_shop_width').val() != undefined )
						{
							$(this).parent().css('width', $thiss.find('#rtwvsmlw_advance_shop_width').val());
						}
						if($thiss.find('#rtwvsmlw_advance_shop_height').val() != '' && $thiss.find('#rtwvsmlw_advance_shop_height').val() != undefined )
						{
							$(this).parent().css('height', $thiss.find('#rtwvsmlw_advance_shop_height').val());
						}
						if($thiss.find('#rtwvsmlw_shop_font_size').val() != '' && $thiss.find('#rtwvsmlw_shop_font_size').val() != undefined )
						{
							$(this).css('font-size', $thiss.find('#rtwvsmlw_shop_font_size').val());
						}
						if($thiss.find('#rtwvsmlw_shop_swatches_align').val() != '' && $thiss.find('#rtwvsmlw_shop_swatches_align').val() != undefined )
						{
							$(this).addClass('rtwvsmlw_swatches_align_'+ $thiss.find('#rtwvsmlw_shop_swatches_align').val());
						}
						var rtwvsmlw_attr_available_slug = $(this).attr('data-attr-slug');
						
						var rtwvsmlw_attr_available_slug_taxonomy = rtwvsmlw_attr_taxonomy_name+'_'+rtwvsmlw_attr_available_slug;
						rtwvsmlw_attr_available_slug_taxonomy = 0;
						if( rtwvsmlw_woo_avial_check_array.indexOf(rtwvsmlw_attr_available_slug_taxonomy) > -1 )
						{
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');
	
						}
						else
						{
							if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_crosss' )
							{
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
								$rtwvsmlw_parent.addClass('rtwvsmlw_advance_blur_with_cross');
								$(document).find(".rtwvsmlw_advance_blur_with_cross").parent().css("pointer-events","none");
							}
							else if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_crosss' )
							{
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');
								$rtwvsmlw_parent.addClass('rtwvsmlw_advance_blur_without_cross');
								$(document).find(".rtwvsmlw_advance_blur_without_cross").parent().css("pointer-events","none");
							}
							else if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hides' )
							{
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
								$rtwvsmlw_parent.addClass('rtwvsmlw_advance_hide');
								$(document).find(".rtwvsmlw_advance_blur_without_cross").parent().css("pointer-events","none");
							}
						}
					})		
				});
			}
		})

		if( $(document).find('#rtwvsmlw_attr_all_taxonomies').val() != '' && $(document).find('#rtwvsmlw_attr_all_taxonomies').val() != 'undefined' && $(document).find('#rtwvsmlw_attr_all_taxonomies').val() != undefined )
		{
			var rtwvsmlw_attr_all_taxonomies = JSON.parse($(document).find('#rtwvsmlw_attr_all_taxonomies').val());

			$.each(rtwvsmlw_attr_all_taxonomies,function(rtwvsmlw_attr_taxonomy_no,rtwvsmlw_attr_taxonomy_name){
				
				$(document).find('#'+rtwvsmlw_attr_taxonomy_name+  ' option').each(function(){
					var rtwvsmlw_woo_avial = $(this).val();
					var rtwvsmlw_woo_avial_check = rtwvsmlw_attr_taxonomy_name+'_'+rtwvsmlw_woo_avial;
					rtwvsmlw_woo_avial_check_array.push(rtwvsmlw_woo_avial_check);
				})
				
				$(document).find('.rtwvsmlw_attr_available_slug_'+rtwvsmlw_attr_taxonomy_name).each(function(){
					var $rtwvsmlw_parent = $(this);
					
					if( $(document).find('#rtwvsmlw_advance_variation_width').val() != '' && $(document).find('#rtwvsmlw_advance_variation_width').val() != undefined )
					{
						$(this).parent().css('width',$(document).find('#rtwvsmlw_advance_variation_width').val());
					}
					if( $(document).find('#rtwvsmlw_advance_variation_height').val() != '' && $(document).find('#rtwvsmlw_advance_variation_height').val() != undefined )
					{
						$(this).parent().css('height',$(document).find('#rtwvsmlw_advance_variation_height').val());
					}
					if( $(document).find('#rtwvsmlw_advance_font_size').val() != '' && $(document).find('#rtwvsmlw_advance_font_size').val() != undefined )
					{
						$(this).css('font-size',$(document).find('#rtwvsmlw_advance_font_size').val());
					}
					if( $(document).find('#rtwvsmlw_advance_shop_width').val() != '' && $(document).find('#rtwvsmlw_advance_shop_width').val() != undefined )
					{
						$(this).parent().css('width',$(document).find('#rtwvsmlw_advance_shop_width').val());
					}
					if( $(document).find('#rtwvsmlw_advance_shop_height').val() != '' && $(document).find('#rtwvsmlw_advance_shop_height').val() != undefined )
					{
						$(this).parent().css('height',$(document).find('#rtwvsmlw_advance_shop_height').val());
					}
					if( $(document).find('#rtwvsmlw_shop_font_size').val() != '' && $(document).find('#rtwvsmlw_shop_font_size').val() != undefined )
					{
						$(this).css('font-size',$(document).find('#rtwvsmlw_shop_font_size').val());
					}
					if( $(document).find('#rtwvsmlw_shop_swatches_align').val() != '' && $(document).find('#rtwvsmlw_shop_swatches_align').val() != undefined )
					{
						$(this).addClass('rtwvsmlw_swatches_align_'+$(document).find('#rtwvsmlw_shop_swatches_align').val());
					}
					var rtwvsmlw_attr_available_slug = $(this).attr('data-attr-slug');
					
					var rtwvsmlw_attr_available_slug_taxonomy = rtwvsmlw_attr_taxonomy_name+'_'+rtwvsmlw_attr_available_slug;
					rtwvsmlw_attr_available_slug_taxonomy = 0;
					if( rtwvsmlw_woo_avial_check_array.indexOf(rtwvsmlw_attr_available_slug_taxonomy) > -1 )
					{
						$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
						$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
						$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');

					}
					else
					{
						if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_crosss' )
						{
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
							$rtwvsmlw_parent.addClass('rtwvsmlw_advance_blur_with_cross');
							$(document).find(".rtwvsmlw_advance_blur_with_cross").parent().css("pointer-events","none");
						}
						else if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_crosss' )
						{
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');
							$rtwvsmlw_parent.addClass('rtwvsmlw_advance_blur_without_cross');
							$(document).find(".rtwvsmlw_advance_blur_without_cross").parent().css("pointer-events","none");
						}
						else if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hides' )
						{
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
							$rtwvsmlw_parent.addClass('rtwvsmlw_advance_hide');
							$(document).find(".rtwvsmlw_advance_blur_without_cross").parent().css("pointer-events","none");
						}
					}
				})		
			});
		}

		$(document).on('click','.rtwvsmlw_variation_on_shop',function(){
			var rtwvsmlw_main_avail_attr = JSON.parse( $(this).attr('data-avail_attr') );
			var rtwvsmlw_main_attr_type = $(this).children().attr('data-attr-type');
			
			var rtwvsmlw_just_parent = $(this).parents('.rtwvsmlw_attr_lists');
			var rtwvsmlw_parent = $(this).parents('li.product');
			if( rtwvsmlw_display_border != '' && rtwvsmlw_display_border != 'undefined' && rtwvsmlw_display_border != undefined && rtwvsmlw_display_border == 'done' )
			{
				$(this).parent('.rtwvsmlw_variation_wrap').find('.rtwvsmlw_variation_on_shop').removeClass('rtwvsmlw_single_page_after_effect');
				if(!$(this).hasClass('rtwvsmlw_advance_blur_without_cross') && !$(this).hasClass('rtwvsmlw_advance_blur_with_cross') )
				{
					$(this).addClass('rtwvsmlw_single_page_after_effect');
				}
			}
			else
			{
				$(this).parent('.rtwvsmlw_variation_wrap').find('.rtwvsmlw_variation_on_shop').removeClass('rtwvsmlw_single_page_after_effect');
				$(this).addClass('rtwvsmlw_single_page_after_effect');
			}

			var rtwvsmlw_all_selected_values = {};
			var rtwvsmlw_attr_type = $(this).children().attr('data-attr-type');
			var rtwvsmlw_attr_val = $(this).children().attr('data-attr-slug');
			
			rtwvsmlw_parent.find('#'+rtwvsmlw_attr_type).val(rtwvsmlw_attr_val).change();
			var rtwvsmlw_selected_attr = $(this).children().attr('data-attr-slug');
			var rtwvsmlw_taxonomy = $(this).children().attr('data-attr-type');

			var rtwvsmlw_form_variation_data = JSON.parse( $(this).parents('li.product').find('.variations_form').attr('data-product_variations') );
			
			var rtwvsmlw_taxonomies = [];
			var taxonomies_values = [];
			$.each(rtwvsmlw_form_variation_data,function(rtwvsmlw_attr_no,rtwvsmlw_attr_taxonomy){
				$.each(rtwvsmlw_attr_taxonomy['attributes'],function(key,value){
					if( rtwvsmlw_taxonomies.indexOf(key) == -1 )
					{
						rtwvsmlw_taxonomies.push(key);
					}
				});
				taxonomies_values.push(rtwvsmlw_attr_taxonomy['attributes']);
			});
			
			var rtwvsmlw_selected_values;
			rtwvsmlw_parent.find('.rtwvsmlw_variation_on_shop').each(function(){
				var rtwvsmlw_avail_attr = JSON.parse( $(this).attr('data-avail_attr') );
				
				var $rtwvsmlw_this = $(this);
				if( rtwvsmlw_taxonomy != $(this).children().attr('data-attr-type') )
				{
					if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_cross' )
					{
						$(this).addClass('rtwvsmlw_advance_blur_with_cross');
					}
					else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_cross' )
					{
						$(this).addClass('rtwvsmlw_advance_blur_without_cross');
					}
					else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hide' )
					{
						$(this).addClass('rtwvsmlw_advance_hide');
					}
					
					$.each(taxonomies_values,function(keys,rtwvsmlw_values){

						if( (Object.values(rtwvsmlw_values).indexOf(rtwvsmlw_selected_attr) > -1 && Object.values(rtwvsmlw_values).indexOf($rtwvsmlw_this.children().attr('data-attr-slug')) > -1) || ( ( rtwvsmlw_main_avail_attr == rtwvsmlw_avail_attr ) ))
						{
							rtwvsmlw_selected_values = rtwvsmlw_values;
							
							if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_cross' )
							{
								$rtwvsmlw_this.removeClass('rtwvsmlw_advance_blur_with_cross');
							}
							else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_cross' )
							{
								$rtwvsmlw_this.removeClass('rtwvsmlw_advance_blur_without_cross');
							}
							else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hide' )
							{
								$rtwvsmlw_this.removeClass('rtwvsmlw_advance_hide');
							}
						}
						else if(rtwvsmlw_main_avail_attr.length != 0 && rtwvsmlw_avail_attr.length != 0 )
						{
							var rtwvsmlw_is_true = 'false';

							$.each(rtwvsmlw_avail_attr,function(kys,vls){
								
								if(vls['attribute_'+rtwvsmlw_main_attr_type] == '')
								{
									rtwvsmlw_is_true = 'true';
								}
								else if(vls['attribute_'+rtwvsmlw_main_attr_type] == rtwvsmlw_selected_attr)
								{
									rtwvsmlw_is_true = 'true';
								}
							});

							if(rtwvsmlw_is_true == 'true')
							{
								if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_cross' )
								{
									$rtwvsmlw_this.removeClass('rtwvsmlw_advance_blur_with_cross');
								}
								else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_cross' )
								{
									$rtwvsmlw_this.removeClass('rtwvsmlw_advance_blur_without_cross');
								}
								else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hide' )
								{
									$rtwvsmlw_this.removeClass('rtwvsmlw_advance_hide');
								}
							}
						}
					});
				}
			});

			var sbc;
			$.each(rtwvsmlw_form_variation_data,function(rtwvsmlw_attr_no,rtwvsmlw_attr_taxonomy){
				
				rtwvsmlw_parent.find('.rtwvsmlw_variation_on_shop').each(function(){
					if($(this).hasClass('rtwvsmlw_single_page_after_effect'))
					{
						rtwvsmlw_all_selected_values['attribute_'+$(this).children().attr('data-attr-type') ] = $(this).children().attr('data-attr-slug');
					}
				});

				$.each(rtwvsmlw_attr_taxonomy['attributes'],function(rtwvsmlw_attr_no,rtwvsmlw_taxonomy){

					if( (rtwvsmlw_all_selected_values[rtwvsmlw_attr_no] == rtwvsmlw_attr_taxonomy['attributes'][rtwvsmlw_attr_no]) || rtwvsmlw_attr_taxonomy['attributes'][rtwvsmlw_attr_no] == '' )
					{
						delete rtwvsmlw_all_selected_values[rtwvsmlw_attr_no];
						
						if( Object.keys(rtwvsmlw_all_selected_values).length === 0 )
						{
							rtwvsmlw_parent.find('.attachment-woocommerce_thumbnail').attr( 'srcset', rtwvsmlw_attr_taxonomy['image']['srcset'] );
							rtwvsmlw_parent.find('.price').html(rtwvsmlw_attr_taxonomy['price_html']);
							rtwvsmlw_parent.find('.variation_id').val(rtwvsmlw_attr_taxonomy['variation_id']);
						}
					}
				});

			});

			rtwvsmlw_parent.find('.rtwvsmlw_variation_on_shop').each(function(){
				if($(this).hasClass('rtwvsmlw_single_page_after_effect'))
				{
					if($(this).hasClass('rtwvsmlw_single_page_after_effect'))
					{
						if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_cross' )
						{
							if($(this).hasClass('rtwvsmlw_advance_blur_with_cross'))
							{
								$(this).removeClass('rtwvsmlw_single_page_after_effect');
							}
						}
						else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_cross' )
						{
							if($(this).hasClass('rtwvsmlw_advance_blur_without_cross'))
							{
								$(this).removeClass('rtwvsmlw_single_page_after_effect');
							}
						}
						else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hide' )
						{
							if($(this).hasClass('rtwvsmlw_advance_hide'))
							{
								$(this).removeClass('rtwvsmlw_single_page_after_effect');
							}
						}
					}
				}
			});

			rtwvsmlw_just_parent.children('li').each(function(){
				if($(this).find('.rtwvsmlw_single_page_after_effect').length)
				{
					rtwvsmlw_parent.find('.single_add_to_cart_button').prop('disabled', false);
				}else{
					rtwvsmlw_parent.find('.single_add_to_cart_button').attr('disabled', 'disabled');
				}
			});

			rtwvsmlw_parent.find('.rtwvsmlw_reset_variations').css('display', 'block');

		});

		$(document).on('click', '.rtwvsmlw_reset_variations', function(){
			$(this).css('display', 'none');
			var rtwvsmlw_just_parent = $(this).parents('.rtwvsmlw_attr_lists');
			var rtwvsmlw_parent = $(this).parents('.product');
			$(this).parents('.product').find('.reset_variations').trigger('click');
			$(this).parents('.product').find('.rtwvsmlw_single_page_after_effect').removeClass('rtwvsmlw_single_page_after_effect');

			rtwvsmlw_just_parent.children('li').each(function(){
				if($(this).find('.rtwvsmlw_single_page_after_effect').length)
				{
					rtwvsmlw_parent.find('.single_add_to_cart_button').prop('disabled', false);
				}else{
					rtwvsmlw_parent.find('.single_add_to_cart_button').attr('disabled', 'disabled');
				}
			})

			rtwvsmlw_parent.find('.rtwvsmlw_variation_on_shop').each(function(){
				
				if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_cross' )
				{
					if($(this).hasClass('rtwvsmlw_advance_blur_with_cross'))
					{
						$(this).removeClass('rtwvsmlw_advance_blur_with_cross');
					}
				}
				else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_cross' )
				{
					if($(this).hasClass('rtwvsmlw_advance_blur_without_cross'))
					{
						$(this).removeClass('rtwvsmlw_advance_blur_without_cross');
					}
				}
				else if( rtwvsmlw_parent.find('.rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hide' )
				{
					if($(this).hasClass('rtwvsmlw_advance_hide'))
					{
						$(this).removeClass('rtwvsmlw_advance_hide');
					}
				}
			});
			rtwvsmlw_parent.find( '.rtwvsmlw_variation_option_wrap').each(function(){
				
				if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_cross' )
				{
					if($(this).hasClass('rtwvsmlw_advance_blur_with_cross'))
					{
						$(this).removeClass('rtwvsmlw_advance_blur_with_cross');
					}
				}
				else if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_cross' )
				{
					if($(this).hasClass('rtwvsmlw_advance_blur_without_cross'))
					{
						$(this).removeClass('rtwvsmlw_advance_blur_without_cross');
					}
				}
				else if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hide' )
				{
					if($(this).hasClass('rtwvsmlw_advance_hide'))
					{
						$(this).removeClass('rtwvsmlw_advance_hide');
					}
				}
			});
		});

		var var_len = $(document).find('#rtwvsmlw_variations_wrapper').length;
		if(var_len != -1)
		{
			$(document).find('.rtwvsmlw_variation_option_wrap').each(function(){
				var rtwvsmlw_attr_type = $(this).children().attr('data-attr-type');
				var rtwvsmlw_parent = $(this).parents('div.summary');
				var attr_val = $(this).parents('div.summary').find('#'+rtwvsmlw_attr_type).val();
				$(document).find('.rtwvsmlw_variation_option_wrap').each(function(){
					if($(this).children().attr('data-attr-slug') == attr_val)
					{
						$(this).addClass('rtwvsmlw_single_page_after_effect');
					}
				})
				if($(document).find('.rtwvsmlw_single_page_after_effect').length != -1 && $(document).find('.rtwvsmlw_single_page_after_effect').length != 0)
				{
					rtwvsmlw_parent.find('.rtwvsmlw_reset_variations').css('display', 'block');
				}
			});
		}

		$(document).on('click','.rtwvsmlw_variation_option_wrap',function(){
			if($(this).parents('div.summary').length !=0 && $(this).parents('div.summary').length !=-1 )
			{
				var rtwvsmlw_parent = $(this).parents('div.summary');
			}
			else{
				var rtwvsmlw_parent = $(this).parents('div.product');
			}
			var rtwvsmlw_just_parent = $(this).parents('.rtwvsmlw_attr_lists');
			////////////////////////////////////////////////////////
			if( rtwvsmlw_display_border != '' && rtwvsmlw_display_border != 'undefined' && rtwvsmlw_display_border != undefined && rtwvsmlw_display_border == 'done' )
			{
				$(this).parent('.rtwvsmlw_variation_wrap').find('.rtwvsmlw_variation_option_wrap').removeClass('rtwvsmlw_single_page_after_effect');
				if(!$(this).hasClass('rtwvsmlw_advance_blur_without_cross') && !$(this).hasClass('rtwvsmlw_advance_blur_with_cross') )
				{
					$(this).addClass('rtwvsmlw_single_page_after_effect');
				}
			}
			else
			{
				$(this).parent('.rtwvsmlw_variation_wrap').find('.rtwvsmlw_variation_option_wrap').removeClass('rtwvsmlw_single_page_after_effect');
				$(this).addClass('rtwvsmlw_single_page_after_effect');
			}

			var rtwvsmlw_attr_type = $(this).children().attr('data-attr-type');
			var rtwvsmlw_attr_val = $(this).children().attr('data-attr-slug');
			$(document).find('#'+rtwvsmlw_attr_type).val(rtwvsmlw_attr_val);
			$(document).find('#'+rtwvsmlw_attr_type).trigger('change');

			if( $(document).find('#rtwvsmlw_clear_on_reselect').val() != '' && $(document).find('#rtwvsmlw_clear_on_reselect').val() == 'yes' )
			{
				$(this).addClass('rtwvsmlw_clear_on_reselect');
			}
			////////////////////////////////////////////////////////

			$(document).find('.rtwvsmlw_reset_variation').addClass('rtwvsmlw_reset_show');
			
			var rtwvsmlw_woo_avial_check_arrays = [];
			if( $(document).find('#rtwvsmlw_attr_all_taxonomies').val() != '' && $(document).find('#rtwvsmlw_attr_all_taxonomies').val() != 'undefined' && $(document).find('#rtwvsmlw_attr_all_taxonomies').val() != undefined )
			{
				var rtwvsmlw_attr_all_taxonomies = JSON.parse($(document).find('#rtwvsmlw_attr_all_taxonomies').val());

				////// for custom attribute //////
				if($(document).find('.variations select').length > rtwvsmlw_attr_all_taxonomies.length)
				{
					$(document).find('.variations select').each(function (){
						if(!rtwvsmlw_attr_all_taxonomies.includes($(this).attr('id')))
						{
							rtwvsmlw_attr_all_taxonomies.push($(this).attr('id'));
						}
					});
				}
				
				$.each(rtwvsmlw_attr_all_taxonomies,function(rtwvsmlw_attr_taxonomy_no,rtwvsmlw_attr_taxonomy_name){
					
					rtwvsmlw_parent.find('#'+rtwvsmlw_attr_taxonomy_name+  ' option').each(function(){
						var rtwvsmlw_woo_avial = $(this).val();
						var rtwvsmlw_woo_avial_check = rtwvsmlw_attr_taxonomy_name+'_'+rtwvsmlw_woo_avial;
						rtwvsmlw_woo_avial_check_arrays.push(rtwvsmlw_woo_avial_check);
					});
				});
				
				$.each(rtwvsmlw_attr_all_taxonomies,function(rtwvsmlw_attr_taxonomy_no,rtwvsmlw_attr_taxonomy_name){
					////// For Global Attribute ///////
					rtwvsmlw_parent.find('.rtwvsmlw_attr_available_slug_'+rtwvsmlw_attr_taxonomy_name).each(function(){
						var $rtwvsmlw_parent = $(this).parent();
						var rtwvsmlw_attr_available_slug = $(this).attr('data-attr-slug');
						var rtwvsmlw_attr_available_slug_taxonomy = rtwvsmlw_attr_taxonomy_name+'_'+rtwvsmlw_attr_available_slug;
						if( rtwvsmlw_woo_avial_check_arrays.indexOf(rtwvsmlw_attr_available_slug_taxonomy) > -1 )
						{
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
							$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');
						}
						else
						{
							if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_with_cross' )
							{
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
								$rtwvsmlw_parent.addClass('rtwvsmlw_advance_blur_with_cross');
							}
							else if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_blur_without_cross' )
							{
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_hide');
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');
								$rtwvsmlw_parent.addClass('rtwvsmlw_advance_blur_without_cross');
							}
							else if( $(document).find('#rtwvsmlw_advance_attribute_behaviour').val() == 'rtwvsmlw_advance_hide' )
							{
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_with_cross');
								$rtwvsmlw_parent.removeClass('rtwvsmlw_advance_blur_without_cross');
								$rtwvsmlw_parent.addClass('rtwvsmlw_advance_hide');
							}
						}
					})		
				})
			}

			rtwvsmlw_just_parent.children('li').each(function(){
				if($(this).find('.rtwvsmlw_single_page_after_effect').length)
				{
					rtwvsmlw_parent.find('.single_add_to_cart_button').prop('disabled', false);
				}else{
					rtwvsmlw_parent.find('.single_add_to_cart_button').attr('disabled', 'disabled');
				}
			})

			rtwvsmlw_parent.find('.rtwvsmlw_reset_variations').css('display', 'block');
		});
		

		$(document).on('click','.rtwvsmlw_reset_variation',function(e){
			e.preventDefault();
			$(document).find('.variations select').each(function(){
				$(this).val('');
			})
			$(this).removeClass('rtwvsmlw_reset_show');
		})

		$(document).on('click','.rtwvsmlw_click_attr_var',function(){
			
			if( $(document).find('.rtwvsmlw_advance_ajax_threshold').val() != '' && $(document).find('.rtwvsmlw_advance_ajax_threshold').val() != 'undefined' && $(document).find('.rtwvsmlw_advance_ajax_threshold').val() != undefined && $(document).find('.rtwvsmlw_advance_ajax_threshold').val() == 1 )
			{
				var rtwvsmlw_attr_ajax_val = 1
				var rtwvsmlw_ajax_variation_pages = {
					'action' : 'rtwvsmlw_ajax_variation_action',
					'rtwvsmlw_attr_ajax_val' : rtwvsmlw_attr_ajax_val,
					'rtwvsmlw_ajax_variation_nonce_verify' : rtwvsmlw_variation_public_ajax_obj.rtwvsmlw_variation_public_ajax_nonce,
				}
				jQuery.post( rtwvsmlw_variation_public_ajax_obj.rtwvsmlw_public_ajax_url, rtwvsmlw_ajax_variation_pages, function(response){
					
					if( response == 1 )
					{
						if(response == 1){
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                rtwvsmlw_variation_public_ajax_obj.rtwvsmlw_setting_saved, {
                                className: 'rtwvsmlw_setting_success',
                                position : 'right bottom',
                            }
                            );
						}
						else{
                            $.notify(
                                rtwvsmlw_variation_public_ajax_obj.rtwvsmlw_error,{
                                    className: 'rtwvsmlw_setting_error',
                                    position : 'right bottom',
                                }
                            );
                        }
					}
				},'json' )
			}
		})		
	})
})( jQuery );