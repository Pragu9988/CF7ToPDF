<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ktmlabs.com
 * @since             1.0.0
 * @package           cf7_to_pdf
 *
 * @wordpress-plugin
 * Plugin Name:       Cf7 To PDF
 * Plugin URI:        https://ktmlabs.com
 * Description:       This plugin enables the mapping of your CF7 forms to PDF.
 * Version:           1.0.0
 * Author:            Pragyan 
 * Author URI:        https://ktmlabs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cf7-to-pdf
 * Domain Path:       /languages
 */

namespace CF7_TO_PDF;

use CF7_TO_PDF\Inc\Plugin_Bootstrap;

class CF7_TO_PDF
{

    public function __construct()
    {

        $this->define_constants();
        $this->includes();
        $this->plugin_loader();
    }

    public function define_constants()
    {
        global $wpdb;
        defined('CTP_PLUGIN_PATH') || define('CTP_PLUGIN_PATH', untrailingslashit(plugin_dir_path(__FILE__)));
        defined('CTP_PLUGIN_URI') || define('CTP_PLUGIN_URI', untrailingslashit(plugin_dir_url(__FILE__)));
        // defined('CTP_MEMBER_TABLE') || define('CTP_MEMBER_TABLE', $wpdb->prefix . 'ctp_members');
        defined('CTP_FORM_ID') || define('CTP_FORM_ID', 11658);
    }

    public function includes()
    {
        require_once CTP_PLUGIN_PATH . '/inc/helpers/autoloader.php';

        require_once __DIR__ . '/vendor/autoload.php';

        require_once CTP_PLUGIN_PATH . '/inc/helpers/utils.php';
    }

    public function plugin_loader()
    {
        Plugin_Bootstrap::get_instance();
    }
}
new CF7_TO_PDF();
