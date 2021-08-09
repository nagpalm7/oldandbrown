<?php 

/**
 * @package direct checkout button for woocommerce
 */
namespace Dicbw\Inc\Base;

class ShortcodeSettings
{
    public function dicbw_register()
    {
        add_shortcode( 'dicbw', array($this,'dicbwShortcode') );
        /**
         * enable skip cart option
         */
        if(get_option( 'dicbw_checkbox_enabled' ) == 1)
        {
            add_filter( 'woocommerce_add_to_cart_redirect', array($this,'dicbw_reqirect_url') );

        }
        if (empty(get_option( 'dicbw_checkbox_enabled' ))) {
            add_action( 'woocommerce_after_add_to_cart_button', array($this,'dicbwQuickBuyButton'), 31 );
        }
    }

    /**
     * create shortcode method
     */
    public function dicbwShortcode($atts)
    {
        extract(
            shortcode_atts( array(
                "id"  => 0
            ),$atts )
        );

        /**
         * if id not found
         */
        if($id == 0)
        {
            return;
        }

        /**
         * button url
         */
        $url = wc_get_checkout_url() . '?add-to-cart='.$id.'';
        /**
         * onclick url string to url convert
         */
        $onclick = 'onclick="window.location.href=\'' . $url . '\'"';
        return '<button type="button" class="'.get_option( 'dicbw_button_class' ).'" '.$onclick.'>'.get_option( 'dicbw_button_text' ).'</button>';
    }

    /**
     *  add to cart redirect to checkout page method
     */
    public function dicbw_reqirect_url()
    {
        return wc_get_checkout_url();
    }

    /**
     * not skip cart
     * This button replace after add to cart
     */
    public function dicbwQuickBuyButton()
    {
        global $product;
        $id = $product->get_id();
        echo do_shortcode( '[dicbw id="'.$id.'"]' );
    }
}
