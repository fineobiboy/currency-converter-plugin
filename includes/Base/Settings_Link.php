<?php

/**
 * @package Currency Conversion
 */

namespace Includes\Base;
use Includes\Base\BaseController;

class Settings_Link extends BaseController
{
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    //  adds a settings link in the plugin menu
    function settings_link($links)
    {
        $settings_link = '<a href = "admin.php?page=currency_conversion">Settings</a>';

        //push the settings link created above into the default wordpress links array and return the new array.
        array_push($links, $settings_link);
        return $links;
    }
}
