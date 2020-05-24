<?php

/*
   febrero 18, 2020
   manejo de la tabla materias
   daniel morales becerril
   1.0
*/

defined('BASEPATH') OR exit('accesos directos no estan permitidos');

class Materias_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Materias_models');
		$this->load->helper('url');
	}

	function index(){
		$query = $this->Materias_models->getAll();
		$datos = '<table id="myTable" class="table table-bordered table-striped">';
		$datos .= "<thead>";
		$datos .= "<tr>";
		$datos .= "<th>Id</th><th>Cve</th><th>Nombre</th>";
		$datos .= "</tr></thead>";
		$datos .= "<tbody>";


			foreach ($query->result() as $row)  {
				$datos .= "<tr>";
				$datos .= "<td>".$row->idmaterias."</td>";
				$datos .= "<td>".$row->clavemateria."</td>";
				$datos .= "<td>".$row->nombremateria."</td>";
				$datos.=  "</tr>";
			}
		$datos .= "</tbody>";
		$datos .= "</table>";

		$data ['datos'] = $datos;

		$this->load->view('includes/header');

		$this->load->view('includes/banner');

		$this->load->view('includes/menuhome');

		$this->load->view('materias/Inicio',$data);

		$this ->load->view('includes/footer');
	}
}
