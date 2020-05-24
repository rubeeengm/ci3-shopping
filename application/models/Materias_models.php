<?php

class Materias_models extends CI_Model {
	function __construct () {
		parent:: __construct();
	}

	function getAll () {
		return $this->db->get('materias');
	}
}
