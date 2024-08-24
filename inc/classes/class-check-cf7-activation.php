<?php

/**
 * Check if CF7 Plugin Active or not
 * 
 * @package cf7_to_pdf
 */

namespace CF7_TO_PDF\Inc;

use CF7_TO_PDF\Inc\Traits\Singleton;

class Check_CF7_Activation
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('admin_init', [$this, 'check_cf7']);
        register_activation_hook(__FILE__, [$this, 'activation_check']);
    }

    public function activation_check()
    {
        if (! $this->is_cf7_active()) {
            deactivate_plugins(plugin_basename(__FILE__));
            wp_die('CF7 To PDF plugin requires Contact Form 7 to be installed and activated.');
        }
    }

    public function check_cf7()
    {
        if (! $this->is_cf7_active()) {
            add_action('admin_notices', [$this, 'admin_notices']);
        }
    }

    private function is_cf7_active()
    {
        if (! function_exists('is_plugin_active')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        return is_plugin_active('contact-form-7/wp-contact-form-7.php');
    }

    public function admin_notices()
    {
?>
        <div class="notice notice-error">
            <p><?php _e('CF7 To PDF plugin requires Contact Form 7 to be installed and activated.', 'my-plugin'); ?></p>
        </div>
<?php
    }
}
