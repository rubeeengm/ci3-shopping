<?php

defined('BASEPATH') OR exit('accesos directos no estan permitidos');

class VideogameController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('VideogameModel');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index() {
		if (!($this->session->has_userdata('userId'))) {
			redirect('','location');
		}

		$listaVideojuegos = $this->VideogameModel->getAll();

		$this->load->view('includes/header');
		$this->load->view('includes/menuhome');
		$this->load->view('includes/banner');
		$respuesta['data'] = $listaVideojuegos->result();
		$this->load->view(
			'videojuegos/listado', $respuesta
		);
		$this->load->view('includes/footer');
	}

	function save() {
		$videogame =  new stdClass();
		$videogame->nombre = $this->input->post('nombre');
		$videogame->precio = $this->input->post('precio');
		
		$this->VideogameModel->save($videogame);

		return $this->output->set_status_header('200')
			->set_output("");
	}
}
