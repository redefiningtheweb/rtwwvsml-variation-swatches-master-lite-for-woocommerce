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
?>
<label class="rtwvsmlw_main__tab_heading"><?php esc_html_e('Advance settings','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
<input type="hidden" id="rtwvsmlw_current_user" class="rtwvsmlw_simple_page_data" value="<?php echo esc_attr(get_current_user_id()); ?>">
<ul class="mdc-list rtwvsmlw_lists">
    <li class="mdc-list-item">
        <label><?php esc_html_e('Display Border on Selected Variation','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <div class="mdc-form-field">
            <div class="mdc-checkbox">
                <input type="checkbox"
                        class="mdc-checkbox__native-control rtwwvsm_advanced_page_data" id="rtwwvsm_advance_display_border" <?php checked( isset( $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_display_border'] ) ? $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_display_border'] : 0); ?> value="1">
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
            <label for="rtwwvsm_advance_display_border"><?php esc_html_e('Enable to display border on selected attribute','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>  </label>
        </div>
    </li>
    <li class="mdc-list-item">
        <label><?php esc_html_e('hide add to card on shop page','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </label>
        <div class="mdc-form-field">
            <div class="mdc-checkbox">
                <input type="checkbox"
                        class="mdc-checkbox__native-control rtwwvsm_advanced_page_data" id="rtwwvsm_advance_hide_add_cart_btn" <?php checked( isset( $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_hide_add_cart_btn'] ) ? $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_hide_add_cart_btn'] : 0); ?> value="1">
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
            <label for="rtwwvsm_advance_hide_add_cart_btn"><?php esc_html_e('Enable to Hide add to cart button from shop page','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> <p class="rtwvsmlw_warning_info rtwvsmlw_notice_info"><?php esc_html_e('(Pro feature)','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p></label>
        </div>
    </li>
    <li class="rtwvsmlw_d-block">
        <label><?php esc_html_e('attribute behaviour','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <div class="mdc-form-field">
            <div class="mdc-radio">
                <input class="mdc-radio__native-control rtwwvsm_advanced_page_data" type="radio" id="rtwwvsm_advance_blur_with_cross" name="rtwwvsm_advance_attribute_behaviour" <?php checked( isset( $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour'] ) ? $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour'] : 0, 'rtwwvsm_advance_blur_with_cross'); ?> value="rtwwvsm_advance_blur_with_cross">
                <div class="mdc-radio__background">
                    <div class="mdc-radio__outer-circle"></div>
                    <div class="mdc-radio__inner-circle"></div>
                </div>
                <div class="mdc-radio__ripple"></div>
            </div>
            <label for="rtwwvsm_advance_blur_with_cross"><?php esc_html_e('Blur with cross ','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?><p class="rtwvsmlw_warning_info rtwvsmlw_notice_info"><?php esc_html_e('(Pro feature)','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p></label>
        </div>
        <div class="mdc-form-field">
            <div class="mdc-radio">
                <input class="mdc-radio__native-control rtwwvsm_advanced_page_data" type="radio" id="rtwwvsm_advance_blur_without_cross" name="rtwwvsm_advance_attribute_behaviour" <?php checked( isset( $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour'] ) ? $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour'] : 0, 'rtwwvsm_advance_blur_without_cross'); ?> value="rtwwvsm_advance_blur_without_cross">
                <div class="mdc-radio__background">
                    <div class="mdc-radio__outer-circle"></div>
                    <div class="mdc-radio__inner-circle"></div>
                </div>
                <div class="mdc-radio__ripple"></div>
            </div>
            <label for="rtwwvsm_advance_blur_without_cross"><?php esc_html_e('Blur without cross ','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>
            <p class="rtwvsmlw_warning_info rtwvsmlw_notice_info"><?php esc_html_e('(Pro feature)','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p></label>
        </div>
        <div class="mdc-form-field">
            <div class="mdc-radio">
                <input class="mdc-radio__native-control rtwwvsm_advanced_page_data" type="radio" id="rtwvsmlw_advance_hide" name="rtwwvsm_advance_attribute_behaviour" <?php checked( isset( $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour'] ) ? $rtwvsmlw_advanced_variation_data['rtwwvsm_advance_attribute_behaviour'] : 0, 'rtwvsmlw_advance_hide'); ?> value="rtwvsmlw_advance_hide">
                <div class="mdc-radio__background">
                    <div class="mdc-radio__outer-circle"></div>
                    <div class="mdc-radio__inner-circle"></div>
                </div>
                <div class="mdc-radio__ripple"></div>
            </div>
            <label for="rtwvsmlw_advance_hide"><?php esc_html_e('Hide','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        </div>
        <p class="rtwvsmlw_notice_info"><?php esc_html_e('Disabled attribute will be hide / blur.','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
        <p class="rtwvsmlw_warning_info rtwvsmlw_notice_info"><?php esc_html_e('Note: Product variation loaded via ajax might affect this feature','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?>.</p>
    </li>
    <li class="rtwvsmlw_padding_16">
        <label><?php esc_html_e('width','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <label class="mdc-text-field mdc-text-field--outlined">
            <span class="mdc-notched-outline">
            <span class="mdc-notched-outline__leading"></span>
            <span class="mdc-notched-outline__notch">
                <span class="mdc-floating-label"><?php esc_html_e('width','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
            </span>
            <span class="mdc-notched-outline__trailing"></span>
            </span>
            <input type="text" class="mdc-text-field__input rtwwvsm_advanced_page_data" value="<?php echo isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_width'])? esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_width']):''; ?>" id="rtwwvsm_advance_variation_width">
        </label>
        <p class="rtwvsmlw_notice_info"><?php esc_html_e('Variation item width','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
    </li>
    <li class="rtwvsmlw_padding_16">
        <label><?php esc_html_e('height','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <label class="mdc-text-field mdc-text-field--outlined">
            <span class="mdc-notched-outline">
            <span class="mdc-notched-outline__leading"></span>
            <span class="mdc-notched-outline__notch">
                <span class="mdc-floating-label"><?php esc_html_e('height','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
            </span>
            <span class="mdc-notched-outline__trailing"></span>
            </span>
            <input type="text" class="mdc-text-field__input rtwwvsm_advanced_page_data" value="<?php echo isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_height'])? esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_variation_height']):''; ?>" id="rtwwvsm_advance_variation_height">
        </label>
        <p class="rtwvsmlw_notice_info"><?php esc_html_e('Variation item height','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
    </li>
    <li class="rtwvsmlw_padding_16">
        <label><?php esc_html_e('font size','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        <label class="mdc-text-field mdc-text-field--outlined">
            <span class="mdc-notched-outline">
            <span class="mdc-notched-outline__leading"></span>
            <span class="mdc-notched-outline__notch">
                <span class="mdc-floating-label"><?php esc_html_e('font size','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
            </span>
            <span class="mdc-notched-outline__trailing"></span>
            </span>
            <input type="text" class="mdc-text-field__input rtwwvsm_advanced_page_data" value="<?php echo isset($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_font-size'])? esc_attr($rtwvsmlw_advanced_variation_data['rtwwvsm_advance_font-size']):''; ?>" id="rtwwvsm_advance_font-size">
        </label>
        <p class="rtwvsmlw_notice_info"><?php esc_html_e('Single product variation item font size','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
    </li>
    ?>
</ul>
<div class="rtwvsmlw_advance_setting_btn rtwvsmlw_btn">
    <button class="mdc-button mdc-button--raised rtwvsmlw_submit_setting_form">
        <span class="mdc-button__ripple"></span>
        <i class="material-icons mdc-button__icon" aria-hidden="true"
        ><?php echo esc_html('bookmark');?></i>
        <span class="mdc-button__label"><?php esc_html_e('Submit','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
    </button>
</div>