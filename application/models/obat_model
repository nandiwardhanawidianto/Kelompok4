<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class obat_model extends CI_Model {
    public function get_obat()
	{
		$this->db->select('*');
		$this->db->from('obat');
		return $this->db->get()->result();
    }
    
    // add obat
	public function add_obat($data)
	{
		return $this->db->insert("obat", $data);
    }
    
    // edit obat
	public function edit_obat($id_obat, $data)
	{
		$this->db->set($data);
		$this->db->where('id_obat', $id_obat);
		return $this->db->update('obat');
    }
    
    // delete obat
	public function delete_obat($id_obat)
	{
		return $this->db->delete("obat", array("id_obat" => $id_obat));
    }

	//list obat
	public function list_obat()
	{
		$this->db->select('*');
		$this->db->from('list');
		return $this->db->get()->result();
    }
}