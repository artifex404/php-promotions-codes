<?php

/* Generate Codes v1.0 */

/**
 * This script generates an unique amount of readable codes
 * Author: Igor Buyanov
 */
 
// Amount of codes to generate
$settings['number_of_codes'] = 5000;

// Amount of letters & numbers in the code
$settings['amount_of_letters']	= 4;
$settings['amount_of_numbers']	= 2;

// Some characters intentionally left out to enhance code readability
$settings['chars']		= "abcdefghjklmnpqrstuvwxyz";
$settings['numbers']	= "23456789";


function generate_codes($settings) {

	$codes = array();

	$characters = array(
		'chars' => array(
			'count' => $settings['amount_of_letters'],
			'characters' => strtoupper($settings['chars'])
		),
		'numbers' => array(
			'count' => $settings['amount_of_numbers'],
			'characters' => $settings['numbers']
		)
	);
	
	
	while (count($codes) < $settings['number_of_codes']) {
	
		$tmp_code = '';
	
		foreach ($characters as $name => $set) {
			for ( $i = 0; $i < $set['count']; $i++ ) {
				$tmp_code .= $set['characters'][rand( 0, strlen( $set['characters'] ) - 1 )];
			}
		}
		
		if (!in_array($tmp_code, $codes)) $codes[] = $tmp_code;
	
	}
	
	return $codes;
	
}

$codes = generate_codes($settings);

// Output unique codes
foreach ($codes as $code) echo $code."<br>";