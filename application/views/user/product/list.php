<!DOx`CTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("user/_partials/head.php") ?>
	 <script>
		var baseurl = "<?php echo base_url("index.php/"); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
    </script>
    <script src="<?php echo base_url("js/jquery.min.js"); ?>"></script> <!-- Load library jquery -->
    <script src="<?php echo base_url("js/config.js"); ?>"></script> <!-- Load file process.js -->
</head>

<body id="page-top">

	<?php $this->load->view("user/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("user/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("user/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<!--<div class="card-header">
						<a href="<?php echo site_url('user/products/add') ?>"><i class="fas fa-plus"></i> BELI</a>
					</div> -->
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>id</th>
										<th>nama barang</th>
										<th>image</th>
										<th>kategori</th>
										<th>stok</th>
										<th>Description</th>
										<th>harga</th>
										<th>---</th>
										

									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $product): ?>
									<tr>
										<td width="150">
											<?php echo $product->id_barang ?>
										</td>
										<td>
											<?php echo $product->nama_barang ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/product/'.$product->image) ?>" width="64" />
										</td>
										<td>
											<?php echo $product->kategori ?>
										</td>

										<td>
											<?php echo $product->stok_barang ?>
										</td>
										<td>
											<?php echo $product->description ?>
										</td>
										<td>
											<?php echo $product->harga_barang ?>
										</td>

											<td width="250">
											<!--<a href="<?php echo site_url('user/products/edit/'.$product->id_barang) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('user/products/delete/'.$product->id_barang) ?>')"
											 href="javascript:;" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
											<a onclick="buy	Confirm('<?php echo site_url('user/products/.../'.$product->id_barang) ?>')"
											 href="<?php echo site_url('user/products_halamanuser/transaksi/'.$this->session->userdata('user_id').'/'.$product->id_barang) ?>" class="btn btn-small text-info"><i class="fas fa-cart-plus"></i> beli</a>

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
			<?php $this->load->view("user/_partials/footer.php") ?>

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