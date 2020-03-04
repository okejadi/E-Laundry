<?php
 
class Admin extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function ambilData($query)
    {
        $result = $this->koneksi->query($query) or die (mysqli_error());
        // $result = $result->fetch_array();
        return $result;
    }

    function editPaket(){
        $id_paket = $_POST['id_paket'];
        $nama_paket = $_POST['nama_paket'];
        $tarif_paket = $_POST['tarif_paket'];
        $query = "UPDATE paket SET nama_paket=?, tarif_paket=? WHERE id_paket=?";
        $edit = $this->koneksi->prepare($query);
        $edit->bind_param("sii", $nama_paket, $tarif_paket, $id_paket);
        if ($edit->execute()) {
            header("location:".$working_dir."/paket?msg=edit");
        }else{
            echo "internal server error";
        }
        $this->koneksi->close();
    }

    function editAdmin(){
        $id_akun   = $_POST['id_akun'];
        $nama      = $_POST['nama'];
        $email     = $_POST['email'];
        $no_telepon= $_POST['no_telepon'];
        $alamat    = $_POST['alamat'];
        
        $stmt = $this->koneksi->prepare("SELECT password FROM akun WHERE id_akun = ?");
        $stmt->bind_param('i', $id_akun);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($password);
        $stmt->fetch();
        if(password_verify($_POST['password'], $password)){
            //jika akun mau ganti password
            if ($_POST['passwordbaru']!=null) {
                $passwordbaru= password_hash($_POST['passwordbaru'], PASSWORD_DEFAULT); // membuat hash password php
                $query   = "UPDATE akun SET nama=?, email=?, no_telepon=?, alamat=?, password=? WHERE id_akun=?";
                $edit    = $this->koneksi->prepare($query);
                $edit->bind_param("sssssi", $nama, $email, $no_telepon, $alamat, $passwordbaru, $id_akun);
            }else{ // jika tidak ganti
                $query= "UPDATE akun SET nama=?, email=?, no_telepon=?, alamat=? WHERE id_akun=?";
                $edit    = $this->koneksi->prepare($query);
                $edit->bind_param("ssssi", $nama, $email, $no_telepon, $alamat, $id_akun);
            }

            if ($edit->execute()) {
                header("location:".$working_dir."/admin?msg=edit");
            }else{
                echo "internal server error";
            }
            $this->koneksi->close();
        }else{
            echo "Wrong ID or Password!";

        }
    }

    function editCustomer(){
        $id_akun   = $_POST['id_akun'];
        $nama      = $_POST['nama'];
        $email     = $_POST['email'];
        $no_telepon= $_POST['no_telepon'];
        $alamat    = $_POST['alamat'];
        $is_active = $_POST['is_active'];
        
        //jika akun aktif dan mau ganti password
        if ($is_active=="yes" && $_POST['password']!=null) {
            $password= password_hash($_POST['password'], PASSWORD_DEFAULT); // membuat hash password php
            $query   = "UPDATE akun SET nama=?, email=?, no_telepon=?, alamat=?, is_active=?, password=? WHERE id_akun=?";
            $edit    = $this->koneksi->prepare($query);
            $edit->bind_param("ssssssi", $nama, $email, $no_telepon, $alamat, $is_active, $password, $id_akun);

        }

        // jika akun aktif tidak mau ganti password atau akun yg tidak aktif
        else{
            $query= "UPDATE akun SET nama=?, email=?, no_telepon=?, alamat=?, is_active=? WHERE id_akun=?";
            $edit    = $this->koneksi->prepare($query);
            $edit->bind_param("sssssi", $nama, $email, $no_telepon, $alamat, $is_active, $id_akun);
        }       

        if ($edit->execute()) {
            header("location:".$working_dir."/customer?msg=edit");
        }else{
            echo "internal server error";
        }
        $this->koneksi->close();
    }    

    function tambahAdmin(){
        $nama   = $_POST['nama'];
        $email  = $_POST['email'];
        $alamat = $_POST['alamat'];
        $no_tel = $_POST['no_tel'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query  = "INSERT INTO akun (level, nama, email, alamat, no_telepon, is_active, password) VALUES('admeen',?,?,?,?,'yes',?)";
        $insert = $this->koneksi->prepare($query);
        $insert->bind_param("sssss", $nama, $email, $alamat, $no_tel, $password);
        if ($insert->execute()){
            header("location:".$working_dir."/admin?msg=tambah");
        }else{
            //$error = $insert->errno.''.$insert->error;
            echo "Internal server error 500";}
        $this->koneksi->close();
    }

    function tambahCustomer(){
        $nama   = $_POST['nama'];
        $email  = $_POST['email'];
        $alamat = $_POST['alamat'];
        $no_tel = $_POST['no_tel'];
        $status = $_POST['is_aktif'];
        $query  = "INSERT INTO akun (level, nama, email, alamat, no_telepon, is_active) VALUES('customer',?,?,?,?,?)";
        $insert = $this->koneksi->prepare($query);
        $insert->bind_param("sssss", $nama, $email, $alamat, $no_tel, $status);
        if ($insert->execute()){
            header("location:".$working_dir."/customer?msg=tambah");
        }else{
            //$error = $insert->errno.''.$insert->error;
            echo "Internal server error 500";}
        $this->koneksi->close();
    }

    function tambahPaket(){
        $nama_paket = $_POST['nama_paket'];
        $tarif_paket= $_POST['tarif_paket'];
        $query = "INSERT INTO paket (nama_paket, tarif_paket) VALUES(?,?)";
        $insert= $this->koneksi->prepare($query);
        $insert->bind_param("si", $nama_paket, $tarif_paket);
        if ($insert->execute()){
            header("location:".$working_dir."/paket?msg=tambah");
        }else{
            //$error = $insert->errno.''.$insert->error;
            echo "Internal server error 500";}
        $this->koneksi->close();
    }

    function Hapus($id,$tabel){
        if($tabel=="customer"||$tabel=="admin"){
            $query="DELETE FROM akun WHERE id_akun='$id'";
        }
        elseif($tabel=="paket"){
            $query="DELETE FROM paket WHERE id_paket='$id'";
        }
        $result = $this->koneksi->query($query);
        header("location:".$working_dir."/".$tabel."?msg=hapus");
    }

    function tambahTransaksi(){
        $id_paket    = $_POST['id_paket'];  
        $id_customer = $_POST['id_customer'];
        $tgl_ambil   = $_POST['tgl_ambil'];
        $berat       = $_POST['berat'];
        $pick_up     = $_POST['pick_up'];
        $tarif_paket = $this->koneksi->query("select tarif_paket from paket where id_paket='$id_paket'") or die (mysqli_error());
        $tarif       = $tarif_paket->fetch_array();
        $total_tarif = $tarif['tarif_paket']*$berat;
            if(isset($_POST['hargaantar']) && $_POST['hargaantar']!=0){
                $hargaantar=$_POST['hargaantar'];
                $total_tarif=$total_tarif+$hargaantar;
            }
        $status_bayar= $_POST['status_bayar'];
            if($status_bayar=="Belum"){$status_bayar="Belum";
            }elseif ($status_bayar=="Lunas") {$status_bayar="Lunas";
            }else{echo "invalid status pembayaran value!"; die;}
        $query  = "INSERT INTO transaksi (id_customer, id_paket, tarif, hargaantar, tgl_ambil, berat, pick_up, status_bayar) VALUES(?,?,?,?,?,?,?,?)";
        $insert = $this->koneksi->prepare($query);
        $insert->bind_param("iiiisiss",$id_customer, $id_paket, $total_tarif, $hargaantar, $tgl_ambil, $berat, $pick_up, $status_bayar);
        if ($insert->execute()){
            header("location:".$working_dir."/transaksi?msg=tambah");
        }else{echo "Internal server error 500";}
        $this->koneksi->close();
    }

    function updateTransaksi($id_transaksi){
        $query="UPDATE transaksi SET status_order=? WHERE id_transaksi=?";
        if(isset($_POST['status_bayar'])){
            $query="UPDATE transaksi SET status_bayar=?, status_order=? WHERE id_transaksi=?";
            $status_bayar = $_POST['status_bayar'];
                if($status_bayar=="Belum"){$status_bayar="Belum";
                }elseif ($status_bayar=="Lunas") {$status_bayar="Lunas";
                }else{echo "invalid status pembayaran value!"; die;}
        }
        $status_order = $_POST['status_order'];
            if ($status_order=="Proses") {$status_order=="Proses";
            }elseif ($status_order=="Selesai") {$status_order=="Selesai";
            }elseif ($status_order=="Diambil") {$status_order=="Diambil";
            }elseif ($status_order=="Batal") {$query="DELETE FROM transaksi where id_transaksi=?";
            }else{echo "invalid status order value!"; die;}

        $update = $this->koneksi->prepare($query);
        if($status_order=="Batal"){
            $update->bind_param("i", $id_transaksi);
        }elseif(!isset($status_bayar)){
            $update->bind_param("si", $status_order, $id_transaksi);
        }else{
            $update->bind_param("ssi", $status_bayar, $status_order, $id_transaksi);
        }
        
        if($update->execute())
        {
          header("location:".$working_dir."/transaksi?msg=edit");
        }
        else{echo "Internal server error 500";}
        $this->koneksi->close();
    }

    // public function getData($query)
    // {        
    //     $result = $this->connection->query($query);
        
    //     if ($result == false) {
    //         return false;
    //     }
        
    //     $rows = array();
        
    //     while ($row = $result->fetch_array()) {
    //         $rows[] = $row;
    //     }
        
    //     return $rows;
    // }
        
    // public function execute($query)
    // {
    //     $result = $this->connection->query($query);
        
    //     if ($result == false) {
    //         echo 'Error: cannot execute the command';
    //         return false;
    //     } else {
    //         return true;
    //     }        
    // }
    
    // public function delete($id, $table)
    // {
    //     $query = "DELETE FROM $table WHERE id = $id";
        
    //     $result = $this->connection->query($query);
    
    //     if ($result == false) {
    //         echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }
 
    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}

$admin=new Admin();

?>