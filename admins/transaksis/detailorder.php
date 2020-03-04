<?php
      if(!defined('akses')){ 
        header("location: http://".$_SERVER['HTTP_HOST']."/403");
        die;
      }
      $id_transaksi = $_GET['id'];
      $query="SELECT transaksi.*, akun.nama, akun.alamat, akun.no_telepon, paket.nama_paket, paket.tarif_paket, transaksi.tarif FROM ((transaksi INNER JOIN akun ON transaksi.id_customer = akun.id_akun) INNER JOIN paket ON transaksi.id_paket = paket.id_paket) where transaksi.id_transaksi='$id_transaksi'";
      $result = $admin->ambilData($query);
      $data = $result->fetch_array();
      // $result = mysqli_query($con, );
      // $data = mysqli_fetch_array($result);
      if(isset($_POST['updatebtn'])){
        $id_transaksi = $_GET['id'];
        $admin->updateTransaksi($id_transaksi);
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Detail Transaksi</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this table-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo $working_dir;?>/new_assets/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo $working_dir;?>/new_assets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $working_dir;?>/new_assets/css/bootstrap-datepicker.css"> -->
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
          <!-- <h1 class="h3 mb-2 text-gray-800">Detail Transaksi</h1> -->

          <!-- Table Start -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> Detail Transaksi</h6>
            </div>
            <div class="card-body">
              <form method="post" action="">
                <div class="table-responsive">
                  <table class="table " width="100%" cellspacing="0">
                      <tr>
                        <td class="gradient align-middle" width="30%">No Transaksi</td>
                        <td><?php echo $data['id_transaksi'];?></td>
                      <tr>
                        <td class="gradient align-middle" width="30%">Nama</td>
                        <td><?php echo $data['nama'];?></td>
                      <tr>
                        <td class="gradient align-middle" width="30%">Alamat</td>
                        <td><?php echo $data['alamat'];?></td>
                      <tr>
                        <td class="gradient align-middle" width="30%">Telepon</td>
                        <td><?php echo $data['no_telepon'];?> 
                          <a target=_blank href="https://web.whatsapp.com/send?phone=<?php echo $data['no_telepon'];?>&text=Halo,+ini+dari+Laundry.+Cucian+Anda+sudah+bisa+diambil!+Terima+kasih.">(Kirim pesan via WhatsApp Web!)</a></td>
                      <tr>
                        <td class="gradient align-middle" width="30%">Status Pembayaran</td>
                        <td>
                          <select class="custom-select custom-select-md" name="status_bayar" <?php if($data['status_order'] == "Diambil" || $data['status_bayar'] == "Lunas"){echo "Disabled";}?>>
                            <option <?php if($data['status_bayar'] == "Belum di bayar") { echo "selected";}?> value='Belum'>Belum di bayar</option>
                            <option <?php if($data['status_bayar'] == "Lunas")          { echo "selected";}?> value='Lunas'>Lunas</option>
                          </select>
                        </td>
                      <tr>
                        <td class="gradient align-middle" width="30%">Status Order</td>
                        <td>
                          <select class="custom-select custom-select-md" name="status_order" <?php if($data['status_order'] == "Diambil" || $data['status_order'] == "Batal"){echo "Disabled";}?>>
                            <?php 
                            if($data['status_order']=="Baru"){?>
                              <option selected value='Baru'>Baru</option>
                              <option <?php if($data['status_order'] == "Proses") { echo "selected";}?> value='Proses'>Proses</option>
                              <option <?php if($data['status_order'] == "Selesai"){ echo "selected";}?> value='Selesai'>Selesai</option>
                              <option <?php if($data['status_order'] == "Diambil"){ echo "selected";}?> value='Diambil'>Diambil</option>
                              <option <?php if($data['status_order'] == "Batal")  { echo "selected";}?> value='Batal'>Batal</option><?php }
                            if($data['status_order']=="Proses"){?>
                              <option <?php if($data['status_order'] == "Proses") { echo "selected";}?> value='Proses'>Proses</option>
                              <option <?php if($data['status_order'] == "Selesai"){ echo "selected";}?> value='Selesai'>Selesai</option>
                              <option <?php if($data['status_order'] == "Diambil"){ echo "selected";}?> value='Diambil'>Diambil</option><?php }
                            elseif($data['status_order']=="Selesai"){?>
                              <option <?php if($data['status_order'] == "Selesai"){ echo "selected";}?> value='Selesai'>Selesai</option>
                              <option <?php if($data['status_order'] == "Diambil"){ echo "selected";}?> value='Diambil'>Diambil</option><?php }
                            elseif($data['status_order']=="Diambil"){?>
                              <option <?php if($data['status_order'] == "Diambil"){ echo "selected";}?> value='Diambil'>Diambil</option><?php }?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="gradient align-middle">Tanggal Selesai</td>
                        <td>
                          <!-- <input type="text" class="form-control datepicker" name="tgl_ambil" placeholder="dd/mm/yyyy" value="<?php //echo $data['tgl_ambil'];?>"> -->
                          <?php 
                            $tanggal=date_create($data['tgl_ambil']);
                            echo strftime('%A',strtotime(date_format($tanggal,"l")));
                            echo date_format($tanggal, ", j M Y");?>
                        </td>
                      </tr>
                  </table>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                      <td>No.</td>
                      <td>Tanggal Order</td>
                      <td>Paket Laundry</td>
                      <td>Berat Cucian</td>
                      <td>Harga/Kg</td>
                      <td>Pengiriman</td>
                      <td>Total</td>
                    </tr>
                    <tr>
                      <td class='align-middle'>1</td>
                      <td class='align-middle'>
                        <?php  $tanggal=date_create($data['tgl_transaksi']);
                             echo strftime('%A',strtotime(date_format($tanggal,"l")));
                             echo date_format($tanggal, ", j M Y");
                             echo " (".date_format($tanggal, "H:m").")";
                        ?>
                      </td>
                      <td class='align-middle'><?php echo $data['nama_paket'];?></td>
                      <td class='align-middle' width="15%">
                        <div class="input-group">
                          <input type="text" class="form-control" name="berat" value="<?php echo $data['berat'];?>" disabled>
                          <div class="input-group-prepend">
                            <div class="input-group-text">Kg</div>
                          </div>
                        </div>
                      </td>
                      <?php $tarif_paket=number_format($data['tarif_paket'], 0, ".", ".");
                            $tarif=number_format($data['tarif'], 0, ".", ".");
                      ?>
                      <td class='align-middle'>Rp <?php echo $tarif_paket;?></td>
                      <td class='align-middle'>Rp <?php if($data['hargaantar']!=null){echo number_format($data['hargaantar'], 0, ".", ".");}else{echo "0";}?>
                      <td class='align-middle'>Rp <?php echo $tarif;?></td>
                    </tr>
                  </table>
                </div>
                <div>
                  <a class="">
                    <span class="text text-white"><input class="btn btn-primary" type="submit" name="updatebtn" value="Update Order"></span>
                  </a>
                  <a class="btn btn-primary" href="<?php echo $working_dir."/transaksi/print?id=".$data['id_transaksi'];?>">
                    <span class="text text-white">Cetak Invoice</span>
                  </a>
                  <a class="btn btn-primary" href="<?php echo $working_dir."/transaksi";?>">
                    <span class="text text-white">Kembali</span>
                  </a>
                </div>
              </form>
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
  <script type="text/javascript" src="<?php echo $working_dir;?>/new_assets/js/bootstrap.min.js">"></script>
  <script type="text/javascript" src="<?php echo $working_dir;?>/new_assets/js/bootstrap-datepicker.min.js">"></script>
  <script type="text/javascript">
   $(function(){
    $(".datepicker").datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
    });
   });
  </script>
</body>

</html>
