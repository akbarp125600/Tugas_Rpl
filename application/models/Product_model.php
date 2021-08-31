<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{ 
    private $_table = "barang";

    public $id_barang;
    public $nama_barang;
    public $image = "default.jpg";
    public $kategori;
    public $stok_barang;
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

    public function get_product_keyword($keyword){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->like('nama_barang',$keyword);
       // $this->db->or_like('harga',$keyword);
        
        return $this->db->get()->result();
    }
    // public function cari($keyword)
    // {
    //     $query = $this->db->query("SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%'");
    //     $this->db->like('tugas_pwl', $keyword);
    //     //$query = $this->db->get('tbfeedback');
    //     return $query->result();
    // }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["nama_barang" => $barang])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_barang = $post["id_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->image = $this->_uploadimage();
        $this->kategori = $post["kategori"];
        $this->stok_barang = $post["stok_barang"];
        $this->description = $post["description"];
        $this->harga_barang = $post["harga_barang"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
         $this->id_barang = $post["id_barang"];
         $this->nama_barang = $post["nama_barang"];
         $this->image = $this->_uploadImage();
         $this->kategori = $post["kategori"];
         $this->stok_barang = $post["stok_barang"];
         $this->description = $post["description"];
         $this->harga_barang = $post["harga_barang"];
        //$data = array(
           /* "id_barang" => $post["id_barang"],
            "nama_barang" => $post["nama_barang"],
            "image" => $post["image"],
            "kategori" => $post["kategori"],
            "stok_barang" => $post["stok_barang"],
            "description" => $post["description"],
            "harga_barang" => $post["harga_barang"]
        );*/

        //print_r($data);echo "<br>";

        $this->db->where("id_barang",$post["id_barang"]);
        $this->db->update("barang", $post);

         //$this->db->update($this->_table, $this, array('id_barang' => $post['id']));

        
        
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
        $this->db->where("id_barang",$id);
        $this->db->delete("barang");

        return true;
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_barang;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product->image != "default.jpg") {
            $filename = explode(".", $product->image)[0];
            return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
        }
    }
}