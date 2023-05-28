<?php
@$aksi2 = $_GET['aksi2'];
switch ($aksi2) {
	case 'tambah':
		include 'tambah.php';
		break;
  case 'edit':
		include 'edit.php';
		break;
  case 'hapus':
		include 'hapus.php';
		break;
	default:
		include 'tampil.php';
		break;
}
?>
