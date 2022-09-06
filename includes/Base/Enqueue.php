<?php
/**
 * @package Currency Conversion
 */

namespace Includes\Base;
use \Includes\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    /**
     * enqueue our scripts and styles.
     *
     * @return void
     */
    function enqueue()
    {
        wp_enqueue_style('mypluginstyles', $this->plugin_url .'assets/styles.css');
        wp_enqueue_script('mypluginscript', $this->plugin_url .'assets/scripts.js');
    }
}
