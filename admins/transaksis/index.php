<?php 
      if(!defined('akses')){ 
        header("location: http://".$_SERVER['HTTP_HOST']."/403");
        die;
      }
      $query="SELECT transaksi.*, akun.nama, paket.nama_paket FROM ((transaksi INNER JOIN akun ON transaksi.id_customer = akun.id_akun) INNER JOIN paket ON transaksi.id_paket = paket.id_paket) GROUP BY tgl_transaksi ORDER BY status_order='Proses' DESC, status_order='Selesai' DESC, tgl_ambil ASC";
      $result = $admin->ambilData($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Transaksi</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this table-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'admins/_partials/sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'admins/_partials/topbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>

          <!-- Table Start -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-dollar-sign"></i> Daftar Transaksi</h6>
            </div>
            <div class="card-body">
              <p class="align-left">
                <a class="btn btn-sm btn-icon-split btn-primary" href="<?php echo $working_dir;?>/transaksi/tambah">
                  <span class="icon">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Transaksi</span>
                </a>
              </p>
              <div class="table-responsive">
                <table class="table " id="dataTabless" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Selesai Pada</th>
                      <th>Nama</th>
                      <th>Paket</th>
                      <th>Pembayaran</th>
                      <th>Status</th>
                      <th>Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Selesai Pada</th>
                      <th>Nama</th>
                      <th>Paket</th>
                      <th>Pembayaran</th>
                      <th>Status</th>
                      <th>Total</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1;
                      foreach ($result as $data) {
                      //   <td class='align-middle'>".date_format(date_create($data['tgl_transaksi']), "D, j M Y")."</td>
                      //   <td class='align-middle'>".date_format(date_create($data['tgl_transaksi']), "H:i")."</td>
                      echo "<tr>";
                      echo "<td>".$no++."</td>";
                      echo "<td class='align-middle'>";
                        $tanggal=date_create($data['tgl_ambil']);
                        echo strftime('%A',strtotime(date_format($tanggal,"l")));
                        echo date_format($tanggal, ", j M");
                        echo "<br>";
                        echo date_format($tanggal, " Y");
                      echo "</td>
                      <td class='align-middle'>".$data['nama']."</td>
                      <td class='align-middle'>".$data['nama_paket']."</td>
                      <td class='align-middle'>".$data['status_bayar']."</td>
                      <td class='align-middle'>"; if($data['status_order']=="Baru"){
                                echo "<a class='btn btn-warning btn-block text-white'>";
                              }elseif ($data['status_order']=="Proses") {
                                echo "<a class='btn btn-success btn-block text-white'>";
                              }elseif ($data['status_order']=="Selesai") {
                                echo "<a class='btn btn-primary btn-block text-white'>";
                              }elseif ($data['status_order']=="Diambil") {
                                echo "<a class='btn btn-info btn-block text-white'>";
                              }elseif ($data['status_order']=="Batal") {
                                echo "<a class='btn btn-danger btn-block text-white'>";
                              }
                      echo "
                        <span class='text'>".$data['status_order']."</span></a></td>
                      <td class='align-middle'>Rp. ".number_format($data['tarif'], 0, ".", ".")."</td>
                      <td class='align-middle'>
                        <a type='button' class='btn btn-sm btn-primary btn-icon-split' href='".$working_dir."/transaksi/detail?id=".$data['id_transaksi']."'>
                            <span class='icon text-white-50'><i class='fas fa-info'></i></span>
                            <span class='text'>Detail</span>
                          </a>
                      </td>
                    </tr>";
                      }
                    ?>
                    <!-- <tr>
                      <td>1</td>
                      <td>01/20/2020</td>
                      <td>Faisal</td>
                      <td>Cuci 2kg</td>
                      <td>Lunas</td>
                      <td>
                        <a class="btn btn-warning btn-block text-white">
                          <span class="text">Baru</span></a></td>
                      <td>Rp.15,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>01/20/2020</td>
                      <td>Yoga</td>
                      <td>Cuci 3kg dan Setrika</td>
                      <td>Belum di bayar</td>
                      <td>
                        <a class="btn btn-info btn-block text-white">
                          <span class="text">Diambil</span></a></td>
                      <td>Rp.30,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>01/20/2020</td>
                      <td>Dava</td>
                      <td>Cuci 2kg</td>
                      <td>Lunas</td>
                      <td>
                        <a class="btn btn-success btn-block text-white">
                          <span class="text">Proses</span></a></td>
                      <td>Rp.15,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>01/20/2020</td>
                      <td>Fajri</td>
                      <td>Cuci 10kg dan Setrika Uap</td>
                      <td>Belum di bayar</td>
                      <td>
                        <a class="btn btn-primary btn-block text-white">
                          <span class="text">Selesai</span></a></td>
                      <td>Rp.120,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>01/20/2020</td>
                      <td>Zidan</td>
                      <td>Cuci 3kg dan Setrika Uap</td>
                      <td>Belum di bayar</td>
                      <td>
                        <a class="btn btn-danger btn-block text-white">
                          <span class="text">Batal</span></a></td>
                      <td>Rp.40,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>01/20/2020</td>
                      <td>Aurell</td>
                      <td>Cuci 3kg dan Setrika</td>
                      <td>Lunas</td>
                      <td>
                        <a class="btn btn-success btn-block text-white">
                          <span class="text">Proses</span></a></td>
                      <td>Rp.30,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>01/20/2020</td>
                      <td>Raysan</td>
                      <td>Cuci 5kg dan Setrika Uap</td>
                      <td>Belum di bayar</td>
                      <td>
                        <a class="btn btn-success btn-block text-white">
                          <span class="text">Proses</span></a></td>
                      <td>Rp.60,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>01/20/2020</td>
                      <td>Farhan</td>
                      <td>Cuci 4kg dan Setrika Uap</td>
                      <td>Lunas</td>
                      <td>
                        <a class="btn btn-success btn-block text-white">
                          <span class="text">Proses</span></a></td>
                      <td>Rp.50,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>01/20/2020</td>
                      <td>Rizki</td>
                      <td>Cuci 3kg</td>
                      <td>Belum di bayar</td>
                      <td>
                        <a class="btn btn-success btn-block text-white">
                          <span class="text">Proses</span></a></td>
                      <td>Rp.25,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>01/20/2020</td>
                      <td>Femmy</td>
                      <td>Cuci 1kg dan Setrika Uap</td>
                      <td>Lunas</td>
                      <td>
                        <a class="btn btn-success btn-block text-white">
                          <span class="text">Proses</span></a></td>
                      <td>Rp.20,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>01/20/2020</td>
                      <td>Amel</td>
                      <td>Cuci 2kg dan Setrika Uap</td>
                      <td>Belum di bayar</td>
                      <td>
                        <a class="btn btn-success btn-block text-white">
                          <span class="text">Proses</span></a></td>
                      <td>Rp.30,800</td>
                      <td>
                        <a type="button" class="btn btn-sm btn-primary btn-icon-split" href="?id=1">
                            <span class="icon text-white-50"><i class="fas fa-info"></i></span>
                            <span class="text">Detail</span>
                          </a>
                      </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'admins/_partials/footer.php'?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include 'admins/_partials/modal.php';?>

  <?php include 'admins/_partials/script.php'?>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#dataTabless').DataTable( {       
        scrollX:        true,
        scrollCollapse: true,
        autoWidth:         true,  
         paging:         true,       
        columnDefs: [
        { "width": "75px", "targets": [6] },
        { "width": "100px", "targets": [3] }
      ]
    } );
  } );

  <?php if(isset($_GET['msg'])){ 
          if($_GET['msg']=="edit"){ ?>
              $(document).ready(function(){
                  alert('Update Sukses!!')
            })
  <?php }} ?>


</script>
</html>
