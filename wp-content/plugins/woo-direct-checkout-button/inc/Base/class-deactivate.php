<?php 

/**
 * @package direct checkout button for woocommerce
 */
namespace Dicbw\Inc\Base;

class Deactivate
{
    public function deactivate()
    {
        flush_rewrite_rules();
    }   
}
