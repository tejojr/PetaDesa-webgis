
<div class="row" style="margin-top:40px;">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div id="webgis" style="width: 100%; height: 500px"></div>
				<div id="legend"><h3>Legenda</h3>
					<?php
$kat = $db->selectall('SELECT * FROM tbl_marker');
foreach ($kat as $c) {
	echo '<img src="assets/icon/' . $c['gbr'] . '">' . $c['nama'] . '<br/>';

}

?>

				</div>
			</div>

		</div>

	</div>
</div>
<!-- <button id="lokasiku" class="btn btn-danger btn-sm">My Location</button> --><button class="btn btn-secondary btn-sm" id="petadesa">Peta Desa</button>

