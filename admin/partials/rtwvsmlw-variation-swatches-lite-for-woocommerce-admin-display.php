<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://redefiningtheweb.com/
 * @since      1.0.0
 *
 * @package    Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 * @subpackage Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="rtwvsmlw_main_body">
	<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open" id="rtwvsmlw_sidebar">
		<div class="mdc-drawer__header">
			<h3 class="mdc-drawer__title"><?php global $current_user;
			if(isset($current_user->user_login))
			{
				echo esc_html__('Hello, ','rtwvsmlw-variation-swatches-lite-for-woocommerce') . esc_html($current_user->user_login); ?>
			<?php 
			} ?>
			</h3>
			<a class="rtwvsmlw_sidebar_logo" href="#"><img src="<?php echo esc_url( get_avatar_url(get_current_user_id()) ); ?>" class="img-fluid" alt="image"></a>
		</div>
		<div class="mdc-drawer__content">
			<nav class="mdc-list">
				<a class="mdc-list-item mdc-list-item--activated rtwvsmlw_tab_list rtwvsmlw_active_tab_anchor" href="<?php echo esc_url(admin_url().'admin.php?page=rtwvsmlw_variations#/rtwwvsm_simple');?>" data-value='rtwwvsm_simple'  aria-current="page" data-tab=".rtwvsmlw_simple_variation_tab">
					<span class="mdc-list-item__ripple"></span>
					<i class="material-icons mdc-list-item__graphic" aria-hidden="true"><?php echo esc_html('inbox');?></i>
					<span class="mdc-list-item__text"><?php esc_html_e('Variations Swatches','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
				</a>
				<a class="mdc-list-item rtwvsmlw_tab_list" href="<?php echo esc_url(admin_url().'admin.php?page=rtwvsmlw_variations#/rtwwvsm_advanced');?>" data-value='rtwwvsm_advanced' data-tab=".rtwvsmlw_advance_setting_tab">
					<span class="mdc-list-item__ripple"></span>
					<i class="material-icons mdc-list-item__graphic" aria-hidden="true"><?php echo esc_html('send');?></i>
					<span class="mdc-list-item__text"><?php esc_html_e('Advanced Settings','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </span>
				</a>
				<a class="mdc-list-item rtwvsmlw_tab_list" href="<?php echo esc_url(admin_url().'admin.php?page=rtwvsmlw_variations#/rtwwvsm_shop_page');?>" data-value='rtwwvsm_shop_page' data-tab=".rtwvsmlw_shop_variation_tab">
					<span class="mdc-list-item__ripple"></span>
					<i class="material-icons mdc-list-item__graphic" aria-hidden="true"><?php echo esc_html('shop');?></i>
					<span class="mdc-list-item__text"><?php esc_html_e('Shop Page Variations','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </span>
				</a>
				<a class="mdc-list-item rtwvsmlw_tab_list" href="<?php echo esc_url(admin_url().'admin.php?page=rtwvsmlw_variations#/rtwwvsm_global');?>" data-value='rtwwvsm_global' data-tab=".rtwvsmlw_global_variation_tab">
					<span class="mdc-list-item__ripple"></span>
					<i class="material-icons mdc-list-item__graphic" aria-hidden="true"><?php echo esc_html('public');?></i>
					<span class="mdc-list-item__text"><?php esc_html_e('Global attributes','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
				</a>
				<a class="mdc-list-item rtwvsmlw_tab_list" href="<?php echo esc_url(admin_url().'admin.php?page=rtwvsmlw_variations#/rtwwvsm_custom');?>" data-value='rtwwvsm_custom' data-tab=".rtwvsmlw_custome_variation_tab">
					<span class="mdc-list-item__ripple"></span>
					<i class="material-icons mdc-list-item__graphic" aria-hidden="true"><?php echo esc_html('adjust');?></i>
					<span class="mdc-list-item__text"><?php esc_html_e('Custom attributes','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></span>
				</a>
				<a class="mdc-list-item rtwvsmlw_tab_list" href="<?php echo esc_url(admin_url().'admin.php?page=rtwvsmlw_variations#/rtwwvsm_attributes');?>" data-value='rtwwvsm_attributes' data-tab=".rtwvsmlw_attribute_settings_tab">
					<span class="mdc-list-item__ripple"></span>
					<i class="material-icons mdc-list-item__graphic" aria-hidden="true"><?php echo esc_html('drafts');?></i>
					<span class="mdc-list-item__text"><?php esc_html_e('Attributes Settings','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </span>
				</a>
				<a class="mdc-list-item rtwvsmlw_tab_list" href="<?php echo esc_url(admin_url().'admin.php?page=rtwvsmlw_variations#/rtwwvsm_compare');?>" data-value='rtwwvsm_compare' data-tab=".rtwvsmlw_compare_tab">
					<span class="mdc-list-item__ripple"></span>
					<i class="material-icons mdc-list-item__graphic" aria-hidden="true"><?php echo esc_html('public');?></i>
					<span class="mdc-list-item__text"><?php esc_html_e('Compare with Pro','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?> </span>
				</a>
			</nav>
		</div>
	</aside>

	<div class="mdc-drawer-app-content">
		<header class="mdc-top-app-bar app-bar" id="rtw-app-bar">
			<div class="mdc-top-app-bar__row">
				<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
					<div class="rtwvsmlw_header rtwvsmlw_row">
						<div class="rtwvsmlw_toggle_menu rtwvsmlw_row">
							<button class="mdc-icon-button material-icons mdc-top-app-bar__navigation-icon" title="Home" id="rtwvsmlw_toggle_menu_icon">
								<i class="material-icons" alt="Menu button" ><?php echo esc_html('menu'); ?></i>
							</button>
							
							<span class="rtwvsmlw_header_link">
								<a href="#" class="mdc-list-item"><?php esc_html_e('WooCommerce Variation Swatches Master','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></a>
							</span>
						</div>
						<div class="rtwvsmlw_return_wp_link">
							<a href="<?php echo esc_url( admin_url() ); ?>" class="mdc-list-item"><?php esc_html_e('Return to WordPress','rtwvsmlw-variation-swatches-lite-for-woocommerce'); ?></a>
						</div>
					</div>
				</section>
			</div>
		</header>
		
		<main class="rtwvsmlw-main-content" id="rtw-main-content">
			<div class="mdc-top-app-bar--fixed-adjust">
				<div class="rtwvsmlw_main_page">
					<div class="rtwvsmlw_page_wrapper">
						<div class="mdc-top-app-bar--fixed-adjust">
							<!-- simple tab start -->
							<div class="rtwvsmlw_simple_variation_tab rtwvsmlw_tab_content rtwvsmlw_active_tab rtwvsmlw_tab_content_card">
								<?php include_once(RTWVSMLW_ADMIN_PARTIALS_TABS_DIR.'rtwvsmlw-admin-simple-variation.php'); ?>	
							</div>

							<div class="rtwvsmlw_tab_content rtwvsmlw_tab_content_card rtwvsmlw_advance_setting_tab">
								<?php include_once(RTWVSMLW_ADMIN_PARTIALS_TABS_DIR.'rtwvsmlw-admin-advanced-variation.php'); ?>	
							</div>

							<div class="rtwvsmlw_tab_content rtwvsmlw_tab_content_card rtwvsmlw_shop_variation_tab">
								<?php include_once(RTWVSMLW_ADMIN_PARTIALS_TABS_DIR.'rtwvsmlw-admin-shop-page-variation.php'); ?>	
							</div>
							
							<div class="rtwvsmlw_tab_content rtwvsmlw_global_variation_tab">
								<?php include_once(RTWVSMLW_ADMIN_PARTIALS_TABS_DIR.'rtwvsmlw-admin-global-variation.php'); ?>	
							</div>
							
							<div class="rtwvsmlw_tab_content rtwvsmlw_custome_variation_tab">
								<?php include_once(RTWVSMLW_ADMIN_PARTIALS_TABS_DIR.'rtwvsmlw-admin-custom-variation.php'); ?>	
							</div>

							<div class="rtwvsmlw_tab_content rtwvsmlw_attribute_settings_tab">
								<?php include_once(RTWVSMLW_ADMIN_PARTIALS_TABS_DIR.'rtwvsmlw-admin-attribute-settings.php'); ?>	
							</div>
							
							<div class="rtwvsmlw_tab_content rtwvsmlw_compare_tab rtwvsmlw_tab_content_card">
								<?php include_once(RTWVSMLW_ADMIN_PARTIALS_TABS_DIR.'rtwvsmlw-compare-pro.php'); ?>	
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
</div>