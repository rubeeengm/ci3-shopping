<?php

defined('BASEPATH') OR exit('accesos directos no estan permitidos');

class HomeController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index() {
		if ($this->session->has_userdata('userId')) {
			redirect('videogames','location');
		}

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
		}

		$this->session->set_userdata([
			'userId' => $user->id
			, 'username' => $user->username
			, 'rol' => $user->rol
		]);

		return $this->output->set_status_header('200')
			->set_output("index.php/videogames");
	}

	function signout() {
		$this->session->unset_userdata([
			'userId', 'username', 'rol'
		]);

		return $this->output->set_status_header('200')
			->set_output("");
	}
}
