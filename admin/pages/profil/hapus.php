<?php 
$id_anggota=@$_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_anggota WHERE anggota_id='$id_anggota'");
header("location:?page=anggota");
 ?>