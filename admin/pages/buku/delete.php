<?php 
include "inc/koneksi.php";

$id_buku=@$_GET['id_buku'];

mysqli_query($koneksi,"DELETE FROM tb_buku WHERE id_buku='$id_buku'") or die (mysql_error());

 ?>
 <script type="text/javascript">
 	window.location.href="?page=data";
 </script>