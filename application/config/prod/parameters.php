<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['enable.sandbox'] = true;
$config['sandbox.endpoint'] = 'https://api-3t.sandbox.paypal.com/nvp';
$config['paypal_sandbox_config'] = array(
		'version' => '85.0',
		'username' => 'momo7246_api1.gmail.com',
		'password' => 'APXEC93TJFZHEE7V',
		'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31ApfZ14FmAjGpKp3Vzne5adxPgVuW'
	);

$config['endpoint'] = 'https://api-3t.paypal.com/nvp';
$config['paypal_config'] = array(
		'version' => '',
		'username' => '',
		'password' => '',
		'signature' => ''
	);