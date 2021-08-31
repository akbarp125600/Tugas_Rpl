<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel_user extends CI_Model
{ 
    private $_table = "tbl_users";

    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;
    public $user_level;

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
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->user_id= $post["user_id"];
        $this->user_name = $post["user_name"];
        //$this->image = $this->input->post("image");
        $this->user_email = $post["user_email"];
        $this->user_password = $post["user_password"];
        $this->user_level = $post["user_level"];
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
            "user_id" => $post["user_id"],
            "user_name" => $post["user_name"],
            //"image" => $post["image"],
            "user_email" => $post["user_email"],
            "user_password" => $post["user_password"],
            "user_level" => $post["user_level"],
            //"harga_barang" => $post["harga_barang"],
            //"diskon" => $post["diskon"],
            //"diskripsi" => $post["diskripsi"]

        );

        //print_r($data);echo "<br>";
        $this->db->where("user_id",$post["user_id"]);
        $this->db->update("tbl_users", $data);

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
        $this->db->where("user_id",$id);
        $this->db->delete("user_name");

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