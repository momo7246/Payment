<?php

class Base_Payment extends CI_Controller
{
	var $m;

	function __construct()
	{
		parent::__construct();
		$this->m = new Mustache_Engine(array(
		    'loader' => new Mustache_Loader_FilesystemLoader(APPPATH . '/views'),
		    'partials_loader' => new Mustache_Loader_FilesystemLoader(APPPATH . '/views/partials')
		));
	}
}
