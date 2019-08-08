<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
		// $this->load->model('tabelas_model');
	}

	public function view_output($output = [])
	{
		$this->load->view('index', $output);
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_crud_url_path(base_url('cargos/index'));
		$crud->set_language(getLang());

		$crud->set_table('cargos');
		$crud->set_subject('Cargo');

		$crud->display_as('nome','Nome');
		$crud->display_as('empresas_id','Empresa');

		$empresas = array();
		foreach ($this->db->get('empresas')->result() as $empresa) {
			$empresas[$empresa->id] = $empresa->razao_social;
		}

		$crud->field_type('empresas_id','dropdown', $empresas);

		$crud->required_fields('nome', 'empresas_id');

		$crud->columns('nome', 'empresas_id');
		$crud->fields('nome', 'empresas_id');

		$output = $crud->render();

		$this->view_output($output);
	}

}
