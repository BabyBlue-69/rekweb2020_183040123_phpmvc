<div class="container mt-3">
	
	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>

	<div class="row mb-2">
		<div class="col-lg-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#forModal">
  				Tambah Data Mahasiswa
			</button>
		</div>
	</div>

	<div class="row mb-2">
		<div class="col-lg-6">
			<form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
				<div class="input-group">
  					<input type="text" class="form-control" placeholder="Cari Mahasiswa..." name="keyword" id="keyword" autocomplete="off">
  						<div class="input-group-append">
    						<button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
  						</div>
				</div>
			</form>	
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<h3>Daftar Mahasiswa</h3>
			<ul class="list-group">
				<?php foreach ($data['mhs'] as $mhs) : ?>
  				<li class="list-group-item"><?= $mhs['Nama']; ?>
  					<a href="<?= BASEURL; ?>/mahasiswa/hapus/ <?= $mhs['id']; ?>" class="badge badge-danger float-right ml-2" onclick="return confirm('yakin?');">Hapus</a>
  					<a href="<?= BASEURL; ?>/mahasiswa/ubah/ <?= $mhs['id']; ?>" class="badge badge-warning float-right ml-2 tampilModalUbah" data-toggle="modal" data-target="#forModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
  					<a href="<?= BASEURL; ?>/mahasiswa/detail/ <?= $mhs['id']; ?>" class="badge badge-primary float-right ml-2">Detail</a>
  				</li>
  					<?php endforeach; ?>

				</ul>

		</div>
	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="forModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
			<input type="hidden" nama="id" id="id">
			<div class="form-group">
    			<label for="Nama">Nama</label>
    			<input type="text" class="form-control" id="Nama" name="Nama">
 			 </div>

			<div class="form-group">
    			<label for="NRP">NRP</label>
    			<input type="number" class="form-control" id="NRP" name="NRP">
 			 </div>

			<div class="form-group">
    			<label for="Email">Email</label>
    			<input type="email" class="form-control" id="Email" name="Email">
 			 </div>

			<div class="form-group">
    			<label for="Jurusan">Jurusan</label>
    			<select class="form-control" id="Jurusan" name="Jurusan">
      				<option value="Ilmu Ekononomi">Ilmu Ekonomi</option>
					<option value="Ilmu Biologi">Ilmu Biologi</option>
					<option value="Ilmu Psikologi">Ilmu Psikologi</option>
					<option value="Teknik Sipil">Teknik Sipil</option>
					<option value="Hubungan Internasional">Hubungan Internasional</option>
					<option value="Akutansi">Akutansi</option>
      			
    			</select>
  			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
		</form>
      </div>
    </div>
  </div>
</div>

<!-- 
<ul>
	<li><php $mhs['Nama']; ><li>
	<li><php $mhs['NRP']; ><li>
	<li><php $mhs['Email']; ><li>
	<li><php $mhs['Jurusan']; ><li>
</ul>
 -->