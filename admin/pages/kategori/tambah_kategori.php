<fieldset>
	<legend>Tambah Data</legend>
	<form action="" method="post">
		<table>
			<tr>
				<td>Nama kategori</td>
				<td>:</td>
				<td><input type="text" name="nama_kategori" required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"><input type="reset" name="" value="hapus"><a href="?page=kategori"><input type="button" name="" value="Batal"></a></td>
			</tr>
		</table>
	</form>

<?php 
include"inc/koneksi.php";

	$nama_kategori = @$_POST['nama_kategori'];
	$tambah=@$_POST['tambah'];

	if($tambah){
		if($nama_kategori == ""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES (NULL, '$nama_kategori')");
			?><script>alert("Data berhasil ditambahkan.");window.location.href="?page=kategori";</script><?php
		}
	}

 ?>


</fieldset>