<?php

class Videojuegos_model extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function getAll(){
		return $this->db->get('videojuegos');
	}
}
