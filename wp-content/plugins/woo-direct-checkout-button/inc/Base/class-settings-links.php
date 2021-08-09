<?php 

/**
 * @package direct checkout button for woocommerce
 */
namespace Dicbw\Inc\Base;

require_once dirname(__FILE__) . '/class-base-controller.php';

 class SettingsLink extends BaseController
 {
     public function dicbw_register()
     {
        add_filter('plugin_action_links_'.$this->plugin_name,array($this,'settingsLinkText'));
     }

     public function settingsLinkText($links)
     {
        $url = esc_url(
            add_query_arg(
               'page',
               'dicbw_wc_direct_checkout',
               get_admin_url() . 'admin.php'
            )
        );
        $settings_link = '<a href="'.$url.'">Settings</a>';
        array_push($links,$settings_link);
        return $links;
     }
 }