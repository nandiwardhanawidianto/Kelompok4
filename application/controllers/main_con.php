<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_con extends CI_Controller {

	public function __construct()
 	{
		parent::__construct();
		$this->load->model("main_model");
	}

	public function index() //Header admin 
	{
		$this->load->view('header');
		$this->load->view('page_landing');
		$this->load->view('footer');
	}

	public function index2()  //Header Role User
	{
		$this->load->view('header2');
		$this->load->view('page_landing');
		$this->load->view('footer');
	}

	public function index3() //Header tanpa role  
	{
		$this->load->view('header3');
		$this->load->view('page_landing');
		$this->load->view('footer');
	}
	
	public function login()
	{
		$this->load->view('page_login');
	}
	public function regis()
	{
		$this->load->view('page_regis');
	}

	public function about()
	{
		if ($this->session->userdata('role')=="admin") {
			$this->load->view('header');
		}elseif ($this->session->userdata('role')=="user") {
			$this->load->view('header2');
		}else {
			$this->load->view('header3');
		}
		$this->load->view('page_about');
	}

	public function login_adminuser() {
		$data = ['username' => $this->input->post('username'), 'password' => $this->input->post('password')];
		if ($this->main_model->ceklogin($data)) {
			$this->session->set_userdata('role',$this->main_model->login($data));
			$this->session->set_userdata('username',$data['username']);
			if ($this->session->userdata('role')=="admin") {
				redirect('index.php/main_con/index');
			}elseif ($this->session->userdata('role')=="user") {
				redirect('index.php/main_con/index2');
			}else {
				$this->load->view('page_login', ['error_message' => "user & password salah"]);
				}	
		}
	}
	
	public function regis_user() {
		$data = ['username' => $this->input->post('username'), 'password' => $this->input->post('password')];
		if ($this->main_model->regis($data)) {
			$this->session->set_userdata('role','user');
			redirect('index.php/main_con/index2');
		}
		else {
			$this->load->view('page_regis', ['error_message' => 'registrasi gagal']);
		}
	}
	public function logout() {
		$this->session->unset_userdata('role');
		redirect('index.php/main_con/index3');
	}
}
