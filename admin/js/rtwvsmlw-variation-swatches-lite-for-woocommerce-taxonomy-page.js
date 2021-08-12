(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing & taxonomy page of woocommerce JavaScript source
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
		
        $(document).find('#rtwvsmlw_color_option').wpColorPicker();
		
        $(document).find('#rtwvsmlw_color_option_term').wpColorPicker();

		var $i = 1;
		$(document).find('#rtwvsmlw_color_table tr').each( function() {
			$(document).find('#rtwvsmlw_color_option'+$i).wpColorPicker();
			$i = $i+1;
		});

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
			$(document).find('.rtwvsmlw_add_term_image').text(rtwvsmlw_global_params.rtwvsmlw_upload_image);
		})
		
		$(document).on('click','#submit',function(){

			$(document).find('#rtwvsmlw_upload_term_img_id').val('');
			$(document).find('#rtwvsmlw_upload_term_img_text').src('');

		})
        
	})

})( jQuery );

// jQuery( document ).ready( function( $ ) {
// 	var rtwvsmlw_file_frame,rtwvsmlw_wp_media_post_id;
// 	var rtwvsmlw_set_to_post_id = wp.media.model.settings.post.id;
// 	jQuery('#rtwvsmlw_upload_term_img').on('click', function( event ){
// 		event.preventDefault();
// 		if ( rtwvsmlw_file_frame ) {
// 			rtwvsmlw_file_frame.uploader.uploader.param( 'post_id', rtwvsmlw_set_to_post_id );
// 			rtwvsmlw_file_frame.open();
// 			return;
// 		} else {
// 			wp.media.model.settings.post.id = rtwvsmlw_set_to_post_id;
// 		}
// 		rtwvsmlw_file_frame = wp.media.frames.rtwvsmlw_file_frame = wp.media({
// 			title: rtwvsmlw_global_params.rtwvsmlw_select_image,
// 			button: {
// 				text: rtwvsmlw_global_params.rtwvsmlw_choose_image,
// 			},
// 			multiple: false
// 		});
// 		rtwvsmlw_file_frame.on('select', function() {
// 			attachment = rtwvsmlw_file_frame.state().get('selection').first().toJSON();
// 			$(document).find( '#rtwvsmlw_upload_term_img_text' ).attr( 'src', attachment.url );
// 			$(document).find('.rtwvsmlw_remove_term_image').show();
// 			$(document).find('.rtwvsmlw_add_term_image').text(rtwvsmlw_global_params.rtwvsmlw_change_image);
// 			$(document).find( '#rtwvsmlw_upload_term_img_id' ).val( attachment.id );
// 			wp.media.model.settings.post.id = rtwvsmlw_wp_media_post_id;
// 		});
// 			rtwvsmlw_file_frame.open();
// 	});
// 	jQuery( 'a.add_media' ).on( 'click', function() {
// 		wp.media.model.settings.post.id = rtwvsmlw_wp_media_post_id;
// 	});
// });
    