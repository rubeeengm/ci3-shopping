<?php

class Inicio_Controller extends CI_Controller{
	function index(){
		#$this->load->database();
		$query=$this->db->get('materias');
		$datos ="";

			foreach ($query->result() as $row)
			{
				echo $row->idmaterias. ' '. $row->clavemateria.' '. $row->nombremateria . '<br>';
			}

			$data['datos'] = $datos;
			#$data['series'] = 'ragnarok';
			$this->load->view('materias/Inicio', $data);

	}
}