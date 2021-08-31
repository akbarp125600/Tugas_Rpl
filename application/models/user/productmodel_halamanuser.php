<?php defined('BASEPATH') OR exit('No direct script access allowed');

class productmodel_halamanuser extends CI_Model
{ 
    private $_table = "transaksi";
    private $_tbarang = "barang";
    private $_tuser = "tbl_users";
    private $_tnotifikasi = "notifikasi";

    public $id_transaksi;
    public $stok_barang;
    public $jumlah_beli;
    public $kategori;
    public $id_barang;
    public $diskon;
    public $pembeli;
    public $waktu;
    public $harga_barang;



    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getNotif($id)
    {
        return $this->db->get_where($this->_tnotifikasi, ["user_id" => $id])->result();
    }
    
    public function getByIduser($id)
    {
        return $this->db->get_where($this->_tuser, ["user_id" => $id])->row();
    }
    public function getByIdbarang($id)
    {
        return $this->db->get_where($this->_tbarang, ["id_barang" => $id])->row();
    }

    public function save()
    {
        date_default_timezone_set("Asia/Jakarta");

       $post = $this->input->post();
        $this->id_transaksi = $post["id_transaksi"];
        $this->stok_barang = $post["stok_barang"];
        //$this->image = $this->input->post("image");
        $this->jumlah_beli = $post["jumlah_beli"];
        $this->kategori = $post["kategori"];
        $this->id_barang = $post["id_barang"];
        $pembeli = $_POST['id_user'];
        $user = $this->db->query("SELECT * FROM tbl_users WHERE user_id = '$pembeli'");
        if($user->row()->batas_promo >= 3){  
			$disk = $this->db->query("SELECT * FROM pilihan_promo");
			if($user->row()->berapa_kali > 0){
				if($disk->row()->status == 'aktif'){
					$this->diskon = $disk->row()->pilihan_promo;
					$disc = ($disk->row()->pilihan_promo / 100) * $this->input->post('harga_barang'); // menghitung promo
                    $this->db->query("UPDATE tbl_users SET berapa_kali = berapa_kali - 2 WHERE user_id = '$pembeli'");
				}
				else{
					$this->diskon = 0;
					$disc = 0;
				}
            }
			else{
				$this->diskon = 0;
				$disc = 0;
				$this->db->query("UPDATE tbl_users SET batas_promo = 1, berapa_kali = 0 WHERE user_id = '$pembeli'");
			}
        }
        else{
			// PEMBELIAN DIBAWAH 2 KALI
            $this->diskon = 0;
			$disc = 0;
            if($user->row()->batas_promo == 1){
                $this->db->query("UPDATE tbl_users SET batas_promo = batas_promo + 1, berapa_kali = 4 WHERE user_id = '$pembeli'");
            }
            else{
                $this->db->query("UPDATE tbl_users SET batas_promo = batas_promo + 1 WHERE user_id = '$pembeli'");
            }
        }
		$data = array(
			'promo'         => $disc,
			'id_transaksi'  => $this->input->post('id_transaksi'),
			'tipe_barang'   => $this->input->post('nama_barang'),
			'harga_bayar'   => $this->input->post('harga_barang') - $disc,
		);
		$this->db->insert('promo', $data);
		
		$data2 = array(
			'tanggal'    => date("Y-m-d"),
			'user_id'    => $this->session->userdata('user_id'),
			'jam'        => date("H:i:s"),
			'pesan'      => "Promo ".$this->input->post('nama_barang')." sebesar ".$disc.", cek di menu promo",
			// 'harga_bayar'   => $this->input->post('harga_barang') - $disc,
		);
        if ($disc!=0){
		$this->db->insert('notifikasi', $data2);
    }
        $this->pembeli = $post["id_user"];
        $this->waktu = date("Y-m-d H:i:s"); //cara format tanggal
         $this->harga_barang = $post["harga_barang"];
        $this->db->insert($this->_table, $this);
    }
}
  /* public function update()
    {
      //  $post = $this->input->post();
        // $this->id_barang = $post["id_barang"];
        // $this->nama_barang = $post["nama_barang"];
        // $this->image = $_post["image"];
        // $this->kategori = $post["kategori"];
        // $this->stok_barang = $post["stok_barang"];
        // $this->description = $post["description"];
        // $this->harga_barang = $post["harga_barang"];
        $data = array(
            "id_transaksi" => $post["id_transaksi"],
            "stok_barang" => $post["barang_jual"],
            //"image" => $post["image"],
            "jumlah_beli" => $post["jumlah_beli"],
            "kategori" => $post["kategori"],
            "nama_barang" => $post["nama_barang"],
            "harga_barang" => $post["harga_barang"],
            "diskon" => $post["diskon"],
            "diskripsi" => $post["diskripsi"],
            "pembeli" => $post["pembeli"],
            "waktu" => $post["waktu"]

        );

        //print_r($data);echo "<br>";
        $this->db->where("id_transaksi",$post["id_transaksi"]);
        $this->db->update("transaksi", $data);

        return true;
        
       // if (!empty($_FILES["image"]["name"])) {
            //$this->image = $this->_uploadImage();
        //} else {
         //   $this->image = $post["old_image"];
        //}

    }

    //public function delete($id)
    //{
        // $post = $this->delete(oid)->post();

        // $this->id_barang = $_GET["id_barang"];
        // $this->nama_barang = $post["nama_barang"];
        // $this->image = $_post["image"];
        // $this->kategori = $post["kategori"];
        // $this->stok_barang = $post["stok_barang"];
        // $this->description = $post["description"];
        // $this->harga_barang = $post["harga_barang"];
        //return
   //     $this->db->where("id_transaksi",$id);
     //   $this->db->delete("transaksi");

       // return true;
  //  }
//}
   // private function _uploadimage()
//{
  //  $config['upload_path']          = './upload/product/';
    //$config['allowed_types']        = 'gif|jpg|png';
    //$config['file_name']            = $this->id_barang;
    //$config['overwrite']            = true;
    //$config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    //$this->load->library('upload', $config);

  //  if ($this->upload->do_upload('image')) {
//        return $this->upload->data("file_name");
    //}
  //print_r($this->upload->display_errors());  
  //  return "default.jpg";
//}

//private function _deleteImage($id)
//{
  //  $product = $this->getById($id);
    //if ($product->image != "default.jpg") {
      //  $filename = explode(".", $product->image)[0];
        //return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
    //}
//} */