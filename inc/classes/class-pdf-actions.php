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

        // print_r($posted_data);

        $uploaded_files = $submission->uploaded_files();

        if ($uploaded_files) {
            foreach ((array) $uploaded_files as $name => $path) {
                if (! empty($path)) {
                    $file_name = basename($path[0]);
                    $msg_body = str_replace('[' . $name . ']', $file_name, $msg_body);
                }
            }
        }

        $contact_id = $wpcf->id();

        if ($contact_id != CTP_FORM_ID) {
            return $wpcf;
        }

        $cf7_pdf_download_link_txt = __('Click here to download PDF', 'cf7-to-pdf');

        $pdf_filename_prefix = 'CF7';
        $current_time = microtime(true);
        $current_time = str_replace(".", "-", $current_time);

        /**
         * Code to generate PDF
         */
        if (!class_exists('Mpdf')) {
            $margin_header = '10';
            $margin_footer = '10';
            $margin_top = '16';
            $margin_bottom = '16';
            $margin_left = '15';
            $margin_right = '15';
            $bg_image = '';
            $font_size = '10';


            $default = [
                'default_font_size' => $font_size,
                'mode' => 'utf-8',
                'format' => 'A4',
                'margin_header' => $margin_header,
                'margin_top' => $margin_top,
                'margin_footer' => $margin_footer,
                'margin_bottom' => $margin_bottom,
                'default_font' => 'DejaVuSans',
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
            ob_start();
            include(CTP_PLUGIN_PATH . '/inc/views/pdf-html.php');
            $msg_body = ob_get_clean();
            $stylesheet = file_get_contents(CTP_PLUGIN_PATH . '/assets/css/cf7-to-pdf.css');
            // $bootstrap_css = file_get_contents(CTP_PLUGIN_PATH . '/assets/css/mpdf-bootstrap.css');

            $html = $msg_body;

            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
            // $mpdf->WriteHTML($bootstrap_css, \Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML($html);

            if (
                $pdf_filename_prefix != ''
            ) {
                $pdf_file_name = $pdf_filename_prefix . '-' . $current_time . '.pdf';
            } else {
                $pdf_file_name = 'cf7-' . $contact_id . '-' . $current_time . '.pdf';
            }

            foreach ((array) $uploaded_files as $name => $path) {

                if (! empty($path)) {
                    $xmlFile = pathinfo($path[0]);
                    $path_dir_cf7 =  $xmlFile['dirname'];
                }
            }

            $attachment_data = $this->wpcf7_pdf_create_attachment($pdf_file_name);

            // Output a PDF file directly
            $mpdf->Output($attachment_data['absolute_path'], 'F');

            if (!empty($attachment_data['attach_url'])) {
                $cookie_name = "cf7_pdf_path";
                $cookie_value = $attachment_data['attach_url'];
                //86400 = 1 day
                setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/");
                //86400 = 1 day
                setcookie('cf7_pdf_download_link_txt', $cf7_pdf_download_link_txt, time() + (86400 * 1), "/");
                //86400 = 1 day
                setcookie('wp-unit_tag', $unit_tag, time() + (86400 * 1), "/");
            }

            $mail = $wpcf->prop('mail');

            if (file_exists($attachment_data['absolute_path'])) {
                if ($mail['attachments']) {
                    $attachment_main = $mail['attachments'] . PHP_EOL . $attachment_data['absolute_path'];
                } else {
                    $attachment_main = $attachment_data['absolute_path'];
                }
                $mail['attachments'] = $attachment_main;
            }
            $wpcf->set_properties([
                'mail'  => $mail
            ]);
        }
        return $wpcf;
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
        $attached_data['absolute_path'] = $file;

        // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        // Generate the metadata for the attachment, and update the database record.
        $attach_data = wp_generate_attachment_metadata($attached_data['attach_id'], $attachFileName);

        wp_update_attachment_metadata($attached_data['attach_id'], $attach_data);
        return $attached_data;
    }
}
