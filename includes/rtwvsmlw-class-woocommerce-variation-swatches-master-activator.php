<?php

/**
 * Fired during plugin activation
 *
 * @link       https://redefiningtheweb.com/
 * @since      1.0.0
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/includes
 * @author     RedefiningTheWeb <developers@redefiningtheweb.com>
 */
class Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function rtwvsmlw_activate() {
		$rtwvsmlw_simple_var_data = get_option('rtwwvsm_simple_variation_data', array());
		$rtwvsmlw_adv_var_data = get_option('rtwwvsm_advanced_variation_data', array());
		$rtwvsmlw_shop_page_var_data = get_option('rtwwvsm_shop_page_variation_data', array());

		if(!isset($rtwvsmlw_simple_var_data) || empty($rtwvsmlw_simple_var_data))
		{
			$rtwvsmlw_simple_var_data = array(
				'rtwvsmlw_simple_enable_swatches_for_single_page' => 1,
				'rtwvsmlw_simple_enable_tooltip' => 1,
				'rtwvsmlw_show_attribute_label' => 1,
				'rtwvsmlw_simple_shape_style' => 'rtwvsmlw_simple_shape_square'
			);

			update_option('rtwwvsm_simple_variation_data', $rtwvsmlw_simple_var_data);
		}

		if(!isset($rtwvsmlw_adv_var_data) || empty($rtwvsmlw_adv_var_data))
		{
			$rtwvsmlw_adv_var_data = array(
				'rtwvsmlw_advance_display_border' => 1,
				'rtwvsmlw_advance_hide_add_cart_btn' => 0,'rtwvsmlw_advance_attribute_behaviour' =>'rtwvsmlw_advance_blur_without_cross',
				'rtwvsmlw_advance_variation_width' => 40,
				'rtwvsmlw_advance_variation_height' => 40,
				'rtwvsmlw_advance_font-size' => 15 
			);

			update_option('rtwwvsm_advanced_variation_data', $rtwvsmlw_adv_var_data);
		}

		if(!isset($rtwvsmlw_shop_page_var_data) || empty($rtwvsmlw_shop_page_var_data))
		{
			$rtwvsmlw_shop_page_var_data = array(
				'rtwvsmlw_shop_enable_swatches' => 1,
				'rtwvsmlw_shop_display_position' => 'rtwvsmlw_shop_before_cart',
				'rtwvsmlw_shop_enable_tooltip' => 1,
				'rtwvsmlw_shop_clear_link' => 1,
				'rtwvsmlw_advance_shop_width' => 40,
				'rtwvsmlw_advance_shop_height' => 40,
				'rtwvsmlw_shop_font-size' => 14
			);

			update_option('rtwwvsm_shop_page_variation_data', $rtwvsmlw_shop_page_var_data);
		}


		$plugin_activated = get_option('rtwwvsm_plugin_activated_once', 'no');
		if($plugin_activated == 'no')
		{
			$rtwvsmlw_attr_array = array();
			$rtwvsmlw_attr_id_array = array();
			$rtwvsmlw_attribute_taxonomies = wc_get_attribute_taxonomies();
			if ( is_array($rtwvsmlw_attribute_taxonomies) && !empty( $rtwvsmlw_attribute_taxonomies ) ) {
				foreach ( $rtwvsmlw_attribute_taxonomies as $tax ) {
					$attribute_taxonomy_name = wc_attribute_taxonomy_name( $tax->attribute_name );
					$label                   = $tax->attribute_label ? $tax->attribute_label : $tax->attribute_name;
					$rtwvsmlw_attr_array[$attribute_taxonomy_name] = $label;
					$rtwvsmlw_attr_id_array[] = $tax->attribute_id;
				}
			}
			
			if(!empty($rtwvsmlw_attr_id_array))
			{
				foreach ($rtwvsmlw_attr_id_array as $attrs => $id) {
					$variation_array = array(
									'enable' => 1,
									'display_type' => 'button',
									'attr_profile' => 'button'
								);
					update_term_meta( $id, 'rtwvsmlw_attr_meta', $variation_array );	
				}
			}

			$rtwvsmlw_default_colors = array(
				'white smoke'   => '#F5F5F5',
				'white'         => '#FFFFFF',
				'light gray'    => '#D3D3D3',
				'light grey'    => '#D3D3D3',
				'silver'        => '#C0C0C0',
				'gray'          => '#808080',
				'grey'          => '#808080',
				'honeydew'      => '#F0FFF0',
				'dark gray'     => '#A9A9A9',
				'dark grey'     => '#A9A9A9',
				'black'         => '#000000',
				'snow'          => '#FFFAFA',
				'azure'         => '#F0FFFF',
				'ivory'         => '#FFFFF0',
				'lavender'      => '#E6E6FA',
				'linen'         => '#FAF0E6',
				'tan'           => '#D2B48C',
				'peru'          => '#CD853F',
				'chocolate'     => '#D2691E',
				'wheat'         => '#F5DEB3',
				'bisque'        => '#FFE4C4',
				'beige'         => '#F5F5DC',
				'pink'          => '#FFC0CB',
				'orchid'        => '#DA70D6',
				'magenta'       => '#FF00FF',
				'fuchsia'       => '#FF00FF',
				'violet'        => '#EE82EE',
				'plum'          => '#DDA0DD',
				'blue'          => '#0000FF',
				'thistle'       => '#D8BFD8',
				'purple'        => '#800080',
				'slate blue'    => '#6A5ACD',
				'teal'          => '#008080',
				'indigo'        => '#4B0082',
				'sky blue'      => '#87CEEB',
				'light blue'    => '#ADD8E6',
				'navy'          => '#000080',
				'cyan'          => '#00FFFF',
				'aqua'          => '#00FFFF',
				'dark cyan'     => '#008B8B',
				'light green'   => '#90EE90',
				'lime green'    => '#32CD32',
				'lime'          => '#00FF00',
				'maroon'        => '#800000',
				'green'         => '#008000',
				'yellow'        => '#FFFF00',
				'olive'         => '#808000',
				'gold'          => '#FFD700',
				'orange'        => '#FFA500',
				'salmon'        => '#FA8072',
				'brown'         => '#A52A2A',
				'tomato'        => '#FF6347',
				'red'           => '#FF0000',
				'dark red'      => '#8B0000',
			);

			if(!empty($rtwvsmlw_attr_array))
			{
				foreach ($rtwvsmlw_attr_array as $key => $value) {
					$rtwvsmlw_terms = get_terms( $key );

					if(!empty($rtwvsmlw_terms))
					{
						foreach ($rtwvsmlw_terms as $terms => $term) {
							
							$rtwvsmlw_term_meta = get_term_meta($term->term_id, 'order_'.$term->taxonomy );
							
							if(empty($rtwvsmlw_term_meta))
							{
								$colors = array();
								$separator = 1;
								$attachment = '';
								$text = $term->name;
								if(isset($rtwvsmlw_default_colors[strtolower($term->name)]))
								{
									$colors[] = $rtwvsmlw_default_colors[strtolower($term->name)];
								}


								$colors_array = array( 'colors' => $colors,
												'separator' => $separator,
												'attachment' => $attachment,
												'text' => $text );
												
								update_term_meta( $term->term_id, 'order_'.$term->taxonomy, $colors_array );
								
							}
						}
					}
				}
			}
			update_option('rtwwvsm_plugin_activated_once', 'activated');
		}


		global $wpdb;
		$charset_collate = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		$query  = '';

		$table_name = $wpdb->prefix.'rtwvsmlw_custom_attributes';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
               	`name`      		VARCHAR(255) DEFAULT NULL,
               	`display_type`      VARCHAR(255) DEFAULT NULL,
               	`attr_profile`      VARCHAR(255) DEFAULT NULL,
                `deleted`  			TINYINT(2) NOT NULL DEFAULT '0'
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }

		$table_name = $wpdb->prefix.'rtwvsmlw_custom_attributes_values';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `parent_id`  		INT UNSIGNED DEFAULT NULL,
               	`name`      		VARCHAR(255) DEFAULT NULL,
               	`text`      		VARCHAR(255) DEFAULT NULL,
               	`colors`      		VARCHAR(255) DEFAULT NULL,
               	`separator`      	VARCHAR(255) NOT NULL DEFAULT '1',
                `attachment`  		INT UNSIGNED DEFAULT NULL,
                `deleted`  			TINYINT(2) NOT NULL DEFAULT '0'
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' ); 
		
		dbDelta( $query );
	}

}
