<?php 
$id_anggota = $_SESSION['id_anggota'];
$sql_tabungan_anggota = mysqli_query($con,"SELECT * FROM tabungan_anggota INNER JOIN anggota on tabungan_anggota.id_anggota = anggota.id_anggota INNER JOIN total_tabungan_anggota ON tabungan_anggota.rek_tabungan = total_tabungan_anggota.rek_tabungan WHERE tabungan_anggota.id_anggota = '$id_anggota' ") or die (mysqli_error($con));
$data = mysqli_fetch_array($sql_tabungan_anggota);
$total_tabungan = $data['total_simpanan'];

$sql_pembiayaan_anggota = mysqli_query($con,"SELECT SUM(jumlah_pembiayaan) AS jumlah_pembiayaan FROM pembiayaan_anggota INNER JOIN anggota on pembiayaan_anggota.id_anggota = anggota.id_anggota WHERE pembiayaan_anggota.id_anggota = '$id_anggota' ") or die (mysqli_error($con));
$data2 = mysqli_fetch_array($sql_pembiayaan_anggota);
$total_pembiayaan = $data2['jumlah_pembiayaan'];

$sql_simpanan_anggota = mysqli_query($con,"SELECT SUM(jumlah) AS jumlah FROM simpanan_anggota INNER JOIN anggota on simpanan_anggota.id_anggota = anggota.id_anggota WHERE simpanan_anggota.id_produk = '7' AND simpanan_anggota.id_anggota = '$id_anggota' ") or die (mysqli_error($con));
$data3 = mysqli_fetch_array($sql_simpanan_anggota);
$total_simpanan = $data3['jumlah'];

$sql=mysqli_query($con,"select sum(jumlah_pokok) as jumlah_pokok from simpanan_pokok a inner join anggota b on a.id_anggota = b.id_anggota where a.id_anggota = '$id_anggota'") or die (mysqli_error($con));
$data4=mysqli_fetch_array($sql);
$jumlah_pokok = $data4['jumlah_pokok'];
?>
<h3><i class="fa fa-angle-right"></i> Halaman Dasbor</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Selamat Datang <strong><?php echo $_SESSION['nama_lengkap'] ?> | <?php echo $_SESSION['id_anggota'] ?></strong></p>
	</div>
</div>
<div class="row mt">
	<div align="center">
		<div align="center">
			<div class="col-lg-6">		
				<div class="alert alert-success" style="width: 100% !important">
					<h3 class="text-center"><i class="fa fa-money"></i> Total Pembiayaan <br><strong>Rp. <?php echo number_format($total_pembiayaan) ?></strong> </h3>
				</div>	
			</div>
		</div>
	</div>
	
	<div align="center">
		<div class="col-lg-6">		
			<div class="alert alert-warning" style="width: 100% !important">
				<h3 class="text-center"><i class="fa fa-folder-open"></i> Simpanan Pokok<br><strong>Rp. <?php echo number_format($jumlah_pokok) ?></strong> </h3>
			</div>	
		</div>
	</div>
</div>
<div class="row mt">
	<div align="center">
		<div class="col-lg-6">		
			<div class="alert alert-info" style="width: 100% !important">
				<h3 class="text-center"><i class="fa fa-book"></i> Total Tabungan <br><strong>Rp. <?php echo number_format($total_tabungan) ?></strong> </h3>
			</div>	
		</div>
	</div>
	
	<div align="center">
		<div class="col-lg-6">		
			<div class="alert alert-success" style="width: 100% !important">
				<h3 class="text-center"><i class="fa fa-download"></i> Simpanan Wajib <br><strong>Rp. <?php echo number_format($total_simpanan) ?></strong> </h3>
			</div>	
		</div>
	</div>
</div>
