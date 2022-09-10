<?php

/**
 * @package Currency Conversion
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallback;

class Admin extends BaseController
{
    public $settings;
    public $adminCallback;
    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->adminCallback = new AdminCallback();

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
                'option_group' => 'currency_option_group',
                'option_name' => 'text_example',
                'callback' => array($this->adminCallback, 'currencyOptionsGroup')
            ),
            array(
                'option_group' => 'currency_option_group',
                'option_name' => 'first_name'
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'currency_admin_index',
                'title' => 'Settings',
                'callback' => array($this->adminCallback, 'currencySection'),
                'page' => 'currency_conversion'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Example Fields?',
                'callback' => array($this->adminCallback, 'currencyFields'),
                'page' => 'currency_conversion',
                'section' => 'currency_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'first_name',
                'title' => 'First name',
                'callback' => array($this->adminCallback, 'currencyFirstname'),
                'page' => 'currency_conversion',
                'section' => 'currency_admin_index',
                'args' => array(
                    'label_for' => 'first_name',
                    'class' => 'example-class'
                )
            )
        );
        $this->settings->setFields($args);
    }
}
