<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class konsul_con extends CI_Controller {

	public function __construct()
 	{
		 parent::__construct();
		 $this->load->model("konsul_model");
		 date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
	{
		$data_konsul = $this->konsul_model->get_konsul();
		$this->load->view('header');
		$this->load->view('page_konsul', ['data'=>$data_konsul]);
		$this->load->view('footer');
    }

	public function index2()
	{
		$data_konsul = $this->konsul_model->get_konsul();
		$this->load->view('header2');
		$this->load->view('page_konsul', ['data'=>$data_konsul]);
		$this->load->view('footer');
    }


    public function add_konsul()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"alamat" => $this->input->post('alamat', true),
			"konsul" => $this->input->post('konsul', true),
			"username" =>$this->session->userdata('username'),
		];
		$this->konsul_model->add_konsul($data);
		if ($this->session->userdata('role')=="admin") {
			redirect('index.php/konsul_con/index');
		}elseif ($this->session->userdata('role')=="user") {
			redirect('index.php/konsul_con/index2');
		};
    }
    
    public function edit_konsul()
	{
		$id_konsul = $this->input->post('id_konsul', true);
		$data = [
			"nama" => $this->input->post('nama', true),
			"alamat" => $this->input->post('alamat', true),
			"konsul" => $this->input->post('konsul', true),
		];
		if ($this->session->userdata('role')=="admin") {
			redirect('index.php/konsul_con/index');
		}elseif ($this->session->userdata('role')=="user") {
			redirect('index.php/konsul_con/index2');
		};
	}

    public function delete_konsul($id_konsul)
	{
		$this->konsul_model->delete_konsul($id_konsul);
		if ($this->session->userdata('role')=="admin") {
			redirect('index.php/konsul_con/index');
		}elseif ($this->session->userdata('role')=="user") {
			redirect('index.php/konsul_con/index2');
		};
	}
}