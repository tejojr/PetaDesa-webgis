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

//=========================================================Get Aksi=============================================
if ($aksi) {
	if ($aksi == "qw" && !empty($id)) {
		$row = $db->select("select * from v_galery where id=?", [$id]);
		$btn = "Edit";
		$id_gal = $row['id'];
		$id_lokasi = $row['id_lokasi'];
		$gal = $row['galery'];
		$caption = $row['caption'];
		//$db->Close();
	} else if ($aksi == "qa" && !empty($id)) {
		$result = $db->cud("delete from tbl_galerry where id=?", [$id]);
		if ($result) {
			echo "<script>alert('Sukses menghapus Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=foto'>";
		} else {
			echo "<script>alert('Gagal menghapus Data')</script>";
			echo "<meta http-equiv='refresh' content='0; url=./?page=foto'>";
		}
	}
} else {
	$btn = "Simpan";
	$id_gal = "";
	$id_lokasi = "";
	$gal = "";
	$caption = "";
}
?>
<section id="breadcrumb">
  <ol class="breadcrumb">
    <li class="active">Dashboard/Form Galery</li>
  </ol>
</section>

<div class="card">
  <h3 class="card-header text-center">Form Gallery</h3>
  <div class="card-body">
    <form class="" action="#" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Nama Lokasi</label>
        <select class="form-control" name="nama_lokasi" required="true">
          <?php
$a = $db->selectall("SELECT * from tbl_lokasi ");
foreach ($a as $row) {
	if ($row['id'] == $id_lokasi) {
		$select = "selected";
	} else {
		$select = "";
	}?>
	<option value='<?php echo $row['id'] ?>' <?php echo $select ?>><?=$row['nama_lokasi']?></option>";
<?php
}

?>
      </select>
    </div>

    <div class="form-group">
      <label for="caption">Caption</label> </br>
      <input type="text" name="caption" required="true" id="caption" class="form-control" placeholder="Masukkan Caption Foto Disini.........." value="<?php echo $caption ?>" >
    </div>
    <div class="form-row">
      <div class="col">
        <label for="">Foto</label>
        <div class="custom-file">
          <input id="imgInp" type="file" name="gal" class="custom-file-input">
          <label for="imgInp" class="custom-file-label"><?php echo $gal; ?></label>
        </div>
      </div>
      <div class="col">
        <?php $tmp = "../../assets/image/"?>
        <img id="picture" alt="Gambar Anda" class="img-thumbnail" width="300px" height="300" src="<?php echo $tmp . $gal ?>" >
      </div>
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
      <a href="./?page=foto"><button type="button" name="kembali" class="btn btn-danger">Batal</button></a>
    </div>
  </div>
</div>
</form>
</div>
</div>
<?php
//==============================Insert update Data==================================================================
if (isset($_POST['kirim'])) {
	$id_lokasi = $_POST['nama_lokasi'];
	$caption = $_POST['caption'];
	$img = $_FILES['gal']['name'];
	if ($img == "") {
		$gam = $gal;
	} else {
		$gam = $img;
	}
	$src = $_FILES['gal']['tmp_name'];
	move_uploaded_file($src, "../../assets/image/" . $gam);
	if ($aksi == "qw") {
		$update = $db->cud("UPDATE tbl_galerry SET id_lokasi=?, caption =?, galery = ? WHERE id =?", [$id_lokasi, $caption, $gam, $id]);
		if ($update) {
			echo "<script>alert('Sukses Mengubah Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=foto'>";
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}

	} else {
		$kirim = $db->cud("INSERT into tbl_galerry values(?,?,?,?)", [null, $id_lokasi, $caption, $gam]);
		//$db->redirect('./?page=lokasi');
		if ($kirim) {
			echo "<script>alert('Sukses Menambahkan Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=foto'>";
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}
	}

	$db->close();
}
ob_end_flush();
?>