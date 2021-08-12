<?php

/**
 * Provide a admin area view for the simple variation page
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
    $rtwvsmlw_simple_variation_data = get_option('rtwwvsm_simple_variation_data', array());
?>
<label class="rtwvsmlw_main__tab_heading"><?php esc_html_e('Variations Swatches','rtwvsmlw-variation-swatches-lite-for-woocommerce');?></label>
<input type="hidden" id="rtwvsmlw_current_user" class="rtwwvsm_simple_page_data" value="<?php echo esc_attr(get_current_user_id()); ?>">
<ul class="mdc-list rtwvsmlw_lists">
    <li class="mdc-list-item">
        <label><?php esc_html_e('Enable Swatches variations','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <div class="mdc-form-field">
            <div class="mdc-checkbox">
                <input type="checkbox"
                        class="mdc-checkbox__native-control rtwwvsm_simple_page_data" id="rtwwvsm_simple_enable_swatches_for_single_page" <?php checked( isset($rtwvsmlw_simple_variation_data['rtwwvsm_simple_enable_swatches_for_single_page']) ? $rtwvsmlw_simple_variation_data['rtwwvsm_simple_enable_swatches_for_single_page'] : 0 ); ?> value="1" >
                <div class="mdc-checkbox__background">
                <svg class="mdc-checkbox__checkmark"
                        viewBox="0 0 24 24">
                    <path class="mdc-checkbox__checkmark-path"
                        fill="none"
                        d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                </svg>
                <div class="mdc-checkbox__mixedmark"></div>
                </div>
                <div class="mdc-checkbox__ripple"></div>
            </div>
            <label for="rtwwvsm_simple_enable_swatches_for_single_page"><?php esc_html_e('Enable Swatches Variation on Product Page','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </label>
        </div>
    </li>

    <li class="mdc-list-item">
        <label><?php esc_html_e('Enable Tooltip','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <div class="mdc-form-field">
            <div class="mdc-checkbox">
                <input type="checkbox" class="mdc-checkbox__native-control rtwwvsm_simple_page_data" id="rtwwvsm_simple_enable_tooltip" <?php checked( isset($rtwvsmlw_simple_variation_data['rtwwvsm_simple_enable_tooltip']) ? $rtwvsmlw_simple_variation_data['rtwwvsm_simple_enable_tooltip'] : 0 ); ?> value="1">
                <div class="mdc-checkbox__background">
                <svg class="mdc-checkbox__checkmark"
                        viewBox="0 0 24 24">
                    <path class="mdc-checkbox__checkmark-path"
                        fill="none"
                        d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                </svg>
                <div class="mdc-checkbox__mixedmark"></div>
                </div>
                <div class="mdc-checkbox__ripple"></div>
            </div>
            <label for="rtwwvsm_simple_enable_tooltip"><?php esc_html_e('Enable tooltip on each product attribute','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </label>
        </div>
    </li>

    <li class="mdc-list-item">
        <label><?php esc_html_e('Show Attribute Label','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <div class="mdc-form-field">
            <div class="mdc-checkbox">
                <input type="checkbox"
                        class="mdc-checkbox__native-control rtwwvsm_simple_page_data" id="rtwwvsm_show_attribute_label" <?php checked( isset($rtwvsmlw_simple_variation_data['rtwwvsm_show_attribute_label']) ? $rtwvsmlw_simple_variation_data['rtwwvsm_show_attribute_label'] : 0 ); ?> value="1">
                <div class="mdc-checkbox__background">
                <svg class="mdc-checkbox__checkmark"
                        viewBox="0 0 24 24">
                    <path class="mdc-checkbox__checkmark-path"
                        fill="none"
                        d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                </svg>
                <div class="mdc-checkbox__mixedmark"></div>
                </div>
                <div class="mdc-checkbox__ripple"></div>
            </div>
            <label for="rtwwvsm_show_attribute_label"><?php esc_html_e('Show attribute label on shop and product page.','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>  </label>
        </div>
    </li>

    <li class="rtwvsmlw_d-block">
        <label><?php esc_html_e('shape style','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <div class="mdc-form-field">
            <div class="mdc-radio">
            <input class="mdc-radio__native-control rtwwvsm_simple_page_data" type="radio" id="rtwwvsm_simple_shape_rounded" name="rtwwvsm_simple_shape_style" <?php checked( isset($rtwvsmlw_simple_variation_data['rtwwvsm_simple_shape_style']) ? $rtwvsmlw_simple_variation_data['rtwwvsm_simple_shape_style'] : 0, 'rtwwvsm_simple_shape_rounded' ); ?> value="rtwwvsm_simple_shape_rounded">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
            <div class="mdc-radio__ripple"></div>
            </div>
            <label for="rtwwvsm_simple_shape_rounded"><?php echo esc_html('Rounded shape'); ?></label>
        </div>
        <div class="mdc-form-field">
            <div class="mdc-radio">
            <input class="mdc-radio__native-control rtwwvsm_simple_page_data" type="radio" id="rtwwvsm_simple_shape_square" name="rtwwvsm_simple_shape_style" <?php checked( isset($rtwvsmlw_simple_variation_data['rtwwvsm_simple_shape_style']) ? $rtwvsmlw_simple_variation_data['rtwwvsm_simple_shape_style'] : 0, 'rtwwvsm_simple_shape_square' ); ?> value="rtwwvsm_simple_shape_square">
            <div class="mdc-radio__background">
                <div class="mdc-radio__outer-circle"></div>
                <div class="mdc-radio__inner-circle"></div>
            </div>
            <div class="mdc-radio__ripple"></div>
            </div>
            <label for="rtwwvsm_simple_shape_square"><?php echo esc_html('square shape'); ?></label>
        </div>
    </li>
</ul>
<div class="rtwvsmlw_simple_variation_btn rtwvsmlw_btn">
    <button class="mdc-button mdc-button--raised mdc-ripple-upgraded rtwvsmlw_submit_setting_form">
        <span class="mdc-button__ripple"></span>
        <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('bookmark'); ?></i>
        <span class="mdc-button__label"><?php esc_html_e('save changes','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
    </button>
</div>