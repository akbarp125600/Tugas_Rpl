<!DOx`CTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products_kategori/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>id</th>
										<th>kategori</th>
									<!--	<th>jumlah beli</th>
										<th>kategori</th>
										<th>nama barang</th>
										<th>harga</th>
										<th>diskon</th>
										<th>diskripsi</th>
										<th>aksi</th> -->

									</tr>
								</thead>
								<tbody>
									<?php foreach ($Products_kategori as $product): ?>
									<tr>
										<td width="150">
											<?php echo $product->id_kategori ?>
										</td>
										<td>
											<?php echo $product->kategori?>
										</td>
									<!--	<td>
											<img src="<?php echo base_url('upload/product/'.$product->image) ?>" width="64" />
										</td>   
										<td>
											<?php echo $product->alamat_produksi ?>
										</td>

										<td>
											<?php echo $product->kategori?>
										</td>
										<td>
											<?php echo $product->nama_barang ?>
										</td>
										<td>
											<?php echo $product->harga_barang ?>
										</td>
										<td>
											<?php echo $product->diskon ?>
										</td>
										<td>
											<?php echo $product->diskripsi?>
										</td>-->

											<td width="250">
												<a href="<?php echo site_url('admin/products_kategori/edit/'.$product->id_kategori) ?>"
												 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/products_kategori/delete/'.$product->id_kategori) ?>')"
												 href="javascript:;" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											<!--<a onclick="deleteConfirm('<?php echo site_url('admin/products_kategori/delete/'.$product->id_kategori) ?>')"
											 a href="#" id="btn-delete" class="btn btn-small text-danger"><i class="fas fa-trash"></i> hapus</a -->
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


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

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