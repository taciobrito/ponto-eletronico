<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'/libraries/GeneralTrait.php';

class Principal extends CI_Controller {
	use \GeneralTrait;

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view_output((object)array(
			'output' => $this->load->view('principal', null, true),
			'js_files' => array(),
			'css_files' => array()
		));
	}

}
