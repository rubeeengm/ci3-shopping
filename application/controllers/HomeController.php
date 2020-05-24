<?php

defined('BASEPATH') OR exit('accesos directos no estan permitidos');

class HomeController extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->load->view('includes/header');
		$this->load->view('home/landing');
		$this->load->view('includes/footer');
	}

	function login() {
		$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
		header('Content-Type: application/json');

		return $this->output
    		->set_status_header('401')
    		->set_content_type('application/json')
    		->set_output(json_encode( $arr ));
	}
}