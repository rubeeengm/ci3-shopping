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

	function enable($id) {
		$data = array (
            'estado' => '1'
		);
		
        $this->db->where('id', $id);
        $this->db->update('videojuegos', $data);
	}

	function disable($id) {
		$data = array (
            'estado' => '0'
		);
		
        $this->db->where('id', $id);
        $this->db->update('videojuegos', $data);
	}
}