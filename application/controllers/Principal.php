<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function view_output($output = [])
	{
		$this->load->view('index', $output);
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
