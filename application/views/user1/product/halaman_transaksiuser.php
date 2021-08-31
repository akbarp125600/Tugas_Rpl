<!DOCTYPE html>

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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('user/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo base_url('user/products_halamanuser/add/'.$data_user->user_id.'/'.$data_barang->id_barang) ?>" method="post" enctype="multipart/form-data" >
							
					<div class="form-group">
								<label for="price">ID Transaksi</label>
								<input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
								 type="text" name="id_transaksi" placeholder="nama barang" value="<?php echo time(); ?>" readonly/>
								<div class="invalid-feedback">
									<?php echo form_error('nama_barang') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">id barang</label>
								<input class="form-control <?php echo form_error('id_barang') ? 'is-invalid':'' ?>"
								 type="text" name="id_barang" placeholder="nomer barang" value="<?php echo $data_barang->id_barang ?>" /><input class="form-control <?php echo form_error('id_barang') ? 'is-invalid':'' ?>"
								 type="hidden" name="id_user" placeholder="nomer barang" value="<?php echo $data_user->user_id ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('id_barang') ?>
								</div>
							</div>
							

							<div class="form-group">
								<label for="price">nama barang</label>
								<input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
								 type="text" name="nama_barang" placeholder="nama barang" value="<?php echo $data_barang->nama_barang ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_barang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">kategori</label>
								<input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
								 type="text" name="kategori" placeholder="nama barang" value="<?php echo $data_barang->kategori ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>

							

							<div class="form-group">
								<label for="price">stok barang</label>
								<input class="form-control <?php echo form_error('stok_barang') ? 'is-invalid':'' ?>"
								 type="text" name="stok_barang" placeholder="stok ketersediaan" value="<?php echo $data_barang->stok_barang ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('stok_barang') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="price">Jumlah Beli</label>
								<!--setting jumlah batasan stok barang -->
								<select  name="jumlah_beli" class="form-control" onchange="cek(this.value)">
									<?php for ($i=1; $i <= $data_barang->stok_barang; $i++) {  
										# code...
									 ?>			
											<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php } ?>
								</select>

								<div class="invalid-feedback">
									<?php echo form_error('pembeli') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Description</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="penjelasan barang..."><?php echo $data_barang->description ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="price">harga barang</label>
								<input class="form-control <?php echo form_error('harga_barang') ? 'is-invalid':'' ?>"
								 type="text" id="harga_barang" name="harga_barang" value="<?php echo $data_barang->harga_barang;?>" />
								<div class="invalid-feedback">
									<?php echo form_error('harga_barang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Nama Pembeli</label>
								<textarea class="form-control <?php echo form_error('pembeli') ? 'is-invalid':'' ?>"
								 name="pembeli" placeholder="nama.."><?php echo $data_user->user_name ?></textarea> 
								<div class="invalid-feedback">
									<?php echo form_error('pembeli') ?>
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
				<?php $this->load->view("user/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<script type="text/javascript">
			function cek(x){
				var hrgaw = <?php echo $data_barang->harga_barang;?>; 
				var harga = x * hrgaw;
				$("#harga_barang").val(harga);
			}
		</script>
		<?php $this->load->view("user/_partials/scrolltop.php") ?>

		<?php $this->load->view("user/_partials/js.php") ?>

</body>

</html>