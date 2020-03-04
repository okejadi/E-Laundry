<?php 
      if(!defined('akses')){ 
        header("location: http://".$_SERVER['HTTP_HOST']."/403");
        die;
      }
      if(isset($_POST['addbtn'])){
        $admin->tambahTransaksi();
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

  <title>Tambah Transaksi</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this table-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo $working_dir;?>/new_assets/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo $working_dir;?>/new_assets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?php echo $working_dir;?>/new_assets/css/bootstrap-select.min.css">
  
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
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> Tambah Transaksi</h6>
            </div>
            <div class="card-body">
              <form method="post" action="">
                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" id="nama" name="id_customer" data-live-search="true">
                      <option>-- Pilih Nama Customer --</option>
                      <?php $query="SELECT id_akun, nama, alamat FROM akun where level='customer'";
                            $result=$admin->ambilData($query);
                            foreach($result as $data) {
                              echo "<option value='".$data['id_akun']."'>".$data['nama']."</option>";
                            }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="berat" class="col-sm-2 col-form-label">Berat</label>
                  <div class="col-sm-3 input-group">
                    <input type="text" class="form-control" id="berat" name="berat" placeholder="Berat Cucian">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Kg</div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tgl_ambil" class="col-sm-2 col-form-label">Tanggal Ambil</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control datepicker" name="tgl_ambil" placeholder="Pilih Tanggal Selesai">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="id_paket" class="col-sm-2 col-form-label">Paket</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" id="id_paket" name="id_paket" data-live-search="true">
                      <!-- <option>-- Pilih Paket Cuci --</option> -->
                      <?php $querys="SELECT * FROM paket";
                            $result=$admin->ambilData($querys);
                            foreach($result as $data) {
                              echo "<option value='".$data['id_paket']."'>".$data['nama_paket']."</option>";
                            }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="pick_up" class="col-sm-2 col-form-label">Mau Diantar?</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" id="pick_up" name="pick_up">
                      <option value="no" selected="">Tidak</option>
                      <option value="yes">Ya</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row" id="hargaantarDiv">
                  <label for="hargaantar" class="col-sm-2 col-form-label">Tarif Antar</label>
                  <div class="col-sm-3 input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" class="form-control" id="hargaantar" name="hargaantar" placeholder="Tarif Kirim Cucian">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="status_bayar" class="col-sm-2 col-form-label">Status Pembayaran</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" id="status_bayar" name="status_bayar">
                      <option value="Belum">Belum di bayar</option>
                      <option value="Lunas">Lunas</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" name="addbtn" value="submit" class="btn btn-primary">Tambah</button>
                  </div>
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
  <script src="<?php echo $working_dir;?>/new_assets/js/bootstrap-select.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo $working_dir;?>/new_assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $working_dir;?>/new_assets/js/bootstrap-datepicker.min.js">"></script>

  <script type="text/javascript">
   $(function(){
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
   });

   $("#pick_up").change(function() {
      if ($(this).val() == "yes") {
        $('#hargaantarDiv').show();
          $('#hargaantar').attr('required', '');
          $('#hargaantar').attr('data-error', 'This field is required.');
      } else {
        $('#hargaantarDiv').hide();
        $('#hargaantar').removeAttr('required');
        $('#hargaantar').removeAttr('data-error');
      }
    });

    $("#pick_up").trigger("change");
  </script>
</body>

</html>
