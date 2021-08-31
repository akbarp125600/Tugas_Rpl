<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("laporan_penjualan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $dataz["laporan_penjualan"] = $this->laporan_penjualan_model->getAll();
        $this->template->load('admin/product/laporan_penjualan' $dataz);
        

    public function transaksi()
    {

        $dataz["laporan_penjualan"] = $this->laporan_penjualan_model->getAll();
        $this->load->view("admin/product/laporan_penjualan", $dataz);
    }
}