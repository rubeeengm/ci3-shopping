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
}
