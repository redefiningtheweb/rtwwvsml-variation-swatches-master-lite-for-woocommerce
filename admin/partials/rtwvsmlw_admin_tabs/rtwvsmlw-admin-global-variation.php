<?php

/**
 * Provide a admin area view for the advace setting page
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       my author uri my
 * @since      1.0.0
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/admin/partials/rtwvsmlw_admin_tabs
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
$rtwvsmlw_advanced_variation_data = get_option('rtwwvsm_advanced_variation_data', array());
    
global $wpdb;

$attribute_taxonomies = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_name != '' ORDER BY attribute_name ASC;" );
set_transient( 'wc_attribute_taxonomies', $attribute_taxonomies );

$attribute_taxonomies = array_filter( $attribute_taxonomies  );
$rtwwdpd_attr_array = array();
$rtwwdpd_attribute_taxonomies = wc_get_attribute_taxonomies();

$attribute_taxonomy_name = array();
$attributes_array = array();
if ( is_array( $rtwwdpd_attribute_taxonomies ) && ! empty( $rtwwdpd_attribute_taxonomies ) )
{
    foreach ( $rtwwdpd_attribute_taxonomies as $tax ) {
        $attribute_taxonomy_name = wc_attribute_taxonomy_name( $tax->attribute_name );

        $label = $tax->attribute_label ? $tax->attribute_label : $tax->attribute_name;

        $rtwwdpd_attr_array[$attribute_taxonomy_name] = $label;
        
        $attributes_array[] = array(    'term_id' => $tax->attribute_id,
                                        'label' => $tax->attribute_label, 
                                        'name' => $tax->attribute_name, 
                                        'taxonomy_name' => $attribute_taxonomy_name );

    }
}

if( isset($_POST['rtwvsmlw_color_save_btn']) && !empty($_POST['rtwvsmlw_color_save_btn']) )
{
    $rtwvsmlw_attr_id = sanitize_text_field( $_POST['rtwvsmlw_color_save_btn'] );
    $rtwvsmlw_selected_term = wc_get_attribute($rtwvsmlw_attr_id);
    $rtwvsmlw_slug = isset($rtwvsmlw_selected_term->slug) ? $rtwvsmlw_selected_term->slug : '';

    $rtwvsmlw_enable = isset($_POST['rtwvsmlw_enable_product_list']) ? sanitize_text_field($_POST['rtwvsmlw_enable_product_list']) : 0;
    $display_type = isset($_POST['rtwvsmlw_display_type_'.$rtwvsmlw_slug]) ? sanitize_text_field($_POST['rtwvsmlw_display_type_'.$rtwvsmlw_slug]) : '';
    $attr_profile = isset($_POST['rtwvsmlw_swatches_type_'.$rtwvsmlw_slug]) ? sanitize_text_field($_POST['rtwvsmlw_swatches_type_'.$rtwvsmlw_slug]) : ''; 

    $array = array( 'enable' => $rtwvsmlw_enable,
                    'display_type' => $display_type,
                    'attr_profile' => $attr_profile );

    update_term_meta( $rtwvsmlw_attr_id, 'rtwvsmlw_attr_meta', $array );

    $aa = get_term_meta($rtwvsmlw_attr_id, 'rtwvsmlw_attr_meta');
   
    global $wpdb;
    
    $rtwbma_upadte = $wpdb->update(
        $wpdb->prefix.'woocommerce_attribute_taxonomies',
        array(
            'attribute_type'   	=> $display_type
        ),
        array(
            'attribute_id' => $rtwvsmlw_attr_id
        )
    );

    if( isset( $_POST ) && !empty( $_POST ) )
    {
        foreach ( $_POST as $key => $value ) {

            if( stripos( $key, 'rtwvsmlw_color_picker' ) !== false )
            {
                $id = str_replace( 'rtwvsmlw_color_picker', '', sanitize_text_field($key) );
                $term_meta = get_term_meta( $id, 'order_'.$rtwvsmlw_slug );
                $separator = isset( $term_meta[0]['separator'] ) ? $term_meta[0]['separator'] :'';
                $attachment = isset( $term_meta[0]['attachment'] ) ? $term_meta[0]['attachment'] :'';

                $text = isset( $term_meta[0]['text'] ) ? $term_meta[0]['text'] :'';

                $update_array = array(  'separator' => $separator,
                                        'colors' => $value,
                                        'attachment' => $attachment,
                                        'text' => $text );

                update_term_meta( $id, 'order_'.$rtwvsmlw_slug, $update_array );
                
            }

            elseif( stripos( $key, 'rtwvsmlw_color_seperator_select_box' ) !== false )
            {
                $id = str_replace( 'rtwvsmlw_color_seperator_select_box', '', sanitize_text_field($key) );
                
                $term_meta = get_term_meta( $id, 'order_'.$rtwvsmlw_slug );
                $colors = isset( $term_meta[0]['colors'] ) ? $term_meta[0]['colors'] :'';
                $attachment = isset( $term_meta[0]['attachment'] ) ? $term_meta[0]['attachment'] :'';

                $text = isset( $term_meta[0]['text'] ) ? $term_meta[0]['text'] :'';

                $update_array = array(  'separator' => sanitize_text_field($value),
                                        'colors' => $colors,
                                        'attachment' => $attachment,
                                        'text' => $text );

                update_term_meta( $id, 'order_'.$rtwvsmlw_slug, $update_array );
            }

            elseif( stripos( $key, 'rtwvsmlw_img_attachment_id_' ) !== false )
            {
                $id = str_replace( 'rtwvsmlw_img_attachment_id_', '', $key );

                $term_meta = get_term_meta( $id, 'order_'.$rtwvsmlw_slug );

                $colors = isset( $term_meta[0]['colors'] ) ? $term_meta[0]['colors'] :'';
                $separator = isset( $term_meta[0]['separator'] ) ? $term_meta[0]['separator'] :'';
                $attachment = isset( $term_meta[0]['attachment'] ) ? $term_meta[0]['attachment'] :'';

                $text = isset( $term_meta[0]['text'] ) ? $term_meta[0]['text'] :'';

                $update_array = array(  'separator' => $separator,
                                        'colors' => $colors,
                                        'attachment' => sanitize_text_field($value),
                                        'text' => $text );
                                        
                update_term_meta( $id, 'order_'.$rtwvsmlw_slug, $update_array );
            }
        }
    }
}

if(is_array($attributes_array) && !empty($attributes_array))
{
    foreach ($attributes_array as $slug => $names) {
        $slug = $names['taxonomy_name'];
        $name = $names['name'];
        $rtwvsmlw_term_meta = get_term_meta($names['term_id'],'rtwvsmlw_attr_meta');
        $rtwvsmlw_term_meta = isset($rtwvsmlw_term_meta[0])? $rtwvsmlw_term_meta[0] : array();
        
    ?>
    <form action="" method="post"  enctype="multipart/form-data">
    <input type="hidden" id="rtwvsmlw_current_user" class="rtwvsmlw_simple_page_data" value="<?php echo esc_attr(get_current_user_id()); ?>">
    <div class="rtwvsmlw_global_attribute_color_tab rtwvsmlw_tab_content_card">
        <div class="rtwvsmlw_row rtwvsmlw_card_header_row">
            <label><?php esc_html_e($name,'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
            <button value="<?php echo esc_attr($names['term_id']); ?>" class="mdc-button mdc-button--raised mdc-ripple-upgraded rtwvsmlw_color_save_btn" name="rtwvsmlw_color_save_btn">
                <span class="mdc-button__ripple"></span>
                <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('bookmark');?></i>
                <span class="mdc-button__label"><?php esc_html_e('save','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
            </button>
        </div>
        
        <div class="rtwvsmlw_default_design_tab_content rtwvsmlw_global_color_attr_tab_content rtwvsmlw_gloabl_color_active_tab">
            <div class="rtwvsmlw_global_attribute_color_size_cards">
                <div class="rtwvsmlw_row">
                    <div class="rtwvsmlw_select_div">
                        <label class="rtwvsmlw_global_attr_label"><?php esc_html_e('Display Type','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
                        <select data-tab="<?php echo esc_attr($slug); ?>" class="rtwvsmlw_display_type" name="rtwvsmlw_display_type_<?php echo esc_attr($slug); ?>">
                            <option <?php selected( isset($rtwvsmlw_term_meta['display_type']) ? $rtwvsmlw_term_meta['display_type'] : '', 'button') ?> value="button"><?php esc_html_e('Button','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                            <option <?php selected( isset($rtwvsmlw_term_meta['display_type']) ? $rtwvsmlw_term_meta['display_type'] : '', 'color') ?> value="color"><?php esc_html_e('Color','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                            <option <?php selected( isset($rtwvsmlw_term_meta['display_type']) ? $rtwvsmlw_term_meta['display_type'] : '', 'image') ?> value="image"><?php esc_html_e('Image (Pro Feature)','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                            <option <?php selected( isset($rtwvsmlw_term_meta['display_type']) ? $rtwvsmlw_term_meta['display_type'] : '', 'radio') ?> value="radio"><?php esc_html_e('Radio (Pro Feature)','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                            <option <?php selected( isset($rtwvsmlw_term_meta['display_type']) ? $rtwvsmlw_term_meta['display_type'] : '', 'select') ?> value="select"><?php esc_html_e('Theme Default','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                        </select>
                    </div>
                    <div class="rtwvsmlw_select_div">
                        <label class="rtwvsmlw_global_attr_label"><?php esc_html_e('swatches profile','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
                        <select id="rtwvsmlw_swatches_type" name="rtwvsmlw_swatches_type_<?php echo esc_attr($slug); ?>">
                            <option <?php selected( isset($rtwvsmlw_term_meta['attr_profile']) ? $rtwvsmlw_term_meta['attr_profile'] : '', 'button') ?> value="button"><?php esc_html_e('button design','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                            <option <?php selected( isset($rtwvsmlw_term_meta['attr_profile']) ? $rtwvsmlw_term_meta['attr_profile'] : '', 'color') ?> value="color"><?php esc_html_e('color design','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                            <option <?php selected( isset($rtwvsmlw_term_meta['attr_profile']) ? $rtwvsmlw_term_meta['attr_profile'] : '', 'image') ?> value="image"><?php esc_html_e('image design','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="rtwvsmlw_selected_content_wrapper">
                    <!-- display type button tab -->
                    <div class="rtwvsmlw_display_type_button_tab_in_color rtwvsmlw_display_type_tab_in_color" data-value="button">
                        <?php 
                        $rtwvsmlw_terms = get_terms($slug);
                        
                        if(is_array($rtwvsmlw_terms) && !empty($rtwvsmlw_terms))
                        {
                            foreach ($rtwvsmlw_terms as $terms => $term) 
                            { ?>
                                <button class="mdc-button mdc-button--raised mdc-ripple-upgraded">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label"><?php esc_html_e($term->name,'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                </button>
                            <?php 
                            }
                        }
                        ?>
                    </div>
                    
                    <!-- display type image tab  -->
                    <div class="rtwvsmlw_display_type_img_tab_in_color rtwvsmlw_display_type_tab_in_color" data-value="image">
                        <div class="rtwvsmlw_tab_bar_wrapper_for_image_in_color">
                            <div class="mdc-tab-bar" role="tablist">
                                <div class="mdc-tab-scroller">
                                    <div class="mdc-tab-scroller__scroll-area">
                                        <div class="mdc-tab-scroller__scroll-content">
                                        <?php 
                                        $rtwvsmlw_terms = get_terms($slug);
                                        
                                        $i = 1;
                                        if(is_array($rtwvsmlw_terms) && !empty($rtwvsmlw_terms))
                                        {
                                            foreach ($rtwvsmlw_terms as $terms => $term) 
                                            { 
                                            if($i ==  1)
                                            {
                                                $class = "mdc-tab--active";
                                                $class_indicator = 'mdc-tab-indicator--active';
                                            }
                                            else{
                                                $class="";
                                                $class_indicator =  '';
                                            } ?>
                                            <span class="mdc-tab <?php echo esc_attr($class); ?>" role="tab" aria-selected="true" tabindex="0" data-tab=".rtwvsmlw_<?php echo esc_attr($term->name); ?>_img_tab_in_color"> 
                                                <span class="mdc-tab__content">
                                                    <span class="mdc-tab__text-label"><?php esc_html_e($term->name,'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                                </span>
                                                <span class="mdc-tab-indicator <?php echo esc_attr($class_indicator); ?>">
                                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                </span>
                                                <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                                            </span>
                                            <?php 
                                            $i++;
                                            }
                                        }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
						$rtwvsmlw_terms = get_terms($slug);
						$i = 1;
                        if(is_array($rtwvsmlw_terms) && !empty($rtwvsmlw_terms))
                        {
                            foreach ($rtwvsmlw_terms as $terms => $term) { 
                                $rtwvsmlw_term_meta = get_term_meta($term->term_id, 'order_'.$slug);
                                $rtwvsmlw_term_meta = isset($rtwvsmlw_term_meta[0])? $rtwvsmlw_term_meta[0] : array();

								if($i == 1)
								{
									$class = "rtwvsmlw_img_tab_active_in_color";
								}else{
									$class = '';
                                }
                                $attach_id = isset( $rtwvsmlw_term_meta['attachment'] ) ? $rtwvsmlw_term_meta['attachment'] : '' ;
								?>
                                <div class="rtwvsmlw_dropdown_container rtwvsmlw_img_tab_content_in_color rtwvsmlw_<?php echo esc_attr($term->name); ?>_img_tab_in_color <?php echo esc_attr($class); ?>">
                                    <div class="rtwvsmlw_dropdown_card">
                                        <div class="rtwvsmlw_dropdown_card_header">
                                            <span><?php esc_html_e($term->name,'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                        </div>
                                        <div class="rtwvsmlw_dropdown_card_content">
                                            <div class="rtwvsmlw_dropdown_card_content_inner">
                                                <p><?php esc_html_e('choose an image','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
                                                <div class="rtwvsmlw_choose_image">
                                                    <input type="hidden" class="rtwvsmlw_img_attachment_id" name="rtwvsmlw_img_attachment_id_<?php echo esc_attr($term->term_id); ?>" value="<?php echo esc_attr($attach_id);?>" >
                                                    <img src="<?php echo esc_url(wp_get_attachment_url ($attach_id)); ?>" class="rtwvsmlw_img_fluid">
                                                    <span class="mdc-button mdc-button--raised mdc-ripple-upgraded rtwvsmlw_upld_btn">
                                                        <span class="mdc-button__ripple"></span>
                                                        <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('backup');?></i>
                                                        <span class="mdc-button__label"><?php esc_html_e('Upload Image','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                                    </span>
                                                </div>
                                                <span class="mdc-icon-button material-icons mdc-top-app-bar__navigation-icon
                                                mdc-ripple-upgraded--unbounded mdc-ripple-upgraded rtwvsmlw_close_btn" title="Home" aria-pressed="false">
                                                    <i class="material-icons" alt="Menu button"><?php echo esc_html('highlight_off');?></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php 
							$i++;
                            }
                        }?>
                    </div>

                    <!-- display type color tab -->
                    <div class="rtwvsmlw_display_type_color_tab_in_color rtwvsmlw_display_type_tab_in_color" data-value="color">
                        <div class="rtwvsmlw_tab_bar_wrapper_for_color_in_color">
                            <div class="mdc-tab-bar" role="tablist">
                                <div class="mdc-tab-scroller">
                                    <div class="mdc-tab-scroller__scroll-area">
                                        <div class="mdc-tab-scroller__scroll-content">
                                        <?php 
                                        $rtwvsmlw_terms = get_terms($slug);
                                        $i = 1;
                                        if(is_array($rtwvsmlw_terms) && !empty($rtwvsmlw_terms))
                                        {
                                            foreach ($rtwvsmlw_terms as $terms => $term) { 
                                                if($i == 1){
                                                    $class =  "mdc-tab--active";
                                                    $indicatorclas = "mdc-tab-indicator--active";
                                                }
                                                else{
                                                    $class="";
                                                    $indicatorclas = "";
                                                }
                                                ?>
                                                <span class="mdc-tab <?php echo esc_attr($class); ?>" role="tab" aria-selected="true" tabindex="0" data-tab=".rtwvsmlw_<?php echo esc_attr($term->name);?>_tab">
                                                    <span class="mdc-tab__content">
                                                        <span class="mdc-tab__text-label"><?php esc_html_e($term->name,'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                                    </span>
                                                    <span class="mdc-tab-indicator <?php echo esc_attr($indicatorclas); ?>">
                                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                    </span>
                                                    <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                                                </span>
                                            <?php 
                                            $i++;	
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $rtwvsmlw_terms = get_terms($slug);
						$i = 1;
                        if(is_array($rtwvsmlw_terms) && !empty($rtwvsmlw_terms))
                        {
                            foreach ($rtwvsmlw_terms as $terms => $term) { 
								if($i == 1){
									$class =  "rtwvsmlw_color_tab_active";
								}
								else{
									$class="";
                                }

                                $term_meta = get_term_meta($term->term_id);
                                $term_meta = maybe_unserialize(isset($term_meta['order_'.$slug][0])? $term_meta['order_'.$slug][0] : '');

                                if(!empty($term_meta['separator']))
                                {
                                    $rtwvsm_separator = $term_meta['separator'];
                                }
                                else{
                                    $rtwvsm_separator = '';
                                }

								?>
                                <div class="rtwvsmlw_dropdown_container rtwvsmlw_color_tab_content rtwvsmlw_<?php echo esc_attr($term->name);?>_tab <?php echo esc_attr($class); ?>">
                                    <div class="rtwvsmlw_dropdown_card">
                                        <div class="rtwvsmlw_dropdown_card_header">
                                            <span><?php esc_html_e($term->name, 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                        </div>
                                        <div class="rtwvsmlw_dropdown_card_content">
                                            <div class="rtwvsmlw_seperator_select_wrapper">
                                                <label><?php esc_html_e('color seperator', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
                                                <select id="rtwvsmlw_color_seperator_select_box" name="rtwvsmlw_color_seperator_select_box<?php echo esc_attr($term->term_id);?>">
                                                    <option <?php selected($rtwvsm_separator, 1);?> value="1"><?php esc_html_e('Horizontal', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                                                    <option <?php selected($rtwvsm_separator, 2);?> value="2"><?php esc_html_e('Vertical', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                                                    <option <?php selected($rtwvsm_separator, 3);?> value="3"><?php esc_html_e('Diagonal Left', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>  </option>
                                                    <option <?php selected($rtwvsm_separator, 4);?> value="4"><?php esc_html_e('Diagonal Right', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </option>
                                                    <option <?php selected($rtwvsm_separator, 5);?> value="5"><?php esc_html_e('Border Horizontal', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                                                    <option <?php selected($rtwvsm_separator, 6);?> value="6"><?php esc_html_e('Border Vertical', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                                                    <option <?php selected($rtwvsm_separator, 7);?> value="7"><?php esc_html_e('Border Diagonal Left','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                                                    <option <?php selected($rtwvsm_separator, 8);?> value="8"><?php esc_html_e('Border Diagonal Right', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></option>
                                                </select>
                                            </div>
                                            <div class="rtwvsmlw_dropdown_card_content_color_inner">
                                                <div class="rtwvsmlw_color_card_box rtwvsmlw_dflex">
                                                <?php 
                                                if( isset($term_meta['colors'] ) && is_array( $term_meta['colors'] ) && !empty( $term_meta['colors'] ) )
                                                {
                                                    foreach ( $term_meta['colors'] as $key => $value ) 
                                                    {
                                                    ?>
                                                    <div class="rtwvsmlw_color_card_div">
                                                        <div class="rtwvsmlw_dflex rtwvsmlw_card_content">
                                                            <label><?php esc_html_e('color', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label></td>
                                                            <div class="rtwvsmlw_color_square">
                                                            <input name="rtwvsmlw_color_picker<?php echo esc_attr($term->term_id); ?>[]" id="rtwvsmlw_color_picker" value="<?php echo esc_attr($value); ?>" class="rtwvsmlw_color_picker">
                                                            </div>
                                                        </div>
                                                        <div class="rtwvsmlw_dflex rtwvsmlw_card_content">
                                                            <label><?php esc_html_e('action', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
                                                            <div>
                                                                <span data-term_id="<?php echo esc_attr($term->term_id); ?>"  class="mdc-button mdc-button--raised mdc-ripple-upgraded rtwvsmlw_clone_btn">
                                                                    <span class="mdc-button__ripple"></span>
                                                                    <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('content_copy'); ?></i>
                                                                    <span class="mdc-button__label"><?php esc_html_e('clone', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                                                </span>
                                                                <span class="mdc-button mdc-button--raised mdc-ripple-upgraded rtwvsmlw_remove_btn">
                                                                    <span class="mdc-button__ripple"></span>
                                                                    <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('remove_circle_outline'); ?></i>
                                                                    <span class="mdc-button__label"><?php esc_html_e('remove', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php 
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <div class="rtwvsmlw_color_card_div">
                                                        <div class="rtwvsmlw_dflex rtwvsmlw_card_content">
                                                            <label><?php esc_html_e('color', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label></td>
                                                            <div class="rtwvsmlw_color_square">
                                                            <input name="rtwvsmlw_color_picker<?php echo esc_attr($term->term_id); ?>[]" id="rtwvsmlw_color_picker1" class="rtwvsmlw_color_picker">
                                                            </div>
                                                        </div>
                                                        <div class="rtwvsmlw_dflex rtwvsmlw_card_content">
                                                            <label><?php esc_html_e('action', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
                                                            <div>
                                                                <span data-term_id="<?php echo esc_attr($term->term_id); ?>" class="mdc-button mdc-button--raised mdc-ripple-upgraded rtwvsmlw_clone_btn">
                                                                    <span class="mdc-button__ripple"></span>
                                                                    <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('bookmark'); ?></i>
                                                                    <span class="mdc-button__label"><?php esc_html_e('clone', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                                                </span>
                                                                <span class="mdc-button mdc-button--raised mdc-ripple-upgraded rtwvsmlw_remove_btn">
                                                                    <span class="mdc-button__ripple"></span>
                                                                    <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('remove'); ?></i>
                                                                    <span class="mdc-button__label"><?php esc_html_e('remove', 'rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                	?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php 
							$i++;	
							}
                        }
                        ?>
                    </div>

                    <!-- display type radio -->
                    <div class="rtwvsmlw_display_type_radio_tab_in_color rtwvsmlw_display_type_tab_in_color" data-value="radio">
                    <?php 
						$rtwvsmlw_terms = get_terms($slug);
                        if(is_array($rtwvsmlw_terms) && !empty($rtwvsmlw_terms))
                        {
                            foreach ($rtwvsmlw_terms as $terms => $term) 
                            { 
								?>
                                <div class="mdc-form-field">
                                    <div class="mdc-radio">
                                        <input disabled class="mdc-radio__native-control" type="radio"name="radios">
                                        <div class="mdc-radio__background">
                                            <div class="mdc-radio__outer-circle"></div>
                                            <div class="mdc-radio__inner-circle"></div>
                                        </div>
                                        <div class="mdc-radio__ripple"></div>
                                    </div>
                                    <label><?php echo esc_html($term->name); ?></label>
                                </div>
                            <?php 
                            }
                        }
                        ?>
                    </div>
                    <!-- display type variation image tab -->
                    <div class="rtwvsmlw_display_type_variation_image_tab_in_color rtwvsmlw_display_type_tab_in_color" data-value="variation-image">
                    <?php 
						$rtwvsmlw_terms = get_terms($slug);
                        if(is_array($rtwvsmlw_terms) && !empty($rtwvsmlw_terms))
                        {
                            foreach ($rtwvsmlw_terms as $terms => $term) 
                            { 
								?>
                                <button class="mdc-button mdc-button--raised mdc-ripple-upgraded">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label"><?php echo esc_html($term->name); ?></span>
                                </button>
                            <?php 
                            }
                        }?>
                    </div>

                    <!-- display type theme default tab -->
                    <div class="rtwvsmlw_display_type_theme_default_tab_in_color rtwvsmlw_display_type_tab_in_color"  data-tab="<?php echo esc_attr($slug); ?>"  data-value="theme-default">
                        <?php 
						$rtwvsmlw_terms = get_terms($slug);
                        if(is_array($rtwvsmlw_terms) && !empty($rtwvsmlw_terms))
                        {
                            foreach ($rtwvsmlw_terms as $terms => $term) 
                            { 
								?>
                                <button class="mdc-button mdc-button--raised mdc-ripple-upgraded">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label"><?php echo esc_html($term->name); ?></span>
                                </button>
                            <?php 
                            }
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php 
    }
}
else{

}