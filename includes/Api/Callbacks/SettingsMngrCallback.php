<?php

/**
 * @package Currency Conversion
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

class SettingsMngrCallback extends BaseController
{
    //sanitize the checkboxes so nothing weird can be injected in through the checkboxes.
    public function sanitizeCheckbox( $input)
    {
        //return filter_var($input, FILTER_SANITIZE_NUMBER_INT);// filters for only numbers 0 or 1
        return (isset($input) ? true : false);//checks if the checkbox was checked properly or not
    }

    //function to echo a message for the top of the section
    public function currencySectionMngr()
    {
        echo 'Choose what sections to activate';
    }

    /**
     * Makes a checkbox for the different settings fields
     *
     * @param array $args  gotten from the settings fields in Admin.php
     * then echo the checkbox
     */
    public function checkBoxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $checkBox = get_option($name);
        echo '<input type = "checkbox" name = "' . $name . '" value = "1" class = "' . $classes . '" ' . ($checkBox ? 'checked' : '') .'>';
    }
}

