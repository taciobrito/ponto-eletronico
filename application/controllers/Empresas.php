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
		$crud->display_as('created_at','Criado em');
		$crud->display_as('updated_at','Atualizado em');
		$crud->display_as('deleted_at','Removido em');

		$crud->required_fields('razao_social', 'cnpj');

		$crud->columns('razao_social', 'cnpj');
		$crud->fields('razao_social', 'cnpj');

		$crud->callback_read_field('created_at', array($this, 'callback_format_timestamps'));
		$crud->callback_read_field('updated_at', array($this, 'callback_format_timestamps'));
		$crud->callback_read_field('deleted_at', array($this, 'callback_format_timestamps'));

		$output = $crud->render();

		$this->view_output($output);
	}

	public function callback_format_timestamps($value, $primary_key = '') {
		if (empty($value)) {
			return '-- --';
		}
		return formatDateTimestamps($value);
	}

}
