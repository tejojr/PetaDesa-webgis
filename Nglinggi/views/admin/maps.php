<?php
$id = 1;

if (!empty($id)) {
	$row = $db->select("SELECT * FROM tbl_header WHERE id=?", [$id]);
	$nama_desa = $row['nama_desa'];
	$url_kml = $row['url_kml'];
}

//==============================Insert update Data==================================================================
if (isset($_POST['kirim'])) {
	$nama_desa = $_POST['nama_desa'];
	$url_kml = $_POST['url_kml'];
	$kirim = $db->cud("UPDATE tbl_header set nama_desa=?, url_kml=? where id=?", [$nama_desa, $url_kml, $id]);
	if ($kirim) {
		echo "<script>alert('Data berhasil diupdate')</script>";
		echo "<meta http-equiv='refresh' content='0; url=./?page=map'>";
		$db->close();
	} else {
		echo "<script>alert('Update gagal!');</script>";
		$db->close();
	}

}
?>
<section id="breadcrumb">
  <ol class="breadcrumb">
    <li class="active">Dashboard/Maps</li>
  </ol>
</section>
<div class="card">
  <h3 class="card-header text-center">Maps</h3>
  <div class="card-body">
    <form class="" action="#" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Nama Desa</label>
        <input type="text" name="nama_desa" required="true" class="form-control" placeholder="ex:Desa Mas" value="<?php echo $nama_desa ?>">
      </div>
      <div class="form-group">
        <label for="">Url KML</label>
        <input type="text" name="url_kml" required="true" class="form-control" value="<?php echo $url_kml ?>">
      </div>
      <div class="form-group row">
        <div class="col-md-1">
          <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
        </div>
        <div class="col-md-1">
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
</div>
