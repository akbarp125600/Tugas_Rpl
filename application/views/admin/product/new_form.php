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
				<div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/product/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">id barang</label>
								<input class="form-control <?php echo form_error('id_barang') ? 'is-invalid':'' ?>"
								 type="text" name="id_barang" placeholder="nomer barang" />
								<div class="invalid-feedback">
									<?php echo form_error('id_barang') ?>
								</div>
							</div>
							

							<div class="form-group">
								<label for="price">nama barang</label>
								<input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
								 type="text" name="nama_barang" placeholder="nama barang" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_barang') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">image</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">kategori</label>
								<select  name="kategori" class="form-control">
									<?php foreach($product->result() as $key => $value){ ?>
							<option value="<?php echo $value->kategori;?>"><?php echo $value->kategori;?></option>
									<?php } ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="price">stok barang</label>
								<input class="form-control <?php echo form_error('stok_barang') ? 'is-invalid':'' ?>"
								 type="text" name="stok_barang" placeholder="stok ketersediaan" />
								<div class="invalid-feedback">
									<?php echo form_error('stok_barang') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Description</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="penjelasan barang..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
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