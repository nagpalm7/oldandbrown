<?php 



/**

 * @package direct checkout button for woocommerce

 */

namespace Dicbw\Inc\Api\Callbacks;



require_once dirname(__FILE__) . '../../../Base/class-base-controller.php';



use Dicbw\Inc\Base\BaseController;


class AdminCallbacks extends BaseController

{

    public function adminDashbaord()

    {

        return require_once("$this->plugin_path/templates/page-admin.php");

    }



    public function dicbwOptionGroup($input)

    {

        return $input;

    }



    public function dicbwAdminSection()

    {
        #code
    }



     public function dicbwButtonText()

     {

         $value = esc_attr( get_option( 'dicbw_button_text' ) );

         echo '<input type="text" class="regular-text" name="dicbw_button_text" value="'.$value.'" id="dicbw_button_text" placeholder="Type Button Text">';

     }

     

     public function dicbwButtonClass()

     {

         $value = esc_attr( get_option( 'dicbw_button_class' ) );

         echo '<input type="text" class="regular-text" name="dicbw_button_class" value="'.$value.'" id="dicbw_button_class" placeholder="Type Button Class">';

     }



     public function dicbwOrderEnabled()

     {



        $coe = get_option( 'dicbw_checkbox_enabled' );

    $html = '<input type="checkbox" value="1" id="dicbw_checkbox_enabled" name="dicbw_checkbox_enabled" '.checked(1, $coe, false).' />';

    $html .= '<label for="dicbw_checkbox_enabled">This will send ALL products directly to the checkout and skip the cart. if you keep this box uncheck then Add to cart and Buy now button both of working</label>';

     

    echo $html;

        

     }

}

