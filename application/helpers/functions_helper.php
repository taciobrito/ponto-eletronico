<?php

const LINKS_MENU = [
	[
		'label' => 'Registros',
  	'controller' => 'registros'
  ],
  [
  	'label' => 'Ocorrências',
  	'controller' => 'ocorrencias'
  ],
  [
  	'label' => 'Empresas',
  	'controller' => 'empresas'
  ],
  [
  	'label' => 'Cargos',
  	'controller' => 'cargos'
  ],
  [
  	'label' => 'Contratos',
  	'controller' => 'contratos'
  ],
  [
  	'label' => 'Funcionários',
  	'controller' => 'funcionarios'
	]
];

const SEGMENTS = [
	'controller' => 1
];

function getLang() {
	return 'pt-br.portuguese';
}

function formatDateTimestamps($data) {
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  date_default_timezone_set('America/Sao_Paulo');
  return strftime('%d/%m/%Y %R', strtotime($data));
}