<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel_promo extends CI_Model
{ 
    private $_table = "promo";
    private $_tnotifikasi = "notifikasi";

    public $id_promo;
    public $promo;
    public $tipe_barang;
     public $harga_barang;
    //public $kategori;
   // public $nama_barang;
   // public $harga_barang;
    //public $diskon;
    //public $diskripsi;
    //public $pembeli;




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
        return $this->db->get_where($this->_table, ["id_promo" => $id])->row();
    }

     /*public function userby(){ 
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM table_promo JOIN table_transaksi on table_promo.id_transaksi = table_transaksi JOIN table_user ON table_transaksi.user_id where table_promo.id_transaksi ='$id'") ;
        return $querys->result(); 
    } */
    public function save()
    {
        $post = $this->input->post();
        $this->id_promo = $post["id_promo"];
        $this->promo = $post["promo"];
        //$this->batas_promo = $post["batas_promo"];

        //$this->image = $this->input->post("image");
        $this->tipe_barang = $post["tipe_barang"];
        $this->tipe_barang = $post["harga_barang"];
        //$this->kategori = $post["kategori"];
        //$this->nama_barang = $post["nama_barang"];
        //$this->harga_barang = $post["harga_barang"];
        //$this->diskon = $post["diskon"];
       // $this->diskripsi = $post["diskripsi"];
        //$this->pembeli = $post["pembeli"];


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
            "id_promo" => $post["id_promo"],
            "promo" => $post["promo"],
            //"batas_promo" => $post["batas_promo"],
            //"image" => $post["image"],
            "tipe_barang" => $post["tipe_barang"],
            //"kategori" => $post["kategori"],
            //"nama_barang" => $post["nama_barang"],
            //"harga_barang" => $post["harga_barang"],
            //"diskon" => $post["diskon"],
            //"diskripsi" => $post["diskripsi"],
            //"pembeli" => $post["pembeli"]

        );

        //print_r($data);echo "<br>";
        $this->db->where("id_promo",$post["id_promo"]);
        $this->db->update("promo", $data);

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
        $this->db->where("id_promo",$id);
        $this->db->delete("promo");

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