<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login', array(
			'js_files' => array(),
			'css_files' => array()
		));
	}

	public function login()
	{
	}

	public function logout()
	{
	}

}
