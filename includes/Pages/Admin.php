<?php

/**
 * @package Currency Conversion
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallback;
use Includes\Api\Callbacks\SettingsMngrCallback;


class Admin extends BaseController
{
    public $settings;
    public $adminCallback;
    public $settingsCallback;
    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->adminCallback = new AdminCallback();
        $this->settingsCallback = new SettingsMngrCallback();

        $this->setPages();
        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Conversion Plugin',
                'menu_title' => 'Currency Conversion',
                'capability' => 'manage_options',
                'menu_slug' => 'currency_conversion',
                'callback' => array($this->adminCallback, 'adminDashboard'),
                'icon_url' => 'dashicons-update-alt',
                'position' => 110
            )
        );
    }

    public function setSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'currency_conversion',
                'page_title' => 'Convert',
                'menu_title' => 'Convert',
                'capability' => 'manage_options',
                'menu_slug' => 'currency_convert',
                'callback' => array($this->adminCallback, 'convertDash')
            ),
            array(
                'parent_slug' => 'currency_conversion',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'currency_widgets',
                'callback' => array($this->adminCallback, 'widgetsDash')
            )
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'currency_plugin_settings',
                'option_name' => 'widgets_manager',
                'callback' => array($this->settingsCallback, 'sanitizeCheckbox')
            ),
            array(
                'option_group' => 'currency_plugin_settings',
                'option_name' => 'taxonomy_manager',
                'callback' => array($this->settingsCallback, 'sanitizeCheckbox')
            )
        );

        $this->settings->setSettings($args);
    }

    //settign sections that would contain the fields
    public function setSections()
    {
        $args = array(
            array(
                'id' => 'currency_admin_index',
                'title' => 'Settings',
                'callback' => array($this->settingsCallback, 'currencySectionMngr'),
                'page' => 'currency_conversion'
            )
        );

        $this->settings->setSections($args);
    }

    //fields for the settings
    public function setFields()
    {
        $args = array(
            array(
                'id' => 'widgets_manager',
                'title' => 'Activate Widget',
                'callback' => array($this->settingsCallback, 'checkBoxField'),
                'page' => 'currency_conversion',
                'section' => 'currency_admin_index',
                'args' => array(
                    'label_for' => 'widgets_manager',
                    'class' => 'ui-toggle'
                )
            ),
            array(
                'id' => 'taxonomy_manager',
                'title' => 'Activate Taxonomy Manager',
                'callback' => array($this->settingsCallback, 'checkBoxField'),
                'page' => 'currency_conversion',
                'section' => 'currency_admin_index',
                'args' => array(
                    'label_for' => 'taxonomy_manager',
                    'class' => 'ui-toggle'
                )
            )
        );

        $this->settings->setFields($args);
    }
}
