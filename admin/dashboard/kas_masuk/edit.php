<?php
$id_jenis_produk=mysqli_real_escape_string($con,$_GET['id_jenis_produk']);
$sql=mysqli_query($con,"select * from jenis_produk where id_jenis_produk = '$id_jenis_produk'") or die (mysqli_error($con));
$data=mysqli_fetch_array($sql);
?>
<h3><i class="fa fa-angle-right"></i> Edit Jenis Produk</h3>
<!-- BASIC FORM ELELEMNTS -->
	<div class="row mt">
		<div class="col-lg-12">
        <div class="form-panel">
        	  <h4 class="mb"><i class="fa fa-angle-right"></i> Jenis Produk</h4>
            <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" name="jenis_produk" value="<?php echo $data['jenis_produk'] ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Deskripsi Singkat</label>
                    <div class="col-sm-10">
                        <textarea name="desk_jenis" class="form-control" rows="8"><?php echo $data['desk_jenis'] ?></textarea>
                    </div>
                </div>
                
                <div class="form-group" style="margin-left: 5px"> 
                   <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                   <a href="?page=jenis_produk" class="btn btn-warning">Kembali</a>
                </div>
            </form>
        </div>
		</div><!-- col-lg-12-->      	
	</div><!-- /row -->
</div>
<?php
  if (isset($_POST['simpan'])) {
  
  $id_jenis_produk=mysqli_real_escape_string($con,@$_GET['id_jenis_produk']);    
  $jenis_produk=mysqli_real_escape_string($con,@$_POST['jenis_produk']);
  $desk_jenis=mysqli_real_escape_string($con,@$_POST['desk_jenis']);

  mysqli_query($con, "UPDATE jenis_produk set jenis_produk='$jenis_produk', desk_jenis='$desk_jenis' WHERE id_jenis_produk='$id_jenis_produk' ") or die (mysqli_error($con));
  echo "<script>window.location.href='?page=jenis_produk';</script>";
    

}
?>