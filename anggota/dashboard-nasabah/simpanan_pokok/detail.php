<?php
$rek_tabungan=mysqli_real_escape_string($con,$_GET['rek_tabungan']);
$sql=mysqli_query($con,"select * from tabungan_anggota a inner join anggota b on a.id_anggota = b.id_anggota inner join produk_bmt c on a.id_produk = c.id_produk where a.rek_tabungan = '$rek_tabungan' and a.status = 'Setor' ") or die (mysqli_error($con));
$data=mysqli_fetch_array($sql);
$sql2=mysqli_query($con,"select SUM(nominal) AS nominal1 from tabungan_anggota WHERE rek_tabungan = '$rek_tabungan' AND status='Setor'") or die (mysqli_error($con));
$data2=mysqli_fetch_array($sql2);
$total_simpanan2 = $data2['nominal1'];

$sql3=mysqli_query($con,"select SUM(nominal) AS nominal2 from tabungan_anggota WHERE rek_tabungan = '$rek_tabungan' AND status='Tarik'") or die (mysqli_error($con));
$data3=mysqli_fetch_array($sql3);
$total_simpanan3 = $data3['nominal2'];

$saldo = $total_simpanan2 - $total_simpanan3;
?>
<h3><i class="fa fa-angle-right"></i> Detail Tabungan</h3>
<table class="table">
	<tr>
		<td>Nama </td>
		<td>:</td>
		<td><?php echo $data['nama_lengkap'] ?></td>
	</tr>
	<tr>
		<td>No. Rek</td>
		<td>:</td>
		<td><?php echo $data['rek_tabungan'] ?></td>
	</tr>
	<tr>
		<td>Produk Tabungan</td>
		<td>:</td>
		<td><?php echo $data['nama_produk'] ?></td>
	</tr>
</table>
<!-- BASIC FORM ELELEMNTS -->
<hr>
	<div class="row mt">
		<div class="col-lg-12">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Id Anggota</th>
        				<th>Nama</th>
                                        <th>Status</th>
        				<th>Tgl Setor/Tarik</th>
        				<th class="text-right">Nominal</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php
        			$no = 1;
        			$sql=mysqli_query($con,"select * from tabungan_anggota a inner join anggota b on a.id_anggota = b.id_anggota inner join produk_bmt c on a.id_produk = c.id_produk where a.rek_tabungan = '$rek_tabungan' ORDER BY tgl_setor DESC ") or die (mysqli_error($con));
        			while($data = mysqli_fetch_array($sql)){
        			
        			 ?>
        			<tr>
        				<td><?php echo $no++ ?></td>
        				<td><?php echo $data['id_anggota'] ?></td>
        				<td><?php echo $data['nama_lengkap'] ?></td>
                                        <td><?php echo $data['status'] ?></td>
        				<td><?php echo date('d-m-Y H:i:s', strtotime($data['tgl_setor'])) ?></td>
        				<td class="text-right"><?php echo 'Rp.'. number_format($data['nominal']) ?></td>
        			</tr>
        			<?php } ?>
        			<tr>
        				<td colspan="5" align="center"><strong>Total</strong></td>
        				<td class="text-right"><strong><?php echo 'Rp.'. number_format($saldo) ?></strong></td>
        			</tr>
        		</tbody>
        	</table>
		</div><!-- col-lg-12-->      	
	</div><!-- /row -->
	<div class="row mt-2 text-right" style="margin-right: 5px;">
		<a href="?page=tabungan_anggota" class="btn btn-warning">Kembali</a>
	</div>
</div>