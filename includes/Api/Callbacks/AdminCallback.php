<?php

/**
 * @package Currency Conversion
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

class AdminCallback extends BaseController
{
    public function adminDashboard()
    {
        return require_once ("$this->plugin_path/templates/admin.php");
    }

    public function convertDash()
    {
        return require_once ("$this->plugin_path/templates/convert.php");
    }

    public function widgetsDash()
    {
        return require_once ("$this->plugin_path/templates/widgets.php");
    }

    public function currencyOptionsGroup( $input)
    {
        return $input;
    }

    public function currencySection()
    {
        echo 'check me out!';//CHECK THE GITHUB PLACE FOR WHAT IS HERE!!!
    }

    public function currencyFields()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type = "text" class = "regular-text" name = "text_example" value = "'.$value.'" placeholder = "Write something here pls">';
    }

    public function currencyFirstname()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type = "text" class = "regular-text" name = "first_name" value = "'.$value.'" placeholder = "Write First name">';
    }
}

