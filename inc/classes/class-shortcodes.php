<?php

/**
 * Shortcodes
 * 
 * @package cf7_to_pdf
 */

namespace CF7_TO_PDF\Inc;

use CF7_TO_PDF\Inc\Traits\Singleton;

class Shortcodes
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks() {}
}
