<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel_transaksi extends CI_Model
{ 
    private $_table = "transaksi";
    private $_tnotifikasi = "notifikasi";

    public $id_transaksi;
    public $stok_barang;
    public $jumlah_beli;
    public $kategori;
    public $nama_barang;
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

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_transaksi" => $id])->row();
    }
	
	public function userby(){
		$userid = $this->session->userdata('user_id');
		$querys = $this->db->query("SELECT * FROM transaksi WHERE pembeli = '$userid'");
		return $querys->result();
	}
	
    public function save()
    {
        $post = $this->input->post();
        $this->id_transaksi = $post["id_transaksi"];
        $this->stok_barang = $post["stok_barang"];
        //$this->image = $this->input->post("image");
        $this->jumlah_beli = $post["jumlah_beli"];
        $this->kategori = $post["kategori"];
        $this->nama_barang = $post["nama_barang"];
        $this->diskon = $post["diskon"];
        $this->pembeli = $post["pembeli"];
        $this->waktu = $post["waktu"];
        $this->harga_barang = $post["harga_barang"];

        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
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
            "diskon" => $post["diskon"],
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

    public function delete($id)
    {
        // $post = $this->delete(oid)->post();

        // $this->id_barang = $_GET["id_barang"];
        // $this->nama_barang = $post["nama_barang"];
        // $this->image = $_post["image"];
        // $this->kategori = $post["kategori"];
        // $this->stok_barang = $post["stok_barang"];
        // $this->description = $post["description"];
        // $this->harga_barang = $post["harga_barang"];
        //return
        $this->db->where("id_transaksi",$id);
        $this->db->delete("transaksi");

        return true;
    }
}
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
//}