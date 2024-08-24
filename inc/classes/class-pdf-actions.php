<?php

/**
 * PDF Actions
 * 
 * @package cf7_to_pdf
 */

namespace CF7_TO_PDF\Inc;

use CF7_TO_PDF\Inc\Traits\Singleton;
use Mpdf\Mpdf;

class PDF_Actions
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('wpcf7_before_send_mail', [$this, 'wpcf7_pdf_attachment_script']);
    }

    public function wpcf7_pdf_attachment_script()
    {
        $wpcf = \WPCF7_ContactForm::get_current();

        $submission = \WPCF7_Submission::get_instance();
        $unit_tag = $submission->get_meta('unit_tag');
        $posted_data = $submission->get_posted_data();

        $uploaded_files = $submission->uploaded_files();

        $contact_id = $wpcf->id();

        $cf7_pdf_download_link_txt = __('Click here to download PDF', 'generate-pdf-using-contact-form-7');
        // print_r($posted_data);
        // wp_die();

        /**
         * Code to generate PDF
         */
        if (!class_exists('Mpdf')) {
            $margin_header = '10';
            $margin_footer = '10';
            $margin_top = '40';
            $margin_bottom = '40';
            $margin_left = '40';
            $margin_right = '40';
            $bg_image = '';
            $font_size = '9';

            $default = [
                'default_font_size' => $font_size,
                'mode' => 'utf-8',
                'format' => 'A4',
                'margin_header' => $margin_header,
                'margin_top' => $margin_top,
                'margin_footer' => $margin_footer,
                'margin_bottom' => $margin_bottom,
                'default_font' => 'FreeSans',
                'margin_left' => $margin_left,
                'margin_right' => $margin_right,
            ];

            $mpdf = new Mpdf($default);

            $mpdf->autoScriptToLang = true;
            $mpdf->baseScript = 1;
            $mpdf->autoVietnamese = true;
            $mpdf->autoArabic = true;
            $mpdf->autoLangToFont = true;
            $mpdf->SetTitle(get_bloginfo('name'));
            $mpdf->SetCreator(get_bloginfo('name'));
            $mpdf->ignore_invalid_utf8 = true;
            $msg_body = '';

            $current_time = microtime(true);
            $current_time = str_replace(".", "-", $current_time);

            $html = $msg_body;

            // Write some HTML code:
            $mpdf->WriteHTML('Hello World');

            // Output a PDF file directly to the browser
            $mpdf->Output('hello.pdf', "D");
        }
    }

    public function wpcf7_pdf_create_attachment($filename)
    {
        // Check the type of file. We'll use this as the 'post_mime_type'.
        $attached_data = array();
        $filetype = wp_check_filetype(basename($filename), null);
        $filetype['type'] = 'application/pdf';

        // Get the path to the upload directory.
        $wp_upload_dir = wp_upload_dir();

        $attachFileName = $wp_upload_dir['path'] . '/' . basename($filename);
        copy($filename, $attachFileName);

        // Prepare an array of post data for the attachment.
        $attachment = array(
            'guid'           => $attachFileName,
            'post_mime_type' => $filetype['type'],
            'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );


        // Insert the attachment.
        $attached_data['attach_id'] = wp_insert_attachment($attachment, $attachFileName);
        $attached_data['attach_url'] = wp_get_attachment_url($attached_data['attach_id']);

        $file = get_attached_file($attached_data['attach_id'], true);
        $size = 'full';
        $attached_data['absolute_path'] = realpath($file);

        // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        // Generate the metadata for the attachment, and update the database record.
        $attach_data = wp_generate_attachment_metadata($attached_data['attach_id'], $attachFileName);

        wp_update_attachment_metadata($attached_data['attach_id'], $attach_data);
        return $attached_data;
    }
}
