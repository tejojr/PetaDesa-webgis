<?php
ob_start();
session_start();
include_once "../../inc/Database.php";
$db = new Database();
if (!$db->inlogin()) {
	$db->redirect('../../login.php');
}
$uid = $_SESSION['uid'];
$siki = $db->select('SELECT * FROM admin where id=?', [$uid]);
$nama = $siki['nama'];
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../../assets/favicon/favicon.png">
  <title>Dashboard PETANENYONG</title>
  <!--   <link rel="icon" href="../../asset/foto/logo.png" type="image/icon"> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shring-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <script src="../../assets/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: "textarea.mce",
      plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table contextmenu paste"
      ],
      menubar : false,
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
</head>
<body>
  <header>
   <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Dashboard <small>SRINTEKDES</small></a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
       <a class="nav-link" href="../../logout.php"><i class="fa fa-sign-out fa-fw"></i><?php echo $nama ?></a>
     </li>
   </ul>
 </nav>
</header>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="margin-top: 35px;">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="./?page=dashboard">
              <i class="fa fa-tachometer float-right
              "></i><span class="float-left">Dashboard </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./?page=map">
              <i class="fa fa-map float-right
              "></i><span class="float-left">Maps</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./?page=lokasi">
              <i class="fa fa-pencil-square-o float-right
              "></i><span class="float-left">Lokasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./?page=foto">
              <i class="fa fa-picture-o  float-right
              "></i><span class="float-left">Galery</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./?page=tanda">
              <i class="fa fa-map-marker float-right
              "></i><span class="float-left">Marker/Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./?page=nuka">
              <i class="fa fa-cog float-right
              "></i><span class="text-left">Manajemen Akun</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="margin-top: 40px">

      <?php
$page = isset($_GET['page']) ? $_GET['page'] : null;
switch ($page) {
case 'map':
	include 'maps.php';
	break;
case 'tanda':
	include 'marker.php';
	break;
case 'nuka':
	include 'd_admin.php';
	break;
case 'f_nuka':
	include 'f_admin.php';
	break;
case 'f_galery':
	include 'f_galery.php';
	break;
case 'lokasi':
	include 'data.php';
	break;
case 'dashboard':
	include 'dashboard.php';
	break;
case 'masuk':
	include 'form.php';
	break;
case 'emark':
	include 'f_marker.php';
	break;
case 'foto':
	include 'galery.php';
	break;
case 'form-view':
	include 'formview.php';
	break;
default:
	include 'dashboard.php';
	break;
}
?>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#picture').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgInp").change(function() {
        readURL(this);
      });

    </script>


  </body>
  </html>
  <?php
ob_end_flush();
?>
