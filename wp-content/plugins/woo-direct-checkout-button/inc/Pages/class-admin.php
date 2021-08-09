<?php 

/**
 * @package direct checkout button for woocommerce
 */
namespace Dicbw\Inc\Pages;

 require_once dirname(__FILE__) . '../../Api/class-settings-api.php';
 require_once dirname(__FILE__) . '../../Api/callbacks/class-admin-callbacks.php';

 use Dicbw\Inc\Api\SettingsApi;
 use Dicbw\Inc\Api\Callbacks\AdminCallbacks;

class Admin
{
    public $settings_api;
    public $callbacks;
    public $subpages = array();

    public function dicbw_register()
    {
        $this->settings_api = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setSubpages();

        $this->setSettings();
	    $this->setSections();
        $this->setFields();
    
        $this->settings_api->addSubpages($this->subpages)->dicbw_register();
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug'   =>  'woocommerce',
                'page_title'    =>  'Direct checkout',
                'menu_title'    =>  'Direct checkout',
                'capability'    =>  'manage_options',
                'menu_slug'     =>  'dicbw_wc_direct_checkout',
                'callback'      =>  array($this->callbacks,'adminDashbaord'),
            ),
        );
    }

    /**
     * set settings 
     */
    public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'dicbw_optons_group',
				'option_name'  => 'dicbw_button_text',
				'callback'     => array($this->callbacks,'dicbwOptionGroup'), 
			),
			array(
				'option_group' => 'dicbw_optons_group',
				'option_name'  => 'dicbw_button_class',
				'callback'     => array($this->callbacks,'dicbwOptionGroup'), 
			),
			array(
				'option_group' => 'dicbw_optons_group',
				'option_name'  => 'dicbw_checkbox_enabled',
				'callback'     => array($this->callbacks,'dicbwOptionGroup'), 
			),


		);
		$this->settings_api->setSettings($args);
    }
    
    /**
     * set sections
     */
    public function setSections()
	{
		$args = array(
			array(
				'id' 		=> 'dicbw_admin_index',
				'title'  	=> 'Settings',
				'callback'  => array($this->callbacks,'dicbwAdminSection'), 
				'page'		=> 'dicbw_wc_direct_checkout'
			),
		);
		$this->settings_api->setSections($args);
    }
    
    /**
     * set fields
     */
    public function setFields()
	{
		$args = array(
			array(
				'id' 		=> 	'dicbw_button_text',
				'title'  	=> 	'Button Text',
				'callback'  => 	array($this->callbacks,'dicbwButtonText'), 
				'page'		=> 	'dicbw_wc_direct_checkout',
				'section'	=>	'dicbw_admin_index',
				'args'		=>	array(
					'label_for'	=>	'dicbw_button_text',
					'class'		=>	'example-class'
				)
			),
			array(
				'id' 		=> 	'dicbw_button_class',
				'title'  	=> 	'Button Class',
				'callback'  => 	array($this->callbacks,'dicbwButtonClass'), 
				'page'		=> 	'dicbw_wc_direct_checkout',
				'section'	=>	'dicbw_admin_index',
				'args'		=>	array(
					'label_for'	=>	'dicbw_button_class',
					'class'		=>	'example-class'
				)
			),
			
			array(
				'id' 		=> 	'dicbw_checkbox_enabled',
				'title'  	=> 	'Enable Skip Cart for ALL Products',
				'callback'  => 	array($this->callbacks,'dicbwOrderEnabled'), 
				'page'		=> 	'dicbw_wc_direct_checkout',
				'section'	=>	'dicbw_admin_index',
				'args'		=>	array(
					'label_for'	=>	'dicbw_checkbox_enabled',
					'class'		=>	'example-class'
				)
			)
			
			

		);
		$this->settings_api->setFields($args);
	}
}
