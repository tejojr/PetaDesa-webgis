<?php
if (isset($_GET['1qazxsw2'])) {
	$id = $_GET['1qazxsw2'];
} else {
	$id = "";
}

//========================================================Get
if (!empty($id)) {
	$row = $db->select("select * from v_lokasi where id=?", [$id]);
	$id = $row['id'];
	$nama_lokasi = $row['nama_lokasi'];
	$lat = $row['lat'];
	$lng = $row['lng'];
	$alamat = $row['alamat'];
	$legenda = $row['legenda'];
	$nohp = $row['no_hp'];
	$foto = $row['foto'];
	$deskripsi = $row['deskripsi'];
	$url = $row['url'];
	//$db->Close();
}
?>
<section id="breadcrumb">
	<ol class="breadcrumb">
		<li class="active">Dashboard/Data Lokasi/Detail</li>
	</ol>
</section>
<div class="card">
	<h3 class="card-header text-center">Detail Lokasi</h3>
	<div class="card-body table-responsive">
			<table class="table table-striped">
				<tr>
					<td colspan="3" align="center"><img src="../../assets/image/<?php echo $foto ?>" width="300" height="200"/></td>
				</tr>
				<tr>
					<th>Nama Lokasi</th>
					<td>:</td>
					<td><?php echo $nama_lokasi; ?></td>
				</tr>
				<tr>
					<th>latitude</th>
					<td>:</td>
					<td><?php echo $lat; ?></td>
				</tr>
				<tr>
					<th>Longtitude</th>

					<td>:</td>
					<td><?php echo $lng; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><?php echo $alamat; ?></td>
				</tr>
				<tr>
					<th>Legenda</th>
					<td>:</td>
					<td><?php echo $legenda; ?></td>
				</tr>
				<tr>
					<th>Nomor Hp</th>
					<td>:</td>
					<td><?php echo $nohp; ?></td>
				</tr>
				<tr>
					<th>Deksripsi</th>
					<td>:</td>
					<td><?php echo $deskripsi; ?></td>
				</tr>
				<tr>
					<th>URL</th>
					<td>:</td>
					<td><?php echo $url; ?></td>
				</tr>
			</table>
		<div class="row">
			<div class="col-md-1">
				<a href="./?page=masuk&2wsxzaq1=qw&1qazxsw2=<?php echo $id ?>"><button type="button" name="send" class="btn btn-primary">Ubah</button></a>
			</div>
			<div class="col-md-1">
				<a href="./?page=lokasi"><button type="button" name="send" class="btn btn-danger">Kembali</button></a>
			</div>

		</div>
	</div>
</div>
