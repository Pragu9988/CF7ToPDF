<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
/**
 * PDF HTML Body
 */

$grouped_data = get_grouped_data($posted_data);

include(CTP_PLUGIN_PATH . '/inc/views/partials/header.php');

foreach ($grouped_data as $index => $data) {
	if ($index === 'step_1') {
		echo get_step_1_table($data);
	} else if ($index === 'step_2' || $index === 'step_5' || $index === 'step_6' || $index === 'step_7' || $index === 'step_10' || $index === 'step_11') {
		echo get_default_table($data, $index);
	} else if ($index === 'step_3') {
		echo get_step_3_table($data, $index);
	} else if ($index === 'step_4') {
		echo get_step_4_table($data, $index);
	} else if ($index === 'step_8') {
		echo get_step_8_table($data, $index);
	} else if ($index === 'step_9') {
		echo get_step_9_table($data, $index);
	} else if ($index === 'step_12') {
		echo get_step_12_table($data, $index, $posted_data, $uploaded_files);
	} else if ($index === 'step_13') {
		echo get_step_13_table($posted_data, $uploaded_files, $index);
	}
}

include(CTP_PLUGIN_PATH . '/inc/views/partials/footer.php');
