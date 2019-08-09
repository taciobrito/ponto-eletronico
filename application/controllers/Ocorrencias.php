<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'/libraries/GeneralTrait.php';
include APPPATH.'/libraries/GeneralCallBacksTrait.php';

class Ocorrencias extends CI_Controller {
	use \GeneralTrait, \GeneralCallBacksTrait;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_crud_url_path(base_url('ocorrencias/index'));
		$crud->set_language(getLang());

		$crud->set_table('ocorrencias');
		$crud->set_subject('Ocorrência');

		$crud->display_as('data','Data');
		$crud->display_as('tipo','Tipo');
		$crud->display_as('observacoes','Observações');
		$crud->display_as('banco_horas','Banco de horas');
		$crud->display_as('hora_inicio','Hora início');
		$crud->display_as('hora_fim','Hora fim');
		$crud->display_as('contrato_id','Contratado');

		$crud->unset_texteditor('observacoes');
		$crud->field_type('tipo','dropdown',
      		array(
		      	'abono' => 'Abono', 
		      	'falta' => 'Falta',
		      	'feriado' => 'Feriado'
	    	)
	    );

		$crud->required_fields('data', 'tipo', 'banco_horas', 'hora_inicio', 'hora_fim', 'contrato_id');

		$crud->columns('data', 'tipo', 'observacoes', 'banco_horas', 'hora_inicio', 'hora_fim', 'contrato_id');
		$crud->fields('data', 'tipo', 'observacoes', 'banco_horas', 'hora_inicio', 'hora_fim', 'contrato_id');

		$crud->callback_field('hora_inicio', array($this, 'time_callback_mask'));
		$crud->callback_field('hora_fim', array($this, 'time_callback_mask'));

		$crud->callback_read_field('created_at', array($this, 'callback_format_timestamps'));
		$crud->callback_read_field('updated_at', array($this, 'callback_format_timestamps'));
		$crud->callback_read_field('deleted_at', array($this, 'callback_format_timestamps'));

		$output = $crud->render();

		$this->view_output($output);
	}

}
