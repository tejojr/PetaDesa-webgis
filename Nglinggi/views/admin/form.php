<?php
ob_start();
if (isset($_GET['2wsxzaq1'])) {
	$aksi = $_GET['2wsxzaq1'];
} else {
	$aksi = "";
}

if (isset($_GET['1qazxsw2'])) {
	$id = $_GET['1qazxsw2'];
} else {
	$id = "";
}
$dapat = $db->select("SELECT * from tbl_header where id=?", [1]);
$kode = $dapat['id'];

//=========================================================Get Aksi=============================================
if ($aksi) {
	if ($aksi == "qw" && !empty($id)) {
		$row = $db->select("select * from tbl_lokasi where id=?", [$id]);
		$btn = "Edit";
		$id = $row['id'];
		$nama_lokasi = $row['nama_lokasi'];
		$lat = $row['lat'];
		$lng = $row['lng'];
		$alamat = $row['alamat'];
		$id_marker = $row['id_marker'];
		$nohp = $row['no_hp'];
		$gbr = $row['foto'];
		$deskripsi = $row['deskripsi'];
		$url = $row['url'];
		//$db->Close();
	} else if ($aksi == "qa" && !empty($id)) {
		$result = $db->cud("delete from tbl_lokasi where id=?", [$id]);
		if ($result) {
			echo "<script>alert('Sukses menghapus Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=lokasi'>";
		} else {
			echo "<script>alert('Gagal menghapus Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=lokasi'>";
		}
	}
} else {
	$btn = "Simpan";
	$id = "";
	$nama_lokasi = "";
	$lat = "";
	$lng = "";
	$alamat = "";
	$legenda = "";
	$nohp = "";
	$gbr = "";
	$deskripsi = "";
	$url = "";
}
?>
<section id="breadcrumb">
  <ol class="breadcrumb">
    <li class="active">Dashboard/Form Lokasi</li>
  </ol>
</section>

<div class="card">
  <h3 class="card-header text-center">Form Lokasi</h3>
  <div class="card-body">
    <form class="" action="#" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Nama Lokasi</label>
        <input type="text" name="nama_lokasi" required="true" class="form-control" placeholder="masukkan nama lokasi" value="<?php echo $nama_lokasi ?>">
      </div>
      <div class="form-group">
        <label for="">Kategori</label>
        <select class="form-control" name="id_lokasi" required="true">
          <?php
$a = $db->selectall("SELECT * from tbl_marker ");
foreach ($a as $row) {
	if ($row['id'] == $id_marker) {
		$select = "selected";
	} else {
		$select = "";
	}?>
	<option value='<?=$row['id']?>' <?=$select?> ><?=$row['nama']?></option>";
<?php }

?>
        </select>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="">Latitude</label>
          <input type="text" name="lat" required="true" class="form-control" placeholder="Latitude" value="<?php echo $lat ?>">
        </div>
        <div class="col">
          <label for="">Longtitude</label>
          <input type="text" name="lng" required="true" class="form-control" placeholder="Longtitude " value="<?php echo $lng ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="">Alamat</label>
        <textarea name="alamat" rows="3" rerquired="true" class="form-control" ><?php echo $alamat ?></textarea>
      </div>
      <div class="form-group">
        <label for="">Deskripsi</label>
        <textarea name="deskripsi" rows="3" rerquired="true" class="form-control mce" ><?php echo $deskripsi ?></textarea>
      </div>
      <div class="form-group">
        <label for="">Nomor HP</label>
        <input type="number" name="nohp" required="true"  class="form-control" value="<?php echo $nohp; ?>" >
      </div>
      <div class="form-group">
        <label for="nama">Alamat Website</label> </br>
        <input type="text" name="url" required="true" id="nama" class="form-control" placeholder="URL..." value="<?php echo $url ?>" >
      </div>
      <div class="form-group">
        <label for="">Foto</label>
        <div class="custom-file">
          <input type="file" name="gbr" class="custom-file-input">
          <label for="" class="custom-file-label"><?php echo $gbr; ?></label>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-1">
          <button type="submit" name="kirim" class="btn btn-primary"><?php echo "$btn" ?></button>
        </div>
        <div class="col-md-2">
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
        <div class="col-md-3">
          <a href="./?page=lokasi"><button type="button" name="kembali" class="btn btn-danger">Batal</button></a>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
<?php
//==============================Insert update Data==================================================================
if (isset($_POST['kirim'])) {
	$nama_lokasi = $_POST['nama_lokasi'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$alamat = $_POST['alamat'];
	$id_lokasi = $_POST['id_lokasi'];
	$nohp = $_POST['nohp'];
	$deskripsi = $_POST['deskripsi'];
	$url = $_POST['url'];
	$img = $_FILES['gbr']['name'];
	if ($img == "") {
		$gam = $gbr;
	} else {
		$gam = $img;
	}
	$src = $_FILES['gbr']['tmp_name'];
	move_uploaded_file($src, "../../assets/image/" . $gam);
	if ($aksi == "qw") {
		$update = $db->cud("UPDATE tbl_lokasi SET id_marker = ?, nama_lokasi=?,lat=?,lng=?,alamat=?,no_hp=?,foto=?, deskripsi=?, url=? where id =?", [$id_lokasi, $nama_lokasi, $lat, $lng, $alamat, $nohp, $gam, $deskripsi, $url, $id]);
		if ($update) {
			echo "<script>alert('Sukses Mengubah Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=lokasi'>";
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}

		//$db->redirect('./?page=lokasi');
	} else {
		$kirim = $db->cud("INSERT into tbl_lokasi values(?,?,?,?,?,?,?,?,?,?,?)", [null, $kode, $id_lokasi, $nama_lokasi, $lat, $lng, $alamat, $nohp, $gam, $deskripsi, $url]);
		if ($kirim) {
			echo "<script>alert('Data Berhasil di Simpan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=./?page=lokasi'>";
			$db->close();
		} else {
			echo "<script>alert('Gagal Menambah Data!');</script>";
		}
		//$db->redirect('./?page=lokasi');
	}

	$db->close();
}
ob_end_flush();
?>