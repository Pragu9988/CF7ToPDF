<?php

/**
 * Enqueue Assets
 * 
 * @package cf7_to_pdf
 */

namespace CF7_TO_PDF\Inc;

use CF7_TO_PDF\Inc\Traits\Singleton;

class Enqueue_Assets
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_front_assets']);
    }

    public function register_front_assets()
    {
        wp_register_script('plugin-script', CTP_PLUGIN_URI . '/assets/js/cf7-to-pdf.js', [], filemtime(CTP_PLUGIN_PATH . '/assets/js/cf7-to-pdf.js'));
        wp_enqueue_script('plugin-script');

        wp_localize_script('plugin-script', 'config', [
            'ajaxUrl'         => admin_url('admin-ajax.php'),
            'ajaxNonce'       => wp_create_nonce('plugin_init_nonce'),
            'formId'   => CTP_FORM_ID,
        ]);
    }
}
