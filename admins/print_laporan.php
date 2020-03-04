<!DOCTYPE html>
<html>
<head>
	<title>Laporan Keuangan Laundry</title>
</head>
<body>
	<?php
	$tgl="Laporan_Keuangan_";
	$tahun=$_POST['tahun'];
	if(isset($_POST['bulans'])){
		if($_POST['bulans']!=0){
			$tgl.=$_POST['bulans'];
		}
	}
	$tgl.="_".$tahun;
	
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$tgl.xls");
	?>

	<center>
		<h1>Laporan Keuangan
			<?php 	if(isset($_POST['bulans'])){
						if($_POST['bulans']!=0){
						echo " Bulan ".$_POST['bulans'];
						}
					}
				  	echo " Tahun ".$_POST['tahun'];?></h1>
	</center>

	<table border="1">
		<?php
			$tahun=$_POST['tahun'];
			$query="SELECT SUM(tarif) tarif, COUNT(hargaantar) total_antar, COUNT(id_transaksi) total_transaksi FROM transaksi where year(tgl_transaksi)='$tahun'";
			if (isset($_POST['bulans'])) {
				if($_POST['bulans']!=0){
					$bulan=$_POST['bulans'];
					$query.="AND month(tgl_transaksi)='$bulan'";
				}else{}
			}
			$result=$admin->ambilData($query);
			while($data = mysqli_fetch_array($result)){
		?>
		<tr>
			<td>Total Transaksi </td>
			<td><?php echo $data['total_transaksi'];?></td>
		</tr>
		<tr>
			<td>Total Pengiriman </td>
			<td><?php echo $data['total_antar'];?></td>
		</tr>
		<tr>
			<td>Total Pendapatan </td>
			<td>Rp <?php echo number_format($data['tarif'], 0, ".", ".");?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>