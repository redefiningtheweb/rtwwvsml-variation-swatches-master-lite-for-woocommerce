(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
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
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $(document).ready(function(){
		 
		$(document).find('.rtwvsmlw_color_picker').wpColorPicker();

		$(document).on('click', '.rtwvsmlw_close_btn', function(){
			$(this).parents('div.rtwvsmlw_dropdown_card_content').find('.rtwvsmlw_img_fluid').attr('src', '');
			$(this).find('.rtwvsmlw_img_attachment_id').val('');
		})

		if( window.location.href != '' )
		{
			var rtwvsmlw_curr_url = window.location.href;

			if(rtwvsmlw_curr_url.indexOf('#/rtwwvsm') != -1)
			{
				var rtwvsmlw_curr_url_split = rtwvsmlw_curr_url.split('#/')
				
				if( rtwvsmlw_curr_url_split[1] != '' )
				{
					$(document).find('.rtwvsmlw_admin_tab').removeClass('rtwvsmlw-tab-active');
					$(document).find('.'+rtwvsmlw_curr_url_split[1]+'_active').addClass('rtwvsmlw-tab-active');
					$(document).find('.rtwvsmlw_settings_tabs').hide();
					$(document).find('.'+rtwvsmlw_curr_url_split[1]+'_page_show').show();
				}
			}
			else
			{
				$(document).find('.rtwvsmlw_simple_active').addClass('rtwvsmlw-tab-active');
				$(document).find('.rtwvsmlw_settings_tabs').hide();
				$(document).find('.rtwvsmlw_simple_page_show').show();
			}
		}

		if( $(document).find('#rtwvsmlw_upload_term_img_text').attr('src') == '' )
		{
			$(document).find('.rtwvsmlw_remove_term_image').hide();
		}
		else
		{
			$(document).find('.rtwvsmlw_remove_term_image').show();
		}
		$(document).on('click','.rtwvsmlw_remove_term_image',function(e){

			e.preventDefault();
			$(document).find( '#rtwvsmlw_upload_term_img_text' ).attr( 'src', '' );
			$(document).find( '#rtwvsmlw_upload_term_img_id' ).val( '' );
			$(document).find('.rtwvsmlw_remove_term_image').hide();
			$(document).find('.rtwvsmlw_add_term_image').text(rtwvsmlw_global_params.rtwvsmlw_error);
		})

		$(document).on('click','.rtwvsmlw_admin_tab',function(){

			$(document).find('.rtwvsmlw_admin_tab').removeClass('rtwvsmlw-tab-active');
			$(this).addClass('rtwvsmlw-tab-active');
			$(document).find('.rtwvsmlw_settings_tabs').hide();
			$(document).find('.'+$(this).attr('data-value')+'_page_show').show();
		})

		$(document).on('click','.rtwvsmlw_submit_setting_form',function(e){

			if( window.location.href != '' )
			{
				var rtwvsmlw_curr_variation_url = window.location.href;

				if(rtwvsmlw_curr_variation_url.indexOf('#/rtwwvsm') != -1)
				{
					var rtwvsmlw_curr_variation_url_split = rtwvsmlw_curr_variation_url.split('#/')
					if( rtwvsmlw_curr_variation_url_split[1] != '' )
					{
						var rtwvsmlw_variation_active_page_class = rtwvsmlw_curr_variation_url_split[1];
					}
				}
				else
				{
					var rtwvsmlw_variation_active_page_class = 'rtwwvsm_simple';
				}
			}
			e.preventDefault();
			var rtwvsmlw_variation_pages_data_array = {}
			
			$(document).find('.'+rtwvsmlw_variation_active_page_class+'_page_data').each(function(){

				if($(this).is("input"))
				{
					if(($(this).attr('type') == 'text' ) || ($(this).attr('type') == 'number'))
					{
						rtwvsmlw_variation_pages_data_array[$(this).attr('id')] = $(this).val();
					}
					if($(this).attr('type') == 'hidden' )
					{
						rtwvsmlw_variation_pages_data_array[$(this).attr('id')] = $(this).val();
					}
					else if($(this).attr('type') == 'radio' )
					{
						if($(this).is(':checked'))
						{
							rtwvsmlw_variation_pages_data_array[$(this).attr('name')] = $(this).attr('id');
						}
					}
					else if($(this).attr('type') == 'checkbox' )
					{
						if($(this).is(':checked'))
						{
							rtwvsmlw_variation_pages_data_array[$(this).attr('id')] = 1;
						}
						else
						{
							rtwvsmlw_variation_pages_data_array[$(this).attr('id')] = 0;
						}
					}
				}
				else if($(this).is("select"))
				{
					rtwvsmlw_variation_pages_data_array[$(this).attr('id')] = $(this).val();
				}
			})
			if(rtwvsmlw_variation_active_page_class != 'rtwwvsm_shop_page')
			{
				var rtwvsmlw_save_field_pages = {
					'action' : 'rtwvsmlw_save_field_pages_action',
					'rtwvsmlw_variation_pages_data_vals' : rtwvsmlw_variation_pages_data_array,
					'rtwvsmlw_variation_active_page_name' : rtwvsmlw_variation_active_page_class,
					'rtwvsmlw_save_field_pages_nonce_verify' : rtwvsmlw_global_params.rtwvsmlw_variation_ajax_nonce,
				}
				jQuery.post( rtwvsmlw_global_params.rtwvsmlw_ajax_url, rtwvsmlw_save_field_pages, function(response){
					
					if( response == 1 )
					{
						if(response == 1){
							$('.notifyjs-wrapper').remove();
							$.notify(
								rtwvsmlw_global_params.rtwvsmlw_setting_saved, {
								className: 'rtwvsmlw_setting_success',
								position : 'right bottom',
							}
							);
						}
						else{
							$.notify(
								rtwvsmlw_global_params.rtwvsmlw_error,{
									className: 'rtwvsmlw_setting_error',
									position : 'right bottom',
								}
							);
						}
					}
				},'json' )
			}
		})

		$(document).find('.edit a').addClass('rtwvsmlw_current_attr_href');
		$(document).find('.delete').addClass('rtwvsmlw_current_attr_href');
		$(document).find('.attribute-terms a').addClass('rtwvsmlw_current_attr_href');
		$(document).find('.column-posts a').addClass('rtwvsmlw_current_attr_prevent');	

		$(document).on('click','.rtwvsmlw_current_attr_prevent',function(e){

			e.preventDefault();
		})

		$(document).on('click','.rtwvsmlw_current_attr_href',function(e){

			e.preventDefault();
			var rtwvsmlw_curr_attr_href = $(this).attr('href');
			rtwvsmlw_attr_add_href(rtwvsmlw_curr_attr_href);
		})
		$(document).on('click','.edit a',function(e){

			e.preventDefault();
			var rtwvsmlw_curr_attr_href = $(this).attr('href');
			rtwvsmlw_attr_add_href(rtwvsmlw_curr_attr_href);
		})

		$(document).on('click','#message a',function(e){

			e.preventDefault();
			var rtwvsmlw_curr_attr_href = $(this).attr('href');
			rtwvsmlw_attr_add_href(rtwvsmlw_curr_attr_href);
		})

		$(document).on('click','#submit',function(){

			$(document).find('#rtwvsmlw_upload_term_img_id').val('');
			$(document).find('#rtwvsmlw_upload_term_img_text').src('');
			$(document).find('.edit a').addClass('rtwvsmlw_current_attr_href');

		})

		$(document).on('click','.rtwvsmlw_attributes_active',function(){

			rtwvsmlw_attr_add_href('initial');
		})

		$(document).on('click','.rtwvsmlw_admin_tab',function(){

			if($(this).attr('data-value') != 'rtwvsmlw_attributes' )
			{
				rtwvsmlw_attr_add_href('destroy');
			}
		})

		var rtwvsmlw_pre_form_action = $(document).find('#submit').parents('form').attr('action');

		var rtwvsmlw_after_form_action = rtwvsmlw_pre_form_action + '&rtwvsmlw_variation_swatches=rtwvsmlw_yes';

		$(document).find('#submit').parents('form').attr('action',rtwvsmlw_after_form_action);

	})

})( jQuery );

function rtwvsmlw_attr_add_href(rtwvsmlw_curr_attr_href)
{
	var rtwvsmlw_redirect_attr_url = {
		'action' : 'rtwvsmlw_redirect_attr_url_action',
		'rtwvsmlw_curr_attr_href' : rtwvsmlw_curr_attr_href,
		'rtwvsmlw_variation_attr_nonce_verify' : rtwvsmlw_global_params.rtwvsmlw_variation_ajax_nonce,
	}
	jQuery.post( rtwvsmlw_global_params.rtwvsmlw_ajax_url, rtwvsmlw_redirect_attr_url, function(response){
		
		if( response != '' )
		{
			if( (response['rtwvsmlw_initial'] != '') && (response['rtwvsmlw_initial'] == 'initial' ))
			{
				jQuery(document).find('#rtwvsmlw_attribute_iframe_url').attr('src',response['rtwvsmlw_redirect_url']);
				location.reload();
			}
			else
			{
				window.location.href = response;
			}
		}
	},'json' )
}

jQuery( document ).ready( function( $ ) {
	var rtwvsmlw_file_frame,rtwvsmlw_wp_media_post_id;
	var rtwvsmlw_set_to_post_id = wp.media.model.settings.post.id;
	jQuery('#rtwvsmlw_upload_term_img').on('click', function( event ){
		event.preventDefault();
		if ( rtwvsmlw_file_frame ) {
			rtwvsmlw_file_frame.uploader.uploader.param( 'post_id', rtwvsmlw_set_to_post_id );
			rtwvsmlw_file_frame.open();
			return;
		} else {
			wp.media.model.settings.post.id = rtwvsmlw_set_to_post_id;
		}
		rtwvsmlw_file_frame = wp.media.frames.rtwvsmlw_file_frame = wp.media({
			title: rtwvsmlw_global_params.select_image,
			button: {
				text: rtwvsmlw_global_params.choose_image,
			},
			multiple: false
		});
		rtwvsmlw_file_frame.on('select', function() {
			attachment = rtwvsmlw_file_frame.state().get('selection').first().toJSON();
			$(document).find( '#rtwvsmlw_upload_term_img_text' ).attr( 'src', attachment.url );
			$(document).find('.rtwvsmlw_remove_term_image').show();
			$(document).find('.rtwvsmlw_add_term_image').text(rtwvsmlw_global_params.choose_image);
			$(document).find( '#rtwvsmlw_upload_term_img_id' ).val( attachment.id );
			wp.media.model.settings.post.id = rtwvsmlw_wp_media_post_id;
		});
			rtwvsmlw_file_frame.open();
	});
	jQuery( 'a.add_media' ).on( 'click', function() {
		wp.media.model.settings.post.id = rtwvsmlw_wp_media_post_id;
	});
});
