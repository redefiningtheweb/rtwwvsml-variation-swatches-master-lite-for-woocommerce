<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       https://redefiningtheweb.com/
 * @since      1.0.0
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/public
 */

/**
 * The public-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 * 
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/public
 * @author     RedefiningTheWeb <developers@redefiningtheweb.com>
 */
class Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rtwvsmlw_plugin_name    The ID of this plugin.
	 */
	private $rtwvsmlw_plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rtwvsmlw_version    The current version of this plugin.
	 */
	private $rtwvsmlw_version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $rtwvsmlw_plugin_name       The name of this plugin.
	 * @param      string    $rtwvsmlw_version    The version of this plugin.
	 */
	public function __construct( $rtwvsmlw_plugin_name, $rtwvsmlw_version ) {

		$this->rtwvsmlw_plugin_name = $rtwvsmlw_plugin_name;
		$this->rtwvsmlw_version = $rtwvsmlw_version;

	}

	/**
	 * Register the stylesheets for the public area.
	 *
	 * @since    1.0.0
	 */
	public function rtwvsmlw_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the rtwvsmlw_run() function
		 * defined in Woocommerce_Variation_Swatches_Master_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Variation_Swatches_Master_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->rtwvsmlw_plugin_name, plugin_dir_url( __FILE__ ) . 'css/rtwvsmlw-variation-swatches-lite-for-woocommerce-public.css', array(), $this->rtwvsmlw_version, 'all' );

	}

	/**
	 * Register the JavaScript for the public area.
	 *
	 * @since    1.0.0
	 */
	public function rtwvsmlw_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the rtwvsmlw_run() function
		 * defined in Woocommerce_Variation_Swatches_Master_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Variation_Swatches_Master_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$rtwvsmlw_translation_array  = array(
			'rtwvsmlw_public_ajax_url'        => esc_url( admin_url( 'admin-ajax.php' ) ),
			'rtwvsmlw_variation_public_ajax_nonce'    => wp_create_nonce("rtwvsmlw-variation-master-public-nonce"),
			'rtwvsmlw_setting_saved'       => esc_html__( 'Setting Saved Successfully', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_error'  => esc_html__( 'Some error', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_upload_image'  => esc_html__( 'Upload Image', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_change_image'  => esc_html__( 'Change Image', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_select_image'  => esc_html__( 'Select Image', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_select'  => esc_html__( 'Select', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_choose_image'  => esc_html__( 'Choose an Image', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_clone'  => esc_html__( 'Clone', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_remove'  => esc_html__( 'Remove', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
		);

		wp_enqueue_script( $this->rtwvsmlw_plugin_name, plugin_dir_url( __FILE__ ) . 'js/rtwvsmlw-variation-swatches-lite-for-woocommerce-public.js', array( 'jquery' ), $this->rtwvsmlw_version, false );

		wp_localize_script(
			$this->rtwvsmlw_plugin_name,
			'rtwvsmlw_variation_public_ajax_obj', $rtwvsmlw_translation_array
		);

	}

	/**
	 * Function used to display variations on single product page 
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_variation_on_single_product ( )
	{
		global $product;
		global $post;
		$rtwvsmlw_post_author = $post->post_author;
		
		$rtwvsmlw_simple_variation_data = get_option('rtwwvsm_simple_variation_data_'.$rtwvsmlw_post_author, get_option('rtwwvsm_simple_variation_data', array()));
		$rtwvsmlw_advanced_variation_data = get_option('rtwwvsm_advanced_variation_data_'.$rtwvsmlw_post_author, get_option('rtwwvsm_advanced_variation_data', array()));

		if($product->is_type('variable') || $product->is_type('variation'))
		{
			$rtwvsmlw_product_attributes = $product->get_attributes();
		
			$rtwvsmlw_prod_avail_variations = $product->get_available_variations();
			
			if( isset($rtwvsmlw_simple_variation_data) && is_array($rtwvsmlw_simple_variation_data) && !empty($rtwvsmlw_simple_variation_data) )
			{
				if( isset($rtwvsmlw_simple_variation_data['rtwwvsm_simple_enable_swatches_for_single_page']) && ($rtwvsmlw_simple_variation_data['rtwwvsm_simple_enable_swatches_for_single_page'] == 1) )
				{
					?>
					<input type='hidden' id='rtwvsmlw_enable_variation_on_single' value='yes'>
					<?php
					if( isset($rtwvsmlw_simple_variation_data['rtwwvsm_simple_enable_tooltip']) && $rtwvsmlw_simple_variation_data['rtwwvsm_simple_enable_tooltip'] == 1 )
					{
						$rtwvsmlw_attr_tooltip_class = 'rtwvsmlw_tooltip_hover';
					}
					else
					{
						$rtwvsmlw_attr_tooltip_class = '';
					}

					if( isset($rtwvsmlw_simple_variation_data['rtwwvsm_simple_shape_style']) && $rtwvsmlw_simple_variation_data['rtwwvsm_simple_shape_style'] == 'rtwwvsm_simple_shape_rounded' )
					{
						$rtwvsmlw_attr_border_class = 'rtwvsmlw_fa_fa_border_circle';
						$rtwvsmlw_attr_img_border_class = 'rtwvsmlw_attr_img_border_class';
					}
					else if( isset($rtwvsmlw_simple_variation_data['rtwwvsm_simple_shape_style']) && $rtwvsmlw_simple_variation_data['rtwwvsm_simple_shape_style'] == 'rtwwvsm_simple_shape_square' )
					{
						$rtwvsmlw_attr_border_class = '';
						$rtwvsmlw_attr_img_border_class = '';
					}
					else
					{
						$rtwvsmlw_attr_border_class = '';
						$rtwvsmlw_attr_img_border_class = '';
					}
					if( isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_display_border']) && empty($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_display_border']) )
					{
						?>
							<input type='hidden' id='rtwvsmlw_display_border' value='yes' />
						<?php
					}
					if( isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_clear_on_reselect']) && ($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_clear_on_reselect'] == 1) )
					{
						?>
							<input type='hidden' id='rtwvsmlw_clear_on_reselect' value='yes' />
						<?php
					}
					if( isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_width']) && !empty($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_width']) )
					{
						?>
							<input type='hidden' id='rtwvsmlw_advance_variation_width' value='<?php echo esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_width']) ?>' >
						<?php
					}
					if( isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_height']) && !empty($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_height']) )
					{
						?>
							<input type='hidden' id='rtwvsmlw_advance_variation_height' value='<?php echo esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_height']) ?>' >
						<?php
					}
					if( isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_font-size']) && !empty($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_font-size']) )
					{
						?>
							<input type='hidden' id='rtwvsmlw_advance_font_size' value='<?php echo esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_font-size']) ?>' >
						<?php
					}
					if( isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour']) && !empty($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour']) )
					{
						?>
							<input type='hidden' id='rtwvsmlw_advance_attribute_behaviour' value='<?php echo esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour']) ?>' >
						<?php
					}
					if( isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_ajax_threshold']) && !empty($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_ajax_threshold']) )
					{
						?>
							<input type='hidden' class='rtwvsmlw_advance_ajax_threshold' value='<?php echo esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_ajax_threshold']) ?>' >
						<?php
					}
					else
					{
						?>
							<input type='hidden' class='rtwvsmlw_advance_ajax_threshold' value='<?php echo esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_ajax_threshold']) ?>' >
						<?php
					}
					
					?>
						<div class="rtwvsmlw_variations" id="rtwvsmlw_variations_wrapper">
        					<div class="mdc-card mdc-elevation--z9">
								<ul class="rtwvsmlw_attr_lists">
									<?php
									if( isset($rtwvsmlw_product_attributes) && is_array($rtwvsmlw_product_attributes) && !empty($rtwvsmlw_product_attributes) )
									{
										$name_array = array();
										foreach( $rtwvsmlw_product_attributes as $rtwvsmlw_attr_key => $rtwvsmlw_attr_val )
										{
											$parent_id = $rtwvsmlw_attr_val->get_id();

											$rtwvsmlw_parent_meta = get_term_meta($parent_id, 'rtwvsmlw_attr_meta');

											$parent_name = $rtwvsmlw_attr_val->get_name();
											
											if(!empty($rtwvsmlw_parent_meta))
											{
												if($rtwvsmlw_parent_meta[0]['enable'] == 0)
												{
													$name_array[] = $parent_name;
												}
											}
										}
										
										echo '<input type="hidden" class="rtwvsmlw_attribute_to_show" value="'.esc_attr(json_encode($name_array)).'">';

										foreach( $rtwvsmlw_product_attributes as $rtwvsmlw_attr_key => $rtwvsmlw_attr_val )
										{
											include RTWVSMLW_PUBLIC_DIR.'rtwvsmlw-attribute-display-on-single-product.php';
										}
									}
									if( isset( $rtwvsmlw_attr_all_taxonomies ) && is_array( $rtwvsmlw_attr_all_taxonomies ) )
									{
									?>
										<input type='hidden' id='rtwvsmlw_attr_all_taxonomies' value='<?php echo json_encode(array_unique($rtwvsmlw_attr_all_taxonomies)); ?>'>
									<?php
									}
									?>
								</ul>
								<span class="rtwvsmlw_reset_variations" href="javascript:void(0);"><i class="fas fa-sync-alt rtwvsmlw_clr_btn"></i><?php esc_html_e( 'Clear', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></span>
						</div>
					</div>
				<?php
				}
				else
				{
					?>
					<input type='hidden' id='rtwvsmlw_enable_variation_on_single' value='no'>
					<?php
				}
			}
		}
	}

	/**
	 * Function to load products via ajax
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_ajax_variation_cb()
	{
		if(check_ajax_referer('rtwvsmlw-variation-master-public-nonce','rtwvsmlw_ajax_variation_nonce_verify'))
		{
			echo json_encode(1);
		}
	}
	
	/**
	 * Function used to save all pages fields and update to db
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_save_field_pages_cb()
	{
		if( check_ajax_referer('rtwvsmlw-variation-master-nonce','rtwvsmlw_save_field_pages_nonce_verify') )
		{
			if( isset($_POST['rtwvsmlw_variation_active_page_name']) && !empty($_POST['rtwvsmlw_variation_active_page_name']) )
			{
				if( isset($_POST['rtwvsmlw_variation_pages_data_vals']) && is_array($_POST['rtwvsmlw_variation_pages_data_vals']) )
				{
					$rtwvsmlw_val_array = array();
					foreach($_POST['rtwvsmlw_variation_pages_data_vals'] as $key => &$rtwvsmlw_value)
					{
						if( isset($rtwvsmlw_value) )
						{
							$rtwvsmlw_value = sanitize_text_field($rtwvsmlw_value);
							$rtwvsmlw_value = stripslashes($rtwvsmlw_value);
							$rtwvsmlw_val_array[sanitize_text_field($key)] = sanitize_text_field($rtwvsmlw_value);
						}
					}
					update_option(sanitize_text_field($_POST['rtwvsmlw_variation_active_page_name']).'_variation_data_'.get_current_user_id(),$rtwvsmlw_val_array);
				}
				echo json_encode(1);
				wp_die();
			}
		}else{
			wp_die();
		}
	}
	
}