<?php 

/**
 * @package direct checkout button for woocommerce
 */
namespace Dicbw\Inc\Api;

class SettingsApi
{
    public $admin_subpages = array();
    public $settings = array(); 
    public $sections = array();
    public $fields = array();
    
    public function dicbw_register()
    {
        if (!empty($this->admin_subpages)) {
            add_action( 'admin_menu', array($this,'addAdminMenu') );
        }
        //Set up the hooks to display the shortcode
        add_action('woocommerce_product_after_variable_attributes', array($this, 'show_shortcode_text_variation'), 99, 3 );
        add_action('woocommerce_product_options_general_product_data', array($this, 'show_shortcode_text_simple'), 99 );

        if (!empty($this->settings)) {
            add_action( 'admin_init',array($this,'registerCustomfields') );
        }
    }

    /**
     * get subpages array from pages/class-admin.php
     */
    public function addSubpages( array $page )
    {
        $this->admin_subpages = $page;
        return $this;
    }
    /**
     * create dynamic submenu item method
     */
    public function addAdminMenu()
    {
        foreach ($this->admin_subpages as $subpage) {
            add_submenu_page( $subpage['parent_slug'], $subpage['page_title'], $subpage['menu_title'], $subpage['capability'], $subpage['menu_slug'], $subpage['callback'] );
        }
    }

    /**
     * display shortcode in variation product
     */
    public function show_shortcode_text_variation($loop, $variation_data, $variation)
    {
        $this->generate_shortcode($variation->ID);
    }

    /**
      * get the Id and Display for simple product
      */
    public function show_shortcode_text_simple(){

        global $woocommerce, $post;
        $this->generate_shortcode($post->ID);

    }

    /**
     * Generate shortcode
     */
    public function generate_shortcode($id)
    {
        $general_text =  "<div align='center' style=\"color: red;\"><strong><span style='font-size: 120%'>Direct Checkout Button for Woocommerce</span></strong><BR>";
        $general_text .= "<div>The shortcode for this product is:    [dicbw id=\"" . $id . "\"]</div> </div>";

        echo $general_text;
    }

    /**
     * set input filed settings
     */
    public function setSettings(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }

    /**
     * set input filed Sections
     */
    public function setSections( array $section )
    {
        $this->sections = $section;
        return $this;
    }    

    /**
     * set input filed
     */
    public function setFields( array $field )
    {
        $this->fields = $field;
        return $this;
    }

    /**
     * Add Custom Field by settings api
     */
    public function registerCustomfields()
    {
        /**
         * Register settings
         */
        foreach ($this->settings as $setting) {
            register_setting(  $setting["option_group"], $setting["option_name"], ( isset( $setting["callback"] ) ) ? $setting["callback"] : '' );
        }
        /**
         * Add Sections
         */
        foreach ($this->sections as $section) {
            add_settings_section( $section["id"], $section["title"], $section["callback"], ( isset($section["page"]) ) ? $section["page"] : '' );
        }
        /**
         * Input Fields
         */
        foreach ($this->fields as $field) {
            add_settings_field( $field["id"], $field["title"], $field["callback"], ( isset($field["page"]) ) ? $section["page"] : '', ( isset($field["section"]) ) ? $field["section"] : '',( isset($field["args"]) ) ? $field["args"] : '' );
        }
    }
}
