<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penyakit_con extends CI_Controller {

	public function __construct()
 	{
		 parent::__construct();
		 $this->load->model("penyakit_model");
    }

    public function index()
	{
		$data_penyakit = $this->penyakit_model->get_penyakit();
		$this->load->view('header');
		$this->load->view('page_penyakit', ['data'=>$data_penyakit]);
		$this->load->view('footer');
    }

	public function index2()
	{
		$data_penyakit = $this->penyakit_model->get_penyakit();
		$this->load->view('header2');
		$this->load->view('page_penyakit', ['data'=>$data_penyakit]);
		$this->load->view('footer');
    }
	
	public function index3()
	{
		$data_penyakit = $this->penyakit_model->get_penyakit();
		$this->load->view('header3');
		$this->load->view('page_penyakit', ['data'=>$data_penyakit]);
		$this->load->view('footer');
    }

    public function add_penyakit()
	{
		$data = [
			"penyakit" => $this->input->post('penyakit', true),
			"gejala" => $this->input->post('gejala', true),
			"tingkat_berbahaya" => $this->input->post('tingkat_berbahaya', true),
			"obat" => $this->input->post('obat', true)
		];
		$this->penyakit_model->add_penyakit($data);
		redirect('index.php/penyakit_con/index');
    }
    
    public function edit_penyakit()
	{
		$id_penyakit = $this->input->post('id_penyakit', true);
		$data = [
			"penyakit" => $this->input->post('penyakit', true),
			"gejala" => $this->input->post('gejala', true),
			"tingkat_berbahaya" => $this->input->post('tingkat_berbahaya', true),
			"obat" => $this->input->post('obat', true)
		];
		$this->penyakit_model->edit_penyakit($id_penyakit, $data);
		redirect('index.php/penyakit_con/index');
	}

    public function delete_penyakit($id_penyakit)
	{
		$this->penyakit_model->delete_penyakit($id_penyakit);
		redirect('index.php/penyakit_con/index');
	}
}