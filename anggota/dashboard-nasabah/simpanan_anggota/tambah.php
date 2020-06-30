<h3><i class="fa fa-angle-right"></i> Simpanan Wajib Anggota</h3>
<!-- BASIC FORM ELELEMNTS -->
	<div class="row mt">
		<div class="col-lg-12">
        <div class="form-panel">
        	  <h4 class="mb"><i class="fa fa-angle-right"></i> Simpanan Wajib Anggota</h4>
            <form class="form-horizontal style-form" method="post">
              
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Anggota</label>
                    <div class="col-sm-10">
                      <select class="form-control js-example-basic-single" name="id_anggota" required>
                      <option value="">--Pilih--</option>
                      <?php
                        $anggota = mysqli_query($con,"select * from anggota");
                        while($danggota = mysqli_fetch_array($anggota)) {                           
                              echo "<option value='$danggota[id_anggota]'>$danggota[id_anggota] - $danggota[nama_lengkap]</option>";
                           }                        
                     ?>  
                      </select>
                    </div>
                </div> 

                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Produk tabungan</label>
                    <div class="col-sm-10">
                      <select class="form-control js-example-basic-single" name="id_produk" required>
                      <option value="">--Pilih--</option>
                      <?php
                        $produk = mysqli_query($con,"select * from produk_bmt a INNER JOIN jenis_produk b on a.id_jenis_produk = b.id_jenis_produk WHERE b.jenis_produk = 'Simpanan' ");
                        while($dproduk = mysqli_fetch_array($produk)) {                           
                              echo "<option value='$dproduk[id_produk]'>$dproduk[id_produk] - $dproduk[nama_produk]</option>";
                           }                        
                     ?>  
                      </select>
                    </div>
                </div>  
                            
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah_wajib" min="10000" max="10000" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Periode Bulan</label>
                    <div class="col-sm-10">
                        <input type="text" name="periode_bulan" class="form-control" value="<?php echo $bulanIndo ?>" readonly>
                    </div>
                </div>
                
                <div class="form-group" style="margin-left: 5px"> 
                   <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                   <a href="?page=simpanan_wajib" class="btn btn-warning">Kembali</a>
                </div>
            </form>
        </div>
		</div><!-- col-lg-12-->      	
	</div><!-- /row -->
</div>
<?php
  if (isset($_POST['simpan'])) {
      
  $id_anggota=mysqli_real_escape_string($con,@$_POST['id_anggota']);
  $id_produk=mysqli_real_escape_string($con,@$_POST['id_produk']);
  $jumlah_wajib=mysqli_real_escape_string($con,@$_POST['jumlah_wajib']);
  $periode_bulan=mysqli_real_escape_string($con,@$_POST['periode_bulan']);
  $tglsetor=date('Y:m:d H:i:s');

  mysqli_query($con, "INSERT INTO simpanan_wajib (id_simpanan_wajib, id_anggota, id_produk, jumlah_wajib, periode_bulan, tglsetor) values (null,'$id_anggota','$id_produk','$jumlah_wajib','$periode_bulan','$tglsetor')") or die (mysqli_error($con));
  

  echo "<script>window.location.href='?page=simpanan_wajib';</script>";
    

}
?>