<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');


       
    }

    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        $this->load->view("user1/product/list", $data);
    }

    public function add()
    {
        $product = $this->product_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($product->rules());
        // print_r($_POST);
		if($this->input->post("id_barang")){
			$id = $this->input->post("id_barang");
			$qr = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id'");
			if($qr->num_rows() <= 0){
				$product->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
                     redirect(base_url().'user/products');
			}
			else{
				$this->session->set_flashdata('success', 'Gagal disimpan, id barang tidak boleh sama.');
			}
        }
        $dataz['product'] = $this->db->query("SELECT * FROM kategori");
        $this->load->view("user/product/new_form", $dataz);
    }
    

    public function edit($idz = null)
    {
        $id = $idz;
        if (!isset($id)) redirect('user/products');
       
        //$product = $this->product_model;
        //$validation = $this->form_validation;
        //$validation->set_rules($product->rules());
        //$id = $idz
        if($this->input->post("id_barang"))
        {
            $id = $this->input->post("id_barang");
            $qr = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id'");
            if($qr->num_rows() >= 1)
            {
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'image'         => $this->input->post('image'),
                    'kategori' => $this->input->post('kategori'),
                    'stok_barang' => $this->input->post('stok_barang'),
                    'description' => $this->input->post('description'),
                    'harga_barang' => $this->input->post('harga_barang'),
                );
                //$this->db->where('id_barang', $id);
                //$this->db->update("barang", $data);
                if ($this->product_model->update() == true)
                {
                    //$id = $this->delete->post("id_barang");
                    //$qr = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'");
                    //$this->db->where('id_barang', $id);
                    //$this->db->update("barang", $delete);
                    $this->session->set_flashdata('edit_success', 'Data barang berhasil diedit');
                }
                else
                {
                    $this->session->set_flashdata('edit_success', 'Data barang gagal diedit');
                }
            }
            else
            {
                $this->session->set_flashdata('edit_success', 'Data barang Gagal diedit, karena id barang tidak ditemukan');
            }
        }
        $dataz['product'] = $this->db->query("SELECT * FROM barang WHERE id_barang = '$idz'")->row();
        $this->load->view("admin/product/edit_form", $dataz);
    }

    public function delete($id=null)
    {
        if (!isset($id)) redirect('user/products');
        //$where = array('id' => $id_barang );
        //if ($this->product_model->delete($where,'id_barang')) 
        if ($this->product_model->delete($id) == true)
        {
            //$id = $this->delete->post("id_barang");
            //$qr = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'");
            //$this->db->where('id_barang', $id);
            //$this->db->update("barang", $delete);
            $this->session->set_flashdata('delete_success', 'Data barang berhasil terhapus');
        }
        else
        {
            $this->session->set_flashdata('delete_success', 'Data barang gagal dihapus');
        }

        redirect('user/products');
    }
        //$dataz['product'] = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'")->row();
        //$this->load->view("admin/product_model");  
          //  redirect(site_url('admin/product_model'));

    public function logout(){
    $this->session->sess_destroy();
      redirect('page/logout');
  }
        }
    