<?php

class VideogameModel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function getAll() {
		return $this->db->get('videojuegos');
	}

	function save($videogame) {
		$data = array (
			'nombre' => $videogame->nombre,
			'precio' => $videogame->precio
		);
		
		$this->db->insert('videojuegos', $data);
	}
}