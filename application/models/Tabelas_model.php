<?php 
class Tabelas_model extends CI_Model {
	public function selectAllFromTable($table) {
		return $this->db->get($table);
	}
}