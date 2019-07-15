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
		$row = $db->select("select * from tbl_marker where id=?", [$id]);
		$btn = "Edit";
		$id_mark = $row['id'];
		$kategori = $row['nama'];
		$ikon = $row['gbr'];
		//$db->Close();
	} else if ($aksi == "qa" && !empty($id)) {
		$result = $db->cud("delete from tbl_marker where id=?", [$id]);
		if ($result) {
			echo "<script>alert('Sukses menghapus Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=tanda'>";
		} else {
			echo "<script>alert('Gagal menghapus Data')</script>";
			echo "<meta http-equiv='refresh' content='0; url=./?page=tanda'>";
		}
	}
} else {
	$btn = "Simpan";
	$id_mark = "";
	$kategori = "";
	$ikon = "";
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
				<label for="caption">Kategori</label> </br>
				<input type="text" name="kategori" required="true" id="caption" class="form-control" placeholder="Misal: Pemerintahan ( masukkan sau saja)" value="<?php echo $kategori ?>" >
			</div>
			<div class="form-row">
				<div class="col">
					<label for="">icon</label>
					<div class="custom-file">
						<input id="imgInp" type="file" name="ikon" class="custom-file-input">
						<label for="imgInp" class="custom-file-label"><?php echo $ikon; ?></label>
					</div>
				</div>
				<div class="col">
					<?php $tmp = "../../assets/icon/"?>
					<img id="picture" alt="Gambar Anda" class="img-thumbnail" src="<?php echo $tmp . $ikon ?>" >
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
				<a href="./?page=tanda"><button type="button" name="kembali" class="btn btn-danger">Batal</button></a>
			</div>
		</div>
	</div>
</form>
</div>
</div>
<?php
//==============================Insert update Data==================================================================
if (isset($_POST['kirim'])) {
	$kategori = $_POST['kategori'];
	$img = $_FILES['ikon']['name'];
	if ($img == "") {
		$gam = $ikon;
	} else {
		$gam = $img;
	}
	$src = $_FILES['ikon']['tmp_name'];
	move_uploaded_file($src, "../../assets/icon/" . $gam);
	if ($aksi == "qw") {
		$update = $db->cud("UPDATE tbl_marker SET nama= ?, gbr=? WHERE id =?", [$kategori, $gam, $id_mark]);
		if ($update) {
			echo "<script>alert('Sukses Mengubah Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=tanda'>";
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}

	} else {
		$kirim = $db->cud("INSERT into tbl_marker values(?,?,?)", [null, $kategori, $gam]);
		//$db->redirect('./?page=lokasi');
		if ($kirim) {
			echo "<script>alert('Sukses Menambahkan Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=tanda'>";
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}
	}

	$db->close();
}
ob_end_flush();
?>