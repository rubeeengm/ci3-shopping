<?php

defined('BASEPATH') OR exit('accesos directos no estan permitidos');

class VideojuegosController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Videojuegos_model');
		$this->load->helper('url');
	}

	function index() {
		$listaVideojuegos = $this->Videojuegos_model->getAll();

		$this->load->view('includes/header');
		$this->load->view('includes/menuhome');
		$this->load->view('includes/banner');
		$respuesta['data'] = $listaVideojuegos->result();
		$this->load->view(
			'videojuegos/listado', $respuesta
		);
		$this->load->view('includes/footer');
	}

	public function obtenerFormulario() {
		$this->load->view('videojuegos/formulario');
	}
}
