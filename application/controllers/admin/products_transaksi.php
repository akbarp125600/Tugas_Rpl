<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products_transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("productmodel_transaksi");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $dataz["Products_transaksi"] = $this->productmodel_transaksi->getAll();
        $this->load->view("admin/product/listform_transaksi", $dataz);
    }

    public function transaksi()
    {

        $dataz["Products_transaksi"] = $this->productmodel_transaksi->getAll();
        $this->load->view("admin/product/listform_transaksi", $dataz);
    }

    public function add()
    {
        $product = $this->productmodel_transaksi;
        // $validation = $this->form_validation;
        // $validation->set_rules($product->rules());
        // print_r($_POST);
		if($this->input->post("id_transaksi")){
			$id = $this->input->post("id_transaksi");
			$qr = $this->db->query("SELECT * FROM transaksi WHERE id_transaksi = '$id'");
			if($qr->num_rows() <= 0){
				$product->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect(base_url().'admin/products_transaksi');
			}
			else{
				$this->session->set_flashdata('success', 'Gagal disimpan, id barang tidak boleh sama.');
			}
        }
        $dataz['product'] = $this->db->query("SELECT * FROM pembeli");
        $this->load->view("admin/product/newform_transaksi", $dataz);
    }

    public function edit($idz = null)
    {
        $id = $idz;
        if (!isset($id)) redirect('admin/Products_transaksi');
       
        //$product = $this->product_model;
        //$validation = $this->form_validation;
        //$validation->set_rules($product->rules());
        //$id = $idz
        if($this->input->post("id_transaksi"))
        {
            $id = $this->input->post("id_transaksi");
            $qr = $this->db->query("SELECT * FROM transaksi WHERE id_transaksi = '$id'");
            if($qr->num_rows() >= 1)
            {
                $data = array(
                    'stok_barang' => $this->input->post('stok_barang'),
                    'jumlah_beli' => $this->input->post('jumlah_beli'),
                    'kategori' => $this->input->post('kategori'),
                    'nama_barang' => $this->input->post('nama_barang'),
//                    'harga_barang' => $this->input->post('harga_barang'),
                    'diskon' => $this->input->post('diskon'),
  //                  'diskripsi' => $this->input->post('diskripsi'),
                    'pembeli' => $this->input->post('pembeli'),
                    'waktu' => date("Y-m-d H:i:s"),

                );
                //$this->db->where('id_barang', $id);
                //$this->db->update("barang", $data);
                if ($this->productmodel_transaksi->update() == true)
                {
                    //$id = $this->delete->post("id_barang");
                    //$qr = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'");
                    //$this->db->where('id_barang', $id);
                    //$this->db->update("barang", $delete);
                    $this->session->set_flashdata('edit_success', 'Data barang berhasil diedit');
					redirect(base_url().'admin/products_transaksi');
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
        $dataz['producx'] = $this->db->query("SELECT * FROM pembeli");
        $dataz['product'] = $this->db->query("SELECT * FROM transaksi WHERE id_transaksi = '$idz'")->row();
        $this->load->view("admin/product/editform_transaksi", $dataz);
    }

    public function delete($id=null)
    {
        if (!isset($id)) redirect('admin/Products_transaksi');
        //$where = array('id' => $id_barang );
        //if ($this->product_model->delete($where,'id_barang')) 
        if ($this->productmodel_transaksi->delete($id) == true)
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

        redirect('admin/Products_transaksi');
    }
        //$dataz['product'] = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'")->row();
        //$this->load->view("admin/product_model");  
          //  redirect(site_url('admin/product_model'));
        }
    