<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'/libraries/GeneralTrait.php';
include APPPATH.'/libraries/GeneralCallbacksTrait.php';

class Contratos extends CI_Controller {
	use \GeneralTrait, \GeneralCallbacksTrait;

	const SEGMENT_OF_ID = 4;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
		$this->load->library('gc_dependent_select');
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

		$crud->required_fields('horario_trabalho', 'banco_horas', 'data_entrada', 'funcionario_id', 'empresa_id', 'cargo_id');

		$crud->columns('horario_trabalho', 'banco_horas', 'data_entrada', 'data_saida', 'funcionario_id', 'empresa_id', 'cargo_id');
		$crud->fields('horario_trabalho', 'banco_horas', 'data_entrada', 'data_saida', 'funcionario_id', 'empresa_id', 'cargo_id');

		$crud->set_relation('funcionario_id', 'funcionarios', 'nome', null, 'nome ASC');
		$crud->set_relation('empresa_id', 'empresas', 'razao_social', null, 'razao_social ASC');
		$crud->set_relation('cargo_id', 'cargos', 'nome', null, 'nome ASC');

		$crud->callback_column('banco_horas', array($this, 'callback_banco_horas'));
		$crud->callback_read_field('banco_horas', array($this, 'callback_banco_horas'));
		$crud->callback_read_field('data_entrada', array($this, 'callback_format_dates'));
		$crud->callback_read_field('data_saida', array($this, 'callback_format_dates'));

		$crud->callback_read_field('created_at', array($this, 'callback_format_timestamps'));
		$crud->callback_read_field('updated_at', array($this, 'callback_format_timestamps'));
		$crud->callback_read_field('deleted_at', array($this, 'callback_format_timestamps'));

		$fields = array(
			'empresa_id' => array(
				'table_name' => 'empresas',
				'title' => 'razao_social',
				'relate' => null
			),
			'cargo_id' => array(
				'table_name' => 'cargos',
				'title' => 'nome',
				'id_field' => 'id',
				'order_by'=> 'nome DESC',
				'relate' => 'empresa_id',
				'data-placeholder' => 'Selecione o cargo'
			)
		);

		$config = array(
			'main_table' => 'contratos',
			'main_table_primary' => 'id',
			'url' => base_url('cargos/'),
			'segment_name' => 'buscaPorEmpresa',
		);

		$dependentes = new Gc_dependent_select($crud, $fields, $config);

		$output = $crud->render();
		$output->output .= $dependentes->get_js();

		$this->view_output($output);
	}

}
