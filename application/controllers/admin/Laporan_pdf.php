<?php
Class Laporan_pdf extends CI_Controller{
	 function __construct() {
        parent::__construct();
        $this->load->library('pdf');	
	}

	function index(){
		 $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SANTUY VAPE STORE',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LAPORAN PENJUALAN BULAN DDESEMBER',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'Id Tranaksi',1,0);
        $pdf->Cell(25,6,'Kategori',1,0)	;
        $pdf->Cell(25,6,'Jumlah Beli',1,0);
        $pdf->Cell(50,6,'Waktu',1,0);
        $pdf->Cell(25,6,'Diskon',1,0);
        $pdf->Cell(25,6,'Harga',1,1);


        $pdf->SetFont('Arial','',10);
		$transaksi = $this->db->query("SELECT * FROM transaksi WHERE waktu LIKE '%12%'")->result();
		foreach($transaksi as $row){
			$pdf->Cell(30,6,$row->id_transaksi,1,0);
			$pdf->Cell(25,6,$row->kategori,1,0);
			$pdf->Cell(25,6,$row->jumlah_beli,1,0);
			$pdf->Cell(50,6,$row->waktu,1,0);
			$pdf->Cell(25,6,$row->diskon,1,0);
			$pdf->Cell(25,6,$row->harga_barang,1,1);

		}
		$pdf->Output('I');


	}
}