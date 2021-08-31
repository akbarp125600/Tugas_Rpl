<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CariModel extends CI_Model {
	
	public function view(){
		return $this->db->get('barang')->result(); // Tampilkan semua data yang ada di tabel siswa
	}
	
	public function search($keyword){
		$this->db->where('nama_barang', $keyword);
		
		
		$result = $this->db->get('barang')->result(); // Tampilkan data siswa berdasarkan keyword
		
		return $result; 
	}
}
