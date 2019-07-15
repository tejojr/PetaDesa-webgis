<section id="breadcrumb">
  <ol class="breadcrumb">
    <li class="active">Dashboard/Data Lokasi</li>
  </ol>
</section>
<div class="card">
  <h3 class="card-header">Data Lokasi</h3>
  <div class="card-body">
    <a href="./?page=masuk" class="btn btn-danger"><i class="fa fa-user-plus"></i></a><br/>
    <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Nama Lokasi</th>
            <th>Latitude</th>
            <th>Longtitude</th>
            <th>Legenda</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php
// $hal = (isset($_GET['hal'])) ? $_hal['page'] : 1;
// $limit = 1;
// $limit_start = ($hal - 1) * limit;
$row = $db->selectall("select `tbl_lokasi`.`id` AS `id`,`tbl_lokasi`.`id_desa` AS `id_desa`,`tbl_lokasi`.`nama_lokasi` AS `nama_lokasi`,`tbl_marker`.`nama` AS `legenda`,`tbl_lokasi`.`lat` AS `lat`,`tbl_lokasi`.`lng` AS `lng`,`tbl_lokasi`.`alamat` AS `alamat`,`tbl_lokasi`.`no_hp` AS `no_hp`,`tbl_lokasi`.`foto` AS `foto`,`tbl_lokasi`.`deskripsi` AS `deskripsi`,`tbl_lokasi`.`url` AS `url`,`tbl_marker`.`gbr` AS `gbr` from `tbl_lokasi` join `tbl_marker` where (`tbl_marker`.`id` = `tbl_lokasi`.`id_marker`)");
$no = 1;
foreach ($row as $a) {
	?>
         <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $a['nama_lokasi']; ?></td>
          <td><?php echo $a['lat']; ?></td>
          <td><?php echo $a['lng']; ?></td>
          <td><?php echo $a['legenda']; ?></td>
          <td>
            <a href="./?page=form-view&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-eye" alt="Lihat Detail" title="Lihat Detail"></i></a>
            <a href="./?page=masuk&2wsxzaq1=qw&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-edit" alt="edit" title="edit"></i></a>
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="./?page=masuk&2wsxzaq1=qa&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-trash" alt="delete" title="delete"></i></a>
          </td>
        </tr>
        <?php $no++;}?>
      </tablee>
    </div>
    <!-- Paging -->
    <!--  -->
 </div>

</div>
