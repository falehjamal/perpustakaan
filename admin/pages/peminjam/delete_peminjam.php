<?php 
include "inc/koneksi.php";
$id=@$_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_peminjam WHERE id='$id'") or die (mysqli_error());

 ?>
 <script type="text/javascript">
 	window.location.href="?page=peminjam";
 </script>