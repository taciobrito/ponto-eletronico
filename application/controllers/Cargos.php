<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'/libraries/GeneralTrait.php';

class Cargos extends CI_Controller {
	use \GeneralTrait;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_crud_url_path(base_url('cargos/index'));
		$crud->set_language(getLang());

		$crud->set_table('cargos');
		$crud->set_subject('Cargo');

		$crud->display_as('nome','Nome');
		$crud->display_as('empresa_id','Empresa');

		$crud->required_fields('nome', 'empresa_id');

		$crud->columns('nome', 'empresa_id');
		$crud->fields('nome', 'empresa_id');

		$crud->set_relation('empresa_id', 'empresas', 'razao_social');

		$output = $crud->render();

		$this->view_output($output);
	}

}
