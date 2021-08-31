<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('CariModel');
	}

	public function index(){
		$data['barang'] = $this->CariModel->view();
		$this->load->view('user/product/list', $data);
	}
	
	public function search(){
		// Ambil data NIS yang dikirim via ajax post
		$keyword = $this->input->post('keyword');
		$siswa = $this->CariModel->search($keyword);
		
		// Kita load file view.php sambil mengirim data siswa hasil query function search di SiswaModel
		$hasil = $this->load->view('user/producr/list', array('barang'=>$barang), true);
		
		// Buat sebuah array
		$callback = array(
			'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
		);

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}
}
