<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products_pilihanpromo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("productmodel_pilihanpromo");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data["Products_pilihanpromo"] = $this->productmodel_pilihanpromo->getAll();
        $this->load->view("admin/product/list_pilihanpromo", $data);
    }

    public function add()
    {
        $product = $this->productmodel_pilihanpromo;
        // $validation = $this->form_validation;
        // $validation->set_rules($product->rules());
        // print_r($_POST);
		if($this->input->post("kd_pilihan")){
			$id = $this->input->post("kd_pilihan");
			$qr = $this->db->query("SELECT * FROM pilihan_promo WHERE kd_pilihan = '$kd'");
			if($qr->num_rows() <= 0){
				$product->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect(base_url().'admin/Products_pilihanpromo');
			}
			else{
				$this->session->set_flashdata('success', 'Gagal disimpan, id barang tidak boleh sama.');
			}
        }
        $this->load->view("admin/product/new_pilihanpromo");
    }

    public function edit($idz = null)
    {
        $id = $idz;
        if (!isset($id)) redirect('admin/Products_pilihanpromo');
       
        //$product = $this->product_model;
        //$validation = $this->form_validation;
        //$validation->set_rules($product->rules());
        //$id = $idz
        if($this->input->post("kd_pilihan"))
        {
            $id = $this->input->post("kd_pilihan");
            $qr = $this->db->query("SELECT * FROM pilihan_promo WHERE kd_pilihan = '$id'");
            if($qr->num_rows() >= 1)
            {
                $data = array(
                    'pilihan_promo' => $this->input->post('pilihan_promo'),
                //    'alamat_produksi' => $this->input->post('alamat_produksi'),
                  //  'kategori' => $this->input->post('kategori'),
                    //'nama_barang' => $this->input->post('nama_barang'),
                   // 'harga_barang' => $this->input->post('harga_barang'),
                   // 'diskon' => $this->input->post('diskon'),
                    //'diskripsi' => $this->input->post('diskripsi'),
                );
                //$this->db->where('id_barang', $id);
                //$this->db->update("barang", $data);
                if ($this->productmodel_pilihanpromo->update() == true)
                {
                    //$id = $this->delete->post("id_barang");
                    //$qr = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'");
                    //$this->db->where('id_barang', $id);
                    //$this->db->update("barang", $delete);
                    $this->session->set_flashdata('edit_success', 'Data barang berhasil diedit');
                    redirect('admin/Products_pilihanpromo') ;
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
        $dataz['product'] = $this->db->query("SELECT * FROM pilihan_promo WHERE kd_pilihan = '$idz'")->row();
        $this->load->view("admin/product/edit_pilihanpromo", $dataz);
    }

    public function delete($id=null)
    {
        if (!isset($id)) redirect('admin/Products_pilihanpromo');
        //$where = array('id' => $id_barang );
        //if ($this->product_model->delete($where,'id_barang')) 
        if ($this->productmodel_pilihanpromo->delete($id) == true)
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

        redirect('admin/Products_pilihanpromo');
    }
        //$dataz['product'] = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'")->row();
        //$this->load->view("admin/product_model");  
          //  redirect(site_url('admin/product_model'));
        }
    