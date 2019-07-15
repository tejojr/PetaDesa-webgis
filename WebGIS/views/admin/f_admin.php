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
		$row = $db->select("SELECT * from admin where id=?", [$id]);
		$btn = "Edit";
		$id = $row['id'];
		$nama_akun = $row['nama'];
		$uname = $row['uname'];
		$pass = $row['pass'];
		//$db->Close();
	} else if ($aksi == "qa" && !empty($id)) {
		if ($id == $uid) {
			echo "<script>alert('Akun $nama sedang aktif, Ada tidak tidperbolehkan mengapus akunn yang sedang aktif')</script>";
			// $db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=nuka'>";

		} else {
			$result = $db->cud("delete from admin where id=?", [$id]);
			if ($result) {
				echo "<script>alert('Sukses menghapus Data')</script>";
				$db->Close();
				echo "<meta http-equiv='refresh' content='0; url=./?page=nuka'>";
			} else {
				echo "<script>alert('Gagal menghapus Data')</script>";
				$db->Close();
				echo "<meta http-equiv='refresh' content='0; url=./?page=nuka'>";
			}
		}

	}
} else {
	$btn = "Simpan";
	$id = $row['id'];
	$nama_akun = $row['nama'];
	$uname = $row['uname'];
	$pass = $row['pass'];
}
?>
<section id="breadcrumb">
	<ol class="breadcrumb">
		<li class="active">Dashboard/Form Manajemen Akun</li>
	</ol>
</section>
<div class="card">
	<h3 class="card-header text-center">Form Manajemen Akun</h3>
	<div class="card-body">
		<form class="" action="#" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Nama Akun</label>
				<input type="text" name="nama_akun" required="true" class="form-control" placeholder="masukkan nama Akun" value="<?php echo $nama_akun ?>">
			</div>
			<div class="form-row">
				<div class="col">
					<label for="">Username</label>
					<input type="text" name="uname" required="true" class="form-control" placeholder="Username...." value="<?php echo $uname ?>">
				</div>
				<div class="col">
					<label for="">Password</label>
					<input type="text" name="pass" required="true" class="form-control" placeholder="Password....." value="<?php echo $pass ?>">
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
					<a href="./?page=nuka"><button type="button" name="kembali" class="btn btn-danger">Batal</button></a>
				</div>
			</div>
		</div>
	</form>
</div>
</div>
<?php
//==============================Insert update Data==================================================================
if (isset($_POST['kirim'])) {
	$nama_akun = $_POST['nama_akun'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	if ($aksi == "qw") {
		$update = $db->cud("UPDATE admin SET nama =?, uname=?, pass=? where id =?", [$nama_akun, $uname, $pass, $id]);
		if ($update) {
			echo "<script>alert('Data Berhasil Di ubah')</script>";
			echo "<meta http-equiv='refresh' content='0; url=./?page=nuka'>";
			$db->close();
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}

	} else {
		$kirim = $db->cud("INSERT into admin values(?,?,?,?)", [null, $nama_akun, $uname, $pass]);
		if ($kirim) {
			echo "<script>alert('Data Berhasil di Simpan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=./?page=nuka'>";
			$db->close();
		} else {
			echo "<script>alert('Gagal Menambah Data!');</script>";
		}

	}

}
ob_end_flush();
?>