<?php 
include "inc/koneksi.php";

$id_anggota=@$_GET['id_anggota'];

mysqli_query($koneksi,"DELETE FROM tb_anggota WHERE id_anggota='$id_anggota'") or die (mysqli_error());

 ?>
 <script type="text/javascript">
 	window.location.href="?page=anggota";
 </script>