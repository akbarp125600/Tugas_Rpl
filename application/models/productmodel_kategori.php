<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel_kategori extends CI_Model
{ 
    private $_table = "kategori";

    public $id_kategori;
    public $kategori;
    //public $alamat_produksi;
    //public $kategori;
    //public $nama_barang;
    //public $harga_barang;
    //public $diskon;
    //public $diskripsi;

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
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kategori = $post["id_kategori"];
        $this->kategori = $post["kategori"];
        //$this->image = $this->input->post("image");
        //$this->alamat_produksi = $post["alamat_produksi"];
        //$this->kategori = $post["kategori"];
        ///$this->nama_barang = $post["nama_barang"];
        //$this->harga_barang = $post["harga_barang"];
        //$this->diskon = $post["diskon"];
        //$this->diskripsi = $post["diskripsi"];

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
            "id_kategori" => $post["id_kategori"],
            "kategori" => $post["kategori"],
            //"image" => $post["image"],
            //"alamat_produksi" => $post["alamat_produksi"],
            //"kategori" => $post["kategori"],
            //"nama_barang" => $post["nama_barang"],
            //"harga_barang" => $post["harga_barang"],
            //"diskon" => $post["diskon"],
            //"diskripsi" => $post["diskripsi"]

        );

        //print_r($data);echo "<br>";
        $this->db->where("id_kategori",$post["id_kategori"]);
        $this->db->update("kategori", $data);

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
        $this->db->where("id_kategori",$id);
        $this->db->delete("kategori");

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