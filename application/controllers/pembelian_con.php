<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembelian_con extends CI_Controller {

	public function __construct()
 	{
		 parent::__construct();
		 $this->load->model("pembelian_model");
    }

    public function index()
	{
			$data_obat = $this->pembelian_model->list_pembeli();
			$this->load->view('header');
			$this->load->view('Page_listpembelian', ['data'=>$data_obat]);
			$this->load->view('footer');
    }

	public function index2()
	{
			
			$data_obat = $this->pembelian_model->get_obat();
			$this->load->view('header2');
			$this->load->view('page_pembelian', ['data'=>$data_obat]);
			$this->load->view('footer');
    }

	public function index3()
	{
			$data_obat = $this->pembelian_model->list_pembeli();
			$this->load->view('header2');
			$this->load->view('page_userpembeli', ['data'=>$data_obat]);
			$this->load->view('footer');
    }

	public function tes()
	{
			
			$data_obat = $this->pembelian_model->get_obat();
			$this->load->view('header2');
			$this->load->view('payment',['data'=>$data_obat]);
			$this->load->view('footer');
    }
	
	function add_to_cart(){ //fungsi Add To Cart
        $data = array(
            'obat' => $this->input->post('obat'), 
            'jumlah' => $this->input->post('jumlah'), 
            'harga' => $this->input->post('harga'), 
        );
        $this->cart->insert($data);
	}

	function load_cart(){ //load data cart
        echo $this->show_cart();
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
		redirect('index.php/pembelian_con/index');
    }

	public function add_pesanan() //load data cart//load data cart//load data cart//load data cart//load data cart//load data cart
	{
		$data = [
			"username" => $this->session->userdata('username'),
			"nama_obat" => $this->input->post('ovvat', true),
			"jumlah" => $this->input->post('jumllah', true),
			"harga" => $this->input->post('hargaa', true),
		];
		$this->pembelian_model->add_pesanan($data);
		redirect('index.php/pembelian_con/index2');
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
		redirect('index.php/pembelian_con/index');
	}

    public function delete_obat($id_obat)
	{
		$this->obat_model->delete_obat($id_obat);
		redirect('index.php/pembelian_con/index');
	}
}
