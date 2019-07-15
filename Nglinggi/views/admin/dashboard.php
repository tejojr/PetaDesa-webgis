<section id="breadcrumb">
    <ol class="breadcrumb">
      <li class="active">Dashboard/MyDashboard</li>
    </ol>
</section>
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary">
      <div class="card-body">
        <span class="float-left">
<?php
$jumlah = $db->selectall("SELECT * FROM tbl_lokasi");
$a = count($jumlah);
echo $a;
?></span>
        <span class="float-right">
          <i class="fa fa-pencil-square-o fa-3x"></i>
        </span>
      </div>
      <a class="card-footer text-white " href="./?page=pendaftar">
        <span class="float-left">Lokasi</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success">
      <div class="card-body">
        <span class="float-left"><?php
$jumlah = $db->selectall("SELECT * FROM tbl_marker");
$a = count($jumlah);
echo $a;?></span>
        <span class="float-right">
          <i class="fa fa-check-square fa-3x"></i>
        </span>
      </div>
      <a class="card-footer text-white" href="./?page=tanda">
        <span class="float-left">Marker</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h4>Selamat Datang <?php echo $nama; ?> di WebGIS <small>SRINTEKDES</small></h4>
    <p>&copy; BLC Telkom Klaten 2018</p>
  </div>
</div>
