<!DOCTYPE html>
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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/products_pilihanpromo/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/product/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $product->kd_pilihan?>" />

							<div class="form-group">
								<label for="name">kode</label>
								<input class="form-control <?php echo form_error('kd_pilihan') ? 'is-invalid':'' ?>"
								 type="text" name="kd_pilihan" placeholder="nomere piro slur" value="<?php echo $product->kd_pilihan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">pilihan</label>
								<input class="form-control <?php echo form_error('pilihan_promo') ? 'is-invalid':'' ?>"
								 type="text" name="pilihan_promo" placeholder="tulisen jenenge" value="<?php echo $product->pilihan_promo ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('pilihan_promo') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">batas promo</label>
								<!--input class="form-control <?php echo form_error('batas_promo') ? 'is-invalid':'' ?>" --> 
								<select class="form-control" name='batas_promo'> 
										  <option value="1">1 hari</option>
										  <option value="2">2 hari</option>
										  <option value="3">3 hari</option>
										  <option value="4">4 hari</option>
										</select>
							
								<div class="invalid-feedback">
									<?php echo form_error('batas_promo') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">status</label>
								<input class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>"
								 type="text" name="status" placeholder="tulisen jenenge" value="<?php echo $product->pilihan_promo ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
							</div>



					<!--		<div class="form-group">
								<label for="name">image</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $product->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>		

							<div class="form-group">
								<label for="price">jumlah beli</label>
								<input class="form-control <?php echo form_error('alamat_produksi') ? 'is-invalid':'' ?>"
								 type="text" name="alamat_produksi" placeholder="barange opo" value="<?php echo $product->alamat_produksi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat_produksi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">kategori</label>
								<input class="form-control <?php echo form_error('kategori') ? 'is-invalid':'' ?>"
								 type="text" name="kategori" placeholder="akeh ta barange" value="<?php echo $product->kategori ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">nama barang</label>
								<input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
								 type="text" name="nama_barang" placeholder="barange opo" value="<?php echo $product->nama_barang ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_barang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">harga barang</label>
								<input class="form-control <?php echo form_error('harga_barang') ? 'is-invalid':'' ?>"
								 type="number" name="harga_barang" placeholder="piroan" value="<?php echo $product->harga_barang ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('harga_barang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">diskon</label>
								<input class="form-control <?php echo form_error('diskon') ? 'is-invalid':'' ?>"
								 type="text" name="diskon" placeholder="piroan" value="<?php echo $product->diskon ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('diskon') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">diskripsi</label>
								<input class="form-control <?php echo form_error('diskripsi') ? 'is-invalid':'' ?>"
								 type="text" name="diskripsi" placeholder="piroan" value="<?php echo $product->diskripsi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('diskripsi') ?>
								</div>
							</div> -->
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>