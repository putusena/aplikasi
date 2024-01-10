<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data Utama</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h5>Data Pelanggan</h5>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-hover">
            <thead class="bg-blue">
              <th>PelangganID</th>
              <th>Nama Pelanggan</th>
              <th>Alamat</th>
              <th>Nomor Telepon</th>
              <th>Aksi</th>
            </thead>
            <?php
            $sql = "SELECT * FROM pelanggan";
            $query = mysqli_query($koneksi, $sql);
            while ($kolom = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?= $kolom['pelangganid']; ?></td>
                <td><?= $kolom['namapelanggan']; ?></td>
                <td><?= $kolom['alamat']; ?></td>
                <td><?= $kolom['nomortelepon']; ?></td>
                <td>
                  <a href="aksi/pelanggan.php" data-toggle="modal" data-target="#modalubah<?= $kolom['pelangganid']; ?>"><i class="fas fa-edit"></i></a>
                  &nbsp;| &nbsp;
                  <a onclick="return confirm('Yakin untuk hapus data ini?')" href="aksi/pelanggan.php?aksi=hapus&pelangganid=<?= $kolom['pelangganid']; ?>"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <!-- MODAL UBAH PELANGGAN -->
              <div class="modal fade" id="modalubah<?= $kolom['pelangganid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="aksi/pelanggan.php" method="post">
                        <input type="hidden" name="aksi" value="ubah">
                        <input type="hidden" name="pelangganid" value="<?= $kolom['pelangganid']; ?>">

                        <label for="namapelanggan">Nama Pelanggan</label>
                        <input type="text" name="namapelanggan" value="<?= $kolom['namapelanggan']; ?>" class="form-control" required>
                        <br>
                        <label for="alamat">Alamat</label>
                        <input type="text_area" name="alamat" value="<?= $kolom['alamat']; ?>" class="form-control" required>
                        <br>
                        <label for="nomortelepon">Nomor Telepon</label>
                        <input type="number" name="nomortelepon" value="<?= $kolom['nomortelepon']; ?>" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-block bg-blue"> <i class="fas fa-save"></i> Simpan </button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            } // AKHIR WHILE
            ?>
          </table>

          <button type="button" class="btn bg-info btn-block mt-3" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus"></i>Tambah Pelanggan</button>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL TAMBAH PELANGGAN -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/pelanggan.php" method="post">
          <input type="hidden" name="aksi" value="tambah">
          <label for="namapelanggan">Nama Pelanggan</label>
          <input type="text" name="namapelanggan" class="form-control" required>
          <br>
          <label for="alamat">Alamat</label>
          <input type="text_area" name="alamat" class="form-control" required>
          <br>
          <label for="nomortelepon">Nomor Telepon</label>
          <input type="number" name="nomortelepon" class="form-control" required>
          <br>
          <button type="submit" class="btn btn-block bg-blue"> <i class="fas fa-save"></i> Simpan </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
