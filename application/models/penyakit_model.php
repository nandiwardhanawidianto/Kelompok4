<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penyakit_model extends CI_Model {
    public function get_penyakit()
	{
		$this->db->select('*');
		$this->db->from('penyakit');
		return $this->db->get()->result();
    }
    
    // add penyakit
	public function add_penyakit($data)
	{
		return $this->db->insert("penyakit", $data);
    }

    // edit penyakit
	public function edit_penyakit($id_penyakit, $data)
	{
		$this->db->set($data);
		$this->db->where('id_penyakit', $id_penyakit);
		return $this->db->update('penyakit');
	}

    // delete penyakit
	public function delete_penyakit($id_penyakit)
	{
		return $this->db->delete("penyakit", array("id_penyakit" => $id_penyakit));
	}
}