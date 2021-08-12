<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       https://redefiningtheweb.com/
 * @since      1.0.0
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/includes
 * @author     RedefiningTheWeb <developers@redefiningtheweb.com>
 */
class Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $rtwvsmlw_actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $rtwvsmlw_actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $rtwvsmlw_filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $rtwvsmlw_filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->rtwvsmlw_actions = array();
		$this->rtwvsmlw_filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $rtwvsmlw_hook             The name of the WordPress action that is being registered.
	 * @param    object               $rtwvsmlw_component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $rtwvsmlw_callback         The name of the function definition on the $rtwvsmlw_component.
	 * @param    int                  $rtwvsmlw_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $rtwvsmlw_accepted_args    Optional. The number of arguments that should be passed to the $rtwvsmlw_callback. Default is 1.
	 */
	public function rtwvsmlw_add_action( $rtwvsmlw_hook, $rtwvsmlw_component, $rtwvsmlw_callback, $rtwvsmlw_priority = 10, $rtwvsmlw_accepted_args = 1 ) {
		$this->rtwvsmlw_actions = $this->rtwvsmlw_add( $this->rtwvsmlw_actions, $rtwvsmlw_hook, $rtwvsmlw_component, $rtwvsmlw_callback, $rtwvsmlw_priority, $rtwvsmlw_accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $rtwvsmlw_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $rtwvsmlw_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $rtwvsmlw_callback         The name of the function definition on the $rtwvsmlw_component.
	 * @param    int                  $rtwvsmlw_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $rtwvsmlw_accepted_args    Optional. The number of arguments that should be passed to the $rtwvsmlw_callback. Default is 1
	 */
	public function rtwvsmlw_add_filter( $rtwvsmlw_hook, $rtwvsmlw_component, $rtwvsmlw_callback, $rtwvsmlw_priority = 10, $rtwvsmlw_accepted_args = 1 ) {
		$this->rtwvsmlw_filters = $this->rtwvsmlw_add( $this->rtwvsmlw_filters, $rtwvsmlw_hook, $rtwvsmlw_component, $rtwvsmlw_callback, $rtwvsmlw_priority, $rtwvsmlw_accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $rtwvsmlw_hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $rtwvsmlw_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $rtwvsmlw_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $rtwvsmlw_callback         The name of the function definition on the $component.
	 * @param    int                  $rtwvsmlw_priority         The priority at which the function should be fired.
	 * @param    int                  $rtwvsmlw_accepted_args    The number of arguments that should be passed to the $rtwvsmlw_callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function rtwvsmlw_add( $rtwvsmlw_hooks, $rtwvsmlw_hook, $rtwvsmlw_component, $rtwvsmlw_callback, $rtwvsmlw_priority, $rtwvsmlw_accepted_args ) {

		$rtwvsmlw_hooks[] = array(
			'hook'          => $rtwvsmlw_hook,
			'component'     => $rtwvsmlw_component,
			'callback'      => $rtwvsmlw_callback,
			'priority'      => $rtwvsmlw_priority,
			'accepted_args' => $rtwvsmlw_accepted_args
		);

		return $rtwvsmlw_hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function rtwvsmlw_run() {

		foreach ( $this->rtwvsmlw_filters as $rtwvsmlw_hook ) {
			add_filter( $rtwvsmlw_hook['hook'], array( $rtwvsmlw_hook['component'], $rtwvsmlw_hook['callback'] ), $rtwvsmlw_hook['priority'], $rtwvsmlw_hook['accepted_args'] );
		}

		foreach ( $this->rtwvsmlw_actions as $rtwvsmlw_hook ) {
			add_action( $rtwvsmlw_hook['hook'], array( $rtwvsmlw_hook['component'], $rtwvsmlw_hook['callback'] ), $rtwvsmlw_hook['priority'], $rtwvsmlw_hook['accepted_args'] );
		}

	}

}
