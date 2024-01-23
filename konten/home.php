<?php
    
 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <?php 
            $query = "SELECT * FROM produk";
            $sql = mysqli_query($koneksi,$query);
            $total_produk = mysqli_num_rows($sql);
            ?>
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $total_produk ?></h3>

                <p>Produk</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="index.php?p=produk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php 
              $query1 = "SELECT * FROM penjualan";
              $sql1 = mysqli_query($koneksi,$query1);
              $PenjualanID = mysqli_num_rows($sql1);
            ?>
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <?= $PenjualanID ?> </h3>

                <p>Jumlah Transaksi</p>
              </div>
              <div class="icon">
                <i class="fas fa-exchange-alt"></i>
              </div>
              <a href="index.php?p=histori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
              $query2="SELECT SUM(TotalHarga) AS total_transaksi FROM penjualan";
              $sql2 = mysqli_query($koneksi,$query2);
              $tt = mysqli_fetch_array($sql2);
              $TotalTransaksi = $tt['total_transaksi'];
            ?>
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?= number_format ($TotalTransaksi) ?> </h3>

                <p>Total Transaksi</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="index.php?p=histori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php 
                $query3 = "SELECT * FROM pelanggan";
                $sql3 = mysqli_query($koneksi,$query3);
                $PelangganID = mysqli_num_rows($sql3);
              ?>
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $PelangganID ?> </h3>

                <p>Jumlah Pelanggan</p>
              </div>
              <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
              <a href="index.php?p=pelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->