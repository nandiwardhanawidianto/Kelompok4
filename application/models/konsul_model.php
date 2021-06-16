<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class konsul_model extends CI_Model {
    public function get_konsul()
	{
		$this->db->select('*');
		$this->db->from('konsul');
		return $this->db->get()->result();
    }
    
    // add konsul
	public function add_konsul($data)
	{
		return $this->db->insert("konsul", $data);
    }
    
    // edit konsul
	public function edit_konsul($id_konsul, $data)
	{
		$this->db->set($data);
		$this->db->where('id_konsul', $id_konsul);
		return $this->db->update('konsul');
    }
    
    // delete obat
	public function delete_konsul($id_konsul)
	{
		return $this->db->delete("konsul", array("id_konsul" => $id_konsul));
	}
}