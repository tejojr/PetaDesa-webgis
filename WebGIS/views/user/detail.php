<?php
if (isset($_GET['1qazxsw2'])) {
	$kode = $_GET['1qazxsw2'];
} else {
	$kode = "";
}
$a = $db->select("SELECT * FROM v_lokasi where id=?", [$kode]);

$id = $a['id'];
$nama_lokasi = $a['nama_lokasi'];
$lat = $a['lat'];
$lon = $a['lng'];
$alamat = $a['alamat'];
$legenda = $a['legenda'];
$nohp = $a['no_hp'];
$foto = $a['foto'];
$deskripsi = $a['deskripsi'];
$url = $a['url'];
$icon = $a['gbr'];

?>
<div class="container" style="margin-top: 55px">
	<h2><?php echo $nama_lokasi; ?></h2>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<p>Alamat : <?php echo $alamat; ?></p>
			<p>Latitude : <?php echo $lat; ?>, Longtitude : <?php echo $lon; ?></p>
			<p>Kategori :<?php echo $legenda; ?></p>
			<p>Nomor Hp: <?php echo $nohp; ?></p>
			<div>
				<h3>Deskripsi</h3>
				<hr>
				<?php echo $deskripsi; ?>
			</div>
		</div>

		<div class="col-md-6">
			<div class="row">
				<?php
$hasil = $db->selectall("SELECT * FROM v_galery where id_lokasi =?", [$kode]);
foreach ($hasil as $b) {
	?>
				<a href="assets/image/<?php echo $b['galery'] ?>" data-toggle="lightbox" data-title="<?php echo $desa ?>"  data-footer="<?php echo $b['caption'] ?>" data-gallery="example-gallery" class="col-lg-6 col-md-6 col-6 my-3" data-title="asas">
					<img src="assets/image/<?php echo $b['galery'] ?>" class="img-fluid card">
				</a>
				<?php
}
?>

		</div>
		<a href="./?page=petaku"><button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali Ke Peta</button></a>
		<a href= https://www.google.com/maps?saddr=My+Location&daddr=<?=$lat . ',' . $lon?>><button type="button" class="btn btn-success" data-dismiss="modal">Lihat Jalan</button></a>
		<?php if ($url != ""): ?>
			<a href="<?php echo 'http://' . $url ?>"><button type="button" class="btn btn-primary">Kunjungi Website</button></a>
		<?php endif?>
	</div>
</div>

</div>