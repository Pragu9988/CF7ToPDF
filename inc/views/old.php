<?php
foreach ($posted_data as $key => $value) :
    $wrapper_class = [
        'column'    => 'col-xs-5',
        'heading'    => ''
    ];
    if (is_array($value)) {
        $wrapper_class = [
            'column'    => 'col-xs-12',
            'heading'    => ''
        ];
    }
    if (!empty($value)) :
?>
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($wrapper_class['column']) ?>"><strong><?php echo get_labels($key) ?></strong></div>
                <?php
                if (is_array($value)) :
                    foreach ($value as $val_key => $val) :
                ?>
                        <div class="col-xs-4">
                            <p><?php echo esc_html($val) ?></p>
                        </div>
                        <?php
                    endforeach;
                else :
                    if (in_array($key, array_keys($uploaded_files))):
                        $file_paths = $uploaded_files[$key];
                        if (!empty($file_paths)) :
                            foreach ($file_paths as $file_key => $file_path) :
                                $file_type = mime_content_type($file_path);

                                if (strpos($file_type, 'image') !== false) {
                                    // Embed image in the PDF
                        ?>
                                    <img src="<?php echo $file_path ?>" style="max-width: 100%; height: auto;">
                                <?php
                                } else {
                                    $file_url = wp_upload_dir()['url'] . '/' . basename($file_path);
                                ?>
                                    <p> <?php echo basename($file_path) ?> <a href="<?php echo esc_url($file_url) ?>" target="_blank">Download <?php echo basename($file_path) ?></a></p>
                                <?php
                                }
                                ?>

                        <?php
                            endforeach;
                        endif;
                    else:
                        ?>
                        <div class="col-xs-6">
                            <p><?php echo esc_html($value) ?></p>
                        </div>
                <?php
                    endif;
                endif ?>
            </div>
        </div>
<?php
    endif;
endforeach;
