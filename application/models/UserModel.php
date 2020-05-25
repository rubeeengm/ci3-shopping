<?php

class UserModel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function login($email, $password) {
		$query = $this->db->query(
			"SELECT * FROM users WHERE email = \"{$email}\" AND PASSWORD = MD5(\"{$password}\")"
		);

		$user = $query->row();

		if ($user == null) {
			return null;
		}

		return $user;
	}
}
