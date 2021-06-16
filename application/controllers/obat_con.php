<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class obat_con extends CI_Controller {

	public function __construct()
 	{
		 parent::__construct();
		 $this->load->model("obat_model");
    }

    public function index()
	{
		
		$data_obat = $this->obat_model->get_obat();
		$this->load->view('header');
		$this->load->view('page_obat', ['data'=>$data_obat]);
		$this->load->view('footer');
    }

	public function index2()
	{
		
		$data_obat = $this->obat_model->get_obat();
		$this->load->view('header2');
		$this->load->view('page_obat', ['data'=>$data_obat]);
		$this->load->view('footer');
    }


	public function index3()
	{
		
		$data_obat = $this->obat_model->get_obat();
		$this->load->view('header3');
		$this->load->view('page_obat', ['data'=>$data_obat]);
		$this->load->view('footer');
    }

    public function add_obat()
	{
		$data = [
			"obat" => $this->input->post('obat', true),
			"golongan" => $this->input->post('golongan', true),
			"kategori" => $this->input->post('kategori', true),
			"bentuk" => $this->input->post('bentuk', true)
		];
		$this->obat_model->add_obat($data);
		redirect('index.php/obat_con/index');
    }
    
    public function edit_obat()
	{
		$id_obat = $this->input->post('id_obat', true);
		$data = [
			"obat" => $this->input->post('obat', true),
			"golongan" => $this->input->post('golongan', true),
			"kategori" => $this->input->post('kategori', true),
			"bentuk" => $this->input->post('bentuk', true)
		];
		$this->obat_model->edit_obat($id_obat, $data);
		redirect('index.php/obat_con/index');
	}

    public function delete_obat($id_obat)
	{
		$this->obat_model->delete_obat($id_obat);
		redirect('index.php/obat_con/index');
	}
}