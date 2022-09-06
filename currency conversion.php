<?php

/**
 * Plugin Name:       Currency Converter
 * Plugin URI:        TBA
 * Description:       Change currencies from one to another. Ex. from USD to EURO.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Obi Okoye
 * Author URI:        TBA
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        TBA
 * Text Domain:       TBA
 * Domain Path:       TBA
 */

/*
Currency Converter is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Currency Converter is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Currency Converter. If not, see {URI to Plugin License}.
*/

/**
 * Main php file.
 * 
 * @package Currency Conversion
 */

//if the file is not called by wordpress then close everything
if (!defined('ABSPATH')) {
    die;
}

//Require the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

//The activation and deactivation hooks that run when the plugin is started
function activate_conversion_plugin()
{
    Includes\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_conversion_plugin');

function deactivate_conversion_plugin()
{
    Includes\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_conversion_plugin');

if (class_exists('Includes\\Init')) {
    Includes\Init::register_classes();
}
