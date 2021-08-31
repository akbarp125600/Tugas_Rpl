<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products_kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("productmodel_kategori");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data["Products_kategori"] = $this->productmodel_kategori->getAll();
        $this->load->view("admin/product/list_kategori", $data);
    }

    public function add()
    {
        $product = $this->productmodel_kategori;
        // $validation = $this->form_validation;
        // $validation->set_rules($product->rules());
        // print_r($_POST);
		if($this->input->post("id_kategori")){
			$id = $this->input->post("id_kategori");
			$qr = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$id'");
			if($qr->num_rows() <= 0){
				$product->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect(base_url().'admin/Products_kategori');
			}
			else{
				$this->session->set_flashdata('success', 'Gagal disimpan, id barang tidak boleh sama.');
			}
        }
        $this->load->view("admin/product/new_kategori");
    }

    public function edit($idz = null)
    {
        $id = $idz;
        if (!isset($id)) redirect('admin/Products_kategori');
       
        //$product = $this->product_model;
        //$validation = $this->form_validation;
        //$validation->set_rules($product->rules());
        //$id = $idz
        if($this->input->post("id_kategori"))
        {
            $id = $this->input->post("id_kategori");
            $qr = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$id'");
            if($qr->num_rows() >= 1)
            {
                $data = array(
                    'kategori' => $this->input->post('kategori'),
                //    'alamat_produksi' => $this->input->post('alamat_produksi'),
                  //  'kategori' => $this->input->post('kategori'),
                    //'nama_barang' => $this->input->post('nama_barang'),
                   // 'harga_barang' => $this->input->post('harga_barang'),
                   // 'diskon' => $this->input->post('diskon'),
                    //'diskripsi' => $this->input->post('diskripsi'),
                );
                //$this->db->where('id_barang', $id);
                //$this->db->update("barang", $data);
                if ($this->productmodel_kategori->update() == true)
                {
                    //$id = $this->delete->post("id_barang");
                    //$qr = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'");
                    //$this->db->where('id_barang', $id);
                    //$this->db->update("barang", $delete);
                    $this->session->set_flashdata('edit_success', 'Data barang berhasil diedit');
                    redirect('admin/products_kategori');
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
        $dataz['product'] = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$idz'")->row();
        $this->load->view("admin/product/edit_kategori", $dataz);

    }

    public function delete($id=null)
    {
        if (!isset($id)) redirect('admin/products_kategori');
        //$where = array('id' => $id_barang );
        //if ($this->product_model->delete($where,'id_barang')) 
        if ($this->productmodel_kategori->delete($id) == true)
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

        redirect('admin/products_kategori');
    }
        //$dataz['product'] = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'")->row();
        //$this->load->view("admin/product_model");  
          //  redirect(site_url('admin/product_model'));
        }
    