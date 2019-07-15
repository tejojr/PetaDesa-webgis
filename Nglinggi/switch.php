<?php
if(isset($_GET['page'])){
	$page = $_GET['page'];
	
	switch ($page) {
		case 'home':
		include "halaman/home.php";
		break;
		case 'tentang':
		include "halaman/tentang.php";
		break;
		case 'tutorial':
		include "halaman/tutorial.php";
		break;			
		default:
		echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
		break;
	}
}else{
	include "halaman/home.php";
}
?>