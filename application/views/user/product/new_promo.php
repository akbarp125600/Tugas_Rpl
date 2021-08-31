
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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products_promo/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/product/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">id</label>
								<input class="form-control <?php echo form_error('id_promo') ? 'is-invalid':'' ?>"
								 type="text" name="id_promo" placeholder="nomer barang" />
								<div class="invalid-feedback">
									<?php echo form_error('id_promo') ?>
								</div>
							</div>
							

							<div class="form-group">
								<label for="price">promo</label>
								<input class="form-control <?php echo form_error('promo') ? 'is-invalid':'' ?>"
								 type="text" name="promo" placeholder="golek promo tok ae" />
								<div class="invalid-feedback">
									<?php echo form_error('promo') ?>
								</div>
							</div>


					<!--		<div class="form-group">
								<label for="name">image</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>  -->

							<div class="form-group">
								<label for="price">tipe barang</label>
								<input class="form-control <?php echo form_error('tipe_barang') ? 'is-invalid':'' ?>"
								 type="text" name="tipe_barang" placeholder="jumlah" />
								<div class="invalid-feedback">
									<?php echo form_error('tipe_barang') ?>
								</div>
							</div>


						<!--	<div class="form-group">
								<label for="price">kategori</label>
								<input class="form-control <?php echo form_error('kategori') ? 'is-invalid':'' ?>"
								 type="text" name="kategori" placeholder="stok ketersediaan" />
								<div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">nama barang</label>
								<textarea class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
								 name="nama_barang" placeholder="penjelasan barang..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('nama_barang') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="price">harga barang</label>
								<input class="form-control <?php echo form_error('harga_barang') ? 'is-invalid':'' ?>"
								 type="text" name="harga_barang" placeholder="20000" />
								<div class="invalid-feedback">
									<?php echo form_error('harga_barang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">diskon</label>
								<input class="form-control <?php echo form_error('diskon') ? 'is-invalid':'' ?>"
								 type="text" name="diskon" placeholder="stok ketersediaan" />
								<div class="invalid-feedback">
									<?php echo form_error('diskon') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">diskripsi</label>
								<input class="form-control <?php echo form_error('diskripsi') ? 'is-invalid':'' ?>"
								 type="text" name="diskripsi" placeholder="stok ketersediaan" />
								<div class="invalid-feedback">
									<?php echo form_error('diskripsi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">pembeli</label>
								<option value="">Select Menu</option>
								<select  name="pembeli" class="form-control">
									<?php foreach($product->result() as $value){ ?>
											<option value="<?php echo $value->nama;?>"><?php echo $value->nama;?></option>
									<?php } ?>
								</select>

								<div class="invalid-feedback">
									<?php echo form_error('pembeli') ?>
								</div>
							</div> -->
							<input class="btn btn-success" type="submit" name="btn" value="Save"/>


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