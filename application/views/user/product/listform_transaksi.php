<!DOx`CTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("user/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("user/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("user/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("user/_partials/breadcrumb.php") ?>

				
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="150%" cellspacing="0">
								<thead>
									<tr>
										<th>nomer barang</th>
										<th>stok barang</th>
										<th>jumlah beli</th>
										<th>kategori</th>
										<th>nama barang</th>
										<th>diskon</th>										
										<th>pembeli</th>
										<th>waktu</th>
										<th>aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($Products_transaksi as $product): ?>
									<tr>
										<td width="50">
											<?php echo $product->id_transaksi ?>
										</td>
										<td>
											<?php echo $product->stok_barang?>
										</td>
									
										<td>
											<?php echo $product->jumlah_beli ?>
										</td>

										<td>
											<?php echo $product->kategori?>
										</td>
										<td>
											<?php $id = $product->id_barang;
												$sql = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id'")->row();
												echo $sql->nama_barang;?>
										</td>
										<td>
											<?php echo $product->diskon ?>
										</td>
										<td>
											<?php $id = $product->pembeli;
												$sql = $this->db->query("SELECT * FROM tbl_users WHERE user_id = '$id'")->row();
												echo $sql->user_name;?>
										</td>
										<td>
											<?php echo $product->waktu?>
										</td>
										<td>
											<?php echo $product->harga_barang?>
										</td>

										<td width="200">
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("user/_partials/scrolltop.php") ?>
	<?php $this->load->view("user/_partials/modal.php") ?>

	<?php $this->load->view("user/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		console.log(url);
		//$('#btn-delete').attr('href', url);
		//$('#deleteModal').modal(); 
		window.location = url;
	}

	<?php if ($this->session->flashdata('delete_success')!=""){ ?>
		alert("<?php echo $this->session->flashdata('delete_success'); ?>")
	<?php } ?>

	</script>

	
</body>

</html>