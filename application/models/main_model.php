<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_model extends CI_Model {
	private $_table = "profile";
	public function login($data) {
		if ($this->db->get_where('profile', $data)->num_rows() == 1) {
			$this->db->where('username', $data["username"]);
			$user = $this->db->get($this->_table)->row();
			$isAdmin = ($user->role == "admin");
			return $user->role;
		} 
	}

	public function ceklogin($data) {
		return $this->db->get_where('profile', $data)->num_rows() == 1;
	}

	public function regis($data) {
		return $this->db->insert('profile', $data);
	}
}