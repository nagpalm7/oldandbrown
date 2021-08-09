<?php

/*

Plugin Name: Direct Checkout Button for WooCommerce

Description: You can easily change WooCommerce "Add to cart" button to "Buy now" button by this plugin. WooCommerce Direct Checkout Button plugin will increase your sales.

Version: 1.0

WC requires at least: 3.0.0

WC tested up to: 3.5.3

Author: TechMix

Author URI: https://techmix.xyz/

License: GPLv2 or later

Text Domain: woo-direct-checkout-button

*/



/**

 * Exit if accessed directly

 */

namespace Dicbw\Inc;

defined('ABSPATH') or die();



require_once dirname(__FILE__) . '/inc/init.php';

require_once dirname(__FILE__) . '/inc/Base/class-deactivate.php';


use Dicbw\Inc\Base\Deactivate;


/**
 * The code that runs during plugin deactivate
 */

function deactivate()
{
	Deactivate::deactivate();
}

register_deactivation_hook(__FILE__,'deactivate');



/**

 * initialize all the core classes of the plugin

 */

if (class_exists(Init::class)) {

    Init::dicbw_register_services();

}