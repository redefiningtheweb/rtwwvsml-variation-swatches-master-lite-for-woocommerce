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
<span class="rtwvsmlw_pro_text">
<a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/woocommerce-variation-swatches-master/31750388'); ?>"><?php esc_html_e('Get Pro now','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></a><?php esc_html_e('This feature is available in Pro version','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
<div class="panel-wrap product_data rtwvsmlw_pro_text_overlay">
    <input type="hidden" id="rtwvsmlw_current_user" class="rtwvsmlw_simple_page_data" value="<?php echo esc_attr(get_current_user_id()); ?>">
    <div class="rtwvsmlw_tab_content_card rtwvsmlw_attr_name_card">
        <div class="rtwvsmlw_card_header_row">
        <label><?php esc_html_e('Custom Attribute','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        </div>
        <div class="rtwvsmlw_custome_attr_inner">
            <div class="rtwvsmlw_row">
                <form action="" method="post"  enctype="multipart/form-data">
                    <div>
                        <div class="rtwvsmlw_attr_label">
                            <label class="mdc-text-field mdc-text-field--outlined">
                                <span class="mdc-notched-outline">
                                <span class="mdc-notched-outline__leading"></span>
                                <span class="mdc-notched-outline__notch">
                                    <span class="mdc-floating-label"><?php esc_html_e('Name','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                </span>
                                <span class="mdc-notched-outline__trailing"></span>
                                </span>
                                <input type="text" required name="rtwvsmlw_attr_name_inpt" class="mdc-text-field__input" id="rtwvsmlw_attr_name_inpt">
                            </label>
                        </div>
                        <div>
                            <button class="mdc-button mdc-button--raised mdc-ripple-upgraded rtwvsmlw_attr_save_btn_custom" name="rtwvsmlw_attr_save_btn_custom" id="rtwvsmlw_submit_custom_variation" type="button" value="<?php echo esc_attr(isset($_POST['rtwvsmlw_edit_custom']) ? $_POST['rtwvsmlw_edit_custom'] : 'save'); ?>">
                                <span class="mdc-button__ripple"></span>
                                <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('bookmark');?></i>
                                <span class="mdc-button__label"><?php esc_html_e('submit','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                            </button>
                        </div>
                    </div>
                </form>
                <div>
                    <div class="mdc-data-table">
                        <div class="mdc-data-table__table-container">
                            <table class="mdc-data-table__table" id="rtwvsmlw_attr_details_table">
                                <thead>
                                    <tr class="mdc-data-table__header-row">
                                        <th class="mdc-data-table__header-cell" role="columnheader" scope="col"><strong><?php esc_html_e('Name','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></strong></th>
                                        <th class="mdc-data-table__header-cell" role="columnheader" scope="col"><strong><?php esc_html_e('Action','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></strong></th>
                                    </tr>
                                </thead>
                                <tbody class="mdc-data-table__content">
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rtwvsmlw_tab_content_card rtwvsmlw_attr_name_card">
        <div class="rtwvsmlw_card_header_row">
            <label><?php esc_html_e('Add New Value','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></label>
        </div>
        <div class="rtwvsmlw_custome_attr_inner">
            <form action="" method="post"  enctype="multipart/form-data">
                <div class="rtwvsmlw_row">
                    <div>
                        <div class="rtwvsmlw_attr_label">
                            <label><b><?php esc_html_e('Select Attribute','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></b></label>
                            <select id="rtwvsmlw_selected_attribute" class="rtwvsmlw_attr_select" name="rtwvsmlw_selected_attribute">
                            </select>
                        </div>
                        <div class="rtwvsmlw_attr_label">
                            <label class="mdc-text-field mdc-text-field--outlined">
                                <span class="mdc-notched-outline">
                                <span class="mdc-notched-outline__leading"></span>
                                <span class="mdc-notched-outline__notch">
                                    <span class="mdc-floating-label"><?php esc_html_e('enter value','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                                </span>
                                <span class="mdc-notched-outline__trailing"></span>
                                </span>
                                <input type="text" name="rtwvsmlw_custom_attr_value" class="mdc-text-field__input" id="rtwvsmlw_custom_attr_value">
                            </label>
                        </div>
                        <div>
                            <button class="mdc-button mdc-button--raised mdc-ripple-upgraded"  type="button" value="save" name="rtwvsmlw_attr_value_save_btn_custom" id="rtwvsmlw_submit_custom_variation_value" >
                                <span class="mdc-button__ripple"></span>
                                <i class="material-icons mdc-button__icon" aria-hidden="true"><?php echo esc_html('bookmark');?></i>
                                <span class="mdc-button__label"><?php esc_html_e('submit','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
                            </button>
                        </div>
                    </div>    
                </div>
            </form>
            <div class="mdc-data-table rtwvsmlw_data_table">
                <div class="mdc-data-table__table-container">
                    <table class="mdc-data-table__table" id="rtwvsmlw_attr_details_table">
                        <thead>
                            <tr class="mdc-data-table__header-row">
                                <th class="mdc-data-table__header-cell" role="columnheader" scope="col"><strong><?php esc_html_e('Name', 'rtwvsmlw-variation-swatches-lite-for-woocommerce');?></strong></th>
                                <th class="mdc-data-table__header-cell" role="columnheader" scope="col"><strong><?php esc_html_e('Action', 'rtwvsmlw-variation-swatches-lite-for-woocommerce');?></strong></th>
                            </tr>
                        </thead>
                        <tbody class="mdc-data-table__content">
                        
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>