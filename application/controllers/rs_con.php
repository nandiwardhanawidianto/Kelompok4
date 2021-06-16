<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rs_con extends CI_Controller {

	public function __construct()
 	{
		 parent::__construct();
		 $this->load->model("rs_model");
    }
    
    public function index()
	{
		$data_rs = $this->rs_model->get_rs();
		$this->load->view('header');
		$this->load->view('page_rs', ['data'=>$data_rs]);
		$this->load->view('footer');
    }

	public function index2()
	{
		$data_rs = $this->rs_model->get_rs();
		$this->load->view('header2');
		$this->load->view('page_rs', ['data'=>$data_rs]);
		$this->load->view('footer');
    }

	public function index3()
	{
		$data_rs = $this->rs_model->get_rs();
		$this->load->view('header3');
		$this->load->view('page_rs', ['data'=>$data_rs]);
		$this->load->view('footer');
    }

    public function add_rs()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"provinsi" => $this->input->post('provinsi', true),
			"alamat" => $this->input->post('alamat', true),
			"no_telp" => $this->input->post('no_telp', true),
		];
		$this->rs_model->add_rs($data);
		redirect('index.php/rs_con/index');
	}
    
    public function edit_rs()
	{
		$id_rs = $this->input->post('id_rs', true);
		$data = [
			"nama" => $this->input->post('nama', true),
			"provinsi" => $this->input->post('provinsi', true),
			"alamat" => $this->input->post('alamat', true),
			"no_telp" => $this->input->post('no_telp', true)
		];
		$this->rs_model->edit_rs($id_rs, $data);
		redirect('index.php/rs_con/index');
	}

    public function delete_rs($id_rs)
	{
		$this->rs_model->delete_rs($id_rs);
		redirect('index.php/rs_con/index');
    }
}