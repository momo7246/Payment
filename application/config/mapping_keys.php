<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['mapping_paypal'] = array(
		'METHOD'			=> 'method',
		'USER' 				=> 'username',
		'PWD' 				=> 'password',
		'SIGNATURE' 		=> 'signature',
		'VERSION'			=> 'version',
		'PAYMENTACTION'		=> 'action',
		'IPADDRESS' 		=> 'ipAddress',
		'CREDITCARDTYPE' 	=> 'cardType',
		'ACCT' 				=> 'cardNumber',
		'EXPDATE' 			=> 'exp',
		'CVV2' 				=> 'cvv',
		'FIRSTNAME' 		=> 'firstname',
		'LASTNAME' 			=> 'lastname',
		'STREET' 			=> 'street',
		'CITY' 				=> 'city',
		'STATE' 			=> 'state',
		'COUNTRYCODE' 		=> 'countryCode',
		'ZIP' 				=> 'zip',
		'AMT' 				=> 'amount',
		'CURRENCYCODE' 		=> 'currency'
	);
