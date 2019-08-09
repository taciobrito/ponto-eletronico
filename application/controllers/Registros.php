<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'/libraries/GeneralTrait.php';
include APPPATH.'/libraries/GeneralCallbacksTrait.php';

class Registros extends CI_Controller {
	use \GeneralTrait, \GeneralCallbacksTrait;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_crud_url_path(base_url('registros/index'));
		$crud->set_language(getLang());

		$crud->set_table('registros');
		$crud->set_subject('Registro');

		$crud->display_as('data_hora','Data/Hora');
		$crud->display_as('observacoes','Observações');
		$crud->display_as('comprovante','Comprovante');
		$crud->display_as('tipo','Tipo');
		$crud->display_as('contrato_id','Contratado');

	    $crud->unset_texteditor('observacoes');
		$crud->field_type('tipo','dropdown',
	      array('vazio')
	    );

	    $crud->field_type('contrato_id','dropdown',
	      array('vazio')
	    );

		$crud->set_field_upload('comprovante','assets/uploads/comprovantes/');

		$crud->required_fields('data_hora', 'tipo', 'contrato_id');

		$crud->columns('data_hora', 'observacoes', 'comprovante', 'tipo', 'contrato_id');
		$crud->fields('data_hora', 'observacoes', 'comprovante', 'tipo', 'contrato_id');

		$crud->callback_read_field('created_at', array($this, 'callback_format_timestamps'));
		$crud->callback_read_field('updated_at', array($this, 'callback_format_timestamps'));
		$crud->callback_read_field('deleted_at', array($this, 'callback_format_timestamps'));

		$output = $crud->render();

		$this->view_output($output);
	}

}
