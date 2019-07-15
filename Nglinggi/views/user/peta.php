
<div class="row" style="margin-top:40px;">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div id="webgis" style="width: 100%; height: 500px"></div>
			<!-- 	<div id="legend"><h3>Legenda</h3>

			</div> -->
		</div>

	</div>

</div>
</div>
<button id="legenda" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLong">Legenda</button>
<button class="btn btn-primary btn-sm" id="lokasiku">Posisiku</button>
<button class="btn btn-secondary btn-sm" id="petadesa">Peta Desa</button>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Legenda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php
$kat = $db->selectall('SELECT * FROM tbl_marker');
foreach ($kat as $c) {
	echo '<img src="assets/icon/' . $c['gbr'] . '">' . $c['nama'] . '<br/>';

}

?>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
