<?php

/**
 * Bootstrap all classes
 * 
 * @package cf7_to_pdf
 */

namespace CF7_TO_PDF\Inc;

use CF7_TO_PDF\Inc\Traits\Singleton;

class Plugin_Bootstrap
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        Check_CF7_Activation::get_instance();
        Enqueue_Assets::get_instance();
        PDF_Actions::get_instance();
        Shortcodes::get_instance();
    }
}
