<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {
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

		$crud->set_crud_url_path(base_url('funcionarios/index'));
		$crud->set_language(getLang());

		$crud->set_table('funcionarios');
		$crud->set_subject('Funcionário');

		$crud->display_as('nome','Nome');
		$crud->display_as('cpf','CPF');
		$crud->display_as('telefone','Telefone');
		$crud->display_as('endereco','Endereço');
		$crud->display_as('email','E-mail');

		$crud->field_type('email','email');

		$crud->required_fields('nome', 'cpf');

		$crud->columns('nome', 'cpf', 'telefone', 'endereco', 'email');
		$crud->fields('nome', 'cpf', 'telefone', 'endereco', 'email');

		$output = $crud->render();

		$this->view_output($output);
	}

}
