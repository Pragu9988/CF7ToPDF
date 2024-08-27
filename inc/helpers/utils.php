<?php

if (!function_exists('get_labels')) {
    function get_labels($key)
    {
        $labels_mappings = [
            'NameofGrant' => 'Name of Grant',
            'name_of_pi'    => 'Name of Person',
            'address_of_pi' => 'Address of Person',
            'gender'        => 'Gender',
            'date_of_birth' => 'Date of Birth',
            'mobile_number' => 'Mobile Number',
            'email'         => 'Email Address',
            'college'       => 'Name of College',
            'academic_degree'   => 'Academic Degree'
        ];

        return $labels_mappings[$key] || $key;
    }
}
