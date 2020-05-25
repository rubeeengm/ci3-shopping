<?php

defined('BASEPATH') OR exit('accesos directos no estan permitidos');

class HomeController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper('url');
	}

	function index() {
		$this->load->view('includes/header');
		$this->load->view('home/landing');
		$this->load->view('includes/footer');
	}

	function login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user =  $this->UserModel->login($email, $password);

		if ($user == null) {
			return $this->output->set_status_header('500')
				->set_output("Usuario o constraseña incorrecta");
		} else {

		}
	}
}
