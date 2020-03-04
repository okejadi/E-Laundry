<?php 
      if(!defined('akses')){ 
        header("location: http://".$_SERVER['HTTP_HOST']."/403");
        die;
      }
      $id_akun = $_GET['id'];
      $query="SELECT * FROM akun WHERE id_akun='$id_akun'";
      $result = $admin->ambilData($query);
      $data = $result->fetch_array();

      if(isset($_POST['addbtn'])){
        $admin->editAdmin();
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

  <title>Edit Data Admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this table-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo $working_dir;?>/new_assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $working_dir;?>/new_assets/css/bootstrap-datepicker.css"> -->
  <link rel="stylesheet" href="<?php echo $working_dir;?>/new_assets/css/bootstrap-select.min.css">
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include '_partials/sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include '_partials/topbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Detail Transaksi</h1> -->

          <!-- Table Start -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> Edit Data Admin</h6>
            </div>
            <div class="card-body">
              <form method="post" action="">
                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pelanggan" value="<?php echo $data['nama'];?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Customer" value="<?php echo $data['email'];?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telepon" name="no_telepon" placeholder="No. Telepon Pelanggan" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" value="<?php echo $data['no_telepon'];?>">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="<?php echo $data['alamat'];?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Admin">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="gantipassword" class="col-sm-2 col-form-label">Ganti Password ?</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" id="gantipassword" name="gantipassword">
                      <option value="no" selected="">Tidak</option>
                      <option value="yes">Ya</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row" id="passwordbaruDiv">
                  <label for="passwordbaru" class="col-sm-2 col-form-label">Password Baru</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="Masukkan Password baru">
                  </div>
                </div>

                <input type="hidden" name="id_akun" value="<?php echo $id_akun;?>">

                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" name="addbtn" value="submit" class="btn btn-primary">Update</button>
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
      <?php include '_partials/footer.php'?>
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
  <?php include '_partials/modal.php';?>

  <?php include '_partials/script.php'?>
  <script src="<?php echo $working_dir;?>/new_assets/js/bootstrap-select.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
  <script type="text/javascript" src="<?php echo $working_dir;?>/new_assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $working_dir;?>/new_assets/js/bootstrap-datepicker.min.js">"></script>
  <script>
      $("#gantipassword").change(function() {
      if ($(this).val() == "yes") {
        $('#passwordbaruDiv').show();
          $('#passwordbaru').attr('required', '');
          $('#passwordbaru').attr('data-error', 'This field is required.');
      } else {
        $('#passwordbaruDiv').hide();
        $('#passwordbaru').removeAttr('required');
        $('#passwordbaru').removeAttr('data-error');
      }
    });

    $("#gantipassword").trigger("change");
  </script>

</body>

</html>
