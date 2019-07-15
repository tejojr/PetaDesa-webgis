<?php
include_once '../../inc/Database.php';
$db = new Database();
$data = $array();
$row = $db->selectall("SELECT * FROM tbl_lokasi");
foreach ($row as $a) {
	$data[] = $a;
}
echo json_encode($data);
?>
