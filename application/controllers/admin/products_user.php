<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("productmodel_user");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data["Products_user"] = $this->productmodel_user->getAll();
        $this->load->view("admin/product/list_user", $data);
    }

    public function add()
    {
        $product = $this->productmodel_user;
        // $validation = $this->form_validation;
        // $validation->set_rules($product->rules());
        // print_r($_POST);
		if($this->input->post("user_id")){
			$id = $this->input->post("user_id");
			$qr = $this->db->query("SELECT * FROM tbl_users WHERE user_id = '$id'");
			if($qr->num_rows() <= 0){
				$product->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect(base_url().'admin/Products_user');
			}
			else{
				$this->session->set_flashdata('success', 'Gagal disimpan, id barang tidak boleh sama.');
			}
        }
        $this->load->view("admin/product/new_user");
    }

    public function edit($idz = null)
    {
        $id = $idz;
        if (!isset($id)) redirect('admin/Products_user');
       
        //$product = $this->product_model;
        //$validation = $this->form_validation;
        //$validation->set_rules($product->rules());
        //$id = $idz
        if($this->input->post("user_id"))
        {
            $id = $this->input->post("user_id");
            $qr = $this->db->query("SELECT * FROM tbl_users WHERE user_id = '$id'");
            if($qr->num_rows() >= 1)
            {
                $data = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_email' => $this->input->post('user_email'),
                    'user_password' => $this->input->post('user_password'),
                    'user_level' => $this->input->post('user_level'),
                    //'nama_barang' => $this->input->post('nama_barang'),
                   // 'harga_barang' => $this->input->post('harga_barang'),
                   // 'diskon' => $this->input->post('diskon'),
                    //'diskripsi' => $this->input->post('diskripsi'),
                );
                //$this->db->where('id_barang', $id);
                //$this->db->update("barang", $data);
                if ($this->productmodel_user->update() == true)
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
        //$dataz['product'] = $this->db->query("SELECT * FROM tbl_users WHERE user_id = '$idz'")->row();
        //$this->load->view("admin/product/edit_user", $dataz);
    }

    public function delete($id=null)
    {
        if (!isset($id)) redirect('admin/products_user');
        //$where = array('id' => $id_barang );
        //if ($this->product_model->delete($where,'id_barang')) 
        if ($this->productmodel_user->delete($id) == true)
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

        redirect('admin/products_user');
    }
        //$dataz['product'] = $this->db->query("DELETE FROM barang WHERE id_barang = '$id'")->row();
        //$this->load->view("admin/product_model");  
          //  redirect(site_url('admin/product_model'));
        }
    