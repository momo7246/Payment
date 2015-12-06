<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * If want to add more regions: 
 * https://developer.paypal.com/docs/classic/api/country_codes/
 */
$config['regions'] = array(
		array(
			'code' => 'JP',
			'name' => 'Japan'
		),
		array(
			'code' => 'TH',
			'name' => 'Thailand'
		),
		array(
			'code' => 'US',
			'name' => 'United States'
		),
		array(
			'code' => 'GB',
			'name' => 'United Kingdom'
		)
	);