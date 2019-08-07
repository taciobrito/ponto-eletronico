<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratos extends CI_Controller {
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

		$crud->set_crud_url_path(base_url('contratos/index'));
		$crud->set_language(getLang());

		$crud->set_table('contratos');
		$crud->set_subject('Contrato');

		$crud->display_as('horario_trabalho','Horário de trabalho');
		$crud->display_as('banco_horas','Banco de horas');
		$crud->display_as('data_entrada','Admissão');
		$crud->display_as('data_saida','Demissão');
		$crud->display_as('funcionario_id','Funcionário');
		$crud->display_as('empresa_id','Empresa');
		$crud->display_as('cargo_id','Cargo');

		$crud->field_type('funcionario_id','dropdown',
      array('vazio')
    );
    $crud->field_type('empresa_id','dropdown',
      array('vazio')
    );
    $crud->field_type('cargo_id','dropdown',
      array('vazio')
    );

		$crud->required_fields('horario_trabalho', 'banco_horas', 'data_entrada', 'funcionario_id', 'empresa_id', 'cargo_id');

		$crud->columns('horario_trabalho', 'banco_horas', 'data_entrada', 'data_saida', 'funcionario_id', 'empresa_id', 'cargo_id');
		$crud->fields('horario_trabalho', 'banco_horas', 'data_entrada', 'data_saida', 'funcionario_id', 'empresa_id', 'cargo_id');

		$output = $crud->render();

		$this->view_output($output);
	}

}
