<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
	}

	public function view_output($output = [])
	{
		$this->load->view('index', $output);
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_language(getLang());

		$crud->set_table('empresas');
		$crud->set_subject('Empresa');

		$crud->set_crud_url_path(base_url('empresas/index'));

		$crud->display_as('razao_social','Razão Social');
		$crud->display_as('cnpj','CNPJ');

		$crud->required_fields('razao_social', 'cnpj');

		$crud->columns('razao_social', 'cnpj');
		$crud->fields('razao_social', 'cnpj');

		$output = $crud->render();

		$this->view_output($output);
	}

}
