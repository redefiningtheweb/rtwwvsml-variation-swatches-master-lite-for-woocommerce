<?php

/**
 * Provide a admin area view for the shop page variation
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
    $rtwvsmlw_shop_page_variation_data = get_option('rtwwvsm_shop_page_variation_data', array());
?>
<span class="rtwvsmlw_pro_text">
<a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/woocommerce-variation-swatches-master/31750388'); ?>"><?php esc_html_e('Get Pro now','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></a><?php esc_html_e('This feature is available in Pro version','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
<div class="panel-wrap product_data rtwvsmlw_pro_text_overlay">
    <label class="rtwvsmlw_main__tab_heading"> <?php esc_html_e('shop page variation','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
    <input type="hidden" id="rtwvsmlw_current_user" class="rtwvsmlw_simple_page_data" value="<?php echo esc_attr(get_current_user_id()); ?>">
    <ul class="mdc-list rtwvsmlw_lists">
        <li class="mdc-list-item">
            <label><?php esc_html_e('Enable Swatches Variation','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
            <div class="mdc-form-field">
                <div class="mdc-checkbox">
                    <input type="checkbox" class="mdc-checkbox__native-control rtwwvsm_shop_page_page_data" id="rtwwvsm_shop_enable_swatches" <?php checked( isset($rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_enable_swatches'])? $rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_enable_swatches'] : 0 ); ?> value="1">
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
                <label for="rtwwvsm_shop_enable_swatches">  <?php esc_html_e('Enable to show Swatches on shop / archive page','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </label>
            </div>
        </li>
        <li class="rtwvsmlw_d-block">
            <label><?php esc_html_e('display behaviour','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
            <div class="mdc-form-field">
                <div class="mdc-radio">
                <input class="mdc-radio__native-control rtwwvsm_shop_page_page_data" type="radio" id="rtwwvsm_shop_before_cart" name="rtwwvsm_shop_display_position" <?php checked( isset($rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_display_position'])? $rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_display_position'] : 0, 'rtwwvsm_shop_before_cart' ); ?>>
                <div class="mdc-radio__background">
                    <div class="mdc-radio__outer-circle"></div>
                    <div class="mdc-radio__inner-circle"></div>
                </div>
                <div class="mdc-radio__ripple"></div>
                </div>
                <label for="rtwwvsm_shop_before_cart"> <?php esc_html_e('Before add to cart button','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
            </div>
            <div class="mdc-form-field">
                <div class="mdc-radio">
                <input class="mdc-radio__native-control rtwwvsm_shop_page_page_data" type="radio" id="rtwwvsm_shop_after_cart" name="rtwwvsm_shop_display_position" <?php checked( isset($rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_display_position'])? $rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_display_position'] : 0, 'rtwwvsm_shop_after_cart' ); ?>>
                <div class="mdc-radio__background">
                    <div class="mdc-radio__outer-circle"></div>
                    <div class="mdc-radio__inner-circle"></div>
                </div>
                    <div class="mdc-radio__ripple"></div>
                </div>
                <label for="rtwwvsm_shop_after_cart"><?php esc_html_e('after add to cart button','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </label>
            </div>
            <p class="rtwvsmlw_notice_info"><?php esc_html_e('Show archive swatches position.','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
            <p class="rtwvsmlw_warning_info rtwvsmlw_notice_info"><?php esc_html_e('Note: Some theme remove default woocommerce hooks that why it\'s may not work each theme.','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
        </li>
        <li class="mdc-list-item">
            <label><?php esc_html_e('Enable tooltip','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
            <div class="mdc-form-field">
                <div class="mdc-checkbox">
                    <input type="checkbox"
                            class="mdc-checkbox__native-control rtwwvsm_shop_page_page_data" id="rtwwvsm_shop_enable_tooltip" <?php checked( isset($rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_enable_tooltip'])? $rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_enable_tooltip'] : 0 ); ?> value="1">
                    <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                    </div>
                    <div class="mdc-checkbox__ripple"></div>
                </div>
                <label for="rtwwvsm_shop_enable_tooltip">  <?php esc_html_e('Show tooltip on shop / archive page','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </label>
            </div>
        </li>
        <li class="mdc-list-item">
            <label><?php esc_html_e('Show clear link','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
            <div class="mdc-form-field">
                <div class="mdc-checkbox">
                    <input type="checkbox"
                            class="mdc-checkbox__native-control rtwwvsm_shop_page_page_data" id="rtwwvsm_shop_clear_link" <?php checked( isset($rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_clear_link'])? $rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_clear_link'] : 0 ); ?> value="1">
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
                <label for="rtwwvsm_shop_clear_link">  <?php esc_html_e('Show clear link on archive / shop page','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </label>
            </div>
        </li>
        <li class="rtwvsmlw_padding_16">
            <label><?php esc_html_e('width','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
            <label class="mdc-text-field mdc-text-field--outlined">
                <span class="mdc-notched-outline">
                <span class="mdc-notched-outline__leading"></span>
                <span class="mdc-notched-outline__notch">
                    <span class="mdc-floating-label"><?php esc_html_e('item Width','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                </span>
                <span class="mdc-notched-outline__trailing"></span>
                </span>
                <input type="text" class="mdc-text-field__input rtwwvsm_shop_page_page_data" value="<?php echo isset($rtwvsmlw_shop_page_variation_data['rtwwvsm_advance_shop_width']) ? esc_attr($rtwvsmlw_shop_page_variation_data['rtwwvsm_advance_shop_width']) : ''; ?>" id="rtwwvsm_advance_shop_width">
            </label>
            <p class="rtwvsmlw_notice_info"><?php esc_html_e('Variation item width','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
        </li>
        <li class="rtwvsmlw_padding_16">
            <label><?php esc_html_e('height','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
            <label class="mdc-text-field mdc-text-field--outlined">
                <span class="mdc-notched-outline">
                <span class="mdc-notched-outline__leading"></span>
                <span class="mdc-notched-outline__notch">
                    <span class="mdc-floating-label"><?php esc_html_e('item height','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                </span>
                <span class="mdc-notched-outline__trailing"></span>
                </span>
                <input type="text" class="mdc-text-field__input rtwwvsm_shop_page_page_data" id="rtwwvsm_advance_shop_height" value="<?php echo isset($rtwvsmlw_shop_page_variation_data['rtwwvsm_advance_shop_height']) ? esc_attr($rtwvsmlw_shop_page_variation_data['rtwwvsm_advance_shop_height']) : ''; ?>">
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
                <input type="text" class="mdc-text-field__input rtwwvsm_shop_page_page_data" id="rtwwvsm_shop_font-size" value="<?php echo isset($rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_font-size']) ? esc_attr($rtwvsmlw_shop_page_variation_data['rtwwvsm_shop_font-size']) : ''; ?>">
            </label>
            <p class="rtwvsmlw_notice_info"><?php esc_html_e('Single product variation item font size','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></p>
        </li>
    </ul>
    <div class="rtwvsmlw_shoppage_btn rtwvsmlw_btn">
        <button class="mdc-button mdc-button--raised rtwvsmlw_submit_setting_form">
            <span class="mdc-button__ripple"></span>
            <i class="material-icons mdc-button__icon" aria-hidden="true"
            ><?php echo esc_html('bookmark');?></i
            >
            <span class="mdc-button__label"><?php esc_html_e('save changes','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
        </button>
    </div>
</div>