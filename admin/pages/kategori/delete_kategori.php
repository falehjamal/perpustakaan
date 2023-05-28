<?php 
$id_kategori=@$_GET['id_kategori'];
mysqli_query($koneksi,"DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'");
header("location:?page=kategori");
 ?>