<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://redefiningtheweb.com/
 * @since      1.0.0
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/admin
 * @author     RedefiningTheWeb <developers@redefiningtheweb.com>
 */
class Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Admin {

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
	 * Register the stylesheets for the admin area.
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
		$rtwvsmlw_current_screen = get_current_screen();

		if( isset($_GET['taxonomy']) )
		{
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'rtwvsmlw-wc-taxonomy-css', plugin_dir_url( __FILE__ ) . 'css/rtwvsmlw-variation-admin-woocommerce-taxoonomy.css', array(), $this->rtwvsmlw_version, 'all' );
		}
		if ($rtwvsmlw_current_screen->id == "toplevel_page_rtwvsmlw_variations") 
		{
			wp_enqueue_style( $this->rtwvsmlw_plugin_name, plugin_dir_url( __FILE__ ) . 'css/rtwvsmlw-variation-swatches-lite-for-woocommerce-admin.css', array(), $this->rtwvsmlw_version, 'all' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'rtwvsmlw-admin-dashboard', plugin_dir_url( __FILE__ ) . 'css/rtwvsmlw-variation-admin-dashboard.css', array(), $this->rtwvsmlw_version, 'all' );

			wp_enqueue_style( 'bundlecss', plugin_dir_url( __FILE__ ) . 'css/bundle.css', array(), $this->rtwvsmlw_version, 'all' );

			wp_enqueue_style( 'material-icon', "https://fonts.googleapis.com/icon?family=Material+Icons", array(), $this->rtwvsmlw_version, 'all' );
			wp_enqueue_style( 'material-css', "https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css", array(), $this->rtwvsmlw_version, 'all' );

			wp_enqueue_style( "select2", plugins_url( 'woocommerce/assets/css/select2.css' ), array(), $this->rtwvsmlw_version, 'all' );

		}

		if( isset($_GET['rtwvsmlw_variation_swatches']) && ($_GET['rtwvsmlw_variation_swatches'] == 'rtwvsmlw_yes' ))
		{
			if( isset( $_GET['rtwvsmlw_variation_swatches'] ) && !empty( $_GET['rtwvsmlw_variation_swatches'] ) )
			{
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_style( $this->rtwvsmlw_plugin_name, plugin_dir_url( __FILE__ ) . 'css/rtwvsmlw-variation-swatches-lite-for-woocommerce-admin.css', array(), $this->rtwvsmlw_version, 'all' );
			}
		}

	}

	/**
	 * Register the JavaScript for the admin area.
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
		$rtwvsmlw_current_screen = get_current_screen();

		$rtwvsmlw_translation_array  = array(
			'rtwvsmlw_ajax_url'        => esc_url( admin_url( 'admin-ajax.php' ) ),
			'rtwvsmlw_variation_ajax_nonce'    => wp_create_nonce("rtwvsmlw-variation-master-nonce"),
			'rtwvsmlw_setting_saved'       => esc_html__( 'Setting Saved Successfully', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_error'  => esc_html__( 'Some error', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_upload_image'  => esc_html__( 'Upload Image', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_change_image'  => esc_html__( 'Change Image', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_select_image'  => esc_html__( 'Select Image', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_select'  => esc_html__( 'Select', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_choose_image'  => esc_html__( 'Choose an Image', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_clone'  => esc_html__( 'Clone', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_remove'  => esc_html__( 'Remove', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_update'  => esc_html__( 'Update', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
			'rtwvsmlw_delete'  => esc_html__( 'Deleted', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ),
		);

		if( isset($_GET['taxonomy']) )
		{
			wp_enqueue_script( 'rtwvsmlw-swatches-master-taxonomy-page-js', plugin_dir_url( __FILE__ ) . 'js/rtwvsmlw-variation-swatches-lite-for-woocommerce-taxonomy-page.js', array( 'jquery' ), $this->rtwvsmlw_version, false );
			
			wp_localize_script(
				'rtwvsmlw-swatches-master-taxonomy-page-js',
				'rtwvsmlw_global_params',
				$rtwvsmlw_translation_array
			);

			wp_enqueue_script( 'wp-color-picker');
			wp_enqueue_media();
		}
		
		if ($rtwvsmlw_current_screen->id == "toplevel_page_rtwvsmlw_variations") 
		{
			wp_enqueue_script( $this->rtwvsmlw_plugin_name, plugin_dir_url( __FILE__ ) . 'js/rtwvsmlw-variation-swatches-lite-for-woocommerce-admin.js', array( 'jquery' ), $this->rtwvsmlw_version, false );
			wp_enqueue_script( 'rtwvsmlw-swatches-master-notify-js', plugin_dir_url( __FILE__ ) . 'js/rtwvsmlw-variations-notify.min.js', array( 'jquery' ), $this->rtwvsmlw_version, false );
			wp_enqueue_script( 'wp-color-picker');
			wp_enqueue_media();

			wp_localize_script(
				$this->rtwvsmlw_plugin_name,
				'rtwvsmlw_global_params',
				$rtwvsmlw_translation_array
			);

			///////////////////For Material Design///////////////////////////
			wp_enqueue_script( 'bundle', plugin_dir_url( __FILE__ ) . 'js/bundle.js', array( 'jquery' ), $this->rtwvsmlw_version, true );
			
			wp_enqueue_script( 'rtwvsmlw-additional', plugin_dir_url( __FILE__ ) . 'js/rtwvsmlw-additional.js', array( 'jquery' ), $this->rtwvsmlw_version, false );

			wp_enqueue_script( "select2", plugins_url( 'woocommerce/assets/js/select2/select2.full.min.js' ), array( 'jquery' ), $this->rtwvsmlw_version, false );
			///////////////////For Material Design///////////////////////////

        	wp_enqueue_media();
		}


		if( isset($_GET['rtwvsmlw_variation_swatches']) && ($_GET['rtwvsmlw_variation_swatches'] == 'rtwvsmlw_yes' ))
		{
			if( isset( $_GET['rtwvsmlw_variation_swatches'] ) && !empty( $_GET['rtwvsmlw_variation_swatches'] ) )
			{

				wp_enqueue_script( 'wp-color-picker');
				wp_enqueue_media();
				wp_enqueue_script( $this->rtwvsmlw_plugin_name, plugin_dir_url( __FILE__ ) . 'js/rtwvsmlw-variation-swatches-lite-for-woocommerce-admin.js', array( 'jquery' ), $this->rtwvsmlw_version, false );
				wp_localize_script(
					$this->rtwvsmlw_plugin_name,
					'rtwvsmlw_global_params',
					array('rtwvsmlw_ajax_url' => admin_url('admin-ajax.php'), 'rtwvsmlw_variation_ajax_nonce' => wp_create_nonce("rtwvsmlw-variation-master-nonce"))
				);
			}
		}
	}

	/**
	 * Funciton to add admin menus
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_add_admin_menu()
	{
		add_menu_page( esc_html__('Variation Swatches Master Lite','rtwvsmlw-variation-swatches-lite-for-woocommerce'), esc_html__('Variation Swatches Master Lite','rtwvsmlw-variation-swatches-lite-for-woocommerce'), 'manage_options','rtwvsmlw_variations', array( $this, 'rtwvsmlw_admin_display_page'), RTWVSMLW_URL.'admin/images/swatches-logo.png');
	}

	/**
	 * Admin menus callback function
	 *
	 * @since    1.0.0
	 */
	public function rtwvsmlw_admin_display_page()
	{
		include_once(RTWVSMLW_DIR.'admin/partials/rtwvsmlw-variation-swatches-lite-for-woocommerce-admin-display.php');
	}

	/**
	 * Function to create extra field for attributes
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_product_attributes_type_selector($rtwvsmlw_cutom_attr)
	{
		foreach ( $this->rtwvsmlw_available_attributes_types() as $rtwvsmlw_attr_key => $rtwvsmlw_attr_options ) {
			$rtwvsmlw_cutom_attr[ $rtwvsmlw_attr_key ] = $rtwvsmlw_attr_options[ 'title' ];
		}
		
		return $rtwvsmlw_cutom_attr;
	}

	/**
	 * Function to get available attributes type
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_available_attributes_types() {

		$rtwvsmlw_attr_types = array();

		$rtwvsmlw_attr_types[ 'color' ] = array(
			'title'   => esc_html__( 'Color', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' )
		);

		$rtwvsmlw_attr_types[ 'image' ] = array(
			'title'   => esc_html__( 'Image (Pro feature)', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' )
		);

		$rtwvsmlw_attr_types[ 'radio' ] = array(
			'title'   => esc_html__( 'Radio', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' )
		);

		$rtwvsmlw_attr_types[ 'button' ] = array(
			'title'   => esc_html__( 'Button', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' )
		);

		if( isset($rtwvsmlw_attr_types) && is_array($rtwvsmlw_attr_types) )
		{
			return $rtwvsmlw_attr_types;
		}
	}

	/**
	 * Function to add extra field for attributes
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_add_attr_terms_field()
	{
		if( isset($_GET['taxonomy']) ) 
		{
			$rtwvsmlw_current_attr_taxonomy = sanitize_text_field($_GET['taxonomy']);
		}
		if( isset($rtwvsmlw_current_attr_taxonomy) )
		{
			$rtwvsmlw_attr_key_type = $this->rtwvsmlw_get_taxonomy_type_by_slug($rtwvsmlw_current_attr_taxonomy);

			if( isset($rtwvsmlw_attr_key_type) )
			{
				$this->rtwvsmlw_add_meta_for_attr_terms($rtwvsmlw_attr_key_type);
			}
		}
	}

	/**
	 * Function to get attribute_type form db by using taxonomy attribute slug
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_get_taxonomy_type_by_slug($rtwvsmlw_current_attr_taxonomy)
	{
		if (strpos($rtwvsmlw_current_attr_taxonomy, 'pa_') !== false) 
		{
			global $wpdb;

			$rtwvsmlw_current_attr_taxonomy = str_replace('pa_','',$rtwvsmlw_current_attr_taxonomy);

			$rtwvsmlw_attr_key_query = "SELECT attribute_type FROM ".$wpdb->prefix."woocommerce_attribute_taxonomies WHERE attribute_name = %s";
			if( isset($rtwvsmlw_attr_key_query) )
			{
				$rtwvsmlw_attr_key_type = $wpdb->get_var($wpdb->prepare($rtwvsmlw_attr_key_query,$rtwvsmlw_current_attr_taxonomy));
			}
			if( isset($rtwvsmlw_attr_key_type) && !empty($rtwvsmlw_attr_key_type) )
			{
				return $rtwvsmlw_attr_key_type;
			}
		}
	}

	/**
	 * Function to add these extra fields on conditions
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_add_meta_for_attr_terms($rtwvsmlw_attr_key_type)
	{
		?>
			<div class="form-field">
				<?php
					if( $rtwvsmlw_attr_key_type == 'color' )
					{
						?>
						<div class="rtwvsmlw_color_option">
							<label><?php esc_html_e('Select Color : ','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
							<input type="text" id="rtwvsmlw_color_option_term" name="rtwvsmlw_color_name">
							<p><?php esc_html_e('Choose color for the term (which will appeare on shop page for this term)','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
						</div>
						<?php
					}
					else
					{
						?>
						<div class="rtwvsmlw_text_option">
							<label><?php esc_html_e('Display Text : ','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
							<input type="text" id="rtwvsmlw_text_option_term" name="rtwvsmlw_text_name">
							<p><?php esc_html_e('Enter text to display on the place of name(eg. you can enter S,M,L at the namee of Small, Medium, Large), you can also enter text for buttons','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
						</div>
						<?php
					}
				?>
			</div>
		<?php
	}
	
	/**
	 * Function to add attributes fields
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_woocommerce_after_add_attribute_fields( )
	{
		?>
		<div class="rtwvsmlw-variation_setting_wrap">
            <div class="form-field">
                <h2> <?php esc_html_e( 'Variation Swatches settings', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></h2>
            </div>
			<div class="form-field">
				<label for="rtwvsmlw_attribute_loop_enable">
					<input name="rtwvsmlw_attribute_loop_enable" id="rtwvsmlw_attribute_loop_enable"
							type="checkbox"
							value="1"/> <?php esc_html_e( 'Show in product list', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
				</label>
				<p class="description"><?php esc_html_e( 'Enable this if you want this attribute to show in product list.', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></p>
			</div>
            <div class="form-field">
                <label for="rtwvsmlw_attribute_display_type">
					<?php esc_html_e( 'Display style', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                </label>
                <select name="rtwvsmlw_attribute_display_type" id="rtwvsmlw_attribute_display_type">
                    <option value="vertical">
						<?php esc_html_e( 'Vertical', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                    </option>
                    <option value="horizontal">
						<?php esc_html_e( 'Horizontal', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                    </option>
                </select>
            </div>
            <div class="form-field">
                <label for="rtwvsmlw_attribute_profile">
					<?php esc_html_e( 'Design profile', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                </label>
                <select name="rtwvsmlw_attribute_profile" id="rtwvsmlw_attribute_profile">
                       <option value="button" ><?php esc_html_e( 'Button Design', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></option>
						<option value="color" ><?php esc_html_e( 'Color Design', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></option>
						<option value="image" ><?php esc_html_e( 'Image Design', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></option>
				</select>
            </div>
        </div>
		<?php
	}

	/**
	 * Function to edit attributes fields values
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_woocommerce_after_edit_attribute_fields($a)
	{
		global $wpdb;
		$attribute_id             = isset( $_GET['edit'] ) ? absint( sanitize_text_field( $_GET['edit'] ) ) : 0;
		$attribute           =$wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."woocommerce_attribute_taxonomies WHERE attribute_id=%d", $attribute_id ), ARRAY_A );

		$rtwvsmlw_attr_meta = get_term_meta( sanitize_text_field($_GET['edit']), 'rtwvsmlw_attr_meta' );
		$rtwvsmlw_attr_meta = isset($rtwvsmlw_attr_meta[0])? $rtwvsmlw_attr_meta[0] : array();
		$term_meta = get_term_meta( sanitize_text_field($_GET['edit']), 'rtwvsmlw_attr_meta' );

		?>
        <tr class="form-field form-required rtwvsmlw-variation_setting_wrap">
            <th scope="row" valign="top" colspan="2">
                <label>
					<?php esc_html_e( 'Variation Swatches settings', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                </label>
            </th>
        </tr>
        <tr class="form-field form-required rtwvsmlw-variation_setting_wrap">
            <th scope="row" valign="top">
                <label for="rtwvsmlw_attribute_loop_enable">
			        <?php esc_html_e( 'Show in product list', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                </label>
            </th>
            <td>
                <label for="rtwvsmlw_attribute_loop_enable">
                    <input name="rtwvsmlw_attribute_loop_enable" id="rtwvsmlw_attribute_loop_enable"
                           type="checkbox"
                           value="1" <?php checked( isset( $rtwvsmlw_attr_meta['enable'] ) ? $rtwvsmlw_attr_meta['enable'] : '', 1 ); ?> />
                </label>

                <p class="description"><?php esc_html_e( 'Enable this if you want this attribute to show in product list.', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></p>
            </td>
        </tr>
        <tr class="form-field form-required rtwvsmlw-variation_setting_wrap">
            <th scope="row">
                <label for="rtwvsmlw_attribute_display_type">
					<?php esc_html_e( 'Display style', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                </label>
            </th>
            <td>
                <select name="rtwvsmlw_attribute_display_type" id="rtwvsmlw_attribute_display_type">
                    <option <?php selected(isset($rtwvsmlw_attr_meta['display_type'])?$rtwvsmlw_attr_meta['display_type'] : '' , 'vertical'); ?> value="vertical">
						<?php esc_html_e( 'Vertical', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                    </option>
                    <option <?php selected(isset($rtwvsmlw_attr_meta['display_type']) ?$rtwvsmlw_attr_meta['display_type'] : '' , 'horizontal'); ?> value="horizontal"  >
						<?php esc_html_e( 'Horizontal', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                    </option>
                </select>
            </td>
        </tr>
        <tr class="form-field form-required rtwvsmlw-variation_setting_wrap">
            <th scope="row" valign="top">
                <label for="rtwvsmlw_attribute_profile">
					<?php esc_html_e( 'Design profile', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
                </label>
            </th>
            <td>
                <select name="rtwvsmlw_attribute_profile" id="rtwvsmlw_attribute_profile">
					<option <?php selected(isset($rtwvsmlw_attr_meta['attr_profile'])? $rtwvsmlw_attr_meta['attr_profile'] : '', 'button'); ?> value="button" ><?php esc_html_e( 'Button Design', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></option>
					<option <?php selected(isset($rtwvsmlw_attr_meta['attr_profile'])?$rtwvsmlw_attr_meta['attr_profile']:'' , 'color'); ?> value="color" ><?php esc_html_e( 'Color Design', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></option>
					<option <?php selected(isset($rtwvsmlw_attr_meta['attr_profile'])?$rtwvsmlw_attr_meta['attr_profile']:'' , 'image'); ?> value="image" ><?php esc_html_e( 'Image Design', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?></option>
                </select>
            </td>
        </tr>
		<?php
	}

	/**
	 * Function to save attributes fields values
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_woocommerce_attribute_added( $id, $data )
	{
		if(!empty($_POST))
		{
			$enable = isset($_POST['rtwvsmlw_attribute_loop_enable']) ? sanitize_text_field($_POST['rtwvsmlw_attribute_loop_enable']) : '';
			$display_type = isset($_POST['rtwvsmlw_attribute_display_type']) ? sanitize_text_field($_POST['rtwvsmlw_attribute_display_type']):'';
			$attr_profile = isset($_POST['rtwvsmlw_attribute_profile']) ? sanitize_text_field($_POST['rtwvsmlw_attribute_profile']) : ''; 
			$array = array('enable' => $enable,
							'display_type' => $display_type,
							'attr_profile' => $attr_profile);
			update_term_meta( $id, 'rtwvsmlw_attr_meta', $array );
		}
	}

	/**
	 * Function to update attributes fields values
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_woocommerce_attribute_updated( $id, $data, $old_slug )
	{
		if(!empty($_POST))
		{
			$enable = isset($_POST['rtwvsmlw_attribute_loop_enable']) ? sanitize_text_field($_POST['rtwvsmlw_attribute_loop_enable']) : '';
			$display_type = isset($_POST['rtwvsmlw_attribute_display_type']) ? sanitize_text_field($_POST['rtwvsmlw_attribute_display_type']):'';
			$attr_profile = isset($_POST['rtwvsmlw_attribute_profile']) ? sanitize_text_field($_POST['rtwvsmlw_attribute_profile']) : ''; 
			$array = array('enable' => $enable,
							'display_type' => $display_type,
							'attr_profile' => $attr_profile);
			update_term_meta($id, 'rtwvsmlw_attr_meta', ($array) );
		}
	}

	/**
	 * Function to used to save terms
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_attribute_terms_save( $rtwvsmlw_term_id, $tt_id, $taxonomy )
	{
		$rtwvsmlw_term_meta = get_term_meta( $rtwvsmlw_term_id, 'order_'. sanitize_text_field($_POST['taxonomy']) );

		if( isset( $_POST['rtwvsmlw_color_name'] ) )
		{
			$attachment = isset($rtwvsmlw_term_meta['attachment']) ? $rtwvsmlw_term_meta['attachment'] : '';
			$text = isset($rtwvsmlw_term_meta['text']) ? $rtwvsmlw_term_meta['text'] : '';

			$rtwvsmlw_colorss = array();
			if(!empty($_POST['rtwvsmlw_color_name']))
			{
				foreach ($_POST['rtwvsmlw_color_name'] as $colors => $color) {
					$rtwvsmlw_colorss[] = sanitize_text_field($color);
				}
			} 

			$colors_array = array( 'colors' => $rtwvsmlw_colorss,
								'separator' => isset($_POST['rtwvsmlw_color_separator'])? sanitize_text_field($_POST['rtwvsmlw_color_separator']) : '',
								'attachment' => $attachment,
							'text' => $text );

			update_term_meta( $rtwvsmlw_term_id, 'order_'.sanitize_text_field($_POST['taxonomy']), $colors_array );
		}

		if( isset( $_POST['rtwvsmlw_text_name'] ) )
		{
			$attachment = isset($rtwvsmlw_term_meta['attachment']) ? $rtwvsmlw_term_meta['attachment'] : '';
			$colors = isset($rtwvsmlw_term_meta['colors']) ? $rtwvsmlw_term_meta['colors'] : '';
			$separator = isset($rtwvsmlw_term_meta['separator']) ? $rtwvsmlw_term_meta['separator'] : '';

			$colors_array = array( 'colors' => $colors,
								'separator' => $separator,
								'attachment' => sanitize_text_field($_POST['rtwvsmlw_term_img_id']),
								'text' => sanitize_text_field($_POST['rtwvsmlw_text_name']) );
								
			update_term_meta( $rtwvsmlw_term_id, 'order_'.sanitize_text_field($_POST['taxonomy']), $colors_array );
		}
	}

	/**
	 * Function used to create extra fields for adding/updating terms
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_edit_attr_terms_field()
	{
		$rtwvsmlw_current_term_taxonomy = isset( $_GET['taxonomy'] ) ? sanitize_text_field( wp_unslash( $_GET['taxonomy'] ) ) : '';
		if ( ! $rtwvsmlw_current_term_taxonomy ) {
			return;
		}
		
		$rtwvsmlw_attr_key_type = $this->rtwvsmlw_get_taxonomy_type_by_slug($rtwvsmlw_current_term_taxonomy);
		

		if( isset($_GET['tag_ID']) && !empty($_GET['tag_ID']) )
		{
			$rtwvsmlw_edit_tag_id = sanitize_text_field($_GET['tag_ID']);

			$rtwvsmlw_edit_tag_meta = get_term_meta($rtwvsmlw_edit_tag_id, 'order_'.sanitize_text_field($_GET['taxonomy']));
			$rtwvsmlw_edit_tag_meta = isset($rtwvsmlw_edit_tag_meta[0])? $rtwvsmlw_edit_tag_meta[0] : array();

			if( isset($rtwvsmlw_edit_tag_meta) && !empty($rtwvsmlw_edit_tag_meta) )
			{
				if(isset($rtwvsmlw_edit_tag_meta['colors'][0]) && stripos($rtwvsmlw_edit_tag_meta['colors'][0],'#') !== false)
				{
					$this->rtwvsmlw_add_term_for_color($rtwvsmlw_edit_tag_meta, sanitize_text_field($_GET['tag_ID']));
				}
				else if(isset($rtwvsmlw_attr_key_type) && ($rtwvsmlw_attr_key_type == 'color'))
				{
					$this->rtwvsmlw_add_term_for_color('');
				}
				else if(is_numeric($rtwvsmlw_edit_tag_meta['attachment']) && isset($rtwvsmlw_attr_key_type) && ($rtwvsmlw_attr_key_type == 'image'))
				{
					$this->rtwvsmlw_add_term_for_image($rtwvsmlw_edit_tag_meta['attachment']);
				}
				else if(isset($rtwvsmlw_attr_key_type) && ($rtwvsmlw_attr_key_type == 'image'))
				{
					$this->rtwvsmlw_add_term_for_image('');
				}
				else if(!empty($rtwvsmlw_edit_tag_meta))
				{
					$this->rtwvsmlw_add_term_for_others($rtwvsmlw_edit_tag_meta);
				}
				else
				{
					$this->rtwvsmlw_add_term_for_others('');
				}
			}
		}
	}

	/**
	 * Function to add extra fields for adding/updating terms on color condition
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_add_term_for_color($rtwvsmlw_selected_color="", $tag_id="")
	{
		$rtwvsmlw_edit_tag_meta = get_term_meta($tag_id);
		$selected_colors = array();
		if( isset($rtwvsmlw_edit_tag_meta['order_pa_color'][0]) && !empty($rtwvsmlw_edit_tag_meta['order_pa_color'][0]) )
		{
			$selected_colors = maybe_unserialize($rtwvsmlw_edit_tag_meta['order_pa_color'][0]);
		}
		?>
		<tr>
			<td colspan="2">
				<table class="rtwvsmlw_variation_swatches_setting_color_table_wrapper">
					<tbody>
						<tr>
							<th colspan="2" class="rtwvsmlw_variation_heading"><label><?php esc_html_e('Variation Swatches settings','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label></th>
						</tr>
						<tr>
							<th scope="row">
								<label><?php esc_html_e('Select Color','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
							</th>
							<td class="rtwvsmlw_color_option">
								<div class="rtwvsmlw_color_table_wrapper">
									<table id="rtwvsmlw_color_table">
										<?php 
										if( isset($selected_colors['colors']) && is_array($selected_colors['colors']) && !empty($selected_colors['colors']) )
										{
											foreach ($selected_colors['colors'] as $key => $value) 
											{ ?>
											<tr>
												<?php $aa = $key+1;
													$id = 'rtwvsmlw_color_option'.$aa;
												?>
												<td><input type="text" class="rtwvsmlw_color_option" id="<?php echo esc_attr($id); ?>" name="rtwvsmlw_color_name[]" value="<?php echo isset($value) ? esc_attr($value) : ''; ?>"></td>
												<td class="rtwvsmlw_actn_td"><input type="button" class="rtwvsmlw_clone_td rtwvsmlw_action_color_btns" value="<?php esc_attr_e('Clone','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>"></td>
												<td class="rtwvsmlw_actn_td"><input type="button" class="rtwvsmlw_remove_td rtwvsmlw_action_color_btns" value="<?php esc_attr_e('Remove','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>"></td>
											</tr>
											<?php 
											}
										}
										else{
											?>
											<tr>
												<td><input type="text" class="rtwvsmlw_color_option" id="rtwvsmlw_color_option1" name="rtwvsmlw_color_name[]" value=""></td>
												<td><input type="button" class="rtwvsmlw_clone_td rtwvsmlw_action_color_btns" value="<?php esc_attr_e('Clone','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>"></td>
												<td><input type="button" class="rtwvsmlw_remove_td rtwvsmlw_action_color_btns" value="<?php esc_attr_e('Remove','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>"></td>
											</tr>
											<?php 
										}
										?>
									</table>
								</div>
							</td>
						</tr>
						<tr class="form-field">
							<th scope="row">
								<label><?php esc_html_e('Color Separator','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
							</th>
							<?php 
								$selected_separator = 1;
								if(isset($rtwvsmlw_edit_tag_meta['separator']))
								{
									$selected_separator = $rtwvsmlw_edit_tag_meta['separator'];
								}
							?>
							<td class="rtwvsmlw_select_td_color_seperator">
								<select name="rtwvsmlw_color_separator" id="rtwvsmlw_color_separator"
										class="rtwvsmlw_color_separator">
									<option value="1" <?php selected( $selected_separator, '1' ) ?>>
										<?php esc_html_e( 'Basic horizontal', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
									</option>
									<option value="2" <?php selected( $selected_separator, '2' ) ?>>
										<?php esc_html_e( 'Basic vertical', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
									</option>
									<option value="3" <?php selected( $selected_separator, '3' ) ?>>
										<?php esc_html_e( 'Basic diagonal left', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
									</option>
									<option value="4" <?php selected( $selected_separator, '4' ) ?>>
										<?php esc_html_e( 'Basic diagonal right', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
									</option>
									<option value="5" <?php selected( $selected_separator, '5' ) ?>>
										<?php esc_html_e( 'Hard lines horizontal', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
									</option>
									<option value="6" <?php selected( $selected_separator, '6' ) ?>>
										<?php esc_html_e( 'Hard lines vertical', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
									</option>
									<option value="7" <?php selected( $selected_separator, '7' ) ?>>
										<?php esc_html_e( 'Hard lines diagonal left', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
									</option>
									<option value="8" <?php selected( $selected_separator, '8' ) ?>>
										<?php esc_html_e( 'Hard lines diagonal right', 'rtwvsmlw-variation-swatches-lite-for-woocommerce' ); ?>
									</option>
								</select>
							</td>
						<tr>
					</tbody>
				</table>
			</td>
		</tr>
		<?php
	}

	/**
	 * Function used to add extra fields for adding/updating terms on image condition
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_add_term_for_image($rtwvsmlw_attachment_id)
	{
		?>
			<tr class="form-field">
				<th scope="row">
					<label><?php esc_html_e('Choose Image','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
				</th>
				<td class="rtwvsmlw_image_option">
					<input type = 'hidden' id='rtwvsmlw_upload_term_img_id' class='' value="<?php echo isset($rtwvsmlw_attachment_id) ? esc_attr($rtwvsmlw_attachment_id) : "" ?>"  name="rtwvsmlw_term_img_id">
					<img src="<?php echo isset($rtwvsmlw_attachment_id) ? esc_url(wp_get_attachment_url($rtwvsmlw_attachment_id)) : "" ?>" class='rtwvsmlw_upload_term_img_text_class' id='rtwvsmlw_upload_term_img_text'/>
					<span class='button button-primary rtwvsmlw_add_term_image' id = 'rtwvsmlw_upload_term_img'><?php esc_html_e('Upload Image','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
					<span class='button button-danger rtwvsmlw_remove_term_image' id = 'rtwvsmlw_upload_term_img'><?php esc_html_e('Remove Image','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
					<p><?php esc_html_e('Choose image for the term(which will appeare on shop page for this term) ','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
				</td>
			</tr>
		<?php
	}

	/**
	 * Function used to add display text for all other attributes
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_add_term_for_others($rtwvsmlw_attr_add_text)
	{
		?>
			<tr class="form-field">
				<th scope="row">
					<label><?php esc_html_e('Display Text','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
				</th>
				<td class="rtwvsmlw_text_option">
					<input type="text" id="rtwvsmlw_text_option" name="rtwvsmlw_text_name" value="<?php echo isset($rtwvsmlw_attr_add_text['text']) ? esc_attr($rtwvsmlw_attr_add_text['text']) : '' ?>">
					<p><?php esc_html_e('Enter text to display on the place of name (eg. you can enter S,M,L at the name of Small, Medium, Large), you can also enter text for buttons','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
				</td>
			</tr>
		<?php
	}

	/**
	 * Function used to add extra slug in iframe url
	 *
	 * @since    1.0.0
	 */
	function rtwvsmlw_redirect_attr_url_cb()
	{
		if( check_ajax_referer('rtwvsmlw-variation-master-nonce','rtwvsmlw_variation_attr_nonce_verify') )
		{
			if( isset($_POST['rtwvsmlw_curr_attr_href']) && !empty($_POST['rtwvsmlw_curr_attr_href']) )
			{
				if( sanitize_text_field($_POST['rtwvsmlw_curr_attr_href']) == 'destroy')
				{
					if( isset($_SESSION['rtwvsmlw_attr_redirect_url'] ))
					{
						unset($_SESSION['rtwvsmlw_attr_redirect_url']);
					}
					wp_die();
				}
				$rtwvsmlw_attr_redirect_href = add_query_arg('rtwvsmlw_variation_swatches','rtwvsmlw_yes', esc_url_raw($_POST['rtwvsmlw_curr_attr_href']) );

				$_SESSION['rtwvsmlw_attr_redirect_url'] = isset($rtwvsmlw_attr_redirect_href) ? $rtwvsmlw_attr_redirect_href : "";
				
				if( $_POST['rtwvsmlw_curr_attr_href'] == 'initial')
				{
					if( isset($_SESSION['rtwvsmlw_attr_redirect_url'] ))
					{
						unset($_SESSION['rtwvsmlw_attr_redirect_url']);
					}

					$rtwvsmlw_attr_redirect_url = esc_url(admin_url().'edit.php?post_type=product&amp;page=product_attributes&amp;rtwvsmlw_variation_swatches=rtwvsmlw_yes');

					$rtwvsmlw_attr_redirect_href = array(
						'rtwvsmlw_initial' => 'initial',
						'rtwvsmlw_redirect_url' => isset($rtwvsmlw_attr_redirect_url) ? $rtwvsmlw_attr_redirect_url : ''
					);

					$_SESSION['rtwvsmlw_attr_redirect_url'] = isset($rtwvsmlw_attr_redirect_href['rtwvsmlw_redirect_url']) ? $rtwvsmlw_attr_redirect_href['rtwvsmlw_redirect_url'] : "";
				}

				if( isset($rtwvsmlw_attr_redirect_href) )
				{
					echo json_encode($rtwvsmlw_attr_redirect_href);
				}
				wp_die();
			}
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
			if( isset($_POST['rtwvsmlw_variation_active_page_name']) && !empty($_POST['rtwvsmlw_variation_active_page_name']) && $_POST['rtwvsmlw_variation_active_page_name'] != 'rtwwvsm_shop_page' )
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
					update_option(sanitize_text_field($_POST['rtwvsmlw_variation_active_page_name']).'_variation_data',$rtwvsmlw_val_array);
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