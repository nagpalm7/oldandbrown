<?php 







namespace Dicbw\Inc;


require_once dirname(__FILE__) . '/Pages/class-admin.php';

require_once dirname(__FILE__) . '/Base/class-settings-links.php';

require_once dirname(__FILE__) . '/Base/class-shortcode-settings.php';





final class Init

{

    public static function dicbw_get_services()

    {

        return [

            Pages\Admin::class,

            Base\SettingsLink::class,

            Base\ShortcodeSettings::class

        ];

    }



    public static function dicbw_register_services()

    {

        foreach (self::dicbw_get_services() as $class) {

            $service = self::dicbw_instantiate($class);

            if (method_exists($service,'dicbw_register')) {

                $service->dicbw_register();

            }

        }

    }



    public static function dicbw_instantiate($class)

    {

        $service = new $class;

        return $service;

    }

}

