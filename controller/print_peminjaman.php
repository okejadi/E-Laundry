<?php
define('FPDF_FONTPATH', 'controller/fpdf/font/');
require('fpdf/fpdf.php');

$db = new PDO('mysql:host=localhost;dbname=elaundry','root','');

// seperti sebelunya, kita membuat class anakan dari class FPDF

class myPDF extends FPDF{
  function header(){
    // $this->Image('../img/sija.png',10,10,20,20);
    // $this->Image('../img/smk.jpg',118,10,21,21);
    $this->SetFont('Arial','B',14);
    $this->Cell(0,5,'Bukti Transaksi',0,0,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Cell(0,10,'BERKAH LAUNDRY',0,0,'C');
    $this->Ln();
    $this->Cell(0,5,'JL. BUDI GG. H. SUBHAN II NO. 9B CIMAHI UTARA',0,0,'C');
    $this->Ln();
    $this->Line(10,36,138,36);
    $this->SetLineWidth(1);
    $this->Line(10,35,138,35);
    $this->Ln();
    $this->Ln();
  }
  function footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,$_SERVER['HTTP_HOST'],0,0,'C');
    //$this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    //$this->Cell(0,10,'*THP = Tidak Habis Pakai',0,0,'R');
  }
  // function judul($connection,$id_peminjaman){
    
  // }
  function isi($con,$id_transaksi){
    $query = "SELECT transaksi.*, akun.nama, akun.alamat, paket.* from (transaksi INNER JOIN akun ON transaksi.id_customer=akun.id_akun) INNER JOIN paket ON transaksi.id_paket=paket.id_paket where id_transaksi='$id_transaksi'";
    $femmy = mysqli_query($con, $query);
    while ($aurell = mysqli_fetch_assoc($femmy)) {
      $cellwidth=30;
      $this->SetFillColor(255,255,255); // warna isi
      $this->SetTextColor(0,0,0); // warna teks untuk th
      $this->Cell(30,10,'No. Transaksi','',0,'L',1); // cell dengan panjang 1
      $this->Cell(30,10,': '.$aurell['id_transaksi'],'',0,'L',1); // cell dengan panjang 1
      $this->Cell(65,10,strftime('%A',strtotime(date_format(date_create($aurell['tgl_transaksi']),"l"))).
      date_format(date_create($aurell['tgl_transaksi']), ", j M Y"),'',0,'R',1); // cell dengan panjang 1
      $this->Ln();
      $this->Cell(30,10,'Tgl Ambil','',0,'L',1); // cell dengan panjang 1
      $this->Cell(30,10,': '.
      strftime('%A',strtotime(date_format(date_create($aurell['tgl_ambil']),"l"))).
      date_format(date_create($aurell['tgl_ambil']), ", j M Y"),'',0,'L',1); // cell dengan panjang 1
      $this->Ln();
      $this->Cell(30,10,'Nama','',0,'L',1); // cell dengan panjang 1
      $this->Cell(30,10,': '.$aurell['nama'],'',0,'L',1); // cell dengan panjang 1
      $this->Ln();
      $this->Cell(30,10,'Alamat','',0,'L',1); // cell dengan panjang 1
      $this->Cell(30,10,': '.$aurell['alamat'],'',0,'L',1); // cell dengan panjang 1
      $this->Ln();
      $this->Cell(30,10,'Paket','',0,'L',1); // cell dengan panjang 1
      $this->Cell(30,10,': '.$aurell['nama_paket'],'',0,'L',1); // cell dengan panjang 1
      $this->Ln();
      $this->Cell(30,10,'Tarif /Kg','',0,'L',1); // cell dengan panjang 1
      $this->Cell(30,10,': Rp '.(($aurell['tarif']-$aurell['hargaantar'])/$aurell['berat']),'',0,'L',1); // cell dengan panjang 1
      $this->Ln();
      $this->Cell(30,10,'Berat Cucian','',0,'L',1); // cell dengan panjang 1
      $this->Cell(30,10,': '.$aurell['berat'].' Kilogram','',0,'L',1); // cell dengan panjang 1
      $this->Ln();
      $this->Cell(30,10,'Pembayaran','',0,'L',1); // cell dengan panjang 1
      $this->Cell(30,10,': '.$aurell['status_bayar'].' dibayar','',0,'L',1); // cell dengan panjang 1
      $this->Ln();
      $this->Cell(30,10,'Diantar?','',0,'L',1); // cell dengan panjang 2
      $teks=': '.ucfirst($aurell['pick_up']).' (Rp ';
      if($aurell['hargaantar']!=null){$teks.=$aurell['hargaantar'];}else{$teks.="0";}
      $teks.=")";
      $this->Cell(30,10,$teks,'',0,'L',1); // cell dengan panjang 2
      $this->Ln();
      $this->Cell(30,10,'Total','',0,'L',1); // cell dengan panjang 2
      $this->Cell(30,10,': '.'Rp '.$aurell['tarif'],'',0,'L',1); // cell dengan panjang 2
      $this->Ln();
    }
  }

  function ttd($con,$id_peminjaman){
    $akun = mysqli_query($con,"SELECT A.nama siswa,B.nama guru,peminjaman.tanggal_peminjaman FROM akun as A,akun as B,peminjaman where (peminjaman.akun_id=A.id AND peminjaman.id_guru=B.id) AND peminjaman.id_peminjaman='$id_peminjaman'");
    $peminjam=mysqli_fetch_array($akun);
    $tanggal = $peminjam['tanggal_peminjaman'];
    $siswa = $peminjam['siswa'];
    $guru = $peminjam['guru'];
    $this->Cell(0,15,'Cimahi, '.$tanggal,0,0,'L');
    $this->Ln();
    $this->Cell(0,3,'Penanggung Jawab',0,0,'L');
    $this->Cell(0,3,'Peminjam',0,0,'R');
    $this->Ln();
    $this->SetFont('Times','U',12);
    $this->Cell(0,30,$guru,0,0,'L');
    $this->Cell(0,30,$siswa,0,0,'R');
  }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A5',0);
//$pdf->judul($connection,$id_peminjaman);
// $pdf->tabeljudul();
$pdf->isi($con,$_GET['id']);
//$pdf->ttd($connection,$id_peminjaman);

// $fitria = mysqli_query($connection,"SELECT date(tanggal_peminjaman) tanggal,hour(tanggal_peminjaman) jam,minute(tanggal_peminjaman) menit,second(tanggal_peminjaman) detik FROM peminjaman where id_peminjaman='$id_peminjaman'");
// $rahma = mysqli_fetch_array($fitria);
// $dava = $rahma['tanggal'];
// $syifa = $rahma['jam'];
// $candra = $rahma['menit'];
// $aurell = $rahma['detik'];
$message_awal = 'Bukti_Transaksi';
$message    = $message_awal.'_'.$_GET['id'];//.'@'.$dava.'_'.$syifa.'_'.$candra.'_'.$aurell;
$nama  = $_SERVER['DOCUMENT_ROOT'].'/Arsips/'.$message.".pdf";
$pdf->Output($nama,'F');

 
// Header content type 
header("Content-type: application/pdf"); 
  
header("Content-Length: " . filesize($nama)); 
  
// Send the file to the browser. 
readfile($nama); 

// header("location:".$working_dir."/Arsips/Bukti_Transaksi_".$_GET['id'].".pdf");
// $nurkasyifah = $message.".pdf";
// $fathimah = mysqli_query($connection,"UPDATE peminjaman SET struk_peminjaman='$nurkasyifah' WHERE id_peminjaman='$id_peminjaman'");
?>