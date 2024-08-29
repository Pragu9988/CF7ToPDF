<?php

function get_label($key)
{
    $labels_mappings = [
        'NameofGrant'      => 'Name of Grant',
        'name_of_pi'       => 'Name of Principal Investigator',
        'address_of_pi'     => 'Address of Principal Investigator',
        'gender'           => 'Gender',
        'date_of_birth'    => 'Date of Birth',
        'mobile_number'    => 'Mobile Number',
        'email'           => 'Email Address',
        'collage'         => 'Affiliated Collage',
        'certification'  => 'Year of Certification',
        'date_of_council'          => 'Date of Council',
        'nmc_number'              => 'Academic Degrees',
        'nmc_number'    => 'NMC/NNC Number',
        'nepas_member_number'    => 'NEPAS Membership Number',
        'nodal_center'    => 'Nodal Centre for Research',
        'sub_center'    => 'Sub Centre for Research',
        'name_of_supervisor'    => 'Name of Supervisor',
        'address_of_supervisor'    => 'Address of Supervisor',
        'affiliated_institution'    => 'Supervisor Affiliated Institution',
        'designation_of_supervisor'    => 'Designation of Supervisor',
        'signature_of_supervisor'    => 'Signature of Supervisor',
        'supervisor_mn'    => 'Supervisor Mobile Number',
        'supervisor_email'    => 'Supervisor E-Mail',
        'supervisior_nmc'    => 'Supervisor NMC/NNC Number',
        'supervisior-nmn'    => 'Supervisor NEPAS Membership Number',
        'supervisior_bank_acount'    => 'Bank Account Number of PI',
        'name_of_bank'    => 'Bank Name',
        'branch'    => 'Branch',
        'pan_number'    => 'PAN Number of PI',
        // step 3 research team
        'principle-name'    => 'Principal Investigator Name',
        'principle-qualification'    => 'Principal Investigator Qualification',
        'principle-affiliation'    => 'Principal Investigator Affiliation',
        'supervisor-name'    => 'Supervisor Name',
        'supervisor-qualification'    => 'Supervisor Qualification',
        'supervisor-affiliation'    => 'Supervisor Affiliation',
        'co-supervisor-name'    => 'Co-Supervisor Name',
        'co-supervisor-qualification'    => 'Co-Supervisor Qualification',
        'co-supervisor-affiliation'    => 'Co-Supervisor Affiliation',

        'investigtor-name-1'    => 'Investigator Name',
        'investigtor-qualification-1'    => 'Investigator Qualification',
        'investigtor-affiliation-1'    => 'Investigator Affiliation',

        'investigtor-name-2'    => 'Investigator Name',
        'investigtor-qualification-2'    => 'Investigator Qualification',
        'investigtor-affiliation-2'    => 'Investigator Affiliation',

        'investigtor-name-3'    => 'Investigator Name',
        'investigtor-qualification-3'    => 'Investigator Qualification',
        'investigtor-affiliation-3'    => 'Investigator Affiliation',

        // part Iv project summary
        'project_summary'    => 'Project Summary',
        'scope_of_problem'    => 'Scope of Problem',
        'literature_review'    => 'Literature Review',
        'why_study_needs'    => 'Why This Study Needs to be Done?',
        'theoretical_basis'    => 'Theoretical Basis',
        'long_tems_uses_reasearch'    => 'Long Term Uses of Research',
        'aim_objective'    => 'Aim & Objectives',
        'out_come_of_study'    => 'Outcome of the Study',

        // part v  Methodology
        'study_design'    => 'Study Design',
        'duration_of_the_study'    => 'Duration of the study',
        'inclusion_criteria'    => 'Inclusion Criteria',
        'exclusion_criteria'    => 'Exclusion Criteria',
        'sampaling_methods_size_calculation'    => 'Sampling Method & Size calculation',
        'details_of_subject_enrollment_procedure'    => 'Details Of Subject Enrollment procedure',
        'data_collection_procedure_tool'    => 'Data Collection Procedure &Tool',
        'training_procedure_for_data_collector'    => 'Training Procedure for Data Collector',
        'facility_and_equipment_access'    => 'Facility and Equipment Access',
        'procedures_for_working_with_hazardous_materials'    => 'Procedures for Working with Hazardous Materials /Situations (if any',
        'registration_of_clinical_trials_in_registry'    => 'Registration of Clinical Trials in Registry',

        'informed_consent_and_voluntary_participation'    => 'Informed Consent and Voluntary Participation',
        'confidentiality_of_thesubject'    => 'Confidentiality of the subject',
        'involvement_of_vulnerable_group'    => 'Involvement of Vulnerable group',
        'Plan_for_provision_of_coverage_for_medical_risk'    => 'Plan for provision of coverage for medical risk',
        'limitations'    => 'Limitations',
        'provision_for_dissemination_ofResearch_result'    => 'Provision for Dissemination of Research Result',

        // Part VI: References
        'reference'    => 'References',
        // part viI

        //timeline
        'activity'    => 'Activity',
        'project_date'    => 'Projected Date',

        // part VII Budget Overview in Nepali Rupees (NRS)
        'description'    => 'Description',
        'price'    => 'Price',
        'quantity'    => 'Quantity',
        'total'    => 'Total',



        // PART IX
        'statistical_consideration'    => 'Statistical Consideration',
        'institutional_approval'    => 'Institutional Approval (IRB)',
        'conflict_of_interest'    => 'Conflict of Interest',
        'participant_information_sheet'    => 'Participant Information Sheet (PIS) & Consent Form',
        'case_recod_form'    => 'Case Recod Form(CRF)',

        // part x
        'other_information'    => 'Other Information',

        // signature of investigator

        'investigators_name'    => 'Investigators Name',
        'investigator_signature'    => 'Investigators Signature',
        // Add other labels Map
    ];

    return $labels_mappings[$key] ?? $key;
}

function get_table_header($key)
{
    $headers_mappings = [
        'step_1'    => ['part'  => 'PART I', 'title' => 'Name of Grant'],
        'step_2'    => ['part' =>  'PART II', 'title' => 'Details of Applicant'],
        'step_3'    => ['part' =>  'PART III', 'title' => 'Research Team'],
        'step_5'    => ['part' => 'PART V', 'title' => 'Methodology'],
        'step_6'    => ['part' => 'PART VI', 'title' => 'Ethical Issues'],
        'step_7'    => ['part' => 'PART VII', 'title' => 'References'],
        'step_8'    => ['part' => 'PART VIII', 'title' => 'Timeline'],
        'step_9'    => ['part' => 'PART IX', 'title' => 'Budget Overview in Nepali Rupees (Nrs)'],
        'step_10'    => ['part' => 'PART X', 'title' => ''],
        'step_11'    => ['part' => 'PART XI', 'title' => 'Other Information'],
        'step_12'    => ['part' => 'PART XII', 'title' => 'Signatures of Investigators'],
        'step_13'    => ['part' => 'PART XII', 'title' => 'Appendix'],
    ];

    return $headers_mappings[$key] ?? $key;
}

function get_grouped_data($array)
{
    $end_keys = [
        'nps_step_1',
        'nps_step_2',
        'nps_step_3',
        'nps_step_4',
        'nps_step_5',
        'nps_step_6',
        'nps_step_7',
        'nps_step_8',
        'nps_step_9',
        'nps_step_10',
        'nps_step_11',
        'nps_step_12',
        'nps_step_13',
    ];
    $grouped = [];
    $keys = array_keys($array);
    $prev_end_key = null;
    $index = 0;

    foreach ($end_keys as $end_key) {
        $group = "step_" . ($index + 1);
        $grouped[$group] = [];

        $start_key = $prev_end_key ? array_search($prev_end_key, $keys) + 1 : 0;

        $end_key_index = array_search($end_key, $keys);

        for ($i = $start_key; $i <= $end_key_index; $i++) {
            $key = $keys[$i];
            $value = $array[$key];
            if ($value !== '') {
                $grouped[$group][$key] = $value;
            }
        }

        $prev_end_key = $end_key;

        $index++;
    }

    return $grouped;
}

function get_step_1_table($data)
{
    $grants = [
        "Sardar Bishnu Mani Acharya Research Grant for UG Students/Interns/MOs.",
        "Mrigendra-Samjhana Paediatrics Research Grant for PG Students/MOs/Junior Paediatricians",
        "NEPAS Research Grant for Young Paediatric Researchers",
        "NEPAS Child Health Research Grant for Practicing Paediatricians",
        "NEPAS Research Grant for Paediatric Nurses"
    ];
    ob_start();
    // Initialize an empty string to store the HTML content
?>
    <h4>PART I</h4>
    <table>
        <tr>
            <th>Name of Grant</th>
            <th>Tick</th>
        </tr>
        <?php

        // Iterate over each grant and build the table rows
        foreach ($grants as $grant) {
            $tick = strtolower(trim($grant)) === strtolower(trim($data['NameofGrant'][0])) ? '✔' : ''; // Compare with the selected grant from $data
        ?>
            <tr>
                <td><?php echo htmlspecialchars($grant, ENT_QUOTES, 'UTF-8') ?></td>
                <td style="font-family: DejaVuSans; text-align: center;"><?php echo $tick ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php

    // Close the table tag
    $html = ob_get_contents();
    ob_end_clean();
    // Return the generated HTML
    return $html;
}

function get_default_table($data, $index = '', $headers = null)
{
    ob_start();
?>
    <h4><?php echo get_table_header($index)['part'] ?></h4>
    <table>
        <tr>
            <th colspan="2"><?php echo get_table_header($index)['title'] ?></th>
        </tr>
        <?php
        if (!empty($headers)) {
            foreach ($headers as $index => $header) {
                $colSpan = isset($header['colSpan']) ? $header['colSpan'] : 1;
        ?>
                <tr>
                    <th colspan="<?php echo $colSpan ?>"><?php echo $header['title'] ?></th>
                </tr>
            <?php
            }
        }


        // Iterate over each grant and build the table rows
        foreach ($data as $key => $value) {
            ?>
            <tr>
                <td class="td-label"><?php echo get_label($key) ?></td>
                <td class="td-value"><?php echo is_array($value) ? implode(', ', $value) : $value ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php

    // Close the table tag
    $html = ob_get_contents();
    ob_end_clean();

    // Return the generated HTML
    return $html;
}

function get_step_3_table($data, $index = 'step_3')
{
    $headers = [
        ['title' => 'S.No.'],
        ['title' => 'Name'],
        ['title' => 'Qualification'],
        ['title' => 'Responsibility'],
        ['title' => 'Affiliation'],
    ];
    $responsibilities = ['principle', 'supervisor', 'co-supervisor', 'investigtor'];
    $serial_no = 1;

    ob_start();
?>
    <h4>PART III</h4>
    <table>
        <tr>
            <th colspan="5">Research Team</th>
        </tr>
        <tr>
            <?php if (!empty($headers)) {
                foreach ($headers as $index => $header) {
            ?>
                    <th><?php echo  $header['title'] ?></th>
            <?php
                }
            } ?>
        </tr>
        <?php
        // Iterate over each grant and build the table rows
        foreach ($responsibilities as $responsibility) {
            $count = 1;

            do {
                $suffix = ($responsibility === 'investigtor') ? "-$count" : '';

                // Check if the name exists to continue the loop
                $name = $data["{$responsibility}-name{$suffix}"] ?? null;
                if (!$name) {
                    break; // Exit loop if no name is found
                }

                $qualification = $data["{$responsibility}-qualification{$suffix}"] ?? '';
                $affiliation = $data["{$responsibility}-affiliation{$suffix}"] ?? '';

                // Output the row
        ?>
                <tr>
                    <td><?php echo $serial_no++; ?></td>
                    <td><?php echo htmlspecialchars($name); ?></td>
                    <td><?php echo htmlspecialchars($qualification); ?></td>
                    <td><?php echo ucfirst(str_replace('-', ' ', $responsibility)); ?></td>
                    <td><?php echo htmlspecialchars($affiliation); ?></td>
                </tr>
        <?php

                $count++;
            } while ($responsibility === 'investigtor');
        }

        ?>
    </table>
<?php

    $html = ob_get_contents();
    ob_end_clean();

    // Return the generated HTML
    return $html;
}


function get_step_4_table($data, $index = '')
{
    ob_start();
?>
    <h4>PART IV</h4>
    <table>
        <tr>
            <th>A. Project Summary</th>
        </tr>
        <tr>
            <td><?php echo esc_html($data['project_summary']) ?></td>
        </tr>
    </table>
    <table>
        <tr>
            <th colSpan="2">B. Background</th>
        </tr>
        <?php foreach ($data as $key => $value) :
            if ($key === 'project_summary') {
                continue;
            }
        ?>
            <tr>
                <td class="td-label"><?php echo get_label($key) ?></td>
                <td class="td-value"><?php echo is_array($value) ? implode(', ', $value) : $value ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}


function get_step_8_table($data, $index = '')
{
    $headers = [
        ['title' => 'S.No.'],
        ['title' => 'Activity'],
        ['title' => 'Project Date'],
    ];
    $serial_no = 1;
    $fields = ['activity', 'project_date'];
    ob_start();
?>
    <h4>PART VIII</h4>
    <table>
        <tr>
            <th colspan="3">Research Team</th>
        </tr>
        <tr>
            <?php if (!empty($headers)) {
                foreach ($headers as $index => $header) {
            ?>
                    <th><?php echo  $header['title'] ?></th>
            <?php
                }
            } ?>
        </tr>
        <?php
        foreach ($data as $key => $value) {
            // Extract the number from the key to pair activity with its project date
            if (preg_match('/activity__(\d+)/', $key, $matches)) {
                $index = $matches[1];
                $activity = $value;
                $project_date = $data["project_date__$index"] ?? '';

                // Display the data in a table row
        ?>
                <tr>
                    <td><?php echo $serial_no++; ?></td>
                    <td><?php echo htmlspecialchars($activity); ?></td>
                    <td><?php echo htmlspecialchars($project_date); ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>

<?php
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function get_step_9_table($data, $index = '')
{
    $headers = [
        ['title' => 'Description'],
        ['title' => 'Price'],
        ['title' => 'Quantity'],
        ['title' => 'Total'],
    ];
    ob_start();
?>
    <h4>PART IX</h4>
    <table>
        <tr>
            <th colspan="4">Budget overview in nepali rupees (NRS)</th>
        </tr>
        <tr>
            <?php if (!empty($headers)) {
                foreach ($headers as $index => $header) {
            ?>
                    <th><?php echo  $header['title'] ?></th>
            <?php
                }
            } ?>
        </tr>
        <?php
        $final_total = 0;
        foreach ($data as $key => $value) {
            // Extract the number from the key to pair description with its details
            if (preg_match('/description__(\d+)/', $key, $matches)) {
                $index = $matches[1];
                $description = $value;
                $price = $data["price__$index"] ?? '';
                $quantity = $data["quantity__$index"] ?? '';
                $total = $data["total__$index"] ?? '';
                $final_total = $final_total + (int)$total;

                // Display the data in a table row
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($description); ?></td>
                    <td><?php echo htmlspecialchars($price); ?></td>
                    <td><?php echo htmlspecialchars($quantity); ?></td>
                    <td><?php echo htmlspecialchars($total); ?></td>
                </tr>
        <?php
            }
        }
        ?>
        <tr>
            <td colSpan="4"><?php echo htmlspecialchars($final_total) ?></td>
        </tr>
    </table>

<?php
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function get_step_12_table($data, $index = '', $posted_data = [], $uploads = [])
{
    $headers = [
        ['title' => 'S.No.'],
        ['title' => 'Name'],
        ['title' => 'Signature'],
    ];
    $serial_no = 1;
    ob_start();
?>
    <h4>PART XII</h4>
    <table>
        <tr>
            <th colspan="3">Signatures of Investigators</th>
        </tr>
        <tr>
            <?php if (!empty($headers)) {
                foreach ($headers as $index => $header) {
            ?>
                    <th><?php echo  $header['title'] ?></th>
            <?php
                }
            } ?>
        </tr>
        <?php
        foreach ($data as $key => $value) {
            // Extract the number from the key to pair description with its details
            if (preg_match('/investigators_name__(\d+)/', $key, $matches)) {
                $index = $matches[1];
                $name = $value;
                $signature_key = "investigator_signature__$index";
                $signature = $posted_data[$signature_key] ?? '';



                // Display the data in a table row
        ?>
                <tr>
                    <td><?php echo $serial_no++; ?></td>
                    <td><?php echo htmlspecialchars($name); ?></td>
                    <!-- <td><?php echo htmlspecialchars($signature); ?></td> -->
                    <td><?php
                        echo get_media($signature_key, $uploads)
                        ?>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>

    <?php
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function get_media($key, $uploads)
{
    ob_start();
    if (in_array($key, array_keys($uploads))) {
        $file_paths = $uploads[$key];
        if (!empty($file_paths)) {
            foreach ($file_paths as $file_key => $file_path) {
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
            }
        }
    }
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}


function get_step_13_table($data, $uploads, $index = '')
{
    ob_start();
    ?>
    <h4>PART XIII</h4>
    <table>
        <tr>
            <td class="td-label"><?php echo get_label('citizenship_certificate_pi') ?></td>
            <td><?php echo get_media('citizenship_certificate_pi', $uploads)  ?></td>
        </tr>
        <tr>
            <td class="td-label"><?php echo get_label('application_letter') ?></td>
            <td><?php echo get_media('application_letter', $uploads)  ?></td>
        </tr>
        <tr>
            <td class="td-label"><?php echo get_label('declaration_on_compliance_to_nepas_grant_guideline') ?></td>
            <td><?php echo get_media('declaration_on_compliance_to_nepas_grant_guideline', $uploads)  ?></td>
        </tr>
        <tr>
            <td class="td-label"><?php echo get_label('statement_of_originality_of_research') ?></td>
            <td><?php echo get_media('statement_of_originality_of_research', $uploads)  ?></td>
        </tr>
        <tr>
            <td class="td-label"><?php echo get_label('letter_form') ?></td>
            <td><?php echo get_media('letter_form', $uploads)  ?></td>
        </tr>
        <tr>
            <td class="td-label"><?php echo get_label('clinical_trial_registrty') ?></td>
            <td><?php echo get_media('clinical_trial_registrty', $uploads)  ?></td>
        </tr>
        <tr>
            <td class="td-label"><?php echo get_label('reference_letter_from_organisation') ?></td>
            <td><?php echo get_media('reference_letter_from_organisation', $uploads)  ?></td>
        </tr>
    </table>

<?php
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}
