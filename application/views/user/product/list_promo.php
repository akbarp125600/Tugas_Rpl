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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>kode</th>
										<th>transaksi</th>
										<th>promo</th>
										<th>harga dibayar</th>
										<th>tipe barang</th>
										<th>harga jual</th>

										<th>---</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($Products_promo as $product): ?>
									<tr>
										<td width="150">
											<?php echo $product->id_promo ?>
										</td>
										<td>
											<?php echo $product->id_transaksi?>
										</td>
										<td>
											<?php echo $product->promo?>
										</td>
										<td>
											<?php echo $product->harga_bayar ?>
										</td>
										<td>
											<?php echo $product->tipe_barang ?>
										</td>
										<td>
											<?php echo $product->harga_barang ?>
										</td>

										<td width="250">
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