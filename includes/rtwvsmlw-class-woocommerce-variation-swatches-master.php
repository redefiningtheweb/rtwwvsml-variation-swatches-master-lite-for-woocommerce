<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://redefiningtheweb.com/
 * @since      1.0.0
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/includes
 * @author     RedefiningTheWeb <developers@redefiningtheweb.com>
 */
class Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Loader    $rtwvsmlw_loader    Maintains and registers all hooks for the plugin.
	 */
	protected $rtwvsmlw_loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $rtwvsmlw_plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $rtwvsmlw_plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $rtwvsmlw_version    The current version of the plugin.
	 */
	protected $rtwvsmlw_version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'RTWVSMLW_VARIATION_SWATCHES_MASTER_FOR_WOOCOMMERCE_VERSION' ) ) {
			$this->rtwvsmlw_version = RTWVSMLW_VARIATION_SWATCHES_MASTER_FOR_WOOCOMMERCE_VERSION;
		} else {
			$this->rtwvsmlw_version = '1.0.0';
		}
		$this->rtwvsmlw_plugin_name = 'woocommerce-variation-swatches-master';

		$this->rtwvsmlw_load_dependencies();
		$this->rtwvsmlw_set_locale();
		$this->rtwvsmlw_define_admin_hooks();
		$this->rtwvsmlw_define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Loader. Orchestrates the hooks of the plugin.
	 * - Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_i18n. Defines internationalization functionality.
	 * - Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Admin. Defines all hooks for the admin area.
	 * - Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwvsmlw_load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/rtwvsmlw-class-woocommerce-variation-swatches-master-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/rtwvsmlw-class-woocommerce-variation-swatches-master-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/rtwvsmlw-class-woocommerce-variation-swatches-master-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/rtwvsmlw-class-woocommerce-variation-swatches-master-public.php';

		$this->rtwvsmlw_loader = new Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwvsmlw_set_locale() {

		$rtwvsmlw_plugin_i18n = new Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_i18n();

		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'plugins_loaded', $rtwvsmlw_plugin_i18n, 'rtwvsmlw_load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwvsmlw_define_admin_hooks() {

		$rtwvsmlw_plugin_admin = new Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Admin( $this->rtwvsmlw_get_plugin_name(), $this->rtwvsmlw_get_version() );

		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'admin_enqueue_scripts', $rtwvsmlw_plugin_admin, 'rtwvsmlw_enqueue_styles' );
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'admin_enqueue_scripts', $rtwvsmlw_plugin_admin, 'rtwvsmlw_enqueue_scripts' );
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'admin_menu', $rtwvsmlw_plugin_admin, 'rtwvsmlw_add_admin_menu' );
		
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'woocommerce_after_add_attribute_fields', $rtwvsmlw_plugin_admin, 'rtwvsmlw_woocommerce_after_add_attribute_fields');
		
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'woocommerce_after_edit_attribute_fields', $rtwvsmlw_plugin_admin, 'rtwvsmlw_woocommerce_after_edit_attribute_fields');

		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'woocommerce_attribute_updated', $rtwvsmlw_plugin_admin, 'rtwvsmlw_woocommerce_attribute_updated', 10, 3);
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'woocommerce_attribute_added', $rtwvsmlw_plugin_admin, 'rtwvsmlw_woocommerce_attribute_added', 10, 2);

		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'create_term', $rtwvsmlw_plugin_admin, 'rtwvsmlw_attribute_terms_save',10,3);
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'edited_term', $rtwvsmlw_plugin_admin, 'rtwvsmlw_attribute_terms_save',10,3);
		
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'wp_ajax_rtwvsmlw_redirect_attr_url_action', $rtwvsmlw_plugin_admin, 'rtwvsmlw_redirect_attr_url_cb');
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'wp_ajax_rtwvsmlw_save_field_pages_action', $rtwvsmlw_plugin_admin, 'rtwvsmlw_save_field_pages_cb');
		
		if(isset($_GET['taxonomy']))
		{
			$rtwvsmlw_attr_taxonomy = sanitize_text_field($_GET['taxonomy']);

			if( isset($rtwvsmlw_attr_taxonomy) )
			{
				$this->rtwvsmlw_loader->rtwvsmlw_add_action( $rtwvsmlw_attr_taxonomy.'_add_form_fields', $rtwvsmlw_plugin_admin, 'rtwvsmlw_add_attr_terms_field' );
				$this->rtwvsmlw_loader->rtwvsmlw_add_action( $rtwvsmlw_attr_taxonomy.'_edit_form_fields', $rtwvsmlw_plugin_admin, 'rtwvsmlw_edit_attr_terms_field' );
			}
		}

		if (isset($_GET['page']) && sanitize_text_field($_GET['page']) =='product_attributes') 
		{
			$this->rtwvsmlw_loader->rtwvsmlw_add_filter( 'product_attributes_type_selector', $rtwvsmlw_plugin_admin, 'rtwvsmlw_product_attributes_type_selector' );
		}

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwvsmlw_define_public_hooks() {

		$rtwvsmlw_plugin_public = new Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Public( $this->rtwvsmlw_get_plugin_name(), $this->rtwvsmlw_get_version() );
		
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'wp_enqueue_scripts', $rtwvsmlw_plugin_public, 'rtwvsmlw_enqueue_styles' );
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'wp_enqueue_scripts', $rtwvsmlw_plugin_public, 'rtwvsmlw_enqueue_scripts' );

		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'woocommerce_before_add_to_cart_form', $rtwvsmlw_plugin_public, 'rtwvsmlw_variation_on_single_product' );

		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'wp_ajax_rtwvsmlw_ajax_variation_action', $rtwvsmlw_plugin_public, 'rtwvsmlw_ajax_variation_cb' );
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'wp_ajax_nopriv_rtwvsmlw_ajax_variation_action', $rtwvsmlw_plugin_public, 'rtwvsmlw_ajax_variation_cb' );
		
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'wp_ajax_rtwvsmlw_save_field_pages_actions', $rtwvsmlw_plugin_public, 'rtwvsmlw_save_field_pages_cb');
		$this->rtwvsmlw_loader->rtwvsmlw_add_action( 'wp_ajax_nopriv_rtwvsmlw_save_field_pages_actions', $rtwvsmlw_plugin_public, 'rtwvsmlw_save_field_pages_cb');
		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress. 
	 *
	 * @since    1.0.0
	 */
	public function rtwvsmlw_run() {
		$this->rtwvsmlw_loader->rtwvsmlw_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function rtwvsmlw_get_plugin_name() {
		return $this->rtwvsmlw_plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Woocommerce_Variation_Swatches_Master_Loader    Orchestrates the hooks of the plugin.
	 */
	public function rtwvsmlw_get_loader() {
		return $this->rtwvsmlw_loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function rtwvsmlw_get_version() {
		return $this->rtwvsmlw_version;
	}

}
